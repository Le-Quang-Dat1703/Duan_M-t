<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
   
}

if(isset($_POST['submit'])) {
   $id = unique_id();
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   
   $thumb = $_FILES['thumb']['name'];
   $thumb = filter_var($thumb, FILTER_SANITIZE_STRING);
   $ext = pathinfo($thumb, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $thumb_size = $_FILES['thumb']['size'];
   $thumb_tmp_name = $_FILES['thumb']['tmp_name'];
   $thumb_folder = '../uploaded_files/'.$rename;
   
   $verify_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ? AND title = ? AND description = ?");
   $verify_playlist->execute([$tutor_id, $title, $description]);


   if($verify_playlist->rowCount() > 0) {
      $message [] = 'playlist already created!';
   }else {
      $add_playlist = $conn->prepare("insert into `playlist` (id, tutor_id, title, description, thumb, status) value (?,?,?,?,?,?)");
      $add_playlist->execute([$id, $tutor_id, $title, $description, $rename, $status,]);
      move_uploaded_file($thumb_tmp_name, $thumb_folder);
      $message[] = 'new playlist created!';  
   }

   
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add playlists</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<!-- add playlists starts  -->

<section class="playlist-form">
   <h1 class="heading">add playlists</h1>
   <form action="" method="POST" enctype="multipart/form-data">

      <p>playlist status <span>*</span></p>
      <select name="status" class="box" required>
         <option value="active">active</option>
         <option value="deactive">deactive</option>
      </select>

      <p>playlist title <span>*</span></p>
      <input type="text" class="box" name="title" maxlength="100" placeholder="enter playlist title" required>

      <p>playlist description <span>*</span></p>
      <textarea name="description" class="box" cols="30" rows="10" required placeholder="enter playlist description" maxlength="1000"></textarea>
      
      <p>playlist thumbnail <span>*</span></p>
      <input type="file" name="thumb" required eccept="image/*" class="box" >

      <input type="submit" value="add playlist" name="submit" class="btn">
      
   </form>
</section>

<!-- add playlists ends -->














<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>