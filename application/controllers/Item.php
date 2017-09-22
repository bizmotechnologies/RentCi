<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//Ijarline Item
class Item extends CI_Controller
{
	public function __construct(){
		parent::__construct();	

	}

	public function index($item_link=''){
		$name=explode('-', $item_link);		//get each data seperated by '-'	
		$temp=base64_decode($name[2]);		//get index 2 data viz.item_id

		$id_array=explode('_',$temp);
		$item_id=$id_array[0];		
		$data['suburb']=$name[1];			//get index 1 data viz.suburb

		$path=base_url();
		$url = $path.'api/get_item.php?item_id='.json_encode($item_id);		
		$ch = curl_init($url);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);		
		
		if($response['status']==0){
			$data['item_fail']= '<div class="alert alert-danger w3-margin">
			<strong>'.$response['status_message'].'</strong> 
			</div>';	

			$this->load->view('includes/header.php');
			$this->load->view('pages/guest_subheader.php');
			$this->load->view('pages/item.php',$data);
			$this->load->view('includes/footer.php');
			
		}
		else{		
			$data['specificItem']=$response['items'];
			$user_id=$response['items'][0]['user_id'];
			
			$this->load->model('user_details');
			$user_details=$this->user_details->getAccount_details_id($user_id);	//get user-details by userID
			$data['user_details']=$user_details;

			$this->load->model('search_result');
			$data['allItems']=json_decode($this->search_result->getAllItem_byUID($user_id),TRUE);

			$this->load->view('includes/header.php');
			$this->load->view('pages/guest_subheader.php');
			$this->load->view('pages/item.php',$data);
			$this->load->view('includes/footer.php');
			
		}
		
	}
	

	
}
?>