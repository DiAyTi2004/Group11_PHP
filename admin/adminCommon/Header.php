<header>
    <div class="px-3 bg-dark text-white">
        <div class="container px-0">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center my-lg-0 me-lg-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <?php
                $workingPage = '';
                $query = '';

                if (isset($_GET['workingPage'])) {
                    $workingPage = $_GET['workingPage'];
                }

                if (isset($_GET['query'])) {
                    $query = $_GET['query'];
                }

                ?>

                <?php
                function getHeaderTextColor($currentPage)
                {
                    if ($currentPage == $GLOBALS['workingPage']) echo 'text-secondary';
                    else echo 'text-white';
                }
                ?>

                <ul class="nav my-1 col-12 col-lg-auto justify-content-center my-md-0 text-small flex-middle align-items-center">
                    <li class="flex-center">
                        <a href="AdminIndex.php" class="nav-link <?php getHeaderTextColor(''); ?> flex-column flex-center">
                            <i class="fa-solid fa-house text-white mb-2 "></i>
                            Home
                        </a>
                    </li>
                    <li class="flex-center">
                        <a href="AdminIndex.php?workingPage=order" class="nav-link <?php getHeaderTextColor('order'); ?> flex-column flex-center">
                            <i class="fa-solid fa-gauge-high text-white mb-2"></i>
                            Đơn hàng
                        </a>
                    </li>
                    <li class="flex-center">
                        <a href="AdminIndex.php?workingPage=product" class="nav-link <?php getHeaderTextColor('product'); ?> flex-column flex-center">
                            <i class="fa-solid fa-table text-white mb-2"></i>
                            Sản phẩm
                        </a>
                    </li>
                    <li class="flex-center">
                        <a href="AdminIndex.php?workingPage=category" class="nav-link <?php getHeaderTextColor('category'); ?> flex-column flex-center">
                            <i class="fa-solid fa-sitemap text-white mb-2"></i>
                            Danh mục
                        </a>
                    </li>
                    <li class="flex-center">
                        <a href="AdminIndex.php?workingPage=event" class="nav-link <?php getHeaderTextColor('event'); ?> flex-column flex-center">
                            <i class="fa-solid fa-sitemap text-white mb-2"></i>
                            Sự kiện
                        </a>
                    </li>
                    <li class="flex-center">
                        <a href="AdminIndex.php?workingPage=user" class="nav-link <?php getHeaderTextColor('user'); ?> flex-column flex-center">
                            <i class="fa-solid fa-users-gear text-white mb-2"></i>
                            Người dùng
                        </a>
                    </li>
                    <li class="flex-center">
                        <a href="AdminIndex.php?dangxuat=1" class="pr-0 nav-link text-white flex-column flex-center">
                            <div class="text-end">
                                <?php
                                if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
                                    unset($_SESSION['dangnhap']);
                                    header('Location: ./adminCommon/Login.php');
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