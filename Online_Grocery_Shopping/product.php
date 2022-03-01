<?php
	session_start();
	include("function.php");
	if(isset($_POST['add'])){
		if(insertProduct($_POST['prod_name'], $_POST['category'], $_POST['quantity'], $_POST['unitCost'], $_POST['image'])==1){
			echo "<script>
					alert('Product added')
				</script>";
		}
		else{
			echo "<script>
					alert('unsuccessful insert')
				</script>";
		}
	}	
	
	if(isset($_POST['update'])){
		if(updateProduct($_POST['prod_name'],$_POST['category'],$_POST['quantity'],$_POST['unitCost'],$_POST['image'])==1){
			echo "<script>
					alert('Product updated')
				</script>";
		}
		else{
			echo "<script>
					alert('unsuccessful update')
				</script>";
		}
	}	
	
	if(isset($_POST['delete'])){
		if(deleteProduct($_POST['prod_name'])==1){
			echo "<script>
					alert('Product deleted')
				</script>";
		}
		else{
			echo "<script>
					alert('unsuccessfuldelete')
				</script>";
		}
	}	
?>

<html>
	<head>
		<title>Product Info</title>
		<link rel="stylesheet" type="text/css" href="CSS/product.css">
		<style>
			body{
				background-image: url("img/prod.jpg");
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}
		</style>
	</head>
	<body>
			<div>
				<div><img src="img/Cargo.png" height="100" width="150" class="centerpic"></div>
				<div class="font"> Product Info</div>
				<div class="block">
					<div>
						<form action="" method="post">
							<!-- display all products from database in the input box -->
							<label class="centerfield"> Product Name </label>
							<input type="text" name="prod_name" placeholder="" class="right size" required><br><br><br>
							<label class="centerfield"> Category </label>
							<select name="category" class="right size">
									<option value="Chips">Chips</option>
									<option value="Chocolates">Chocolates</option>
									<option value="Drinks">Drinks</option>
									<option value="Fruits">Fruits</option>
									<option value="Biscuits">Biscuits</option>
									<option value="Seasoning">Seasoning</option>
									<option value="Vegetables">Vegetables</option>
									<option value="Toiletries">Toiletries</option>
									<option value="Home Products">Home Products</option>
									<option value="Personal Hygiene">Personal Hygiene</option>
							</select><br><br><br>
							<label class="centerfield"> Quantity </label> 
							<select name="quantity" class="right size">
									<option value="20">20</option>
									<option value="25">25</option>
									<option value="30">30</option>
									<option value="35">35</option>
									<option value="40">40</option>
									<option value="45">45</option>
									<option value="50">50</option>
									<option value="55">55</option>
									<option value="60">60</option>
									<option value="65">65</option>
									<option value="70">70</option>
									<option value="75">75</option>
									<option value="80">80</option>
									<option value="85">85</option>
									<option value="90">90</option>
									<option value="95">95</option>
									<option value="100">100</option>
							</select><br><br><br>
							<label class="centerfield"> Unit Cost </label>
							<input type="text" name="unitCost" class="right size" required><br><br><br>
							<label class="centerfield"> Product Image </label>
							<input type="text" name="image" class="right size" placeholder="img/product_name" required><br><br><br>
							
							<input type="submit" name="add" class="button" value="ADD"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<input type="submit" name="update" class="button" value="UPDATE"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<input type="submit" name="delete" class="button" value="DELETE"><br><br>
							<a href="index.php">LOGIN</a>
						</form>
					</div>
				</div>
			</div>
	</body>
	
</html>