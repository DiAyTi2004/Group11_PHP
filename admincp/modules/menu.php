<link rel="stylesheet" href="css/style_menu.css">
<header>
    <div class="px-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="index.php" class="nav-link text-secondary flex-column flex-center">
                            <i class="fa-solid fa-house text-white mb-2 "></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=quanlydonhang&query=them" class="nav-link text-white flex-column flex-center">
                            <i class="fa-solid fa-gauge-high text-white mb-2"></i>
                            Đơn hàng
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=quanlysanpham&query=them" class="nav-link text-white flex-column flex-center">
                            <i class="fa-solid fa-table text-white mb-2"></i>
                            Sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=quanlydanhmucsanpham&query=them" class="nav-link text-white flex-column flex-center">
                            <i class="fa-solid fa-sitemap text-white mb-2"></i>
                            Danh mục
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=quanlynguoidung&query=them" class="nav-link text-white flex-column flex-center">
                            <i class="fa-solid fa-users-gear text-white mb-2"></i>
                            Người dùng
                        </a>
                    </li>
                    <li>
                        <a href="index.php?dangxuat=1" class="nav-link text-white flex-column flex-center">
                            <div class="text-end">
                                <?php
                                if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
                                    unset($_SESSION['dangnhap']);
                                    header('Location:login.php');
                                }
                                ?>
                                <button type="button" class="btn btn-primary">
                                    <i class="fa-solid fa-right-from-bracket mr-1"></i>
                                    Đăng xuất
                                    <?php if (isset($_SESSION['dangnhap'])) {
                                        echo $_SESSION['dangnhap'];
                                    }
                                    ?>
                                </button>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>