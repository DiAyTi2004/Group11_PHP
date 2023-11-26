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

$findProductByEventIdSQL = "SELECT * FROM tbl_product WHERE tbl_product.event_id = '$eventId'";
$productByEvent = mysqli_query($connect, $findProductByEventIdSQL)
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
            width: 100%;
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
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

    <div class="appCard container">
    <ul class="product_list row row-cols-1 row-cols-sm-3 row-cols-md-4">
        <?php
        while ($row_pro = mysqli_fetch_array($productByEvent)) {
            $sql_show_image = "SELECT * FROM tbl_product_image WHERE tbl_product_image.product_id = '$row_pro[id]'";
            $query_show_image = mysqli_query($connect, $sql_show_image);
            $row_image = mysqli_fetch_array($query_show_image);
        ?>

            <li class="col">
                <a href="UserIndex.php?usingPage=product&id=<?php echo $row_pro['id'] ?>">
                    <div class="product-container">
                        <?php
                        $imageSource = str_starts_with($row_image['content'], 'http') ? $row_image['content'] : "../../admin/pages/ProductImage/{$row_image['content']}";

                        echo "<img src=\"{$imageSource}\" alt=\"{$row_pro['name']}\">";

                        if ($eventDetail['discount'] > 0) :
                        ?>
                            <div class="discount-overlay"><?php echo "-" . $eventDetail['discount'] . '%'; ?></div>
                        <?php endif; ?>
                    </div>

                    <h5 class="title_product mt-2"> <?php echo $row_pro['name'] ?></h5>
                    <div class="cdt-product-param"><span data-title="Loại Hàng"><i class="fa-solid fa-cart-arrow-down"></i> Like auth</span></div>
                    <span style="text-decoration: line-through;" class="price_fake ml-3">
                        <?php echo number_format($row_pro['price'] * ($eventDetail['discount'] / 100) + $row_pro['price'], 0, ',', '.') ?> đ
                    </span>
                    <b class="price_real ml-3">
                        <?php echo number_format($row_pro['price'], 0, ',', '.') . ' đ' ?>
                    </b>
                    <div class="sold flex justify-between mt-4">
                        <span class="ml-3">
                            Đã bán: <?php echo random_int(5, 100) ?>
                        </span>
                        <span class="mr-3">
                            5 <i class="fa fa-star checked"></i>
                        </span>
                    </div>
                </a>
            </li>
        <?php
        }
        ?>

    </ul>
</div>

</body>


</html>