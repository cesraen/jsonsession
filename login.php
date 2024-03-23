<?php
session_start();

// user infos
$allowed_username = "testnick";
$allowed_password = "testpass";

// when came session login post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get nickname and password from post
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    // check nickname and password
    if ($input_username === $allowed_username && $input_password === $allowed_password) {
        // start sessiond and save username
        $_SESSION["username"] = $input_username;

        // locate main page
        header("Location: success.php");
        exit;
    } else {
        // generate error message in case of incorrect login
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Nickname:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
