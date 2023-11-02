<!-- <?php
        $sql_lietke_event = "SELECT * FROM tbl_event ORDER BY id DESC";
        $result_lietke_event = mysqli_query($connect, $sql_lietke_event);
        ?> -->

<!-- PHP logic paganition pages -->
<?php
// Tìm tổng số bản ghi
$total_records = mysqli_num_rows($result_lietke_event);
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
if ($start < 0) {
    $start = 0;
}

// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
$sql_lietke_event_2 = "SELECT * FROM tbl_event
                    ORDER BY id 
                    DESC 
                    LIMIT $start, $limit";
$result_lietke_event_2 = mysqli_query($connect, $sql_lietke_event_2);
//Hiển thị

// PHẦN HIỂN THỊ PHÂN TRANG
?>

<link rel="stylesheet" href="./styles/EventStyles.css">
<!-- Button trigger modal and search btn -->
<div class="text-left flex justify-between">
    <button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus"></i>
        Thêm sự kiện
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
            var url = '?workingPage=event'; // Thay 'your_current_page.php' bằng tên trang hiện tại của bạn
            // echo '<a href="?workingPage=event&limit='.($limit).'&page=' . ($current_page - 1) . '">
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
    // Câu truy vấn để tìm kiếm sự kiện
    $query = "SELECT * FROM tbl_event
        WHERE tbl_event.start_date LIKE N'%$search%'
        ORDER BY tbl_event.end_date DESC
        LIMIT $start, $limit";

    // Thực thi câu truy vấn
    $result_lietke_event_2 = isset($_GET['search']) ? mysqli_query($connect, $query) : mysqli_query($connect, $sql_lietke_event_2);
    ?>

</div>

<div class="container p-0">
    <table class="table-container">
        <legend class="text-center"><b>Quản lý sự kiện</b></legend>
        <thead class="table-head w-100">
            <tr class="table-heading">
                <th class="noWrap">ID</th>
                <th class="noWrap">Ngày bắt đầu</th>
                <th class="noWrap">ngày kết thúc </th>
                <th class="noWrap">Giảm giá</th>
                <th class="noWrap">Banner</th>
                <th class="noWrap">Quản lý</th>
            </tr>
        </thead>

        <tbody class="table-body">
            <?php
            while ($row = mysqli_fetch_array($result_lietke_event_2)) {
                $i++;
                $stt++;
            ?>
                <tr>
                    <td>
                        <?php echo  $stt ?>
                    </td>
                    <td class="ngaybatdau">
                        <?php echo $row['start_date'] ?>
                    </td>
                    <td class="ngayketthuc">
                        <?php echo $row['end_date'] ?>
                    </td>
                    <td class="giamgia">
                        <?php echo number_format($row['discount'], 0, ',', '.') . 'VNĐ' ?>
                    </td>
                    <td class="banner">
                        <?php echo $row['banner'] ?>
                    </td>
                    <td>
                        <a href="?workingPage=event&query=sua&id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pencil"></i></a>
                        <a href="?workingPage=event&&query=themquery=sua&id=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash mr-1"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>

    <!-- Pagination table -->
    <form action="" method="GET">
        <nav class="row" aria-label="Page navigation example">

            <div class="paganation-infor col mt-4">
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
    </form>


    <ul class="pagination justify-content-end mt-4 col">
        <li class="page-item">
            <?php
            if ($current_page > 1 && $total_page > 1) {
                echo '<a class="page-link text-reset text-black" aria-label="Previous" href="?workingPage=event&limit=' . ($limit) . '&page=' . ($current_page - 1) . '">
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
                        <span name="page" class="page-link text-reset text-white bg-dark" href="?workingPage=event&limit=' . ($limit) . '&page=' . ($i) . '"> ' . ($i) . ' </span>
                        </li>';
            } else {
                echo '<li class="page-item light">
                        <a name="page" class="page-link text-reset text-black" href="?workingPage=event&limit=' . ($limit) . '&page=' . ($i) . '"> ' . ($i) . ' </a>
                        </li>';
            }
        }
        ?>

        <?php
        if ($current_page < $total_page && $total_page > 1) {
            echo '<li class="page-item light">
                    <a name="page" class="page-link text-reset text-black" aria-label="Next" href="?workingPage=event&limit=' . ($limit) . '&page=' . ($current_page + 1) . '">
                    Next
                    </a>
                    </li>';
        }
        ?>
    </ul>
    </nav>
</div>