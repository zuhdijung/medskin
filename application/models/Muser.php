<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {
	// constrcutor
	function __construct(){
		parent::__construct();
	}

  function fetchUser($limit,$start,$pagenumber) {

    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->order_by('date_register','DESC');
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }

  function countAllUser() {
    return $this->db->count_all("user");
  }
  function fetchAllPasien() {
    $this->db->where('permission',3);
    $this->db->order_by('date_register','DESC');
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function saveUser($data,$upload_data){
    $array = array(
        'username' => $data['username'],
        'password' => md5($data['password']),
        'email' => $data['email'],
        'full_name' => $data['full_name'],
				'birthday' => $data['birthday'],
				'address' => $data['address'],
        'province' => $data['province'],
        'city' => $data['city'],
        'experience' => $data['experience'],
				'status_user' => $data['status_user'],
        'date_register' => date('Y-m-d H:i:s'),
        'permission' => $data['permission'],
				'love' => $data['love'],
				'avatar' => 'assets/images/user/'.$upload_data['orig_name']
      );
    $this->db->insert('user',$array);
    return 1;
  }
    function editUser($data,$upload_data,$id){
      $array = array(
          'username' => $data['username'],
					'email' => $data['email'],
	        'full_name' => $data['full_name'],
					'birthday' => $data['birthday'],
	        'address' => $data['address'],
	        'province' => $data['province'],
	        'city' => $data['city'],
	        'experience' => $data['experience'],
					'status_user' => $data['status_user'],
	        'permission' => $data['permission'],
					'love' => $data['love']
        );
				if($upload_data!=false){
					$array['avatar'] = 'assets/images/user/'.$upload_data['orig_name'];
				}

			if($data['password']!="")
			$array['password']=md5($data['password']);
		  $this->db->where('id_user',$id);
      $this->db->update('user',$array);
      return 1;
    }
		function fetchUserSearch($data) {
			$this->db->like($data['by'],$data['search']);
			$this->db->order_by('date_register','DESC');
	    $query = $this->db->get('user');
	    if($query->num_rows()>0){
	      return $query->result();
	    }
	    else return FALSE;
		}
    function validLogin($username,$password) {
      $this->db->where('username',$username);
      $this->db->where('password',md5($password));
      $this->db->where_not_in('permission',1);
      $result = $this->db->get('user');
      if($result->num_rows()>0){
        return $result->row_array();
      }
      else{
        return false;
      }
    }
    function fetchDoctor($limit,$start,$pagenumber) {
    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->join('fare','user.id_user = fare.id_user','left');
    $this->db->where('permission',2);
    $this->db->order_by('date_register','DESC');
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return FALSE;
  }
  function getDoctor($id_user) {
    $this->db->where('user.id_user',$id_user);
    $this->db->join('fare','user.id_user = fare.id_user','left');
    $this->db->where('permission',2);
    $this->db->order_by('date_register','DESC');
    $query = $this->db->get('user');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return FALSE;
  }
  function countExperience($id_user) {
    $this->db->where('id_doctor',$id_user);
    $this->db->where('status_appointment',3); // 3: Done
    return $this->db->count_all_results("appointment");
  }
  function chatRoom($id_member,$id_doctor){
    $this->db->where('id_member',$id_member);
    $this->db->where('id_doctor',$id_doctor);
    $query = $this->db->get('chatroom');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return false;
  }
  function createChatRoom($id_member,$id_doctor){
    $array = array(
        'id_doctor' => $id_doctor,
        'id_member' => $id_member,
        'date_chatroom' => date('Y-m-d H:i:s')
      );
    $this->db->insert('chatroom',$array);
    return 1;
  }
  function getChatRoom($id){
    /*
    $this->db->where('id_chatroom',$id);
    $query = $this->db->get('chatroom');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return false;
    */
    $sql = "select ms_chatroom.*,doctor.full_name as full_name_doctor,ms_user.*
          FROM
          ms_chatroom
          JOIN ms_user ON ms_chatroom.id_member = ms_user.id_user
          JOIN (select * from ms_user) as doctor ON ms_chatroom.id_doctor = doctor.id_user
          ";
    $query = $this->db->query($sql);
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return FALSE;
  }
  function fetchNotificationUser($limit,$start,$pagenumber,$id_user){
    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->where('id_user',$id_user);
    $this->db->order_by('date_notification','DESC');
    $query = $this->db->get('notification');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return false;
  }
  function readNotif($id_user){
    $array = array(
          'status_notification' => 1
      );
    $this->db->where('id_user',$id_user);
    $this->db->update('notification',$array);
  }
  function fetchTransactionUser($limit,$start,$pagenumber,$id_user){
    if($pagenumber!="")
      $this->db->limit($limit,($pagenumber*$limit)-$limit);
    else
      $this->db->limit($limit,$start);

    $this->db->where('id_user',$id_user);
    $this->db->where('status_transaction',1); // 1 : Approved
    $this->db->order_by('date_transaction','DESC');
    $query = $this->db->get('transaction');
    if($query->num_rows()>0){
      return $query->result();
    }
    else return false;
  }
  function saveTopup($data,$id_user){
    $user = $this->mod->getDataWhere('user','id_user',$id_user);
    $payment = $this->mod->getDataWhere('payment','id_payment',$data['payment']);
    $array = array(
        'id_user' => $id_user,
        'debit_credit' => 0,
        'nominal' => $data['nominal'],
        'id_payment' => $data['payment'],
        'description' => 'Topup '.number_format($data['nominal']).' use '.$payment['name_payment'].' payment',
        'transaction_type' => 0,
        'date_transaction' => date('Y-m-d H:i:s'),
        'status_transaction' => 0
      );
    $this->db->insert('transaction',$array);
    return 1;
  }
  function getServicePrice($id) {
    $this->db->where('id_user',$id);
    $query = $this->db->get('fare');
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else return false;
  }
  function saveServicePrice($data,$id){
    $service = $this->mod->getDataWhere('fare','id_user',$id);
    $array = array(
        'consultation_fare' => $data['consultation_fare'],
        'appointment_fare' => $data['appointment_fare'],
        'id_user' => $id
      );
    if($service == FALSE){
      $this->db->insert('fare',$array);
    }
    else{
      $this->db->where('id_user',$id);
      $this->db->update('fare',$array); 
    }
    return 1;
  }
}

