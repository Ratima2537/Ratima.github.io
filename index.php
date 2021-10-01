<?php
include 'conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/hoverside.css">
    <link rel="stylesheet" href="css/show-product.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/product.css">
    <title>Console.Log</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="topnav">
                <a href="#section1">Home</a>
                <a href="#section2">News</a>
                <a href="#section3">Contact</a>
          
            </div>
        </div>

    </nav>
    <div id="mySidenav" class="sidenav">
        <a href="#section1" id="about">New</a>
        <a href="#section2" id="blog">Detail</a>
        <a href="#section3" id="projects">Shop</a>
    </div>
    <section id="section1">

        <div class="container">
            <div class="fulid">
                <?php
                $sql = 'SELECT * FROM arrival';
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                ?>

                <img src="<?php echo $row['a_img']; ?>" alt="asd" width="1500">
                <p class="header">!NEW ARRIVAL</p>
                <p class="detail"><?php echo $row['a_name']; ?></p>
                <?php  ?>
            </div>
        </div>
        </div>
    </section>
    <section id="section2">
        <div class="container-product">

            <div class="show-product">
            <p class="detail2"> แชทข้ามรุ่นกับ PS4™</p>
                 <img src="./img/book.jpg" alt="asd" width="500">
                 
<p class="detail">ไม่ว่าเพื่อนของคุณจะเล่นอยู่บน PS4 หรือ PS5 การแชทผ่านเสียงข้ามรุ่นจะทำให้ทุกคนสามารถสนทนากันได้ผ่านบัญชีสำหรับ PlayStation™Network คุณยังสามารถพูดคุยกับผู้เล่นบนอุปกรณ์มือถือที่มี PlayStation®App ได้
    

</p>
              
            </div>
           
        </div>
       
    </section>
    <section id="section3">
        <div class="product">
            <div class="collection">

                <?php
                $sql = "SELECT * FROM product where p_id='1'";
                
                $query = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($query);

                $sql = "SELECT * FROM product where p_id='2'";
                $result2 = $conn->query($sql);

                $row2 = mysqli_fetch_assoc($result2);
                ?>

                <div class="item1">
                    <img src="<?php echo $row[
                        'p_img'
                    ]; ?>" alt="" style="width:100%;">
                    <p><?php echo "<a href='product_detail.php?p_id=$row[p_id]'>ORDER</a>"; ?></p>
                </div>
                <div class="item2">
                    <img src="<?php echo $row2[
                        'p_img'
                    ]; ?>" alt="" style="width:100%;">
                    <p><?php echo "<a href='product_detail.php?p_id=$row2[p_id]'>ORDER</a>"; ?></p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>