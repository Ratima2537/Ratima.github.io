<?php
	session_start();
    include("conn.php");  
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./css/confirm.css">
<title>Console.Log</title>
</head>
<body>
  <div class="container">
<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
  <table width="600" align="center" class="square">
    <tr>
      <td width="1558" colspan="4" bgcolor="#FFDDBB">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr>
      <td >สินค้า</td>
      <td align="center" >ราคา</td>
      <td align="center" >จำนวน</td>
      <td align="center" >รวม/รายการ</td>
    </tr>
<?php

	$total=0;
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from product where p_id=$p_id";
		$query	= mysqli_query($conn, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['p_price']*$qty;
		$total	+= $sum;
    echo "<tr>";
    echo "<td>" . $row["p_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['p_price'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
	echo "<tr>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
    echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";
?>
</table>
<p>    
<table border="0" cellspacing="0" align="center">
<tr>
	<td colspan="2" bgcolor="#CCCCCC">ข้อมูลในการจัดส่ง</td>
</tr>
<tr>
    <td bgcolor="#EEEEEE">ชื่อ</td>
    <td><input name="name" type="text" id="name" required/></td>
</tr>
<tr>
    <td width="22%" bgcolor="#EEEEEE">ที่อยู่</td>
    <td width="78%">
    <textarea name="address" cols="35" rows="5" id="address" required></textarea>
    </td>
</tr>
<tr>
  	<td bgcolor="#EEEEEE">อีเมล</td>
  	<td><input name="email" type="email" id="email"  required/></td>
</tr>
<tr>
  	<td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
  	<td><input name="phone" type="text" id="phone" required /></td>
</tr>
<tr>
	<td colspan="2" align="center" bgcolor="#CCCCCC">
        <input type="hidden" name="total" value="<?php echo $total;?>"/>
        <input type="hidden" name="act" value="<?php echo $act;?>"/>
        
	<input type="submit" name="Submit2" value="สั่งซื้อ" />
</td>
</tr>
</table>
</form>
<img src="./img/phonto.jpg" alt="" width="500">
</div>
</body>
</html>