<?php
	session_start();
	function component($image,$product_name,$category,$unitCost,$id){
		$element = "
			<div class=\"col-md-3 col-sm-6 my-md-0\">
				<form action=\"shop.php\" method=\"post\">
					<div class=\"card shadow\">
						<div>
							<img src=\"$image\" alt=\"image1\" class=\"img-fluid card-img-top\">
						</div>
						<div class=\"card-body\">
							<p style=\"font-size: 13px\">
								Product Name: $product_name
								<br>Category: $category 
							</p>
							<h5>
								<span class=\"price\">
									₱$unitCost
								<span>
							</h5>
							<button type=\"submit\" name=\"add\" class=\"btn-danger\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>
							<input type='hidden' name='product_id' value='$id'>
						</div>
					</div>
				</form>
			</div>
		";
		echo $element;
	}

	function displayComponent($image,$product_name,$category,$unitCost,$id){
		$element = "
			<form action=\"shoppingCart.php?action=remove&id=$id\" method=\"post\" class=\"cart-items\">
				<div class=\"cart-items\">
					<div class=\"row bg-gray\">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<div class=\"col-md-4\">
							<img src=\"$image\" alt=\"image\" class=\"img-fluid\">
						</div>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<div class=\"col-md-6\">
							<h5 style=\"color:#F2AA4CFF\" class=\"pt-2\"> $product_name </h5>
							<small class=\"text-secondary\">Category: $category</small>
							<h5 style=\"color:#F2AA4CFF\" class=\"pt-2\"> ₱$unitCost </h5>
							<button type=\"submit\" class=\"btn-danger\" name=\"remove\">REMOVE ITEM</button>
						</div>
						<div class=\"col-md-4\">
							<div>
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<button type=\"submit\"  name=\"minus\" style=\"background-color: #F2AA4CFF\" class=\"border rounded-circle\"><i class=\"fa fa-minus\"></i></button>&nbsp
								<input type=\"text\" name=\"qty\" value=\"1\" style=\"border-radius: 3rem; padding:0.1rem 0.9rem 0.1rem 0.9rem\" class=\"text-warning bg-dark form-control border rounded w-25 d-inline\">&nbsp
								<button type=\"submit\"  name=\"plus\" style=\"background-color: #F2AA4CFF\" class=\"border rounded-circle\"><i class=\"fa fa-plus\"></i></button>
							</div>
						<div>
						<br>
					</div>
				</div>
			</form>
		";
		echo $element;
	}
?>