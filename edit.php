<?php
include('db_conn.php');

$id = $_GET['id'];
$sql = "SELECT * FROM snack WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name = $row['name'];
$price = $row['price'];
$description = $row['description'];
$img = $row['img'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>이미지 수정 및 삭제</title>
</head>
<body>
    <div class="box">
        <img src="<?php echo $img?>">
        <div class="linkBox">
            <div>
                <a href="modify.php?id=<?php echo $id; ?>">수정</a>
            </div>
            <div>
                <a href="delete.php?id=<?php echo $id; ?>">삭제</a>
            </div>
        </div>
    </div>
</body>
</html>
