<?php

//Google Code
require_once('../../common/google/libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '580658770293-huo1e7l6pq267vhd73cqljki6ja94t8m.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'http://localhost/Group11_PHP/user/userCommon/UserLoginSignUp.php';

//incase of logout request, just unset the session var
//if (isset($_GET['logout'])) {
//    unset($_SESSION['access_token']);
//}

/* * **********************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 * ********************************************** */
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");
$authUrl = $client->createAuthUrl();

/* * **********************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 * ********************************************** */
$service = new Google_Service_Oauth2($client);
// $googleUser = $service->userinfo->get(); //get user info 

/* * **********************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
 */

if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();

    $googleAccount = $service->userinfo->get();
    var_dump($googleAccount);
    $email =  $googleAccount->email;
    $fullName =  $googleAccount->givenName;
    $userImage =  $googleAccount->picture;
    $username =  $googleAccount->givenName;

    //set session for google user
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['userId'] = $username;
    $_SESSION['userImage'] = $userImage;

    /**
     * CHECK EMAIL AND NAME IN DATABASE
     */
    $findLoginUserSQL = "SELECT * FROM tbl_user WHERE email = '$email' ";
    $row = mysqli_query($connect, $findLoginUserSQL);
    $count = mysqli_num_rows($row);

    if ($count > 0) {
        //if user had been recorded in database, update info for user
        $userData = mysqli_fetch_array($row);
        $_SESSION['userId'] = $userData['id'];

        $updateInfoSQL = "UPDATE tbl_user 
        SET 
        fullname='" . $fullName . "',
        user_image='" . $userImage . "', 
        username='" . $username . "'
        WHERE email= '$email'";
        mysqli_query($connect, $updateInfoSQL);
    } else {
        //if user hadn't been recorded in database, insert new user
        $userId = generateUuid();
        $userCode = generateCode();
        //add user into database
        $addGoogleUserSQL = "INSERT INTO tbl_user(id, code, user_image, fullname, username, email) 
         VALUES ('" . $userId . "','" . $userCode . "','" . $userImage . "','" . $fullName . "','" . $username . "','" . $email . "')";

        mysqli_query($connect, $addGoogleUserSQL);
    }

    //handle for user cart
    $getUserCartSQL = "SELECT * FROM tbl_cart WHERE user_id = '$_SESSION[userId]'";

    $queryCart = mysqli_query($connect, $getUserCartSQL);
    $numsOfCart = mysqli_num_rows($queryCart);
    if ($numsOfCart > 0) {
        $numsOfCart = mysqli_fetch_array($queryCart);
        setcookie('cartId', $numsOfCart['cart_id'], time() + (365 * 24 * 60 * 60), '/');
    } else {
        $userCartId = '';

        if (isset($_COOKIE['cartId'])) {
            // Cookie exists
            $userCartId = $_COOKIE['cartId'];
        } else {
            // Cookie does not exist
            $userCartId = generateUuid();
        }

        setcookie('cartId', $userCartId, time() + (365 * 24 * 60 * 60), '/');

        $createCartSQL = "INSERT INTO tbl_cart(user_id, cart_id) 
                VALUES ('" . $_SESSION['userId'] . "','" . $userCartId . "')";
        mysqli_query($connect, $createCartSQL);
    }

    // header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    header('location: ./UserIndex.php');
    exit;
}

/* * **********************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 * ********************************************** */
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else {
    $authUrl = $client->createAuthUrl();
}
if ($client->isAccessTokenExpired()) {
    $authUrl = $client->createAuthUrl();
    //            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}

//End Google Code
