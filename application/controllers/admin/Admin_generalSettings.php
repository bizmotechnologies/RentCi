<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');


class Admin_generalSettings extends CI_Controller
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
		
		$this->load->view('pages/admin/admin_navigation.php');
		$this->load->view('pages/admin/admin_generalSettings.php',$data);
	}

	public function find(){
		
	}

	public function addCategory(){

		$cat_name=$_POST['new_cat_name'];

		$this->load->model('admin_settings');
		$cat_exists=$this->admin_settings->checkCategory_exist($cat_name);
		
		if($cat_exists){			
			//Connection establishment, processing of data and response from REST API
			$data=array(
				'cat_name' =>$cat_name
			);			
			$path=base_url();
			$url = $path.'api/category.php';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			
		//if status returned is 0 then signin failed, if 1 then redirect to account page
			if($response['status']==0){

				echo '<div class="alert alert-danger w3-margin">
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
				echo '<div class="alert alert-success w3-margin">
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
		else{
			
			echo '<div class="alert alert-warning w3-margin">
			<strong>Category Already Exists... Try New!!!</strong> 
			</div>
			<script>
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 1000);
			</script>';		
		}

	}


	public function deleteCategory(){
		extract($_GET);
		
		$path=base_url();
		$url = $path.'api/category.php?cat_id='.$cat_id;		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);		
		
		if($response['status']==0){
			echo '<div class="alert alert-danger w3-margin">
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
			echo '<div class="alert alert-success w3-margin">
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
	}



	public function addPackage(){

		extract($_POST);		
		$detail_json=json_encode($pack_details);		
		$pack_code=strtoupper($pack_name).'_'.$pack_validity.$pack_period;		

		$this->load->model('admin_settings');
		$pack_exists=$this->admin_settings->checkPackageName_exist($pack_name);
		
		if($pack_exists){			
			//Connection establishment, processing of data and response from REST API
			$data=array(
				'pack_name' =>$pack_name,
				'pack_code' =>$pack_code,
				'pack_cost' =>$pack_cost,
				'pack_details' =>$detail_json,
				'pack_validity' =>$pack_validity,
				'pack_period' =>$pack_period
			);			
			$path=base_url();
			$url = $path.'api/mem_package.php';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			
		//if status returned is 0 then signin failed, if 1 then redirect to account page
			if($response['status']==0){

				echo '<div class="alert alert-danger w3-margin">
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
				echo '<div class="alert alert-success w3-margin">
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
		else{
			
			echo '<div class="alert alert-warning w3-margin">
			<strong>Package Already Exists... Try New!!!</strong> 
			</div>
			<script>
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 1000);
			</script>';		
		}

	}

	//function to delete package ------------------------
	public function delPack(){		
		extract($_GET);
		
		$path=base_url();
		$url = $path.'api/mem_package.php?pack_id='.$pack_id;		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);		
		
		if($response['status']==0){
			$data['pack_set']= '<div class="alert alert-danger w3-margin">
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
			$this->load->view('pages/admin/admin_generalSettings.php',$data);

			
		}
		else{
			$data['pack_set']= '<div class="alert alert-success w3-margin">
			<strong>'.$response['status_message'].'</strong> 
			</div>
			<script>
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 1000);
			</script>';	
			redirect('admin/admin_generalSettings');
			
		}
	}





	//function to edit package details-------------------
	public function editPack(){

		extract($_POST);
		$edit_details_json=json_encode($editpack_details);
		$editpack_code=strtoupper($editpack_name).'_'.$editpack_validity.$editpack_period;

		$this->load->model('admin_settings');
		$data['pack_update']=$this->admin_settings->editPack($editpack_id, $editpack_name, $edit_details_json, $editpack_code,$editpack_validity, $editpack_period, $editpack_cost);

		redirect('admin/admin_generalSettings');		
	}

	//function to activate package details-------------------
	public function activatePackage(){

		extract($_POST);

		$this->load->model('admin_settings');
		$data['pack_activate']=$this->admin_settings->activate($pack_id,$status);

		echo $data['pack_activate']	;	
	}

}
?>