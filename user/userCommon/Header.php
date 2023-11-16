<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($connect, $sql_danhmuc);

$keyword = "";
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
}

if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == "true") {
    unset($_SESSION['signup']);
}

$usingPage = "";

if (isset($_GET['usingPage'])) {
    $usingPage = $_GET['usingPage'];
}
?>

<header class="header w-100">
    <div class="container flex">
        <a href="UserIndex.php">
            <img class="header__logo" style="height:70px; scale: 1.2;" src="./images/logo.svg" alt="logo">
        </a>

        <div class="flex-center justify-between py-2 w-100">
            <div class="header__logo__wrapper">
            </div>

            <div class="search__input__wrapper h-100 flex-center flex-grow-1">
                <div class="category__section pr-4 h-100">
                    <div class="category__button h-100 flex-center">
                        <i class="fa-solid fa-bars"></i>
                        <p class="m-0 px-2">
                            Danh mục
                        </p>
                        <i class="fa-solid fa-sort-down pb-1"></i>

                        <div class="sub__category br-10 over-hidden">
                            <ul class="m-0 p-0 w-100">
                                <?php
                                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                ?>
                                    <li class="sub__category__item w-100">
                                        <a href="UserIndex.php?usingPage=category&id=<?php echo $row_danhmuc['id_danhmuc'] ?>" class="w-100 p-2 py-3">
                                            <?php echo $row_danhmuc['tendanhmuc'] ?>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="search__section bg-white br-10 over-hidden px-1 flex-center">
                    <form method="POST" action="UserIndex.php?usingPage=search">
                        <input class="p-2" type="text" placeholder="Tìm kiếm nhanh sản phẩm...?" name="keyword" value="<?php echo $keyword; ?>" />
                        <button type="submit" class="br-10 py-1 px-3 flex-grow-1" name="search" value="Tìm Kiếm">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="cart__wrapper flex-center">
                <div class="cart__section">
                    <a class="header__btn br-10 p-2 py-1 over-hidden" href="UserIndex.php?usingPage=cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
                <?php
                if (isset($_SESSION['signup'])) {
                ?>
                    <div class="user__section">
                        <a class="header__btn br-10 p-2 py-1 over-hidden" href="UserIndex.php?usingPage=thongtin">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>

                    </div>

                    <div class="user__section">
                        <a class="header__btn br-10 p-2 py-1 over-hidden" href="UserIndex.php?dangxuat=true">
                            <i class="fa-solid fa-right-to-bracket">

                            </i>
                        </a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="user__section">
                        <a class="header__btn br-10 p-2 py-1 over-hidden" href="UserLogin.php">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </a>
                    </div>

                    <div class="user__section">
                        <a class="header__btn br-10 p-2 py-1 over-hidden" href="UserSignUp.php">
                            <i class="fa-solid fa-user-plus"></i>
                        </a>
                    </div>

                    <div class="user__section">
                        <a class="header__btn br-10 p-2 py-1 over-hidden" href="UserLoginSignUp.php">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</header>