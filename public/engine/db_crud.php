<?php

include "db_connect.php";

$action = $_POST['action'];
$id = (int)$_POST['id'];
$username = strip_tags($_POST['username']);
$comment = strip_tags($_POST['comment']);
$title = $_POST['title'];
$price = $_POST['price'];
$info = $_POST['info'];
$goodchar = $_POST['goodchar'];
$goodchar1 = $_POST['goodchar1'];
$goodchar2 = $_POST['goodchar2'];
$goodchar3 = $_POST['goodchar3'];
$iteminbox = $_POST['iteminbox'];
$palletesize = $_POST['palletesize'];
$boxinpallete = $_POST['boxinpallete'];
$iteminbox1 = $_POST['iteminbox1'];
$palletesize1 = $_POST['palletesize1'];
$boxinpallete1 = $_POST['boxinpallete1'];
$delivery = $_POST['delivery'];
$goodCount = $_POST['goodcount'];
//Создать условие, если пользователь авторизован, использовать АйДи из БД, если нет - АйДи сессии.
$userID = $_POST['userid'];

if ($action == "updatecount"){
    $getCount = "SELECT `count` FROM `goods` WHERE `id_good` = '$id'";
    $count = mysqli_query($connect, $getCount);
    $count++;
    $sql = "update goods set count = '$count' where id_good = '$id'";
    mysqli_query($connect, $sql);
}
elseif ($action == "addcomment"){
    $sql = "INSERT INTO `comments`(`id_good`, `username`, `comment`) VALUES ('$id','$username','$comment')";
    if (mysqli_query($connect, $sql)){
        header("Location: ../item.php?id={$id}");
    }
}
elseif ($action == "addgood"){
    $path = "../images/".$_FILES['photo']['name'];
    $pathSmall = "../images/small/".$_FILES['photo']['name'];
    $fileName = $_FILES['photo']['name'];
    $sqlPath = "images/".$fileName;
    $sqlPathSmall = "images/small/".$fileName;
    $sql = "INSERT INTO `goods`(`title`, `price`, `info`, `imgBig`, `imgSmall`, `goodchar`, `goodchar1`, `goodchar2`, `goodchar3`, `iteminbox`, `palletesize`, `boxinpallete`, `iteminbox1`, `palletesize1`, `boxinpallete1`, `delivery`) VALUES ('$title','$price','$info','$sqlPath', '$sqlPathSmall','$goodchar','$goodchar1','$goodchar2','$goodchar3','$iteminbox','$palletesize','$boxinpallete','$iteminbox1','$palletesize1','$boxinpallete1','$delivery')";
    if (mysqli_query($connect, $sql)){
        if( copy($_FILES['photo']['tmp_name'], $path) ){
            move_uploaded_file($_FILES['photo']['tmp_name'], $pathSmall);
            header("Location: ../?page=gallery");
        }
        else {
            echo "Have a problem.";
        }
    }
}
elseif ($action == "additem") {
    $sqlVision = "SELECT `good_count` FROM `basket` WHERE `id_user` = '$userID' AND `id_good` = '$id'";
    $resSqlVision = mysqli_query($connect,$sqlVision) or die("Error: ".mysqli_error($connect));
    if (mysqli_num_rows($resSqlVision) == 1) {
        $sqlupdate = "UPDATE `basket` SET `good_count`= '$goodCount' WHERE `id_user` = '$userID' AND `id_good` = '$id'";
        mysqli_query($connect, $sqlupdate);
        header("Location: ../?page=basket");
    }
    else{
        $sql = "INSERT INTO `basket`(`id_good`, `good_count`, `id_user`) VALUES ('$id','$goodCount','$userID')";
        if (mysqli_query($connect, $sql)){
            header("Location: ../?page=basket");
        }
//        echo "Have a problem";
    }
}
elseif ($action == "delitem"){
    $sql = "DELETE FROM `basket` WHERE `id_basket` = '$id'";
    if (mysqli_query($connect, $sql)){
        header("Location: ../?page=basket");
    }
}