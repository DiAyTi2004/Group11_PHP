    <?php
    $sql_lietke_nguoidung = "SELECT * FROM tbl_dangky ORDER BY id_khachhang DESC";
    $result_lietke_nguoidung = mysqli_query($connect, $sql_lietke_nguoidung);
    ?>
    <link rel="stylesheet" href="./styles/UserStyles.css">

    <div class="container p-0 pb-4">
        <table style="width: 100%">
            <legend class="text-center"><b>Danh sách người dùng</b></legend>

            <thead class="table-head w-100">
                <tr class="table-heading">
                    <th class="noWrap">ID</th>
                    <th class="noWrap">Name</th>
                    <th class="noWrap">Account</th>
                    <th class="noWrap">Email</th>
                    <th class="noWrap">NumberPhone</th>
                    <th class="noWrap">Address</th>
                    <th class="noWrap">Edit</th>
                    <th class="noWrap">Delete</th>
                    <th class="noWrap">Chức vụ</th>

                </tr>
            </thead>
            <tbody class="table-body">
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result_lietke_nguoidung)) {
                    $i++;
                ?>
                    <td style="height:100px;" class="noWrap"> <?php echo $i ?></td>
                    <td class="noWrap"> <?php echo $row['hovaten'] ?></td>
                    <td class="noWrap"> <?php echo $row['taikhoan'] ?></td>
                    <td class="noWrap"> <?php echo $row['email'] ?></td>
                    <td class="noWrap"> <?php echo $row['sodienthoai'] ?></td>
                    <td class="noWrap" style="width:150px;"> <?php echo $row['diachi'] ?></td>
                    <td>
                        <a href="?workingPage=user&query=sua&idnguoidung=<?php echo $row['id_khachhang'] ?>"> Sửa </a>
                    </td>
                    <td>
                        <a href="modules/User/UserLogic.php?idnguoidung=<?php echo $row['id_khachhang'] ?>">Xóa</a>
                    </td>

                    </td>
                    <td><?php if ($row['chucvu'] == 1) {
                            echo "Bán hàng";
                        } else {
                            echo "Không";
                        } ?>
                    </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>