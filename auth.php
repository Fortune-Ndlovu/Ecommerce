<?php
// start a new session
session_start();

//assign form values to variables
$username = $_POST["user"];
$password = $_POST["pass"];

/* If the login form is successfull access the session data*/
/* else provide a link back to form*/
if (auth($username, $password)) {
    echo "Login successful";
    $_SESSION["user"] = $username;
    $_SESSION["pass"] = $password;

    header("Location:index.php");
} else {
    echo 'Login failed<br />';
    echo "<a href='loginForm.php'>Back to form</a>";
}

// Ensuring the inputed intripted password matches the incripted password from the database.
function auth($u, $p) {
    include "conn.php";
    $p = sha1($p);
    $res = $pdo->prepare(
        "SELECT id FROM users WHERE username = :user
        AND password = :pass");

        $res->execute(['user' => $u, 'pass' => $p]);

        $id = $res->fetch();

        if ($id > 0){
            return true;
        } else {
            return false;
        }
}

?>