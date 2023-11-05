<?php
$sql_lietke_nguoidung = "SELECT * FROM tbl_dangky ORDER BY id_khachhang DESC";
$result_lietke_nguoidung = mysqli_query($connect, $sql_lietke_nguoidung);
?>

<!-- PHP logic paganition pages -->
<?php
// Tìm tổng số bản ghi
$total_records = mysqli_num_rows($result_lietke_nguoidung);
//Tìm limit và current_page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
$i = 0;
$stt = $i + ($current_page - 1) * $limit;
//Tính toán total_page và start
// tổng số trang
$total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;

// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
$sql_lietke_nguoidung_2 = "SELECT * FROM tbl_dangky
                    ORDER BY id_sanpham  
                    DESC 
                    LIMIT $start, $limit";
$result_lietke_nguoidung_2= mysqli_query($connect, $sql_lietke_nguoidung_2);
//Hiển thị

// PHẦN HIỂN THỊ PHÂN TRANG
?>

<link rel="stylesheet" href="./styles/UserStyles.css">
<!-- Button trigger modal and search btn -->
<div class="text-left flex justify-between">
    <button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus"></i>
        Thêm người dùng
    </button>


    <div class="input-group mb-3 align-center mt-3 w-40">
        <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" name="search" id="search-input" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" id="search-button" onclick="performSearch()" name="ok">
            <i class="fa-solid fa-magnifying-glass"></i>
            Search
        </button>
    </div>
    <?php
    $search = ''; // Initialize the search variable

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
    }

    ?>

    <script>
        function performSearch() {
            var searchValue = document.getElementById('search-input').value;
            var limit = <?php echo $limit; ?>;
            var page = <?php echo $current_page; ?>;
            var url = '?workingPage=user'; // Thay 'your_current_page.php' bằng tên trang hiện tại của bạn
            // echo '<a href="?workingPage=product&limit='.($limit).'&page=' . ($current_page - 1) . '">
            if (searchValue.trim() !== '') {
                url += '&search=' + encodeURIComponent(searchValue) + '&limit=' + limit + '&page=' + page;

            } else {
                url += '&limit=' + limit + '&page=' + page;

            }
            <?php
            ?>
            window.location.href = url;
        }
    </script>
    <!-- Logic PHP search -->
    <?php
    // Câu truy vấn để tìm kiếm sản phẩm
    $query = "SELECT * FROM tbl_dangky 
        WHERE
            tbl_dangky.hovaten LIKE N'%$search%'
        ORDER BY tbl_dangky.id_khachhang DESC
        LIMIT $start, $limit";

    // Thực thi câu truy vấn
    $result_lietke_nguoidung= isset($_GET['search']) ? mysqli_query($connect, $query) : mysqli_query($connect, $sql_lietke_nguoidung);
    ?>

</div>

<div class="container p-0"  style="width: 100%;">
    <table  style="width: 100%;">
        <legend class="text-center"><b>Quản lý sản phẩm</b></legend>

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
            while ($row = mysqli_fetch_array($result_lietke_nguoidung)) {
                $i++;
                $stt++;
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

    <!-- Pagination table -->
    <form action="" method="GET">
        <nav class="row py-2" aria-label="Page navigation example">

            <div class="paganation-infor col py-2">
                <form action="" method="GET">
                    <label for="limitSelect">Rows per page:</label>
                    <select name="limit" id="limitSelect" onchange="updatePageAndLimit()">
                        <option value="5" <?php if ($limit == 5) echo 'selected'; ?>>5</option>
                        <option value="10" <?php if ($limit == 10) echo 'selected'; ?>>10</option>
                        <option value="15" <?php if ($limit == 15) echo 'selected'; ?>>15</option>
                    </select>
                </form>

                <script>
                    function updatePageAndLimit() {
                        const selectedLimit = document.getElementById("limitSelect").value;

                        // Tạo một URL mới với giá trị page và limit mới
                        const url = new URL(window.location.href);
                        url.searchParams.set("page", "1"); // Đặt page thành 1
                        url.searchParams.set("limit", selectedLimit);

                        // Chuyển hướng đến URL mới
                        window.location.href = url.toString();
                    }
                </script>

                <label class="mr-4">Showing
                    <?php
                    echo $stt . " of " . $total_records . " results";
                    ?>
                </label>
            </div>

            <ul class="m-0 pagination justify-content-end py-2 col">
                <li class="page-item">
                    <?php
                    if ($current_page > 1 && $total_page > 1) {
                        echo '<a class="page-link text-reset text-black" aria-label="Previous" href="?workingPage=product&limit=' . ($limit) . '&page=' . ($current_page - 1) . '">
                        Previous
                        </a>';
                    }
                    ?>
                </li>

                <?php
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<li class="page-item light">
                        <span name="page" class="page-link text-reset text-white bg-dark" href="?workingPage=product&limit=' . ($limit) . '&page=' . ($i) . '"> ' . ($i) . ' </span>
                        </li>';
                    } else {
                        echo '<li class="page-item light">
                        <a name="page" class="page-link text-reset text-black" href="?workingPage=product&limit=' . ($limit) . '&page=' . ($i) . '"> ' . ($i) . ' </a>
                        </li>';
                    }
                }
                ?>

                <?php
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li class="page-item light">
                    <a name="page" class="page-link text-reset text-black" aria-label="Next" href="?workingPage=product&limit=' . ($limit) . '&page=' . ($current_page + 1) . '">
                    Next
                    </a>
                    </li>';
                }
                ?>
            </ul>
    </form>
    </nav>
</div>