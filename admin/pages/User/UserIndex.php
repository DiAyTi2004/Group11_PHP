<?php
$countAllSql = "SELECT * FROM tbl_dangky;";
$total_records = mysqli_num_rows(mysqli_query($connect, $countAllSql));
$pageIndex = isset($_GET['page']) ? $_GET['page'] : 1;
$pageSize = isset($_GET['limit']) ? $_GET['limit'] : 5;
$total_page = ceil($total_records / $pageSize);
if ($pageIndex > $total_page) {
    $pageIndex = $total_page;
} else if ($pageIndex < 1) {
    $pageIndex = 1;
}
$start = ($pageIndex - 1) * $pageSize;
$search = '';
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
}

$getTableDataSql = "";

if (isset($_GET['search'])) {
    $getTableDataSql = "SELECT * FROM tbl_dangky
    WHERE
        tbl_dangky.id_khachhang LIKE N'%" . $search . "%'
    ORDER BY tbl_dangky.id_khachhang DESC
    LIMIT $start, $pageSize";
} else {
    $getTableDataSql = "SELECT * FROM tbl_dangky
    ORDER BY id_khachhang  
    DESC 
    LIMIT $start, $pageSize";
}

$tableData = mysqli_query($connect, $getTableDataSql);
?>
<link rel="stylesheet" href="./styles/UserStyles.css">
<!-- Button trigger modal and search btn -->
<div class="text-left flex justify-between">
    <button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal_2">
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
            var limit = <?php echo $pageSize; ?>;
            var page = <?php echo $pageIndex; ?>;
            var url = '?workingPage=user'; // Thay 'pageIndex.php' bằng tên trang hiện tại của bạn
            // echo '<a href="?workingPage=product&limit='.($pageSize).'&page=' . ($pageIndex - 1) . '">
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
</div>

<div class="container p-0" style="width: 100%;">
    <table style="width: 100%;">
        <legend class="text-center"><b>Quản lý người dùng</b></legend>

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
            $displayOrder = 0;
            while ($row = mysqli_fetch_array($tableData)) {
                $displayOrder++;
            ?>
                <td style="height:100px;" class="noWrap"> <?php echo  $displayOrder + ($pageIndex - 1) * $pageSize; ?></td>
                <td class="noWrap"> <?php echo $row['hovaten'] ?></td>
                <td class="noWrap"> <?php echo $row['taikhoan'] ?></td>
                <td class="noWrap"> <?php echo $row['email'] ?></td>
                <td class="noWrap"> <?php echo $row['sodienthoai'] ?></td>
                <td class="noWrap" style="width:150px;"> <?php echo $row['diachi'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#editPopup_<?php echo $row['id_khachhang']; ?>">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <!-- <a href="?workingPage=user&query=edit&idnguoidung=<?php echo $row['id_khachhang'] ?>"> Sửa </a> -->
                </td>
                <td>
                    <button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#confirmPopup_<?php echo $row['id_khachhang']; ?>">
                        <i class="fa-solid fa-trash mr-1"></i>
                    </button>
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
                        <option value="5" <?php if ($pageSize == 5) echo 'selected'; ?>>5</option>
                        <option value="10" <?php if ($pageSize == 10) echo 'selected'; ?>>10</option>
                        <option value="15" <?php if ($pageSize == 15) echo 'selected'; ?>>15</option>
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
                    echo $pageSize . " of " . $total_records . " results";
                    ?>
                </label>
            </div>

            <ul class="m-0 pagination justify-content-end py-2 col">
                <li class="page-item">
                    <?php
                    if ($pageIndex > 1 && $total_page > 1) {
                        echo '<a class="page-link text-reset text-black" aria-label="Previous" href="?workingPage=product&limit=' . ($pageSize) . '&page=' . ($pageIndex - 1) . '">
                        Previous
                        </a>';
                    }
                    ?>
                </li>

                <?php
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $pageIndex) {
                        echo '<li class="page-item light">
                        <span name="page" class="page-link text-reset text-white bg-dark" href="?workingPage=product&limit=' . ($pageSize) . '&page=' . ($i) . '"> ' . ($i) . ' </span>
                        </li>';
                    } else {
                        echo '<li class="page-item light">
                        <a name="page" class="page-link text-reset text-black" href="?workingPage=product&limit=' . ($pageSize) . '&page=' . ($i) . '"> ' . ($i) . ' </a>
                        </li>';
                    }
                }
                ?>

                <?php
                if ($pageIndex < $total_page && $total_page > 1) {
                    echo '<li class="page-item light">
                    <a name="page" class="page-link text-reset text-black" href="?workingPage=product&limit=' . ($pageSize) . '&page=' . ($i) . '"> ' . ($i) . ' </a>
                    </li>';
                }
                ?>
            </ul>
    </form>
    </nav>
</div>
<?php
$tableData = mysqli_query($connect, $getTableDataSql);
while ($row = mysqli_fetch_array($tableData)) {
    include "./pages/User/EditUserPopup.php";
}
?>
<?php
$tableData = mysqli_query($connect, $getTableDataSql);
while ($row = mysqli_fetch_array($tableData)) {
    include "./pages/User/UserConfirmDeletePopup.php";
}
?>