<?php
	session_start();
    include('conn.php');
	@$p_id = $_GET['p_id'];
	$act = $_GET['act'];

	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id];
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id)) 
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		if($amount_array == !null){
			foreach($amount_array as $p_id=>$amount)
			{
				$_SESSION['cart'][$p_id]=$amount;
			
			}
		}
		else
		{
			
		}
		
	}

	if($act=='cancel') 
	{
		unset($_SESSION['cart']);
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/cart.css">
<title>Console.Log</title>
</head>

<body>
	<div class="container">
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table align="center" width="600">
    <th class="th-header" colspan="5"> 
      
     เช็ครายการสินค้า
</th>
    <tr>
      <th align="center">สินค้า</th>
      <th align="center">ราคา</th>
      <th align="center">จำนวน</th>
      <th align="center">รวม(บาท)</th>
      <th align="center">ลบ</th>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{

      
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "SELECT * FROM product where p_id=$p_id";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$sum = $row['p_price'] * $qty;
		$total += $sum;
   
		echo "<tr align='center'>";
		echo "<td align='center'>" . $row["p_name"] . "</td>";
		echo "<td>" .number_format($row["p_price"],2) . "</td>";
		echo "<td>";  
		echo "<input align='right' type='number' name='amount[$p_id]' value='$qty' size='2'/></td>";
		echo "<td>".number_format($sum,2)."</td>";
	
		echo "<td><a class='remove' href='cart.php?p_id=$p_id&act=remove'>X</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td align='center' colspan='3' ><b>ราคารวม</b></td>";
  	echo "<td align='center'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td></td>";
	echo "</tr>";
}


?>
<tr>

<td class="footer-td" colspan="5" align="right">
    <input type="submit" name="button" id="button" value="ปรับปรุง" />
	<input type="button" name="btncancel" value="ยกเลิกทั้งหมด" onclick="window.location='cart.php?act=cancel';" />
	<input type="hidden" name="act" value="<?php echo $total;?>"/>
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
</td>
</tr>

</table>

</form>
<a class="to-index" href="index.php">กลับหน้ารายการสินค้า</a>
</div>
</body>
</html>