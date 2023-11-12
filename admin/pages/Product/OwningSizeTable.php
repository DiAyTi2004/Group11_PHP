<link rel="stylesheet" href="./styles/SizeStyles.css">

<?php
$getAllOwningSQL = "SELECT * FROM tbl_size INNER JOIN tbl_product_size ON tbl_product_size.size_id = tbl_size.id WHERE tbl_product_size.product_id = '$row[id]';";

$tableOwningData = mysqli_query($connect, $getAllOwningSQL);
?>

<table class="w-100">
    <thead class="table-head w-100">
        <tr class="table-heading">
            <th class="noWrap">STT</th>
            <th class="noWrap">Mã kích cỡ</th>
            <th class="noWrap">Tên kích cỡ</th>
            <th class="noWrap">Mô tả</th>
            <th class="noWrap">Số lượng còn</th>
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
                    <?php echo $rowOwningData['code'] ?>
                </td>
                <td>
                    <?php echo $rowOwningData['name'] ?>
                </td>
                <td>
                    <?php echo $rowOwningData['description'] ?>
                </td>
                <td>
                    <?php echo $rowOwningData['quantity'] ?>
                </td>
            </tr>
        <?php
        }
        if (!$hasData) {
        ?>
            <tr>
                <td colspan="5">
                    <?php echo "Hiện không có kích cỡ nào!" ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>