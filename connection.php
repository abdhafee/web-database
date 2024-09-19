<?php
$servername="localhost:3306";
$username="root";
$password="";
$db_name="login_pg";

$conn = new mysqli($servername, $username, $password, $db_name);
if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

if(isset($_POST['login'])){

    $user_name = $_POST['user_name'];
    $psswd = $_POST['psswd'];

    $sql = "select * from login where User_Name = '$user_name' and Password = '$passwd'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($result->num_rows === 1) {
        header("Location: loginPage.php");
        exit(); // Ensure no further code is executed
    } else {
        echo '<script>
            alert("Login is Successful...");
            window.location.href = "admin.php";
            </script>';
    }
$conn->close();
}

?>
