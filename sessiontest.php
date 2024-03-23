<?php
session_start();

// user infos
$allowed_username = "testnick";
$allowed_password = "testpass";

// check login or not
if(isset($_SESSION['username']) && $_SESSION['username'] === $allowed_username) {
    // authorized user can retrieve JSON data
    header("Content-Type: application/json; charset=UTF-8");

    // create JSON data
    $data = array(
        "message" => "Bu veri sadece yetkilendirilmiş kullanıcılar tarafından görülebilir.",
        "username" => $_SESSION['username']
    );

    // convert array to JSON format and print to screen
    echo json_encode($data);
} 
else {
    // if user not login show error
    http_response_code(403); // Erişim reddedildi
    echo json_encode(array("error" => "Authorization error: Invalid login."));
}

?>
