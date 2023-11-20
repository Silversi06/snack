<?php
include('db_conn.php');
$id = $_POST['userId'];
$pw = $_POST['userPw'];

$sql = "SELECT * FROM snackuser WHERE user_id = '$id' AND user_pw = '$pw'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $re_name = $row['user_name'];
        
        echo '<script>
            localStorage.setItem("snack_name", "' . $re_name . '");
        </script>';

        echo '<script>
            var storedName = localStorage.getItem("snack_name");
            alert(storedName + "님 반갑습니다!");
            window.location.href = "index.html";
        </script>';
        exit;
    } else {
        echo '<script>alert("사용자를 찾을 수 없습니다.");
        window.location.href = "login.html";
        </script>';
        exit;
    }
} else {
    echo '<script>alert("로그인 오류: ' . mysqli_error($conn) . '");</script>';
}

mysqli_close($conn);
?>