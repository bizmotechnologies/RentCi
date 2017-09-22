<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//Ijarline Search_results
class Search_results extends CI_Controller
{
	public function __construct(){
		parent::__construct();	

	}

	public function index(){
		$this->load->model('search_result');
		if(isset($_GET)){
			if(isset($_GET['find_btn'])){			
				$data['allItems']=$this->search_result->getAllItem_find($_GET['find_what'],$_GET['find_where'],$_GET['find_category']);

			}
			else if(isset($_GET['ordertype'])){
				$data['allItems']=$this->search_result->getAllItem_filter($_GET['ordertype'],$_GET['find_what'],$_GET['find_where'],$_GET['find_category']);
			}
			else if(isset($_GET['category'])){
				$data['allItems']=$this->search_result->getAllItem_byCategory($_GET['category']);
			}
			else if(isset($_GET['suburb'])){
				$data['allItems']=$this->search_result->getAllItem_bySuburb($_GET['suburb']);
			}
			else if(isset($_GET['member'])){
				$data['allItems']=$this->search_result->getAllItem_byMember($_GET['member']);
			}
			else{
				$data['allItems']=$this->search_result->getAllItem();
			}
		}
		else{
			$data['allItems']=$this->search_result->getAllItem();
		}

		$this->load->view('includes/header.php');
		$this->load->view('pages/guest_subheader.php');
		$this->load->view('pages/search_results.php',$data);
		$this->load->view('includes/footer.php');
	}
	
	//find items by api... currently not used but in future can be used
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