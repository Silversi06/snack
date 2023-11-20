<?php
include('db_conn.php');

$id = $_POST['userId'];
$pw = $_POST['userPw'];
$name = $_POST['userName'];

$sql =  ("insert into snackuser (user_id, user_pw, user_name) values ('$id', '$pw', '$name')");
$result = mysqli_query($conn, $sql); 

if ($result) {
    echo '<script>alert("회원가입 완료"); window.location.href = "index.html";</script>';
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}

?>