<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mappointment extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}
	function booked($data,$booked_data,$id_doctor){
		$array = array(
				'id_member' => $this->session->userdata('userId'),
				'id_doctor' => $id_doctor,
				'date_appointment' => date('Y-m-d',strtotime($booked_data['booked_date'])),
				'hour_appointment' => $booked_data['booked_time'],
				'relation' => $data['relation'],
				'name' => $data['name'],
				'phone_number' => $data['phone_number'],
				'gender' => $data['gender'],
				'date_born' => date('Y-m-d',strtotime($data['birthday'])),
				'description_disease' => $data['disease'],
				'status_appointment' => 0,
				'date_input' => date('Y-m-d H:i:s')
			);
		$this->db->insert('appointment',$array);

		// send notification to doctor & pasien
		$pasien = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
		$doctor = $this->mod->getDataWhere('user','id_user',$id_doctor);
		
		// notif pasien
		/*$notif = $pasien['full_name']." Make an appointment with ".$doctor['full_name']." at ".date('d M Y',strtotime($booked_data['booked_date']))." ".$booked_data['booked_time'];
        $array = array(
            'id_user' => $this->session->userdata('userId'),
            'status_notification' => 0,
            'date_notification' => date('Y-m-d H:i:s'),
            'notification_type' => 1,
            'notification' => $notif,
            'link_notification' => '/appointment'
          );
        $this->db->insert('notification',$array);*/

        // notif doctor
		$notif = $pasien['full_name']." Make an appointment with you at ".date('d M Y',strtotime($booked_data['booked_date']))." ".$booked_data['booked_time'];
        $array = array(
            'id_user' => $id_doctor,
            'status_notification' => 0,
            'date_notification' => date('Y-m-d H:i:s'),
            'notification_type' => 1,
            'notification' => $notif,
            'link_notification' => '/appointment'
          );
        $this->db->insert('notification',$array);
		return 1;
	}
	function fetchAppointmentUpcoming($limit,$start,$pagenumber,$id_user){
		if($pagenumber!="")
	      $this->db->limit($limit,($pagenumber*$limit)-$limit);
	    else
	      $this->db->limit($limit,$start);

	  	$this->db->join('user','user.id_user = appointment.id_doctor');
	  	$this->db->where('id_member',$id_user);
	  	$this->db->where('status_appointment',0);
	  	$this->db->or_where('status_appointment',1);
	    $this->db->order_by('date_appointment','DESC');
	    $query = $this->db->get('appointment');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
	}
	function fetchAppointmentDoctorUpcoming($limit,$start,$pagenumber,$id_user){
		if($pagenumber!="")
	      $this->db->limit($limit,($pagenumber*$limit)-$limit);
	    else
	      $this->db->limit($limit,$start);

	  	$this->db->join('user','user.id_user = appointment.id_member');
	  	$this->db->where('id_doctor',$id_user);
	  	$this->db->where('status_appointment',0);
	  	$this->db->or_where('status_appointment',1);
	    $this->db->order_by('date_appointment','DESC');
	    $query = $this->db->get('appointment');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
	}
	function getAppointmentDoctor($id){
		$this->db->select('user.full_name,user.avatar,user.address,appointment.*');
		$this->db->join('user','user.id_user = appointment.id_member');
	  	$this->db->where('id_appointment',$id);
	    $this->db->order_by('date_appointment','DESC');
	    $query = $this->db->get('appointment');
	    if($query->num_rows()>0){
	      return $query->row_array();
	    }
	    else return FALSE;		
	}
	function getAppointment($id){
		$this->db->select('user.full_name,user.avatar,user.address,appointment.*');
		$this->db->join('user','user.id_user = appointment.id_doctor');
	  	$this->db->where('id_appointment',$id);
	    $this->db->order_by('date_appointment','DESC');
	    $query = $this->db->get('appointment');
	    if($query->num_rows()>0){
	      return $query->row_array();
	    }
	    else return FALSE;		
	}
	function fetchAppointmentDoctorDone($limit,$start,$pagenumber,$id_user){
		if($pagenumber!="")
	      $this->db->limit($limit,($pagenumber*$limit)-$limit);
	    else
	      $this->db->limit($limit,$start);

	  	$this->db->join('user','user.id_user = appointment.id_member');
	  	$this->db->where('id_doctor',$id_user);
	  	$this->db->where('status_appointment',2);
	  	$this->db->or_where('status_appointment',3);
	    $this->db->order_by('date_appointment','DESC');
	    $query = $this->db->get('appointment');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
	}
	function fetchAppointmentDone($limit,$start,$pagenumber,$id_user){
		if($pagenumber!="")
	      $this->db->limit($limit,($pagenumber*$limit)-$limit);
	    else
	      $this->db->limit($limit,$start);

	  	$this->db->join('user','user.id_user = appointment.id_doctor');
	  	$this->db->where('id_member',$id_user);
	  	$this->db->where('status_appointment',2);
	  	$this->db->or_where('status_appointment',3);
	    $this->db->order_by('date_appointment','DESC');
	    $query = $this->db->get('appointment');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
	}
	function changeDate($data,$id){
		$array = array(
				'status_appointment' => 1, // approved
				'date_appointment' => date('Y-m-d',strtotime($data['booked_date'])),
				'hour_appointment' => $data['date'],
			);
		$this->db->where('id_appointment',$id);
		$this->db->update('appointment',$array);
	}
}