<?php
// Connect to database
$conn=mysqli_connect('localhost','root','','rentoid');	

	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		case 'GET':
			// Retrive Products
			// if(!empty($_GET["product_id"]))
			// {
			// 	$product_id=intval($_GET["product_id"]);
			// 	get_products($product_id); 
				
			// }
			// else
			// {				
			// 	get_products();
			// }


			echo "Hello";
			break;

		case 'POST':
			// Insert user
			insert_user();
			break;

		case 'PUT':
			// Update Product
			$product_id=intval($_GET["product_id"]);
			update_product($product_id);
			break;

		case 'DELETE':
			// Delete Product
			$product_id=intval($_GET["product_id"]);
			delete_product($product_id);
			break;

		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}

	function insert_user()
	{
		global $conn;
		
		$email=$_POST["email"];
		$password=$_POST["password"];
		//echo $email; echo $password;
		//die();
		$query="INSERT INTO user_reg SET email='$email', password='$password', session_bool='1'";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Account has been registered!!!',
				'email_id' => $email,
				'is_logged' => '1'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry..Account Registeration Failed!!!',
				'email_id' => $email,
				'is_logged' => '0'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}




	function get_products($product_id=0)
	{
		global $conn;
		$query="SELECT * FROM products";
		if($product_id != 0)
		{
			$query.=" WHERE id=".$product_id." LIMIT 1";
		}
		$response=array();
		$result=mysqli_query($conn, $query);
		while($row=mysqli_fetch_array($result))
		{
			$response[]=$row;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}




	function delete_product($product_id)
	{
		global $conn;
		$query="DELETE FROM products WHERE id=".$product_id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Product Deleted Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Product Deletion Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}





	function update_product($product_id)
	{
		global $conn;
		parse_str(file_get_contents("php://input"),$post_vars);
		$product_name=$post_vars["product_name"];
		$price=$post_vars["price"];
		$quantity=$post_vars["quantity"];
		$seller=$post_vars["seller"];
		$query="UPDATE products SET product_name='{$product_name}', price={$price}, quantity={$quantity}, seller='{$seller}' WHERE id=".$product_id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Product Updated Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Product Updation Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	// Close database conn
	mysqli_close($conn);