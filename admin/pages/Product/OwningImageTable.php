<link rel="stylesheet" href="./styles/SizeStyles.css">

<?php
$getAllOwningSQL = "SELECT * FROM tbl_product_image WHERE tbl_product_image.product_id = '$row[id]';";

$tableOwningData = mysqli_query($connect, $getAllOwningSQL);
?>

<table class="w-100">
    <thead class="table-head w-100">
        <tr class="table-heading">
            <th class="noWrap">STT</th>
            <th class="noWrap">Các hình ảnh</th>
            <th class="noWrap">Mô tả</th>
            <th class="noWrap">Ảnh chính</th>
        </tr>
    </thead>

    <tbody class="table-body">
        <?php
        $displayOrder = 0;
        $hasData = false;
        while ($rowOwningData = mysqli_fetch_array($tableOwningData)) {
            $displayOrder++;
            $hasData = true;
        ?>
            <tr>
                <td>
                    <?php echo  $displayOrder + ($pageIndex - 1) * $pageSize; ?>
                </td>
                <td>
                    <img style="width: 150px; height: 150px" src="pages/ProductImage/<?php echo $rowOwningData['content'] ?>" alt="">
                </td>
                <td>
                    <?php echo $rowOwningData['description'] ?>
                </td>
                <td>
                    <?php if($rowOwningData['main_image']) echo '<i class="fa-solid fa-check fa-lg"></i>';
                    else echo '<i class="fa-solid fa-xmark fa-lg"></i>'; ?>
                </td>
            </tr>
        <?php
        }
        if (!$hasData) {
        ?>
            <tr>
                <td colspan="5">
                    <?php echo "Hiện không có ảnh nào!" ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>