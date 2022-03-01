<?php
	//session_start();
	require_once("component.php");
	require_once("Display.php");
	include_once("function.php");
	
	$display = new Display();
	
	if(isset($_POST['add'])){
		
		$id = $_POST['product_id'];
		if(isset($_SESSION['Cart'])){
			$item_id = array_column($_SESSION['Cart'],"product_id");
			if(in_array($_POST['product_id'],$item_id)){
				echo "<script>alert('added in cart already')</script>";	
				echo "<script>window.location='shop.php'</script>";	
			}else{
				if(insertOrder($id,null)==1){
					if(updateMinus($id)==1){
					echo "";	
					}
					else{
						echo "<script>
							alert('Unsuccessful Addition.')
						</script>";
					}
					$count = count($_SESSION['Cart']);
					$item = array(
						'product_id'=> $id
					);
					$_SESSION['Cart'][$count] = $item;
				}
			}
		}else{
			if(insertOrder($id,null)==1){
				if(updateMinus($id)==1){
					echo "";	
				}
				else{
					echo "<script>
						alert('Unsuccessful Addition.')
					</script>";
				}
				$item= '';
				$item= array(
					'product_id'=>$id
				);
				$_SESSION['Cart'][] = $item;
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Shop</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/mystyle.css">
	</head>
	<body style="background-color: #101820FF">
		<table>
			<tr>
				<div class="header">
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
				<br>
					<div>
						<img src="img/Cargo.png" width="10%" height="15%" class="center">
					</div>
					<div>
						<p class="tagline">Stay, Shop , Relax</p>
						<p class="tagline">Don't stress out, just take it easy</p>
						<div id="outerbox">
							<div id="sliderbox">
								<img src="img/design.jpg" width="1340px" height="300px"/>
								<img src="img/design1.jpg" width="1340px" height="300px"/>
								<img src="img/design3.jpg" width="1340px" height="300px"/>
								<img src="img/design5.jpg" width="1340px" height="300px"/>
							</div>
						</div>
						<div>
							<ul class="list">
								<li><a style="color:#F2AA4CFF; font-size:15px" href="shop.php">All</a></li>
								<li><a style="color:#F2AA4CFF; font-size:15px" href="category1.php">Chips</a></li>
								<li><a style="color:#F2AA4CFF; font-size:15px" href="category2.php">Chocolates</a></li>
								<li><a style="color:#F2AA4CFF; font-size:15px" href="category3.php">Drinks</a></li>
								<li><a style="color:#F2AA4CFF; font-size:15px" href="category4.php">Fruits</a></li>
								<li><a style="color:#F2AA4CFF; font-size:15px" href="category5.php">Biscuits</a></li>
								<li><a style="color:#F2AA4CFF; font-size:15px" href="category6.php">Seasoning</a></li>
								<li><a style="color:#F2AA4CFF; font-size:15px" href="category7.php">Vegetables</a></li>
								<li><a style="color:#F2AA4CFF; font-size:15px" href="category8.php">Toiletries</a></li>
								<li><a style="color:#F2AA4CFF; font-size:15px" href="category9.php">Home Products</a></li>
								<li><a style="color:#F2AA4CFF; font-size:15px" href="category10.php">Personal Hygiene</a></li>						
							</ul>
						</div>
						<div class="container">
							<div class="row text-center py-5">
								<?php
									$str = "Fruits";
									$result = $display->getCategory($str);
										
									while($row = mysqli_fetch_assoc($result)){
										component($row['image'],$row['product_name'],$row['category'],$row['unitCost'],$row['id']);
									}
								?>
							</div>
						</div>
					</div>
				<br>
			</tr>
		</table>
		<div class="footer">
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</body>
</html>






















