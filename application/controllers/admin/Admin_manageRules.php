<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');


class Admin_manageRules extends CI_Controller
{
	public function __construct(){
		parent::__construct();	
		
		date_default_timezone_set('Asia/Kuwait');
		
	}

	public function index(){
		$this->load->model('admin_settings');
		$data['all_rules']=$this->admin_settings->getAllRules();
		
		$this->load->view('pages/admin/admin_navigation.php');
		$this->load->view('pages/admin/admin_manageRules.php',$data);
	}

	public function addRule(){
		$rule_title=$_POST['rule_title'];
		$rule_content=$_POST['rule_content'];		
				
			//Connection establishment, processing of data and response from REST API
			$data=array(
				'rule_title' =>$rule_title,
				'rule_content' =>$rule_content
			);	

			$path=base_url();
			$url = $path.'api/rule_settings.php';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			
		//if status returned is 0 then signin failed, if 1 then redirect to account page
			if($response['status']==0){

				echo '<div class="alert alert-danger w3-margin-bottom">
				<strong>'.$response['status_message'].'</strong> 
				</div>
				<script>
				window.setTimeout(function() {
					$(".alert").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove(); 
					});
				}, 1000);
				</script>';			
			}
			else{
				echo '<div class="alert alert-success w3-margin-bottom">
				<strong>'.$response['status_message'].'</strong> 
				</div>
				<script>
				window.setTimeout(function() {
					$(".alert").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove(); 
					});
				}, 1000);
				</script>';		
			}
		//if-else stmt end
		
		
	}

	public function delRule(){		
		extract($_GET);
		
		$path=base_url();
		$url = $path.'api/rule_settings.php?rule_id='.$rule_id;		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);		
		
		if($response['status']==0){
			$data['rule_set']= '<div class="alert alert-danger w3-margin">
			<strong>'.$response['status_message'].'</strong> 
			</div>
			<script>
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 1000);
			</script>';	

			$this->load->view('pages/admin/admin_navigation.php');
			$this->load->view('pages/admin/admin_manageRules.php',$data);

			
		}
		else{
			$data['rule_set']= '<div class="alert alert-success w3-margin">
			<strong>'.$response['status_message'].'</strong> 
			</div>
			<script>
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 1000);
			</script>';	
			redirect('admin/admin_manageRules');
			
		}
	}


	public function editRule(){

		extract($_POST);
		
		$this->load->model('admin_settings');
		$data['rules_update']=$this->admin_settings->editRules($editrule_id,$editrule_title,$editrule_content);

		redirect('admin/admin_manageRules');		
	}

}
?>