<?php

include '../components/connect.php';

if (isset($_COOKIE['tutor_id'])) {
   $tutor_id = $_COOKIE['tutor_id'];
} else {
   $tutor_id = '';
   header('location:login.php');

}

if (isset($_GET['get_id'])) {
   $get_id = $_GET['get_id'];
} else {
   $get_id = "";
   header("location:playlist.php");

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update list</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

   <?php include '../components/admin_header.php'; ?>


   <!-- update playlists starts  -->

   <section class="playlist-form">
      <h1 class="heading">update playlists</h1>

      <?php
      $select_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
      $select_playlist->execute([$get_id]);
      if ($select_playlist->rowCount() > 0) {
         while ($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)) {

            $playlist_id = $fetch_playlist['id'];


            ?>

            <form action="" method="POST" enctype="multipart/form-data">

               <p>playlist status</p>
               <select name="status" class="box" required>
                  <option value="active">active</option>
                  <option value="deactive">deactive</option>
               </select>

               <p>playlist title</p>
               <input type="text" class="box" name="title" maxlength="100" placeholder="enter playlist title" required>

               <p>playlist description</p>
               <textarea name="description" class="box" cols="30" rows="10" required placeholder="enter playlist description"
                  maxlength="1000"></textarea>

               <p>playlist thumbnail</p>
               <input type="file" name="thumb" required eccept="image/*" class="box">

               <input type="submit" value="add playlist" name="submit" class="btn">

            </form>

            <?php
         }
      } else {
         echo '<p class="empty">No playlists created yet!</p>';
      }
      ?>
   </section>

   <!-- update playlists ends -->













   <?php include '../components/footer.php'; ?>

   <script src="../js/admin_script.js"></script>

</body>

</html>