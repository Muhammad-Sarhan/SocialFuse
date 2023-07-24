<?php

include '../config.php';

session_start();
$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$user_id = $_SESSION['user_id'];
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

$nme = $fetch_profile['name'];
$imgprofile = $fetch_profile['image'];

if (!isset($user_id)) {
  header('location:login.php');
}

get_account_holder_name($nme);
get_account_holder_image($imgprofile);


?>






<!DOCTYPE html>
<html>

<head>
  <title>Upload shorts Video</title>
  <style>
    body {
      background-color: black;
    }

    /* CSS styles for the video upload form */
    form {
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      font-family: Arial, sans-serif;
      background-color: black;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-size: 16px;
    }

    input[type="file"] {
      display: none;
    }

    .custom-file-upload {
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
      background-color: #007bff;
      color: #fff;
      border-radius: 4px;
      text-align: center;
      margin-bottom: 10px;
    }

    .custom-file-upload:hover {
      background-color: #0062cc;
      color: white;
    }

    .video-preview {
      width: 100%;
      max-width: 500px;
      margin: 0 auto;
      max-width: 600px;
    }

    .video-preview video {
      width: 100%;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .video-preview p {
      font-size: 16px;
      margin-top: 10px;
      text-align: center;
    }

    /* CSS code for video upload container with drag and drop support */
    .custom-file-upload {
      border: 2px dashed #ccc;
      padding: 20px;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      width: 800px;
      height: 200px;
      color: blue;
      background-color: black;
    }

    .custom-file-upload.drag-over {
      border-color: #333;

    }

    #video_name {
      width: 830px;
      height: 20px;
      padding: 4px;
      border-top-left-radius: 10px;
      border-top-left-radius: 10px;
      border-bottom-right-radius: 10px;
      border-bottom-right-radius: 10px;
      color: white;
      background: black;
      border: white;
      border: 3px solid white;

    }


    #description {
      width: 830px;
      height: 90px;
      padding: 4px;

      border-top-left-radius: 10px;

      border-bottom-right-radius: 10px;
      color: white;
      background: black;
      border: white;
      border: 3px solid white;

    }

    #bottorm {
      width: 845px;
      height: 40px;
      justify-items: center;
      color: blue;
      background-color: black;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
      border: 3px solid white;

    }
  </style>
  <link rel="icon" href="../image/logo3.png">
</head>

<body>

  <?php

  // Check if a file was uploaded
  if (isset($_FILES['video'])) {

    // Get file details
    $name = $_FILES['video']['name'];
    $type = $_FILES['video']['type'];
    $size = $_FILES['video']['size'];
    $tmp_name = $_FILES['video']['tmp_name'];

    // Check that the file is a valid video file
    $allowed_types = array('mp4', 'avi', 'mov', 'wmv');
    $file_ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if (!in_array($file_ext, $allowed_types)) {
      die("Error: Only MP4, AVI, MOV, and WMV files are allowed.");
    }

    // Move the file to a designated location on your server
    $upload_dir = "uploads/";
    $new_name = uniqid() . '.' . $file_ext;
    $destination = $upload_dir . $new_name;
    move_uploaded_file($tmp_name, $destination);

    // Get additional details about the video
    $video_name = $_POST['video_name'];
    $description = $_POST['description'];
    $account_holder_name = get_account_holder_name($nme);
    $account_holder_image = get_account_holder_image($imgprofile);

    // Insert a record into the database with information about the video
    $conn = mysqli_connect('localhost', 'root', '', 'all_code_1');
    $query = "INSERT INTO videos (name, type, size, file, video_name, description, account_holder_name, account_holder_image) VALUES ('$name', '$type', '$user_id', 'upload-shorts/uploads/$new_name', '$video_name', '$description', '$account_holder_name', 'uploaded_img/$account_holder_image')";
    mysqli_query($conn, $query);



    
    
    header('Location: ../shorts-vidios.php');
    if (in_array($video_ex_lc, $allowed_exs)) {
    		
      $video_upload_path = 'uploads/'.$new_name;
      move_uploaded_file($tmp_name, $video_upload_path);

      // Now let's Insert the video path into database
          $sql = "INSERT INTO videos(video_url) 
                 VALUES('$new_name')";
          mysqli_query($conn, $sql);

    }else {
      $em = "You can't upload files of this type";

    }


    mysqli_close($conn);

    
    exit();
  }

  function get_account_holder_name($nme)
  {
    return $nme;
  }

  function get_account_holder_image($imgprofile)
  {
    return $imgprofile;
  }

  ?>

  <form action="upload-shorts.php" method="post" enctype="multipart/form-data">
    <label for="video">Select a video to upload:</label>
    <div class="custom-file-upload">
      <input type="file" name="video" id="video" accept="video/*" onchange="previewVideo(event)" accept="video/*" onchange="handleVideoUpload(event)" ondrop="handleVideoDrop(event)" ondragover="handleVideoDragOver(event)" ondragleave="handleVideoDragLeave(event)" id="video-upload">
      <label for="video" for="video-upload" style="padding: 90px;">Choose File</label>
    </div>
    <div class="video-preview" id="video-preview"></div>
    <br>
    <!-- <label for="video_name" style="color: #fff;">Video Name:</label>
    <input type="text" name="video_name" id="video_name" required> -->
    <br><br>
    <label for="description" style="color: #fff;">Description:</label>
    <textarea name="description" id="description" rows="5"></textarea>
    <br><br><br>
    <input type="submit" value="Upload" id="bottorm">
  </form>

  <script>
    function previewVideo(event) {
      var video_preview = document.getElementById('video-preview');
      video_preview.innerHTML = '';
      var video = document.createElement('video');
      video.src = URL.createObjectURL(event.target.files[0]);
      video.controls = true;
      video_preview.appendChild(video);
      var p = document.createElement('p');
      p.innerHTML = event.target.files[0].name;
      video_preview.appendChild(p);
    }
  </script>


  <script>
    function handleVideoUpload(event) {
      var videoFile = event.target.files[0];
      console.log('Video file:', videoFile);
    }

    function handleVideoDrop(event) {
      event.preventDefault();

      var videoFile = event.dataTransfer.files[0];
      console.log('Dropped video file:', videoFile);
    }

    function handleVideoDragOver(event) {
      // Prevent default behavior
      event.preventDefault();

      // Add "drag-over" class to the container
      var container = document.querySelector('.custom-file-upload');
      container.classList.add('drag-over');
    }

    function handleVideoDragLeave(event) {
      // Remove "drag-over" class from the container
      var container = document.querySelector('.custom-file-upload');
      container.classList.remove('drag-over');
    }
  </script>

</body>

</html>


<!-- <div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="https://profile-sir-hamed.netlify.app/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div> -->