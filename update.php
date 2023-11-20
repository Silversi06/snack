<?php
    include ('./db_conn.php');

    $name = $_POST['txt'];
    $price = $_POST['price'];
    $idx=$_POST['idx'];

    $upload_dir = "./uploads/";
    $upload_file = $upload_dir.basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $upload_file);
    $img = $upload_file;


    $sql="update snack set name='$name', price='$price', img='$img' where id=$idx";
    $result=mysqli_query($conn,$sql);

    echo "<script>alert('수정되었습니다')</script>";

    mysqli_close($conn);
?>

<meta http-equiv="refresh" content="0;url=list.php">