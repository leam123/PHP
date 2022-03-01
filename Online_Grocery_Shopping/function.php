<?php
	function connect(){
		$con=mysqli_connect("localhost","root","","shop");
		return $con;
	}

	function insert($lname,$fname,$cno,$street,$brgy,$city,$pcode,$uname,$email,$password){
		$con=connect();
		if(search($cno)==0){  
			//$sql="INSERT INTO account (username, email, password) VALUES ('$uname','$email',AES_ENCRYPT('$password','secret'))"; //encrypt password
			$sql="INSERT INTO account (username, email, password) VALUES ('$uname','$email','$password')";
			mysqli_query($con, $sql);
			//get value of a primary key and save it as a value of foreign key
			$id = mysqli_insert_id($con);
			$sql1="INSERT INTO customer (lastName, firstName, phoneNo, street, brgy, city, postalCode,acc_id) VALUES ('$lname','$fname','$cno','$street','$brgy','$city','$pcode','$id')";
			mysqli_query($con, $sql1);
			return 1;
		}else
			return 0;
	}

	function search($cno){
		$con=connect();
		$sql="select * from customer where phoneNo='$cno'";
		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result)==1)
			return 1;
		else
			return 0;
	}

	function check($uname,$pass){
		$con = connect();
		$query = "SELECT * FROM account WHERE username='$uname' AND password='$pass'";
		$result = mysqli_query($con,$query);
		if(mysqli_num_rows($result)==1){
			return 1;
		}else{
			return 0;
		}
	}
	
	function checkAdmin($uname,$pass){
		$con = connect();
		$type = "admin";
		$query = "SELECT * FROM account WHERE username='$uname' AND password='$pass' AND type='$type'";
		$result = mysqli_query($con,$query);
		if(mysqli_num_rows($result)==1){
			return 1;
		}else{
			return 0;
		}
	}
	
	function updateProduct($prodName,$category,$qty,$unitCost,$image){
		$con = connect();
		if(searchProduct($prodName)==1){
			$sql = "UPDATE products, price SET product_name='$prodName', category='$category', quantity='$qty', image='$image', unitCost = '$unitCost' WHERE product_name='$prodName' && price.prod_id = products.id";
			mysqli_query($con, $sql);
			return 1;
		}else
			return 0;
	}
	
	function searchProduct($prodName){
		$con=connect();
		$sql="SELECT * from products WHERE product_name='$prodName'";
		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result)==1)
			return 1;
		else
			return 0;
	}
	
	function insertProduct($prodName,$category,$qty,$unitCost,$image){
		$con=connect();
		if(searchProduct($prodName)==0){
			$sql="INSERT INTO products (product_name,category,quantity,image) VALUES ('$prodName','$category','$qty','$image')";
			mysqli_query($con, $sql);
			$id = mysqli_insert_id($con);
			$sql1="INSERT INTO price (prod_id,unitCost) VALUES ('$id','$unitCost')";
			mysqli_query($con, $sql1);
			return 1;
		}else
			return 0;
	}

	function deleteProduct($prodName){
		$con = connect();
		if(searchProduct($prodName)==1){
			$sql = "DELETE FROM products WHERE product_name='$prodName'";
			mysqli_query($con, $sql);
			return 1;
		}else{
			return 0;
		}
	}
	
	function updateMinus($id){
		$con=connect();
		$sql = "UPDATE products SET quantity = quantity - 1 WHERE id='$id'";
		mysqli_query($con, $sql);
		return 1;
	}
	
	function updateAdd($id){
		$con=connect();
		$sql = "UPDATE products SET quantity = quantity + 1 WHERE id='$id'";
		mysqli_query($con, $sql);
		return 1;
	}
	
	//ORDER INSERT AND DELETE NOT YET COMPLETED (NO ACCOUNT_ID FOR CUSTOMER, N0 TOTAL COST FOR PRODUCTS)
	function insertOrder($prod_id,$total){
		$con = connect();
		/*$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$sql = "UPDATE id FROM account WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result)==1){
			$id = mysqli_insert_id($con);*/
			
			$sql3="INSERT INTO ct_order (prod_id,paid_amount) VALUES ('$prod_id','$total')";
			mysqli_query($con, $sql3);
			return 1;
			
		/*}
		return 0;*/
	}
	
	function deleteOrder($prod_id,$total){
		$con = connect();
		$sql = "DELETE FROM ct_order WHERE prod_id='$prod_id'";
		mysqli_query($con, $sql);
		return 1;
	}
?>