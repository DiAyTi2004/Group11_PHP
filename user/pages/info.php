<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/info.css">
</head>
<body>
<p><?php
            if(isset($_SESSION['dangky'])){
                // echo 'Xin chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span>';
                $id =$_SESSION['dangky'];
                $sql_thongtin ="SELECT * FROM tbl_dangky WHERE taikhoan='$id' LIMIT 1";
                $query_thongtin=mysqli_query($connect,$sql_thongtin);
                
                while($row=mysqli_fetch_array($query_thongtin)){         
    ?></p><br>
    <div class="container-info">
        <div class="container-info-left">
            <ul class="card-list">
                <li class="card-item">
                    <div class="card-item-img">
                        <img  src="https://i.pinimg.com/564x/25/d3/12/25d312c1472518d09984003e4027b08e.jpg"></img>
                    </div>
                    <p class="card-item-name">
                        <?php 
                            echo ''.'<span style="color:#fff">'.$row['taikhoan'].'</span>';
                        ?></p>
                    <p class="card-item-duty"><?php 
                            echo ''.'<span >'.$row['hovaten'].'</span>';
                        ?></p>
                    <div class="social-media-list">
                        <a href="https://www.facebook.com/hoandz93/" class="social-media-item"><i class="fab fa-facebook facebook-icon"></i></a>
                        <a href="https://www.youtube.com/channel/UCnf-JhE6TgnZ4nWR-JElaiA" class="social-media-item"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.instagram.com/tran.ngochoan24/" class="social-media-item"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/HoanTiny" class="social-media-item"><i class="fab fa-github"></i></a>
                    </div>
                    <!-- <div class="contact"><a href="mailto: thedevil0903@gmail.com" class="card-item-contact">Contact me</a></div> -->
                </li>
            </ul>
        </div>
        <div class="wrapper-info">
            <div class="info-header">
                <h3>Hồ sơ của bạn</h3>
                <p>Quản lý thông tin cá nhân của bạn</p>
            </div>
            <div class="infor-main">
                <div class="infor-main-text">
                    <label for="">Tên Đăng Nhập: </label>
                    <span class="infor-text-sql"><?php echo $row['hovaten']  ?></span>
                </div>
                <div class="infor-main-text">
                    <label for="">Email: </label>
                    <span class="infor-text-sql"><?php echo $row['email']  ?> <a href="" style="font-size:12px">Thay đổi</a></span>
                </div>
                <div class="infor-main-text">
                    <label for="">Địa Chỉ: </label>
                    <span class="infor-text-sql"><?php echo $row['diachi']  ?></span>
                </div>
                <div class="infor-main-text">
                    <label for="">Số Điện Thoại: </label>
                    <span class="infor-text-sql"><?php echo $row['sodienthoai']  ?> <a href="" style="font-size:12px">Thay đổi</a></span>
                </div>
            </div>
        </div>
    </div>
    <?php
            }
    }

    ?>
</body>
</html>