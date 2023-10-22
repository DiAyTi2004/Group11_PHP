<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham ,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$result_lietke_sp = mysqli_query($connect, $sql_lietke_sp);
?>
<!-- Button trigger modal -->
<div class="text-left mt-2">
    <button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Thêm sản phẩm
    </button>
</div>

<div class="container p-0">
    <style>
        .noWrap {
            white-space: nowrap;
        }
    </style>
    <table>
        <legend style="text-align: center;"><b>Quản lý sản phẩm</b></legend>
        <thead class="table-head w-100">
            <tr class="table-heading">
                <th class="noWrap">ID</th>
                <th class="noWrap">Tên sản phảm</th>
                <th class="noWrap">Hình ảnh </th>
                <th class="noWrap">Giá sản phẩm</th>
                <th class="noWrap">Số lượng</th>
                <th class="noWrap">Danh mục</th>
                <th class="noWrap">Mã sản phẩm</th>
                <th class="noWrap">Tóm tăt</th>
                <th class="noWrap">Trạng thái</th>
                <th class="noWrap">Quản lý</th>
            </tr>
        </thead>

        <tbody class="table-body">
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result_lietke_sp)) {
                $i++;
            ?>
                <tr>
                    <td>
                        <?php echo $i ?>
                    </td>
                    <td style="width:100px;height:150px; text-align: center;">
                        <?php echo $row['tensanpham'] ?>
                    </td>

                    <td style="width:150px;height:150px;">
                        <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?> " width="100%">
                    </td>

                    <td style="width:150px;text-align: center;">
                        <?php echo number_format($row['giasanpham'], 0, ',', '.') . 'VNĐ' ?>
                    </td>
                    <td>
                        <?php echo $row['soluong'] ?>
                    </td>
                    <td>
                        <?php echo $row['tendanhmuc'] ?>
                    </td>
                    <td>
                        <?php echo $row['masanpham'] ?>
                    </td>
                    <td>
                        <?php echo $row['tomtat'] ?>
                    </td>
                    <td>
                        <?php if ($row['trangthai'] == 1) {
                            echo "Mới";
                        } else {
                            echo "Cũ";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>"><i class="fa-solid fa-trash mr-1"></i></a>
                        <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>"><i class="fa-solid fa-pencil"></i></a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>

    </table>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($result_lietke_sp)) {
        $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td style="width:100px;height:150px; text-align: center;">
                <?php echo $row['tensanpham'] ?>
            </td>

            <td style="width:150px;height:150px;">
                <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?> " width="100%">
            </td>

            <td style="width:150px;text-align: center;">
                <?php echo number_format($row['giasanpham'], 0, ',', '.') . 'VNĐ' ?>
            </td>
            <td><?php echo $row['soluong'] ?> </td>
            <td><?php echo $row['tendanhmuc'] ?> </td>
            <td><?php echo $row['masanpham'] ?> </td>
            <td><?php echo $row['tomtat'] ?> </td>
            <td><?php if ($row['trangthai'] == 1) {
                    echo "Mới";
                } else {
                    echo "Cũ";
                } ?>
            </td>
            <td>
                <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a>|
                <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
            </td>
        </tr>

    <?php
    }
    ?>
    </table>
</div>