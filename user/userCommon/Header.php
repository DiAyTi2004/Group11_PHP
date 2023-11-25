<?php
$queryCategorySQL = "SELECT * FROM tbl_category";
$categoryData = mysqli_query($connect, $queryCategorySQL);

$keyword = "";
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
}

if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == "true") {
    unset($_SESSION['userId']);
    if (isset($_SESSION['userImage'])) unset($_SESSION['userId']);
}

$usingPage = "";

if (isset($_GET['usingPage'])) {
    $usingPage = $_GET['usingPage'];
}

$imageLink = "";
if (isset($_SESSION['userImage'])) {
    if (str_contains($_SESSION['userImage'], "http")) {
        $imageLink = $_SESSION['userImage'];
    } else {
        $imageLink = "../../admin/pages/User/UserImages/" . $_SESSION['userImage'];
    }
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

                        <div class="sub__category br-10">
                            <ul class="m-0 p-0 w-100">
                                <?php
                                while ($rowData = mysqli_fetch_array($categoryData)) {
                                ?>
                                    <li class="sub__category__item w-100">
                                        <a href="UserIndex.php?usingPage=category&categoryId=<?php echo $rowData['id'] ?>" class="w-100 p-2 py-3">
                                            <img class="mr-8" src="./../../admin/pages/Category/CategoryImages/<?php echo $rowData['category_image'] ?>" alt="" style="width: 35px; height: 35px;">
                                            <?php echo $rowData['name'] ?>
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
                <?php
                if (isset($_SESSION['userId'])) {
                ?>
                    <div class="user__section">

                        <div class="display-block header__btn br-10 p-2 py-1 flex align-center userAction">
                            <?php
                            if (trim($_SESSION['userImage']) == "") {
                                echo '<i class="fa-solid fa-circle-user"></i>';
                            } else {
                                echo '<img class="userLogoImage mr-1" src=' . $imageLink . ' alt="UserImg">';
                            }
                            ?>
                            <span>
                                <?php echo $_SESSION['username']; ?>
                            </span>

                            <div class="subUserAction br-10 over-hidden">
                                <ul class="m-0 p-0 w-100">
                                    <li class="sub__category__item w-100">
                                        <a href="UserIndex.php?usingPage=account" class="w-100 p-2 py-3">
                                            <i class="fa-solid fa-circle-user mr-2 ml-0"></i>
                                            Thông tin cá nhân
                                        </a>
                                    </li>
                                    <li class="sub__category__item w-100">
                                        <a href="UserIndex.php?usingPage=cart" class="w-100 p-2 py-3">
                                            <i class="fa-solid fa-cart-shopping mr-2 ml-0"></i>
                                            Giỏ hàng
                                        </a>
                                    </li>
                                    <li class="sub__category__item w-100">
                                        <a href="UserIndex.php?dangxuat=true" class="w-100 p-2 py-3">
                                            <i class="fa-solid fa-sign-out mr-2 ml-0"></i>
                                            Đăng xuất
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                <?php
                } else {
                ?>
                    <div class="user__section">
                        <a class="header__btn br-10 p-2 py-1 over-hidden" href="UserIndex.php?usingPage=cart">
                            <i class="fa-solid fa-cart-shopping"></i>
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

<script>
    const userActionElement = document.querySelector('.userAction');
    userActionElement.onclick = function() {
        window.location.assign("UserIndex.php?usingPage=account");
    }
    // userActionElement.setAttribute('href', "UserIndex.php?usingPage=account");
</script>