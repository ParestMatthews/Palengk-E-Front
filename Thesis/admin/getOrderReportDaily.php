<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';

if($_POST) {

	$daily = $_POST['daily'];
  var_dump($daily);
	$sql = "SELECT * FROM transactions WHERE Transaction_date <= '$daily' ";
	$query = $db->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Order Date</th>
			<th>Customer Name</th>
			<th>Contact</th>
			<th>Grand Total</th>
          <th>Original Total</th>
      <th>Profit</th>
		</tr>

		<tr>';
		$totalAmount = 0;
    $totalOrig =0;
    $totalIncome =0;

		while ($result = mysqli_fetch_assoc($query)) {
      $cumul = $result['Transaction_grandtotal'] - $result['Transaction_origtotal'];
			$table .= '<tr>
				<td><center>'.$result['Transaction_date'].'</center></td>
				<td><center>'.$result['Transaction_fullname'].'</center></td>
				<td><center>'.$result['Transaction_phone'].'</center></td>
        	<td><center>'.'₱'.' '.$result['Transaction_grandtotal'].'</center></td>
        <td><center>'.'₱'.' '.$result['Transaction_origtotal'].'</center></td>

        <td><center>'.'₱'.' '.$cumul.'</center></td>
			</tr>';
			$totalAmount += $result['Transaction_grandtotal'];
      $totalOrig += $result['Transaction_origtotal'];
      $totalIncome += ($result['Transaction_grandtotal'] - $result['Transaction_origtotal']);
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total</center></td>
			<td><center>'.'₱'.' '.$totalAmount.'</center></td>
      <td><center>'.'₱'.' '.$totalOrig.'</center></td>
      <td><center>'.'₱'.' '.$totalIncome.'</center></td>
		</tr>
	</table>
	';

	echo $table;}
  ?>
