<?php
	//session_start();
	require_once("component.php");
	require_once("Display.php");
	include_once("function.php");
	
	$display = new Display();
	
	if(isset($_POST['remove'])){
		if($_GET['action']=='remove'){
			foreach($_SESSION["Cart"] as $keys=>$values){
				if($values["product_id"]==$_GET['id']){
					if(deleteOrder($_GET['id'],null)==1){
						if(updateAdd($_GET['id'])==1){
							echo "<script>alert('product has been removed')</script>";
						}
						else{
							echo "<script>
									alert('Item failed to be deleted....')
								</script>";
						}
						unset($_SESSION["Cart"][$keys]);
						echo "<script>window.location='shoppingCart.php'</script>";
					}
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset = "UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Shopping Cart</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/shoppingCart.css">
</head>
<body style="background-color: #101820FF">
			<div class="header">
				&nbsp&nbsp&nbsp&nbsp<img src="img/Cargo.png" width="8%" height="100%">
				<ul class="breadcrumb">
					<li><a style="color:#F2AA4CFF; font-size:15px" href="website.php">Home</a></li>
					<li><a style="color:#F2AA4CFF; font-size:15px" class="active" href="shop.php">Products<a></li>
					<li><a style="color:#F2AA4CFF; font-size:15px" href="shoppingCart.php" class="nav-item active"><i class="fa fa-shopping-cart"></i> Cart
						<span style="border-radius: 3rem; padding:0.1rem 0.9rem 0.1rem 0.9rem" class="text-warning bg-dark">
							<?php 
								if(isset($_SESSION["Cart"])){
									echo count($_SESSION["Cart"]);
								}else {
									echo '0';
								}
							?>
						</span>
					</a></li>
					<li><a style="color:#F2AA4CFF; font-size:15px" href="index.php">Log-out</a></li>
				</ul>
			</div>
			<br><br><br>
			<div class="container-fluid">
				<div class="row px-5">
					<div class="col-md-5">
						<h5 style="color:#F2AA4CFF"> &nbsp&nbsp&nbsp&nbsp MY CART</h5>
						<hr>
						<div class="shopping-cart">
							<?php
								$total=0;
								if(isset($_SESSION['Cart'])){
									$item_id = array_column($_SESSION['Cart'],"product_id");
							
									$result = $display->getData();
										
									while($row = mysqli_fetch_assoc($result)){
										foreach($item_id as $prod_id){
											if($row['id'] == $prod_id){
												displayComponent($row['image'],$row['product_name'],$row['category'],$row['unitCost'],$row['id']);
												$total += (double)$row['unitCost'];
											}
										}
									}
								}else{
									echo "<h5>CART is EMPTY...</h5>";
								}
							?>
						</div>
					</div>
					<div class="col-md-8 offset-md-1 border rounded mt-5 h-25">
						<div class="pt-4">
							<h4 style="color:#F2AA4CFF"> Price Details </h4>
							<div class="row price-details">
								<div class="col-md-6">
									<?php
										if(isset($_SESSION['Cart'])){
											$count = count($_SESSION['Cart']);
											echo "<h6 style=\"color:#F2AA4CFF\">Price ($count items)</h6>";
										}else{
											echo "<h6 style=\"color:#F2AA4CFF\">Price (0 items)</h6>";
										}
									?>
									<h6 style="color:#F2AA4CFF"> Delivery Charges </h6>
									<hr>
									<h6 style="color:#F2AA4CFF"> Total Amount</h6>
								</div>
								<div class="col-md-6">
									<h6 style="color:red"> ₱ <?php echo $total; ?></h6>
									<h6 style="color:#F2AA4CFF" class="text-success"> ------ </h6>
									<hr>
									<h6 style="color:red" name="totalAmount"> ₱ <?php echo $total; ?></h6>
								</div>
								<!--<form action="" method="post"> 
									<input type="hidden" name="totalAmount" value="<?php echo $total; ?> " />
								</form>-->
							</div>
						</div>
					</div>
				</div>
			</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body> 
</html>