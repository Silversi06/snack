<?php
$conn=mysqli_connect('localhost','test','1111','testdb');
$uploads_dir="./uploads/"; //uploads란 폴더를 uploads_dir에 대입

$f_name=$_FILES["userfile" ]["name"];
$f_type=$_FILES["userfile" ]["type"];
$f_size=$_FILES["userfile" ]["size"];
$f_tmp_name=$_FILES["userfile" ]["tmp_name"];

echo "name:".$f_name."<br/>";
echo "type:".$f_type."<br/>";
echo "size:".$f_size."<br/>";
echo "tmp_name:".$f_tmp_name."<br/>";

if(!is_dir($uploads_dir)) {//uploads폴더가 없으면
      mkdir($uploads_dir);
}

$upload_file=$uploads_dir.basename($_FILES["userfile"]["name"]);
echo $upload_file;
 
if(move_uploaded_file($f_tmp_name, $upload_file)) {
    echo "Success!!";
}
else {
    echo "Failed!!";
}

$sql="insert into image2(fname,fsize,fpath,ftpm_name) values ('$f_name',$f_size,'$upload_file','$f_tmp_name')";
//3. query 함수 실행
mysqli_query($conn,$sql);
echo "<script>alert('image Path Saved!!!')</script>";


?>

<a href="show.php">이미지 보여주기</a>