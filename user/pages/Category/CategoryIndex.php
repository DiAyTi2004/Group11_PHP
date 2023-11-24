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

<p></p>
<h5> Danh mục |
    <?php
    if (isset($row_title['name'])) {
        echo "Giày"." ". $row_title['name'];
    }
    ?>
</h5>
<div class="w-100 appCart">
        <img class="w-100" class="mr-8" src="./../../admin/pages/Category/CategoryImages/<?php echo $row_title['category_image'] ?>" alt="" class="d-block w-100" alt="slide_event" style="border-radius: 10px; height: 500px">
</div>  
    <p><?php echo $row_title['description'] ?> </p>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adidas Shoes Store</title>
    <style>
        /* Thêm CSS để tạo giao diện đẹp hơn (tùy chỉnh theo ý muốn của bạn) */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            text-align: center;
            float: left;
            width: 200px;
        }
    </style>
</head>
<body>
    <h1>Adidas Shoes Store</h1>

    <?php

    while ($row_pro = mysqli_fetch_array($productData)) {
        echo '<div class="product">';
        echo '<img src="../../admin/pages/Product/ProductImages/' . htmlspecialchars($row_pro['content']) . '" alt="Product Image">';
        echo '<h3>' . $row_pro['name'] . '</h3>';
        echo '<p>' . $row_pro['description'] . '</p>';
        echo '<p>Price: $' . $row_pro['price'] . '</p>';
        echo '</div>';
    }
    ?>
</body>
</html>
