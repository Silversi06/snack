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
    <title>Document</title>
</head>
<body>
    <div class="box">
        <img src="<?php echo $img?>" onclick="redirectToEditLinks()">
        <div class="contentBox">
            <div class="firstBox">
                <p class="description"><?php echo $description?></p>
                <div id="cntBtn">
                    <button id="minus">-</button>
                    <span id="cnt">1</span>
                    <button id="plus">+</button>
                    <span id="result"><?php echo $price?>원</span>
                </div>
            </div>
            <div calss="secondBox">
                <div class="sum">
                    <span id="sumText">합계</span>
                    <span id="sumResult"><?php echo $price?>원</span>
                </div>
            </div>
            <form action="bucket.php" method="POST">
                <input type="hidden" name="price" value="" id="priceInput">
                <input type="hidden" name="name" value="<?php echo $name?>">
                <input type="hidden" name="user_id" value="" id="id">

                <div class="thirdBox">
                    <input type="submit" id="bucket" value="장바구니">
                    <a href="no.html"><input type="submit" id="buy" value="바로구매"></a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const minus = document.getElementById('minus');
        const cnt = document.getElementById('cnt');
        const plus = document.getElementById('plus');
        const result = document.getElementById('result');
        const sumResult = document.getElementById('sumResult');
        const priceInput = document.getElementById('priceInput');
        const id = document.getElementById('id');

        id.value = localStorage.getItem('snack_name');

        let cntNum = 1;
        const price = parseFloat(result.textContent);

        priceInput.value = sumResult.textContent;

        plus.addEventListener('click', function () {
            cntNum++;
            cnt.textContent = cntNum;
            result.textContent = (cntNum * price).toString() + "원";
            sumResult.textContent = (cntNum * price).toString() + "원";
            priceInput.value = sumResult.textContent;
        });

        minus.addEventListener('click', function () {
            if (cntNum !== 1) {
                cntNum--;
                cnt.textContent = cntNum;
                result.textContent = (cntNum * price).toString() + "원";
                sumResult.textContent = (cntNum * price).toString() + "원";
                priceInput.value = sumResult.textContent;
            }
        });

        function redirectToEditLinks() {
            window.location.href = 'edit.php?id=<?php echo $id; ?>';
        }
    </script>
</body>
</html>
