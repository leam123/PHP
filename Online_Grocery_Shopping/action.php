<?php
		session_start();
		$con=mysqli_connect("localhost","root","","shop");
		if(isset($_POST["product_id"])){
			$order_table='';
			$message='';
			if($_POST["action"] == "add"){
				if(isset($_SESSION["cart"])){
					$is_available = 0;
					foreach($_SESSION["cart"] as $keys=>$values){
						if($_SESSION["cart"][$keys]['product_id'] == $_POST["product_id"]){
							$is_available++;
							$_SESSION["cart"][$keys]['product_quantity'] = $_SESSION["cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
						}
					}
					if($is_available < 1){
						$item_array = array(
							'product_id' => $_POST["product_id"],
							'product_name' => $_POST["product_name"],
							'product_price' => $_POST["product_price"],
							'product_quantity' => $_POST["product_quantity"],
						);
						$_SESSION["cart"][] = $item_array;
					}
				}
			}
			else{
				$item_array = array(
					'product_id' => $_POST["product_id"],
					'product_name' => $_POST["product_name"],
					'product_price' => $_POST["product_price"],
					'product_quantity' => $_POST["product_quantity"],
				);
				$_SESSION["cart"][] = $item_array;
			}
			$order_table .= '
				<table class="table table-bordered">
				<tr>
					<th width="40%">Product Name</th>
					<th width="10%">Quantity</th>
					<th width="20%">Unit Cost</th>
					<th width="15%">Total Cost</th>
					<th width="5%">Action</th>
				</tr>
			';
			if(!empty($_SESSION["cart"])){
				$total = 0;
				foreach($_SESSION["cart"] as $keys=>$values){
					$order_table .= '
						<tr>
							<td> '.$values["product_name"].' </td>
							<td> '.$values["product_quantity"].'</td>
							<td align="right"> $ '.$values["product_price"].' </td>
							<td align="right"> $ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
							<td><button name="delete" class="delete" id="'.$values["product_id"].'">Remove</button></td>
						</tr>
					';
					$total = $total + ($values["product_quantity"] * $values["product_price"]);
				}
				$order_table .= '
					<tr>
						<td colspan="3" align="right"> Total </td>
						<td align="right"> $ '.number_format($total, 2).'</td>
						<td></td>
					</tr>
				';
			}
			$order_table .= '</table>';
			$output = array(
				'order_table' => $order_table,
				'cart_item' => count($_SESSION["cart"])
			);
			echo json_encode($output);
		}
?>