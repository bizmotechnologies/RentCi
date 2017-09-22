<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//My Ijarline page
class List_item extends CI_Controller
{
	public function __construct(){
		parent::__construct();	
		date_default_timezone_set('Asia/Kuwait');		

	}

	public function index(){
		$this->load->model('admin_settings');
		$data['all_category']=$this->admin_settings->getAllCategory();

		$this->load->model('admin_settings');
		$data['all_packages']=$this->admin_settings->getAllPackages();

		$this->load->view('includes/header.php');
		$this->load->view('pages/users/loggedIn_subheader.php');
		$this->load->view('pages/users/list_item.php',$data);
		$this->load->view('includes/footer.php');
	}

	
	//-----------------function to add new item------------------------//
	public function addItem(){
		$unique_id=$this->session->userdata('unique_id');
		$user_email=base64_decode($unique_id);
		$addr="";
		$uname="";
		$this->load->model('user_details');
		$acct_data=$this->user_details->getAccount_details($user_email);	//get user_id by email

		$this->load->model('user_details');
		$ID=$this->user_details->getID($user_email);	//get user_id by email

		foreach ($acct_data as $key) {
			$addr=$key['suburb'].', '.$key['city'].', '.$key['postcode'].', '.$key['state'].', '.$key['country'];
			$uname=$key['name'].' '.$key['surname'];			
		}
		
		$image_data=array();	//item_image array
		$pictures="";	//string value containing paths of images to be stored in db 

		if($acct_data){
			if(!empty($_FILES['item_image']['name'])){
				$filesCount = count($_FILES['item_image']['name']); 	//get count of uploaded images (max.4)

				for($i = 0; $i < $filesCount; $i++){
					$_FILES['userFile']['name'] = $_POST['item_name'].'_catID_'.$_FILES['item_image']['name'][$i];
					$_FILES['userFile']['type'] = $_FILES['item_image']['type'][$i];
					$_FILES['userFile']['tmp_name'] = $_FILES['item_image']['tmp_name'][$i];
					$_FILES['userFile']['error'] = $_FILES['item_image']['error'][$i];
					$_FILES['userFile']['size'] = $_FILES['item_image']['size'][$i];

					$uploadPath ='uploads/';	//upload images in upload/ folder
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'gif|jpg|png';	//allowed types of images 					

					$this->load->library('upload', $config);	//load upload file config.
					$this->upload->initialize($config);

					if($this->upload->do_upload('userFile')){
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['created'] = date("Y-m-d H:i:s");
						$uploadData[$i]['modified'] = date("Y-m-d H:i:s");
					}
                
					$image_data[]=base_url()."uploads/".$fileData['file_name'];		//append path of images uploaded in array one by one

				}
				$pictures=json_encode($image_data);		//save bunch of image path as json array to store in db

			}

			$data=$_POST;			
			$posted_on=date("Y-m-d");	//current date in format

			//---------add more fields in data() array--------//
			$data['user_id']=$ID;
			$data['user_name']=$uname;
			$data['user_addr']=$addr;
			$data['posted_on']=$posted_on;
			$data['pictures']=$pictures;

			//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/Item_info.php';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);			
			
			//if status is 0 return back and show error message
			if($response['status']==0){
				$data['list_error']=$response['status_message'];

				$this->load->view('includes/header.php');
				$this->load->view('pages/users/loggedIn_subheader.php');
				$this->load->view('pages/users/list_item.php',$data);
				$this->load->view('includes/footer.php');		

			}
			else{	
				//insert new item success and show My Ijarline
				redirect('user_home');
				
			}
		//if-else stmt end
		}
		
	}
//-------------------------function to add new item ends--------------------------//
	
}
?>