<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
   
}

$select_contents = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
$select_contents->execute([$tutor_id]);
$total_contents = $select_contents->rowCount();

$select_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
$select_playlists->execute([$tutor_id]);
$total_playlists = $select_playlists->rowCount();

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE tutor_id = ?");
$select_likes->execute([$tutor_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE tutor_id = ?");
$select_comments->execute([$tutor_id]);
$total_comments = $select_comments->rowCount();


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<!-- Profile section statrs -->
<section class="profile">
    <h1 class="heading">profile details</h1>
    <div class="details">
        <div class="tutor">
            <img src="../uploaded_files/<?= $fetch_profile['image'];?>" alt="">
            <h3><?= $fetch_profile['name']; ?></h3>
            <span><?= $fetch_profile['profession']; ?></span>
            <a href="update.php" class="inline-btn">update profile</a>
        </div>
        

        <div class="box-container">

        <div class="box">
            <h3><?= $total_contents ?></h3>
            <p>total contents</p>
            <a href="contents.php" class="btn">view contents</a>
        </div>

        <div class="box">
            <h3><?= $total_playlists ?></h3>
            <p>total playlists</p>
            <a href="playlists.php" class="btn">view playlists</a>
        </div>

        <div class="box">
            <h3><?= $total_likes ?></h3>
            <p>total likes</p>
            <a href="playlists.php" class="btn">view playlists</a>
        </div>

        <div class="box">
            <h3><?= $total_comments ?></h3>
            <p>total comments</p>
            <a href="comments.php" class="btn">view comments</a>
        </div>
    </div>

    

    </div>
</section>
<!-- Profile section ends -->















<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>