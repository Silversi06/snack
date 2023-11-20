<?php
include('db_conn.php');

// 수정할 스낵의 ID를 가져옴
$id = $_GET['id'];

// 수정할 스낵의 현재 정보를 가져옴
$sql = "SELECT * FROM snack WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// 현재 정보를 변수에 저장
$name = $row['name'];
$price = $row['price'];
$description = $row['description'];
$img = $row['img'];

// 폼이 제출되면 업데이트를 수행
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['new_name'];
    $newPrice = $_POST['new_price'];
    $newDescription = $_POST['new_description'];

    // 업데이트 쿼리 실행
    $updateSql = "UPDATE snack SET name = '$newName', price = '$newPrice', description = '$newDescription' WHERE id = $id";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        echo "스낵이 성공적으로 업데이트되었습니다.";
    } else {
        echo "업데이트 중 오류가 발생했습니다: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>스낵 수정</title>
</head>
<body>
    <h2>스낵 수정</h2>
    <form action="" method="POST">
        <label for="new_name">새로운 이름:</label>
        <input type="text" name="new_name" value="<?php echo $name; ?>" required><br>

        <label for="new_price">새로운 가격:</label>
        <input type="text" name="new_price" value="<?php echo $price; ?>" required><br>

        <label for="new_description">새로운 설명:</label>
        <textarea name="new_description" required><?php echo $description; ?></textarea><br>

        <input type="submit" value="업데이트">
    </form>

    <div>
        <a href="snack.php?id=<?php echo $id; ?>">돌아가기</a>
    </div>
</body>
</html>
