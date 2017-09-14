<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');


class List_item extends CI_Controller
{
	public function __construct(){
		parent::__construct();	
		date_default_timezone_set('Asia/Kuwait');		

	}

	public function index(){
		$this->load->view('includes/header.php');
		$this->load->view('pages/users/loggedIn_subheader.php');
		$this->load->view('pages/users/list_item.php');
		$this->load->view('includes/footer.php');
	}

	public function find(){
		
	}

	public function addItem(){
		$unique_id=$this->session->userdata('unique_id');
		$user_email=base64_decode($unique_id);
		
		$this->load->model('user_details');
		$ID=$this->user_details->getID($user_email);

		$image_data=array();
		$pictures="";
		if($ID){
			if(!empty($_FILES['item_image']['name'])){
				$filesCount = count($_FILES['item_image']['name']);

				for($i = 0; $i < $filesCount; $i++){
					$_FILES['userFile']['name'] = $_POST['item_name'].'_catID_'.$_FILES['item_image']['name'][$i];
					$_FILES['userFile']['type'] = $_FILES['item_image']['type'][$i];
					$_FILES['userFile']['tmp_name'] = $_FILES['item_image']['tmp_name'][$i];
					$_FILES['userFile']['error'] = $_FILES['item_image']['error'][$i];
					$_FILES['userFile']['size'] = $_FILES['item_image']['size'][$i];

					$uploadPath ='uploads/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'gif|jpg|png';
					

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('userFile')){
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['created'] = date("Y-m-d H:i:s");
						$uploadData[$i]['modified'] = date("Y-m-d H:i:s");
					}
                //print_r($_FILES['userFile']);
					$image_data[]=base_url()."uploads/".$fileData['file_name'];

				}
				$pictures=json_encode($image_data);

			}

			//Connection establishment, processing of data and response from REST API
			$data=$_POST;
			
			$posted_on=date("Y-m-d");
			$data['user_id']=$ID;
			$data['posted_on']=$posted_on;
			$data['pictures']=$pictures;

			$path=base_url();
			$url = $path.'api/Item_info.php';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);			
			
			if($response['status']==0){
				$data['list_error']=$response['status_message'];

				$this->load->view('includes/header.php');
				$this->load->view('pages/users/loggedIn_subheader.php');
				$this->load->view('pages/users/list_item.php',$data);
				$this->load->view('includes/footer.php');		

			}
			else{	
				redirect('user_home');
				
			}
		//if-else stmt end
		}
		
	}

	
}
?>