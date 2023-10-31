<?php
$sql_sua_event = "SELECT * FROM tbl_event WHERE id='$_GET[id]' LIMIT 1";
$result_sua_sp = mysqli_query($connect, $sql_sua_event);
?>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="pages/Event/EventLogic.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
        <?php
        while ($row = mysqli_fetch_array($result_sua_event)) {


        ?>

            <tr>
                <th colspan="2">Sửa sự kiện</th>
            </tr>
            <tr>
                <td>ngày bắt đầu</td>
                <td>
                    <input type="date" name="start_dates" value="<?php echo $row['start_dates'] ?>">
                    <span class="input-group-append">
                        <span class="input-group-text bg-light d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td>ngaykethuc</td>
                <td>
                    <input type="date" name="end_date" value="<?php echo $row['end_date'] ?>">
                    <span class="input-group-append">
                        <span class="input-group-text bg-light d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td>giảm giá</td>
                <td><input type="number" name="discount" value="<?php echo $row['discount'] ?>"></td>
            </tr>
            <tr>
                <td>banner</td>
                <td><input type="text" name="banner" value="<?php echo $row['banner'] ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Sửa sự kiện" name="suasukien"></td>
            </tr>
    </form>
<?php
        }
?>
</table>