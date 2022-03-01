<?php

class Display{
	
	function connect(){
		$con=mysqli_connect("localhost","root","","shop");
		return $con;
	}
	
	function getData(){
		$con=connect();
		$sql = "SELECT id, product_name, category, image, unitCost FROM products, price WHERE products.id = price.prod_id ORDER BY products.id ASC";
		$result = mysqli_query($con, $sql);
		
		if(mysqli_num_rows($result)>0)
			return $result;
		else
			return 0;
	}
	
	function getCategory($category){
		$con=connect();
		$sql = "SELECT id, product_name, category, image, unitCost FROM products, price WHERE products.id = price.prod_id AND category = '$category' ORDER BY products.id ASC";
		$result = mysqli_query($con, $sql);
		
		if(mysqli_num_rows($result)>0)
			return $result;
		else
			return 0;
	}
}

?>