<link rel="stylesheet" href="./styles/ProductStyles.css">

<?php
$countAllSql = "SELECT * FROM tbl_sanpham;";
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

$getTableDataSql = "";

if (isset($_GET['search'])) {
    $getTableDataSql = "SELECT * FROM tbl_sanpham 
    INNER JOIN tbl_danhmuc ON tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
    WHERE
        tbl_sanpham.tensanpham LIKE N'%$search%'
        OR tbl_sanpham.masanpham LIKE N'%$search%'
        OR tbl_danhmuc.tendanhmuc LIKE N'%$search'
    ORDER BY tbl_sanpham.id_sanpham DESC
    LIMIT $start, $pageSize";
} else {
    $getTableDataSql = "SELECT * FROM tbl_sanpham ,tbl_danhmuc 
    WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
    ORDER BY id_sanpham  
    DESC 
    LIMIT $start, $pageSize";
}

$tableData = mysqli_query($connect, $getTableDataSql);
?>

<div class="text-left flex justify-between">
    <button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus"></i>
        Thêm sản phẩm
    </button>


    <div class="input-group mb-3 align-center mt-3 w-40">
        <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" name="search" id="search-input" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" id="search-button" onclick="performSearch()" name="ok">
            <i class="fa-solid fa-magnifying-glass"></i>
            Search
        </button>
    </div>

    <?php
    $search = '';

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
    }

    ?>

</div>

<div class="container p-0">
    <table>
        <legend class="text-center"><b>Quản lý sản phẩm</b></legend>

        <thead class="table-head w-100">
            <tr class="table-heading">
                <th class="noWrap">STT</th>
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
            $displayOrder = 0;
            while ($row = mysqli_fetch_array($tableData)) {
                $displayOrder++;
            ?>
                <tr>
                    <td>
                        <?php echo  $displayOrder + ($pageIndex - 1) * $pageSize; ?>
                    </td>
                    <td class="tensanpham">
                        <?php echo $row['tensanpham'] ?>
                    </td>

                    <td class="hinhanh">
                        <img src="pages/Product/ProductImages/<?php echo $row['hinhanh'] ?> " width="100%">
                    </td>

                    <td class="giasanpham">
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
                        <button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#editPopup_<?php echo $row['id_sanpham']; ?>">
                            <i class="fa-solid fa-pencil"></i>
                        </button>

                        <button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#confirmPopup_<?php echo $row['id_sanpham']; ?>">
                            <i class="fa-solid fa-trash mr-1"></i>
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>

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
                    <a name="page" class="page-link text-reset text-black" aria-label="Next" href="?workingPage=product&limit=' . ($pageSize) . '&page=' . ($pageIndex + 1) . '">
                    Next
                    </a>
                    </li>';
                }
                ?>
            </ul>
    </form>
    </nav>
</div>

<!-- pre display all edit popup -->
<?php
$tableData = mysqli_query($connect, $getTableDataSql);

while ($row = mysqli_fetch_array($tableData)) {
    include "./pages/Product/EditProductPopup.php";
}
?>

<!-- pre display all confirm delete popup -->
<?php
$tableData = mysqli_query($connect, $getTableDataSql);

while ($row = mysqli_fetch_array($tableData)) {
    include "./pages/Product/ProductConfirmDeletePopup.php";
}
?>

<script>
    function performSearch() {
        var searchValue = document.getElementById('search-input').value;
        var limit = <?php echo $pageSize; ?>;
        var page = <?php echo $pageIndex; ?>;
        var url = '?workingPage=product';
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