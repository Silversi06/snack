<?php
include('db_conn.php');

// 삭제할 스낵의 ID를 가져옴
$id = $_GET['id'];

// 삭제할 스낵의 현재 정보를 가져옴
$sql = "SELECT * FROM snack WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// 현재 정보를 변수에 저장
$name = $row['name'];
$price = $row['price'];
$description = $row['description'];
$img = $row['img'];

// 폼이 제출되면 삭제를 수행
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 삭제 쿼리 실행
    $deleteSql = "DELETE FROM snack WHERE id = $id";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
        echo "스낵이 성공적으로 삭제되었습니다.";
    } else {
        echo "삭제 중 오류가 발생했습니다: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>스낵 삭제</title>
</head>
<body>
    <h2>스낵 삭제</h2>
    <p>다음 스낵을 삭제하시겠습니까?</p>
    <ul>
        <li><strong>이름:</strong> <?php echo $name; ?></li>
        <li><strong>가격:</strong> <?php echo $price; ?></li>
        <li><strong>설명:</strong> <?php echo $description; ?></li>
        <li><strong>이미지:</strong> <img src="<?php echo $img; ?>" alt="스낵 이미지"></li>
    </ul>

    <form action="" method="POST">
        <input type="submit" value="삭제">
    </form>

    <div>
        <a href="index.html">돌아가기</a>
    </div>
</body>
</html>
