<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//Ijarline Find
class Find extends CI_Controller
{
	public function __construct(){
		parent::__construct();	

	}

	public function index(){
		$this->load->model('admin_settings');
		$data['all_category']=$this->admin_settings->getAllCategory();

		$this->load->view('includes/header.php');
		$this->load->view('pages/guest_subheader.php');
		$this->load->view('pages/find.php',$data);
		$this->load->view('includes/footer.php');
	}
	

	public function find_by(){		
		extract($_POST);
		
		$para=array(
			'what'	=>	$find_what,
			'where'	=>	$find_where,
			'category'	=>	$find_category
		);

		$path=base_url();
		$url = $path.'api/find_items.php?para='.json_encode($para);		
		$ch = curl_init($url);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);		
		
		if($response['status']==0){
			$data['find_fail']= '<div class="alert alert-danger w3-margin">
			<strong>'.$response['status_message'].'</strong> 
			</div>
			<script>
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 1000);
			</script>';	

			$this->load->view('includes/header.php');
			$this->load->view('pages/guest_subheader.php');
			$this->load->view('pages/find.php',$data);
			$this->load->view('includes/footer.php');

			
		}
		else{
			$data['find_fail']= '<div class="alert alert-danger w3-margin">
			<strong>'.$response['status_message'].'</strong> 
			</div>
			<script>
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 1000);
			</script>';	

			$this->load->view('includes/header.php');
			$this->load->view('pages/guest_subheader.php');
			$this->load->view('pages/find.php',$data);
			$this->load->view('includes/footer.php');
			
		}
	}	
}
?>