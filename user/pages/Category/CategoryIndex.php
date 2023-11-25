<?php

$categoryId = isset($_GET['categoryId']) ? $_GET['categoryId'] : "";
$findProductByCategoryIdSQL = "SELECT * FROM tbl_product inner join tbl_product_image
on tbl_product.id = tbl_product_image.product_id
 WHERE tbl_product.category_id ='$categoryId'";
$productData = mysqli_query($connect, $findProductByCategoryIdSQL);
$categorySQL = "SELECT * FROM tbl_category WHERE id='$categoryId' LIMIT 1";
$query_cate = mysqli_query($connect, $categorySQL);
$row_title = mysqli_fetch_array($query_cate);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Thêm CSS này vào đầu file PHP của bạn, trong thẻ <style> */
        /* Định dạng tiêu đề danh mục */
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
            margin: 20px 0;
        }

        .img1 {
            display: block;
            margin: 0 auto;
            width: 80%;
            height: 100%;
            object-fit: cover;
            border-radius: 80%;
        }

        .title {
            font-size: 1.5em;
            font-family: 'Montserrat', sans-serif;
            width: 60%;
            text-align: center;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>

<body>
    <h5> Danh mục |
        <?php
        if (isset($row_title['name'])) {
            echo "Giày" . " " . $row_title['name'];
        }
        ?>
    </h5>
    <div class="row appCart1">
        <div class="photo col-4">
            <img class ="img1"src="./../../admin/pages/Category/CategoryImages/<?php echo $row_title['category_image'] ?>" alt="">
        </div>
        <div class="title col-8">
            <p><?php echo $row_title['description'] ?></p>
        </div>
    </div>

    <ul class="product_list">
        <?php
        while ($row_pro = mysqli_fetch_array($productData)) {
        ?>
            <li>
                <a href="UserIndex.php?usingPage=product&id=<?php echo $row_pro['id'] ?>">
                    <img src="./../../admin/pages/Product/ProductImages/<?php echo htmlspecialchars($row_pro['content']); ?>" alt="Product Image">
                    <p></p>
                    <h5 class="title_product"> <?php echo $row_pro['name'] ?></h5>
                    <h5 class="price_product">Giá: <?php echo number_format($row_pro['price'], 0, ',', '.') . ' VNĐ' ?></h5>
                    <p style="text-align: center;"><?php echo "Xem chi tiết" ?></p>
                </a>
            </li>
        <?php
        }
        ?>

    </ul>
</body>

</html>