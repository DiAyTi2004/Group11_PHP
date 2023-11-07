<?php
$sql_sua_danh_muc = "SELECT * FROM tbl_category WHERE id='$_GET[id]' LIMIT 1";
$result_sua_danh_muc = mysqli_query($connect, $sql_sua_danh_muc);
?>
<p>Sửa danh mục sản phẩm</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="pages/Category/ProductLogic.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
        <?php
        while ($row = mysqli_fetch_array($result_sua_danh_muc)) {


        ?>

            <tr>
                <th colspan="2">Điền danh mục</th>
            </tr>
            <tr>
                <td>Tên danh mục</td>
                <td><input type="text" value="<?php echo $row['name'] ?>" name="tendanhmuc"></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinhanh">
                    <img src="pages/Product/ProductImages/<?php echo $row['category_image'] ?> " width="150px">
                </td>
            </tr>

            <tr>

                <td colspan="2"><input type="submit" value="Sửa danh mục" name="suadanhmuc"></td>
            </tr>
    </form>
<?php
        }
?>
</table>