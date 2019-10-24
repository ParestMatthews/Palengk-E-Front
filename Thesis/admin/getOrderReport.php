<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';

if($_POST) {

	$start_date = $_POST['startDate'];
	$end_date = $_POST['endDate'];
	$sql = "SELECT * FROM transactions WHERE Transaction_date >= '$start_date' AND Transaction_date <= '$end_date' AND Transaction_shipped = 2 ";
	$query = $db->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Order Date</th>
			<th>Customer Name</th>
			<th>Contact</th>
			<th>Subtotal</th>
			<th>Shipping Fee</th>
      <th>Original Total</th>
      <th>Profit</th>
		</tr>

		<tr>';
		$totalAmount = 0;
    $totalOrig =0;
    $totalIncome =0;

		while ($result = mysqli_fetch_assoc($query)) {
      $cumul = $result['Transaction_grandtotal'] - $result['Transaction_origtotal'];
			$ships = $result['Transaction_grandtotal'] - $result['Transaction_subtotal'];
			$table .= '<tr>
				<td><center>'.$result['Transaction_date'].'</center></td>
				<td><center>'.$result['Transaction_fullname'].'</center></td>
				<td><center>'.$result['Transaction_phone'].'</center></td>
        	<td><center>'.'₱'.' '.$result['Transaction_subtotal'].'</center></td>
						<td><center>'.'₱'.' '.$ships.'</center></td>
        <td><center>'.'₱'.' '.$result['Transaction_origtotal'].'</center></td>

        <td><center>'.'₱'.' '.$cumul.'</center></td>
			</tr>';
			$totalAmount += $result['Transaction_grandtotal'];
      $totalOrig += $result['Transaction_origtotal'];
      $totalIncome += ($result['Transaction_grandtotal'] - $result['Transaction_origtotal']);
		}
		$table .= '
		<tr>
			<td colspan="3"><center>Total</center></td>
			<td colspan="2"><center>'.'₱'.' '.$totalAmount.'</center></td>
      <td><center>'.'₱'.' '.$totalOrig.'</center></td>
      <td><center>'.'₱'.' '.$totalIncome.'</center></td>
		</tr>
	</table>
	';

	echo $table;


	$sqlz = "SELECT * FROM transactions WHERE Transaction_date >= '$start_date' AND Transaction_date <= '$end_date' AND Transaction_shipped = 2 ";
	$queryx = $db->query($sqlz);
	while ($results = mysqli_fetch_assoc($queryx)) {
  $idArray = array();
  $quantity = array();
  $old = array();
  $new = array();
	$items = json_decode($results['Transaction_items'],true);
	$profit = 0;
	$totalprofit =0;
	$totalnewcount =0;
	$totaloldcount =0;
  foreach($items as $item){
    $idArray[] = $item['id'];
    $quantity[] = $item['quantity'];
    $old[] = $item['old price'];
    $new[] = $item['new price'];
  }

	$ids = implode(',' , $idArray);
	$productq = $db->query(
		"SELECT i.Product_id as 'Product_id', i.Product_name as 'Product_name', c.Category_id as 'Category_id', c.Category_name as 'Category_name'
		FROM products i
		LEFT JOIN categories c ON i.Product_category = c.Category_id
		WHERE i.Product_id IN ({$ids})
		");

		while($p = mysqli_fetch_assoc($productq)){

			foreach($items as $item){
				if($item['id'] == $p['Product_id']){
					$x = $item;
					continue;
				}
			}
			$products[] = array_merge($x,$p);
		}


		$form = '
		<br>
		<br>
		<br>
		<h4>'.$results['Transaction_fullname'].' ('.$results['Transaction_date'].')</h4>

		<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
			<tr>
				<th>Quantity</th>
				<th>Product</th>
				<th>Category</th>
		   	<th>Regular Price</th>
				<th>New Price</th>
				<th>Total Regular</th>
				<th>Total New</th>
	      <th>Profit</th>
			</tr>

			<tr>';

		 foreach($products as $product){

			 $totalnew = $product['quantity'] * $product['new price'];
			  $totalold = $product['quantity'] * $product['old price'];
			  $profit = $totalnew - $totalold;
				$totalprofit += $profit;
				$totalnewcount += $totalnew;
								$totaloldcount += $totalold;
			 $form .=  '<tr>
		       <td><center>'.$product['quantity'].'</center></td>
		       <td><center>'.$product['Product_name'].'</center></td>
		       <td><center>'.$product['Category_name'].'</center></td>
				   <td><center>'.'₱'.$product['old price'].'</center></td>
		       <td><center>'.'₱'.$product['new price'].'</center></td>
					 	  <td><center>'.'₱'.$totalold.'</center></td>
					  <td><center>'.'₱'.$totalnew.'</center></td>
		       <td><center>'.'₱'.$profit.'</center></td>
		   </tr>';
		 }

		 $form .= '
	 	<tr>
	 		<td colspan="5"><center>Total</center></td>
	 		<td colspan="1"><center>'.'₱'.' '.$totaloldcount.'</center></td>
	 		<td colspan="1"><center>'.'₱'.' '.$totalnewcount.'</center></td>
	 		<td colspan="1"><center>'.'₱'.' '.$totalprofit.'</center></td>
	 	</tr>
	 </table>
	 ';
		echo $form;
		unset($products);
}

	}

?>
