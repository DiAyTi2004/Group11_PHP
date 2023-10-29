<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham ,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$result_lietke_sp = mysqli_query($connect, $sql_lietke_sp);
?>

<!-- PHP logic paganition pages -->
<?php
        // Tìm tổng số bản ghi
        $total_records = mysqli_num_rows($result_lietke_sp);
        //Tìm limit và current_page
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;

        //Tính toán total_page và start
        // tổng số trang
        $total_page = ceil($total_records / $limit);
        
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $sql_lietke_sp_2 = "SELECT * FROM tbl_sanpham ,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham  DESC LIMIT $start, $limit";
        $result_lietke_sp_2 = mysqli_query($connect, $sql_lietke_sp_2);
        //Hiển thị

        // PHẦN HIỂN THỊ PHÂN TRANG
    ?>

<link rel="stylesheet" href="./styles/ProductStyles.css">
<!-- Button trigger modal -->
<div class="text-left">
    <button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus"></i>
        Thêm sản phẩm
    </button>
</div>

<div class="container p-0 pb-4">
    <table>
        <legend class="text-center"><b>Quản lý sản phẩm</b></legend>

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
            while ($row = mysqli_fetch_array($result_lietke_sp_2)) {
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
                    <img src="pages/Product/ProductImages/<?php echo $row['hinhanh'] ?> " width="100%">
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
                    <a href="?action=product&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>"><i
                            class="fa-solid fa-pencil"></i></a>
                    <a href="pages/Product/ProductLogic?idsanpham=<?php echo $row['id_sanpham'] ?>"><i
                            class="fa-solid fa-trash mr-1"></i></a>
                </td>
            </tr>

            <?php
            }
            ?>
        </tbody>

    </table>

     <!-- Pagination table -->
     <form action="">
     <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <?php
                    if ($current_page > 1 && $total_page > 1){
                        echo '<a class="page-link" aria-label="Previous" href="?page='.($current_page-1).'">
                        <s name="page"pan aria-hidden="true">&laquo;</s>
                        </a>';
                    }
                ?>
            </li>

            <?php
                for ($i = 1; $i <= $total_page; $i++){
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page){
                        echo '<li class="page-item">
                        <span name="page" class="page-link active" href="?page='.($i).'"> '.($i).' </span>
                        </li>';
                    }
                    else{
                        echo '<li class="page-item">
                        <a name="page" class="page-link" href="?page='.($i).'"> '.($i).' </a>
                        </li>';
                    }
                }
            ?>

            <?php
                if ($current_page < $total_page && $total_page > 1){
                    echo '<li class="page-item">
                    <a name="page" class="page-link" aria-label="Next" href="?page='.($current_page+1).'">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>';
                }
            ?>
        </ul>
    </nav>
     </form>
</div>