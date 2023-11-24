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

<style>
  /* Thêm CSS này vào đầu file PHP của bạn, trong thẻ <style> */
/* Định dạng tiêu đề danh mục */
h5 {
    font-family: 'Arial Black', sans-serif;
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
}

.appCart {
    width: 100%;
    background-color: #fff;
    padding: 25px;
    border-radius: 15px;
    display: flex;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px 0;
}

.photo {
    width: 40%;
    overflow: hidden;
    border-radius: 10px;
}

img {
    display: block;
    margin: 0 auto;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}

.title {
    font-size: 1.5em;
    font-family: 'Arial Black', sans-serif;
    width: 60%;
    text-align: center;
    padding: 0 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* Định dạng danh sách sản phẩm */
.product_list {
    list-style: none;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.product_list li {
    width: 300px;
    margin: 15px 0;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
}

.product_list li:hover {
    transform: scale(1.05);
}

.product_list a {
    text-decoration: none;
    color: #333;
    display: block;
    padding: 15px;
}

.product_list img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

.title_product {
    font-size: 1.2em;
    margin-top: 10px;
}

.price_product {
    font-weight: bold;
    color: #e44d26; /* Màu cam đậm */
}


    /* Định dạng ảnh nền danh mục */
</style>
<p></p>
<h5> Danh mục |
    <?php
    if (isset($row_title['name'])) {
        echo "Giày" . " " . $row_title['name'];
    }
    ?>
</h5>
<div class="appCart">
    <div class="photo">
        <img src="./../../admin/pages/Category/CategoryImages/<?php echo $row_title['category_image'] ?>" alt="">
    </div>
    <div class="title">
        <p><?php echo $row_title['description'] ?> </p>
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

