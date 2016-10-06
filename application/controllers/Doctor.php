<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('permission') != 2){
			redirect(base_url(''));
		}
		$this->load->model('mnews');
		$this->load->model('muser');
		$this->load->model('mappointment','mapp');
	}
	public function home(){
		$perpage = 10;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/home/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countData('news');// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mnews->fetchNews($config['per_page'],$page,$this->uri->segment(3)); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countData('news'); // Make a variable (array) link so the view can call the variable

		$this->form_validation->set_rules('news','News','required');
		if(!$this->form_validation->run())
			$this->load->view('default/doctor/home',$data);
		else{
			$config['upload_path'] = './assets/images/news';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2000';
				$config['file_name'] = $this->session->userdata('username').'_news_'.date('YmdHis');

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()){
					$save = $this->mnews->saveNews($_POST,FALSE,$this->session->userdata('userId'));
					redirect(base_url($this->uri->segment(1).'/home'));
				}
			else{
				$save = $this->mnews->saveNews($_POST,$this->upload->data(),$this->session->userdata('userId'));
				redirect(base_url($this->uri->segment(1).'/home'));
			}
		}
	}
	public function view_profile(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mod->getDataWhere('user','id_user',$id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/home'));

		$perpage = 10;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/user/manage_user/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countData('news');// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mnews->fetchNewsProfile($config['per_page'],$page,$this->uri->segment(4),$id); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countData('news'); // Make a variable (array) link so the view can call the variable
		$this->load->view('default/doctor/profile',$data);
	}
	public function read_news(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mnews->getNews($id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/home'));

		$perpage = 5;
	    $this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/read-news/'.$id.'/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countWhereData('comment','id_news',$id);// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 4; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mnews->fetchComment($config['per_page'],$page,$this->uri->segment(4),$id); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countWhereData('comment','id_news',$id); // Make a variable (array) link so the view can call the variable

		$this->form_validation->set_rules('comment','Comment','required');
		if(!$this->form_validation->run()){
			$this->load->view('default/doctor/read_news',$data);
		}
		else{
			$data['save'] = $this->mnews->saveComment($_POST,$this->session->userdata('userId'),$id);
			$this->load->view('default/doctor/read_news',$data);
		}
	}
	public function private_question(){
		$this->load->view('default/doctor/private_question');
	}
	public function appointment(){
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/appointment/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countWhereData('appointment','id_doctor',$this->session->userdata('userId'));// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->mapp->fetchAppointmentDoctorUpcoming($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('userId')); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countWhereData('appointment','id_doctor',$this->session->userdata('userId')); // Make a variable (array) link so the view can call the variable

	    $config['base_url'] = base_url($this->uri->segment(1).'/appointment/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countWhereData('appointment','id_doctor',$this->session->userdata('userId'));// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results2'] = $this->mapp->fetchAppointmentDoctorDone($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('userId')); // fetch data using limit and pagination
	    $data['links2'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows2'] = $this->mod->countWhereData('appointment','id_doctor',$this->session->userdata('userId')); // Make a 
		$this->load->view('default/doctor/appointment',$data);
	}
	public function detail_appointment(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mapp->getAppointmentDoctor($id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/appointment'));

		$this->load->view('default/doctor/detail_appointment',$data);	
	}
	public function notification(){
		$perpage = 10;
		$this->load->library('pagination'); // load libraray pagination
	    $config['base_url'] = base_url($this->uri->segment(1).'/notification/'); // configurate link pagination
	    $config['total_rows'] = $this->mod->countWhereData('notification','id_user',$this->session->userdata('userId'));// fetch total record in databae using load
	    $config['per_page'] = $perpage; // Total data in one page
	    $config['uri_segment'] = 3; // catch uri segment where locate in 4th posisition
	    $choice = $config['total_rows']/$config['per_page'] = $perpage; // Total record divided by total data in one page
	    $config['num_links'] = round($choice); // Rounding Choice Variable
	    $config['use_page_numbers'] = TRUE;
	    $this->pagination->initialize($config); // intialize var config
	    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0; // If uri segment in 4th = 0 so this program not catch the uri segment
	    $data['results'] = $this->muser->fetchNotificationUser($config['per_page'],$page,$this->uri->segment(3),$this->session->userdata('userId')); // fetch data using limit and pagination
	    $data['links'] = $this->pagination->create_links(); // Make a variable (array) link so the view can call the variable
	    $data['total_rows'] = $this->mod->countWhereData('notification','id_user',$this->session->userdata('userId')); // 
		
	    // make as read notification
	    $this->muser->readNotif($this->session->userdata('userId'));
		$this->load->view('default/doctor/notification',$data);
	}
	public function status_approved(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mapp->getAppointmentDoctor($id);
		
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/appointment'));

		$array = array(
				'status_appointment' => 1 // 1: Approved
			);
		$this->db->where('id_appointment',$id);
		$this->db->update('appointment',$array);

		// send notification to pasien
		$result = $data['result'];
		$dokter = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
		$notif = "Yippie!! ".$dokter['full_name']." Just Approved your appointment at ".date('d M Y',strtotime($result['date_appointment']))." ".$result['hour_appointment'];
        $array = array(
            'id_user' => $result['id_member'],
            'status_notification' => 0,
            'date_notification' => date('Y-m-d H:i:s'),
            'notification_type' => 1,
            'notification' => $notif,
            'link_notification' => '/appointment'
          );
        $this->db->insert('notification',$array);

		redirect(base_url($this->uri->segment(1).'/detail-appointment/'.$id));
	}
	public function status_canceled(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mapp->getAppointmentDoctor($id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/appointment'));

		$array = array(
				'status_appointment' => 2 // 2: Canceled
			);
		$this->db->where('id_appointment',$id);
		$this->db->update('appointment',$array);

		// send notification to pasien
		$result = $data['result'];
		$dokter = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
		$notif = "Sorry, ".$dokter['full_name']." Just Canceled your appointment at ".date('d M Y',strtotime($result['date_appointment']))." ".$result['hour_appointment'];
        $array = array(
            'id_user' => $result['id_member'],
            'status_notification' => 0,
            'date_notification' => date('Y-m-d H:i:s'),
            'notification_type' => 1,
            'notification' => $notif,
            'link_notification' => '/appointment'
          );
        $this->db->insert('notification',$array);
		redirect(base_url($this->uri->segment(1).'/detail-appointment/'.$id));
	}
	public function status_done(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mapp->getAppointmentDoctor($id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/appointment'));

		$array = array(
				'status_appointment' => 3 // 3: Done
			);
		$this->db->where('id_appointment',$id);
		$this->db->update('appointment',$array);

		// send notification to pasien
		$result = $data['result'];
		$dokter = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
		$notif = "Yippie, ".$dokter['full_name']." Just have done your appointment at ".date('d M Y',strtotime($result['date_appointment']))." ".$result['hour_appointment'];
        $array = array(
            'id_user' => $result['id_member'],
            'status_notification' => 0,
            'date_notification' => date('Y-m-d H:i:s'),
            'notification_type' => 1,
            'notification' => $notif,
            'link_notification' => '/appointment'
          );
        $this->db->insert('notification',$array);
		redirect(base_url($this->uri->segment(1).'/detail-appointment/'.$id));
	}
	public function change_date(){
		$id = $this->uri->segment(3);
		$data['result'] = $this->mapp->getAppointmentDoctor($id);
		if($data['result'] == false)
			redirect(base_url($this->uri->segment(1).'/appointment'));		

		$this->form_validation->set_rules('booked_date','Booked Date','required');
		$this->form_validation->set_rules('date','Booked Time','required');

		if(!$this->form_validation->run())
			$this->load->view('default/doctor/change_date',$data);	
		else{
			$this->mapp->changeDate($_POST,$id);

			// send notification to pasien
			$result = $data['result'];
			$dokter = $this->mod->getDataWhere('user','id_user',$this->session->userdata('userId'));
			$notif = "Yippie, ".$dokter['full_name']." Just approved your appointment in different time at ".date('d M Y',strtotime($result['date_appointment']))." ".$result['hour_appointment'];
	        $array = array(
	            'id_user' => $result['id_member'],
	            'status_notification' => 0,
	            'date_notification' => date('Y-m-d H:i:s'),
	            'notification_type' => 1,
	            'notification' => $notif,
	            'link_notification' => '/appointment'
	          );
	        $this->db->insert('notification',$array);
			redirect($this->uri->segment(1).'/detail-appointment/'.$id);
		}
	}
	public function chat(){
		$id = $this->uri->segment(3);
		$user = $this->mod->getDataWhere('user','id_user',$id);
		if($user == false){
			redirect(base_url($this->uri->segment(1).'/home'));
		}
		else{
			$result = $this->muser->chatRoomDoctor($id,$this->session->userdata('userId'));
			if($result == false){
				$this->muser->createChatRoom($id,$this->session->userdata('userId')); // param1 : id_pasien, param2: id_doctor
				$result = $this->muser->chatRoomDoctor($id,$this->session->userdata('userId'));
				$id_chatroom = $result['id_chatroom'];
				redirect(base_url($this->uri->segment(1).'/chatroom/'.$id_chatroom));
			}
			else{
				$id_chatroom = $result['id_chatroom'];
				redirect(base_url($this->uri->segment(1).'/chatroom/'.$id_chatroom));	
			}
		}
	}
	public function chatroom(){
		$id = $this->uri->segment(3);
		$data['result']	= $this->muser->getChatRoom($id);
		if($data['result'] == false)
			show_404();

		$this->load->view('default/doctor/chat');
	}
	public function service_price(){
		$id = $this->session->userdata('userId');
		$data['result']	= $this->muser->getServicePrice($id);

		$this->form_validation->set_rules('appointment_fare','Appointment\'s Price','required|numeric');
		$this->form_validation->set_rules('consultation_fare','Conslutation\'s Price','required|numeric');

		if(!$this->form_validation->run())
			$this->load->view('default/doctor/service_price',$data);
		else{
			$data['save'] = $this->muser->saveServicePrice($_POST,$id);
			$this->session->set_flashdata(array('success_form'=>TRUE));
			redirect(base_url($this->uri->segment(1).'/service-price'));
		}
	}
	function logout(){
		$array = array(
					'permission' => NULL,
					'userId' => NULL,
					'username' => NULL,
				);
			$this->session->set_userdata($array);
		redirect(base_url());
	}
}
