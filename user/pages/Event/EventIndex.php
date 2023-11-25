<?php

// $categoryId = $_GET['categoryId'] || "";
// $findProductByCategoryIdSQL = "SELECT * FROM tbl_product WHERE tbl_product.category_id ='$categoryId'";
// $productData = mysqli_query($connect, $findProductByCategoryIdSQL);

// $categorySQL = "SELECT * FROM tbl_category WHERE id='$categoryId' LIMIT 1";
// $query_cate = mysqli_query($connect, $categorySQL);
// $row_title = mysqli_fetch_array($query_cate);
$eventId = isset($_GET['eventId']) ? $_GET['eventId'] : "";
$findProductByCategoryIdSQL = "SELECT * FROM tbl_event WHERE tbl_event.id ='$eventId'";
$productData = mysqli_query($connect, $findProductByCategoryIdSQL);
$eventDetail =  mysqli_fetch_array($productData);
?>

<p></p>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h5 {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
        }

        .appCart1 {
            width: 100%;
            background-color: #fff;
            padding: 25px;
            border-radius: 15px;
            display: flex;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
        }
        .img1 {
            display: block;
            margin: 0 auto;
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 5px;
        }

        .title {
            font-size: 1.5em;
            font-family: 'Montserrat', sans-serif;
            text-align: left;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .row {
            display: flex;
        }

        .title.col-4 ul {
            list-style: none;
            /* Loại bỏ dấu đầu dòng của danh sách */
            padding: 0;
            /* Loại bỏ lề trong danh sách */
        }

        .title.col-4 li {
            margin-bottom: 10px;
            /* Khoảng cách giữa các mục danh sách */
            font-size: 16px;
            /* Kích thước chữ */
            color: #333;
            /* Màu chữ */
        }

        .title.col-4 li:first-child {
            font-weight: bold;
            /* Làm đậm cho mục đầu tiên */
        }
        .head-title {
            margin-bottom: 10px;
            font-size: 18px;
            /* Kích thước chữ lớn hơn */
            color: #3498db;
            /* Màu chữ xanh dương */
            font-weight: bold;
            /* Chữ đậm */
            text-transform: uppercase;
            /* Chuyển đổi chữ thành chữ in hoa */
            letter-spacing: 1px;
            /* Khoảng cách giữa các ký tự */
            transition: transform 0.3s ease;
            /* Hiệu ứng transform */
        }
    </style>
</head>

<body>
    <h5> Sự kiện |
        <?php
        if (isset($eventDetail['name'])) {
            echo $eventDetail['name'];
        }
        ?>
    </h5>
    <div class="row appCart1">
        <div class="col-8">
            <img class="img1" src="./../../admin/pages/Event/EventImages/<?php echo $eventDetail['banner'] ?>" alt="">
        </div>
        <div class="title col-4 ">
            <ul>
                <li class="head-title">
                    <?php echo $eventDetail['code'] . " " . $eventDetail['name'] ?>
                </li>
                <li>
                    <p style="font-weight: bold;  color: #ff5733;  font-style: italic;"><?php echo $eventDetail['description'] ?></p>
                </li>
                <li>
                    <p>Giảm giá toàn bộ sản phẩm lên đến: <?php echo $eventDetail['discount'] ?>% </p>
                </li>
                <?php
                function formatEventDate($dateString)
                {
                    // Tạo đối tượng DateTime từ chuỗi ngày tháng
                    $dateTime = new DateTime($dateString);

                    // Thiết lập ngôn ngữ và khu vực cho tiếng Việt
                    setlocale(LC_TIME, 'vi_VN');

                    // Mảng dịch tiếng Việt cho ngày
                    $days = [
                        'Sunday'    => 'Chủ Nhật',
                        'Monday'    => 'Thứ Hai',
                        'Tuesday'   => 'Thứ Ba',
                        'Wednesday' => 'Thứ Tư',
                        'Thursday'  => 'Thứ Năm',
                        'Friday'    => 'Thứ Sáu',
                        'Saturday'  => 'Thứ Bảy',
                    ];

                    // Mảng dịch tiếng Việt cho tháng
                    $months = [
                        'January'   => 'Tháng Một',
                        'February'  => 'Tháng Hai',
                        'March'     => 'Tháng Ba',
                        'April'     => 'Tháng Tư',
                        'May'       => 'Tháng Năm',
                        'June'      => 'Tháng Sáu',
                        'July'      => 'Tháng Bảy',
                        'August'    => 'Tháng Tám',
                        'September' => 'Tháng Chín',
                        'October'   => 'Tháng Mười',
                        'November'  => 'Tháng Mười Một',
                        'December'  => 'Tháng Mười Hai',
                    ];

                    $formattedDate = $days[$dateTime->format('l')] . ', ' . $dateTime->format('d') . ' ' . $months[$dateTime->format('F')] . ' ' . $dateTime->format('Y H:i:s');

                    return $formattedDate;
                }
                $startFormatted = formatEventDate($eventDetail['start_date']);
                $endFormatted = formatEventDate($eventDetail['end_date']);
                ?>
                <li style="color: green; /* tên màu */color: rgb(0, 0, 255); color: #0000FF;">
                    Bắt đầu từ: <?php echo $startFormatted; ?>
                </li>
                <li style="color: blue; color: rgb(0, 0, 255); color: #0000FF; ">
                    Kết thúc lúc: <?php echo $endFormatted; ?>
                </li>

        </div>
    </div>
</body>

</html>



<!-- <ul class="product_list">
    <?php
    while ($row_pro = mysqli_fetch_array($productData)) {
    ?>
        <li>
            <a href="UserIndex.php?usingPage=product&id=<?php echo $row_pro['id'] ?>">
                <img src="../../admin/pages/Product/ProductImages/<?php echo $row_pro['hinhanh'] ?>">
                <p></p>
                <h5 class="title_product"> <?php echo $row_pro['tensanpham'] ?></h5>
                <h5 class="price_product">Giá: <?php echo number_format($row_pro['giasanpham'], 0, ',', '.') . ' VNĐ' ?></h5>
                <p style="text-align: center;"><?php echo "Xem chi tiết" ?></p>
            </a>
        </li>
    <?php
    }
    ?>

</ul> -->