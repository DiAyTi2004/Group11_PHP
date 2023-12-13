<?php
include "../../../common/config/Connect.php";

if (isset($_POST['changeInfor'])) {
    $fullName = $_POST["fullName"];
    $phone = $_POST["phone"];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $birthDate = $_POST["birthDate"];
    $gender = $_POST["gender"];
    $userId = $_GET["userId"];

    // Update user information in the database
    $updateUserSql = "UPDATE tbl_user 
                      SET fullname = '$fullName', 
                          phonenumber = '$phone', 
                          address = '$address', 
                          birthDate = '$birthDate', 
                          gender = '$gender'
                      WHERE id = '$userId'";

    $updateUserSql_query = mysqli_query($connect, $updateUserSql);

    header('Location:../../userCommon/UserIndex.php?usingPage=account');
}
?>
