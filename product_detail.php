<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product_detail.css">
    <title>Console.Log</title>
</head>
<body>
   
    <?php
      session_start();
        include ('conn.php');

        $p_id = $_GET['p_id'];

        $sql = "SELECT * FROM product where p_id=$p_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        
  

          ?>
          <div class="card">
            <div class="card-body">

            <img src="<?php echo $row['p_img'];?>" width="150" height="150"/>
                  <p><?php echo $row['p_name'];?></p>
                  <p class="detail"><?php echo $row['p_detail'];?></p>
                  <p><?php echo number_format($row['p_price'],2);?>$</p>
                <?php echo "<a href='cart.php?p_id=$row[p_id]&act=add'> BUY </a>"?>
                <a href="index.php">หน้าหลัก</a>
                
            </div>
           
          </div>
  

  
</body>
</html>