<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1; // تعيين قيمة افتراضية للمتغير إذا لم يتم تمريره في الـ URL
}

//echo $id;
?>

<?php

include 'config.php';

session_start();
$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$user_id = $_SESSION['user_id'];
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

$name = $fetch_profile['name'];

if (!isset($user_id)) {
    header('location:login.php');
}


?>


<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "all_codes";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, type, name, size, file, video_name, description, account_holder_name, account_holder_image, created_at FROM videos WHERE id = $id";
$result = $conn->query($sql);


while ($row = $result->fetch_assoc()) {

    $namevidios = $row["name"];
    $type1 = $row["type"];
    $size1 = $row["size"];
    $file1 = $row["file"];
    $video_name = $row["video_name"];
    $description = $row["description"];
    $account_holder_name = $row["account_holder_name"];
    $account_holder_image = $row["account_holder_image"];
    $created_at = $row["created_at"];
};



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $video_name ?></title>
    <link rel="stylesheet" href="css/main2.css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/jquery-ui.min.css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/jquery.tagit.css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/font-awesome.min.css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/twemoji-awesome.css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/bootstrap.min.css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/sweetalert2.min.css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/notifIt.min.css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/style.css" id="style-css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/night-mode.css" class="night-mode-css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/custom.style.css">
    <link href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/material.css" rel="stylesheet" type="text/css">
    <link href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/roboto.css" rel="stylesheet">
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/jquery-3.min.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/jquery-ui.min.js"></script>
    <script type="text/javascript" src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/jquery.form.min.js"></script>
    <script type="text/javascript" src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/tag-it.min.js"></script>
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/mediaelementplayer.min.css">

    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/sweetalert2.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/notifIt.min.js"></script>
    <link href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/bootstrap-select.min.css">
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/owl.carousel.min.css">
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/owl.carousel.min.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/speed.min.js"></script>
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/speed.min.css">
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/speed-i18n.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/jump-forward.min.js"></script>
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/jump-forward.min.css">
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/ads.min.js"></script>
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/ads.min.css">
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/ads-i18n.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/ads-vast-vpaid.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/quality.min.js"></script>
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/quality.min.css">
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/facebook.min.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/fingerprint2.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/emojionearea.js"></script>
    <link rel="stylesheet" type="text/css" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/emojionearea.min.css">
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/bootstrap-colorpicker.min.css">
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/bootstrap-colorpicker.min.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/v1.js"></script>
    <script type="text/javascript" src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/2co.min.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/socket.io.js"></script>
    <link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/swiper-bundle.min.css">
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/swiper-bundle.min.js"></script>
    <script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/plupload.full.min.js"></script>
    <link rel="icon" href="image/logo3.png">
    <style>
        .theme_switch_box .modal-header .btn {
            font-weight: 500;
        }

        .theme_switch_box .modal-body {
            padding: 0 !important;
            font-size: 15px !important;
            text-align: initial;
        }

        .theme_switch_details {
            background-color: rgb(0 0 0 / 0.06);
            border-radius: 5px;
            margin-bottom: 25px;
            overflow: hidden;
            text-align: center;
        }

        .theme_switch_details.default {
            background-color: #86cae9;
        }

        .theme_switch_details.youplay {
            background-color: #9ce1ff;
        }

        .theme_switch_details.vidplay {
            background-color: #a1b9fa;
        }

        .theme_switch_details p {
            padding: 20px 10px 10px;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 500;
            font-size: 20px;
            color: #222 !important;
        }

        .theme_switch_details p a {
            color: #222 !important;
        }

        .theme_switch_details small {
            margin: -18px 0 0px;
            display: block;
            color: #333 !important;
        }

        .theme_switch_details>a {
            display: block;
            position: relative;
            padding-bottom: 56.25%;
            margin: 10px -10px 0 25px;
            box-shadow: 0 0 15px rgb(0 0 0 / 25%);
            border-radius: 5px 0 0 0;
        }

        .theme_switch_details img {
            width: 130%;
            height: auto;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            border-radius: 5px 0 0 0;
        }

        .theme_details_foot {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0 10px 25px;
            justify-content: center;
        }

        .theme_details_foot .btn {
            text-align: center;
            line-height: 28px;
            padding: 0 16px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
            overflow: hidden;
            box-shadow: none;
            border: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            margin: 0 4px;
            background-color: #444;
            color: #fff;
        }

        .theme_details_foot .btn.buy {
            background-color: transparent;
            box-shadow: inset 0 0 0 2px #444;
            color: #444 !important;
        }

        @media only screen and (min-width: 768px) {
            .theme_switch_box .modal-body .row {
                margin-left: -.5rem;
                margin-right: -.5rem;
            }

            .theme_switch_box .modal-body .row>div {
                padding-left: .5rem;
                padding-right: .5rem;
            }
        }

        @media only screen and (max-width: 768px) {
            .theme_switch_box .modal-body>p {
                display: none;
            }
        }

        @media only screen and (max-width: 1024px) {
            #videoss-show {
                width: 170%;
                padding: none;
            }
            /* #iconsd {
                margin-right: 1500px;
            } */
            #sidebar {
                margin-top: 1000px;
                margin-right: 730px;
                
            }
            .name-container {
                margin-left: 400px;
                /* margin-top: -700px; */
            }
        }
    </style>

</head>

<body style="overflow: auto;">
    <header style="z-index: 1000; position: fixed;">
        <nav class="navbar navbar-findcond navbar-fixed-top header-layout nav_bg_solid">
            <div class="pt_main_hdr" id="header_change">
                <div class="navbar-header">
                    <form class="navbar-form navbar-left search-header" role="search" action="0533424127search" method="GET">
                        <div class="form-group">
                            <a href="search_pages/search1.php"><input type="text" class="form-control" id="search-bar" name="keyword" placeholder="Search for videos" autocomplete="off"></a>
                            <span class="search_line">
                            </span>
                            <a href="search_pages/search1.php"><svg class="feather feather-search" onclick="javascript:$('.search-header input').focus();" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <g id="Group_304" data-name="Group 304" transform="translate(941 2420)">
                                        <g id="Search_1" data-name="Search 1" transform="translate(-939.756 -2417.756)">
                                            <path id="Path_57" data-name="Path 57" d="M2,7.752A6.752,6.752,0,1,1,8.752,14.5,6.752,6.752,0,0,1,2,7.752ZM7.971,3.209a.563.563,0,0,1-.468.644A3.189,3.189,0,0,0,4.853,6.5a.563.563,0,0,1-1.112-.176A4.314,4.314,0,0,1,7.327,2.741.563.563,0,0,1,7.971,3.209Z" fill="currentColor" fill-rule="evenodd"></path>
                                            <path id="Path_58" data-name="Path 58" d="M18.47,17.47a.75.75,0,0,1,1.061,0l4,4A.75.75,0,1,1,22.47,22.53l-4-4A.75.75,0,0,1,18.47,17.47Z" transform="translate(-4.238 -4.238)" fill="currentColor"></path>
                                        </g>
                                        <rect id="Rectangle_321" data-name="Rectangle 321" width="24" height="24" transform="translate(-941 -2420)" fill="none"></rect>
                                    </g>
                                </svg></a>
                        </div>
                        <div class="search-dropdown hidden"></div>
                    </form>

                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown profile-nav hide_upload_mobi_link">
                        <a href="index.php" class="dropdown-toggle hdr_hover_btn" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Group_305" data-name="Group 305" transform="translate(1264 2420)">
                                    <g id="Group_276" data-name="Group 276">
                                        <g id="Group_263" data-name="Group 263" transform="translate(-1264 -2417)">
                                            <path id="Path_61" data-name="Path 61" d="M3.82,3.68l6,1-.5.5-.5,1.5h-5Z" fill="currentColor"></path>
                                            <path id="Path_62" data-name="Path 62" d="M8.716,0h.067c1.372,0,2.447,0,3.312.071A5.918,5.918,0,0,1,14.36.627,5.75,5.75,0,0,1,16.873,3.14q.075.147.138.3a23.41,23.41,0,0,1,2.9-1.134,2.771,2.771,0,0,1,2.347.2,2.771,2.771,0,0,1,1.123,2.07A24.431,24.431,0,0,1,23.5,7.8V9.7a24.43,24.43,0,0,1-.121,3.224,2.771,2.771,0,0,1-1.123,2.07,2.771,2.771,0,0,1-2.347.2,23.414,23.414,0,0,1-2.9-1.134q-.063.152-.138.3a5.75,5.75,0,0,1-2.513,2.513,5.918,5.918,0,0,1-2.265.556c-.864.071-1.94.071-3.311.071H8.716c-1.372,0-2.447,0-3.311-.071a5.919,5.919,0,0,1-2.265-.556A5.75,5.75,0,0,1,.627,14.36,5.918,5.918,0,0,1,.071,12.1C0,11.231,0,10.155,0,8.784V8.716C0,7.345,0,6.269.071,5.4A5.918,5.918,0,0,1,.627,3.14,5.75,5.75,0,0,1,3.14.627,5.918,5.918,0,0,1,5.4.071C6.269,0,7.345,0,8.716,0ZM4,5.75A.75.75,0,0,1,4.75,5h4a.748.748,0,0,1,.526.215.745.745,0,0,1,.514-.167.527.527,0,0,1,.459.333,2.28,2.28,0,0,1,.243.684q.027.225.036.423t.027.369q.018.18.018.342t.018.306a1.9,1.9,0,0,0,.108.7.347.347,0,0,0,.324.207q.162.018.486.036t.7.027q.378.018.729.045t.558.054a1.881,1.881,0,0,1,.684.234.458.458,0,0,1-.063.828,2.532,2.532,0,0,1-.783.189q-.36.045-.792.072t-.819.027q-.387.009-.639.018a.455.455,0,0,0-.387.2,1.33,1.33,0,0,0-.153.684q0,.117-.009.252t-.027.27q-.009.135-.027.27l-.018.27a2.94,2.94,0,0,1-.252.972.577.577,0,0,1-.54.387.507.507,0,0,1-.486-.4,5.814,5.814,0,0,1-.225-1.017q-.009-.153-.018-.279t-.018-.261q-.009-.126-.018-.234t-.018-.2a1.565,1.565,0,0,0-.144-.54.47.47,0,0,0-.252-.252A1.079,1.079,0,0,0,8.062,10H7.108q-.306,0-.6-.009t-.477-.027a2.24,2.24,0,0,1-.765-.207.531.531,0,0,1-.288-.495.452.452,0,0,1,.18-.369,1.33,1.33,0,0,1,.54-.234,4.107,4.107,0,0,1,.837-.09l.747-.036q.387-.027.693-.054t.468-.063a.426.426,0,0,0,.27-.189,1.443,1.443,0,0,0,.117-.576l.018-.27q.009-.144.018-.306t.018-.342q.006-.119.016-.245A.754.754,0,0,1,8.75,6.5h-4A.75.75,0,0,1,4,5.75Z" fill="currentColor" fill-rule="evenodd"></path>
                                        </g>
                                        <rect id="Rectangle_311" data-name="Rectangle 311" width="24" height="24" transform="translate(-1264 -2420)" fill="none"></rect>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <ul class="dropdown-menu pt-create-menu ani-acc-menu custom_menu_login_usss">

                            <li class="hide_up_imp">
                                <a href="upload-long-vidios/upload.php" class="uploadd">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 10.25L6.96421 10.25C6.05997 10.25 5.33069 10.25 4.7424 10.3033C4.13605 10.3583 3.60625 10.4746 3.125 10.7524C2.55493 11.0815 2.08154 11.5549 1.7524 12.125C1.47455 12.6063 1.35826 13.1361 1.3033 13.7424C1.24998 14.3307 1.24999 15.06 1.25 15.9642L1.25 15.9642L1.25 16L1.25 16.0358L1.25 16.0358C1.24999 16.94 1.24998 17.6693 1.3033 18.2576C1.35826 18.8639 1.47455 19.3937 1.7524 19.875C2.08154 20.4451 2.55493 20.9185 3.125 21.2476C3.60625 21.5254 4.13605 21.6417 4.7424 21.6967C5.33067 21.75 6.05992 21.75 6.96412 21.75L6.96418 21.75L7 21.75L17 21.75L17.0357 21.75C17.94 21.75 18.6693 21.75 19.2576 21.6967C19.8639 21.6417 20.3937 21.5254 20.875 21.2476C21.4451 20.9185 21.9185 20.4451 22.2476 19.875C22.5254 19.3937 22.6417 18.8639 22.6967 18.2576C22.75 17.6693 22.75 16.94 22.75 16.0358L22.75 16L22.75 15.9642C22.75 15.06 22.75 14.3307 22.6967 13.7424C22.6417 13.1361 22.5254 12.6063 22.2476 12.125C21.9185 11.5549 21.4451 11.0815 20.875 10.7524C20.3937 10.4746 19.8639 10.3583 19.2576 10.3033C18.6693 10.25 17.94 10.25 17.0358 10.25L17 10.25L16 10.25C15.5858 10.25 15.25 10.5858 15.25 11C15.25 11.4142 15.5858 11.75 16 11.75L17 11.75C17.9484 11.75 18.6096 11.7507 19.1222 11.7972C19.6245 11.8427 19.9101 11.9274 20.125 12.0514C20.467 12.2489 20.7511 12.533 20.9486 12.875C21.0726 13.0899 21.1573 13.3755 21.2028 13.8778C21.2493 14.3904 21.25 15.0516 21.25 16C21.25 16.9484 21.2493 17.6096 21.2028 18.1222C21.1573 18.6245 21.0726 18.9101 20.9486 19.125C20.7511 19.467 20.467 19.7511 20.125 19.9486C19.9101 20.0726 19.6245 20.1573 19.1222 20.2028C18.6096 20.2493 17.9484 20.25 17 20.25L7 20.25C6.05158 20.25 5.39041 20.2493 4.87779 20.2028C4.37549 20.1573 4.0899 20.0726 3.875 19.9486C3.53296 19.7511 3.24892 19.467 3.05144 19.125C2.92737 18.9101 2.8427 18.6245 2.79718 18.1222C2.75072 17.6096 2.75 16.9484 2.75 16C2.75 15.0516 2.75072 14.3904 2.79718 13.8778C2.84271 13.3755 2.92737 13.0899 3.05144 12.875C3.24892 12.533 3.53296 12.2489 3.875 12.0514C4.0899 11.9274 4.37549 11.8427 4.87779 11.7972C5.39041 11.7507 6.05158 11.75 7 11.75L8 11.75C8.41421 11.75 8.75 11.4142 8.75 11C8.75 10.5858 8.41421 10.25 8 10.25L7 10.25ZM16.5303 6.46967L12.5303 2.46967C12.2374 2.17678 11.7626 2.17678 11.4697 2.46967L7.46967 6.46967C7.17678 6.76256 7.17678 7.23744 7.46967 7.53033C7.76256 7.82322 8.23744 7.82322 8.53033 7.53033L11.25 4.81066L11.25 16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16L12.75 4.81066L15.4697 7.53033C15.7626 7.82322 16.2374 7.82322 16.5303 7.53033C16.8232 7.23744 16.8232 6.76256 16.5303 6.46967Z" fill="currentColor"></path>
                                    </svg> Upload video
                                </a>
                            </li>

                            <li class="hide_up_imp">
                                <a href="upload-shorts/upload-shorts.php" class="uploadd">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 10.25L6.96421 10.25C6.05997 10.25 5.33069 10.25 4.7424 10.3033C4.13605 10.3583 3.60625 10.4746 3.125 10.7524C2.55493 11.0815 2.08154 11.5549 1.7524 12.125C1.47455 12.6063 1.35826 13.1361 1.3033 13.7424C1.24998 14.3307 1.24999 15.06 1.25 15.9642L1.25 15.9642L1.25 16L1.25 16.0358L1.25 16.0358C1.24999 16.94 1.24998 17.6693 1.3033 18.2576C1.35826 18.8639 1.47455 19.3937 1.7524 19.875C2.08154 20.4451 2.55493 20.9185 3.125 21.2476C3.60625 21.5254 4.13605 21.6417 4.7424 21.6967C5.33067 21.75 6.05992 21.75 6.96412 21.75L6.96418 21.75L7 21.75L17 21.75L17.0357 21.75C17.94 21.75 18.6693 21.75 19.2576 21.6967C19.8639 21.6417 20.3937 21.5254 20.875 21.2476C21.4451 20.9185 21.9185 20.4451 22.2476 19.875C22.5254 19.3937 22.6417 18.8639 22.6967 18.2576C22.75 17.6693 22.75 16.94 22.75 16.0358L22.75 16L22.75 15.9642C22.75 15.06 22.75 14.3307 22.6967 13.7424C22.6417 13.1361 22.5254 12.6063 22.2476 12.125C21.9185 11.5549 21.4451 11.0815 20.875 10.7524C20.3937 10.4746 19.8639 10.3583 19.2576 10.3033C18.6693 10.25 17.94 10.25 17.0358 10.25L17 10.25L16 10.25C15.5858 10.25 15.25 10.5858 15.25 11C15.25 11.4142 15.5858 11.75 16 11.75L17 11.75C17.9484 11.75 18.6096 11.7507 19.1222 11.7972C19.6245 11.8427 19.9101 11.9274 20.125 12.0514C20.467 12.2489 20.7511 12.533 20.9486 12.875C21.0726 13.0899 21.1573 13.3755 21.2028 13.8778C21.2493 14.3904 21.25 15.0516 21.25 16C21.25 16.9484 21.2493 17.6096 21.2028 18.1222C21.1573 18.6245 21.0726 18.9101 20.9486 19.125C20.7511 19.467 20.467 19.7511 20.125 19.9486C19.9101 20.0726 19.6245 20.1573 19.1222 20.2028C18.6096 20.2493 17.9484 20.25 17 20.25L7 20.25C6.05158 20.25 5.39041 20.2493 4.87779 20.2028C4.37549 20.1573 4.0899 20.0726 3.875 19.9486C3.53296 19.7511 3.24892 19.467 3.05144 19.125C2.92737 18.9101 2.8427 18.6245 2.79718 18.1222C2.75072 17.6096 2.75 16.9484 2.75 16C2.75 15.0516 2.75072 14.3904 2.79718 13.8778C2.84271 13.3755 2.92737 13.0899 3.05144 12.875C3.24892 12.533 3.53296 12.2489 3.875 12.0514C4.0899 11.9274 4.37549 11.8427 4.87779 11.7972C5.39041 11.7507 6.05158 11.75 7 11.75L8 11.75C8.41421 11.75 8.75 11.4142 8.75 11C8.75 10.5858 8.41421 10.25 8 10.25L7 10.25ZM16.5303 6.46967L12.5303 2.46967C12.2374 2.17678 11.7626 2.17678 11.4697 2.46967L7.46967 6.46967C7.17678 6.76256 7.17678 7.23744 7.46967 7.53033C7.76256 7.82322 8.23744 7.82322 8.53033 7.53033L11.25 4.81066L11.25 16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16L12.75 4.81066L15.4697 7.53033C15.7626 7.82322 16.2374 7.82322 16.5303 7.53033C16.8232 7.23744 16.8232 6.76256 16.5303 6.46967Z" fill="currentColor"></path>
                                    </svg> Upload short video
                                </a>
                            </li>



                            <li class="divider"></li>
                            <li class="hide_up_imp">
                                <a href="upload-long-vidios/upload.php">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 168.071 168.071" xml:space="preserve" style="color: currentColor;">
                                        <g>
                                            <g>
                                                <path opacity="0.5" style="fill: currentColor;" d="M154.932,91.819L42.473,27.483c-2.219-1.26-4.93-1.26-7.121-0.027 c-2.219,1.233-3.588,3.533-3.615,6.026L31.08,161.059c0,0,0,0,0,0.027c0,2.465,1.369,4.766,3.533,6.026 c1.123,0.63,2.355,0.959,3.615,0.959c1.205,0,2.438-0.301,3.533-0.931l113.116-63.214c2.219-1.26,3.588-3.533,3.588-6.053 c0,0,0,0,0-0.027C158.465,95.38,157.123,93.079,154.932,91.819z">
                                                </path>
                                                <g id="XMLID_15_">
                                                    <g>
                                                        <path style="fill:currentColor;" d="M79.952,44.888L79.952,44.888c3.273-3.273,2.539-8.762-1.479-11.06l-7.288-4.171 c-2.75-1.572-6.212-1.109-8.452,1.128l0,0c-3.273,3.273-2.539,8.762,1.479,11.06l7.291,4.169 C74.25,47.589,77.712,47.126,79.952,44.888z">
                                                        </path>
                                                        <path style="fill:currentColor;" d="M133.459,65.285L99.103,45.631c-2.75-1.572-6.209-1.109-8.449,1.128l0,0 c-3.273,3.273-2.539,8.759,1.479,11.057l23.497,13.44L23.931,122.5l0.52-103.393l19.172,10.964 c2.722,1.558,6.152,1.098,8.367-1.12l0.104-0.104c3.24-3.24,2.514-8.674-1.463-10.95L21,0.948 c-2.219-1.26-4.93-1.26-7.121-0.027c-2.219,1.233-3.588,3.533-3.615,6.026L9.607,134.524c0,0,0,0,0,0.027 c0,2.465,1.369,4.766,3.533,6.026c1.123,0.63,2.355,0.959,3.615,0.959c1.205,0,2.438-0.301,3.533-0.931l113.116-63.214 c2.219-1.26,3.588-3.533,3.588-6.053c0,0,0,0,0-0.027C136.992,68.845,135.65,66.545,133.459,65.285z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg> Shorts
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="show-in-mobile pull-left top-header">
                        <a href="search_pages/search1.php" class="search-icon hdr_hover_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Group_304" data-name="Group 304" transform="translate(941 2420)">
                                    <g id="Search_1" data-name="Search 1" transform="translate(-939.756 -2417.756)">
                                        <path id="Path_57" data-name="Path 57" d="M2,7.752A6.752,6.752,0,1,1,8.752,14.5,6.752,6.752,0,0,1,2,7.752ZM7.971,3.209a.563.563,0,0,1-.468.644A3.189,3.189,0,0,0,4.853,6.5a.563.563,0,0,1-1.112-.176A4.314,4.314,0,0,1,7.327,2.741.563.563,0,0,1,7.971,3.209Z" fill="currentColor" fill-rule="evenodd"></path>
                                        <path id="Path_58" data-name="Path 58" d="M18.47,17.47a.75.75,0,0,1,1.061,0l4,4A.75.75,0,1,1,22.47,22.53l-4-4A.75.75,0,0,1,18.47,17.47Z" transform="translate(-4.238 -4.238)" fill="currentColor"></path>
                                    </g>
                                    <rect id="Rectangle_321" data-name="Rectangle 321" width="24" height="24" transform="translate(-941 -2420)" fill="none"></rect>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="hide-from-mobile pull-left top-header">
                        <a href="privet-chat/users.php" class="hdr_hover_btn" data-load="?link1=messages">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Group_306" data-name="Group 306" transform="translate(1031 2420)">
                                    <g id="Message_2" data-name="Message 2" transform="translate(-1031 -2420)">
                                        <path id="Path_50" data-name="Path 50" d="M14,2a34.336,34.336,0,0,1,3.673.107,3,3,0,0,0,4.221,4.221A34.328,34.328,0,0,1,22,10v1.184a12.522,12.522,0,0,1-.2,3.223A5,5,0,0,1,18.407,17.8a12.522,12.522,0,0,1-3.223.2H14.57a5,5,0,0,0-2.848.913l-.053.038L9.058,20.815A1.1,1.1,0,0,1,7.4,19.51,1.1,1.1,0,0,0,6.373,18h-.6A3.772,3.772,0,0,1,2,14.228V10c0-2.8,0-4.2.545-5.27A5,5,0,0,1,4.73,2.545C5.8,2,7.2,2,10,2ZM9,10A1,1,0,1,1,8,9,1,1,0,0,1,9,10Zm4,0a1,1,0,1,1-1-1A1,1,0,0,1,13,10Zm3,1a1,1,0,1,0-1-1A1,1,0,0,0,16,11Z" fill="currentColor" fill-rule="evenodd"></path>
                                        <path id="Path_51" data-name="Path 51" d="M22,4a2,2,0,1,1-2-2A2,2,0,0,1,22,4Z" fill="currentColor"></path>
                                    </g>
                                    <rect id="Rectangle_318" data-name="Rectangle 318" width="24" height="24" transform="translate(-1031 -2420)" fill="none"></rect>
                                </g>
                            </svg>
                            <span id="new-messages"></span>
                        </a>
                    </li>
                    <li class="hide-from-mobile dropdown pull-left top-header noti_iam_from_mobile">
                        <a href="javascript:void(0);" id="get-notifications" class=" dropdown-toggle hdr_hover_btn" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Group_307" data-name="Group 307" transform="translate(1002 2420)">
                                    <g id="Notification_2" data-name="Notification 2" transform="translate(-1002.25 -2420.25)">
                                        <path id="Path_52" data-name="Path 52" d="M5.5,7.6A5.645,5.645,0,0,1,11.1,1.25h1.7A5.625,5.625,0,0,1,16.893,3a3,3,0,1,0,1.434,5.689,3.134,3.134,0,0,0,1,2.113l.044.041a4.562,4.562,0,0,1-3.1,7.9H8.041a4.72,4.72,0,0,1-4.247-2.66l-.1-.213a4.4,4.4,0,0,1,.975-5.155A2.9,2.9,0,0,0,5.578,8.23Z" fill="currentColor"></path>
                                        <path id="Path_53" data-name="Path 53" d="M8.733,20.4a.75.75,0,0,1,1.05.15l.3.4a2.625,2.625,0,0,0,4.2,0l.3-.4a.75.75,0,1,1,1.2.9l-.3.4a4.125,4.125,0,0,1-6.6,0l-.3-.4A.75.75,0,0,1,8.733,20.4Z" fill="currentColor"></path>
                                        <path id="Path_54" data-name="Path 54" d="M19.183,6a2,2,0,1,1-2-2A2,2,0,0,1,19.183,6Z" fill="currentColor"></path>
                                    </g>
                                    <rect id="Rectangle_319" data-name="Rectangle 319" width="24" height="24" transform="translate(-1002 -2420)" fill="none"></rect>
                                </g>
                            </svg>
                            <span id="new-notifications"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right notfi-dropdown custom_notif_dropdown" id="notifications">
                            <li class="custom_Flex_auto_read">
                                <h5>
                                    <b id="all-notifications"></b> Notifications

                                </h5>
                                <div class="read_all_custom hidden">
                                    <img src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/read_all.png">
                                    <span>
                                        Mark as read
                                    </span>
                                </div>
                            </li>
                            <li>
                                <ul id="notifications-list">
                                    <div class="text-center pt_noti_ico_loader"><i class="fa fa-circle-o-notch spin hidden"></i></div>
                                </ul>
                            </li>

                            <a href="#" class="view_all_notif_custom hidden">
                                View All Notifications
                            </a>
                        </ul>
                    </li>
                    <li class="dropdown hide-from-mobile pull-left profile-nav">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img class="header-image" src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="users name">
                            <span class="name_loggedin_user desktop">
                                <p><?= $name; ?></p>
                            </span>
                            <span class="desktop hide_iam_from_mobile">
                                <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.92603 10.25C2.86353 10.25 3.67603 11.0625 3.67603 12C3.67603 12.9688 2.86353 13.75 1.92603 13.75C0.957275 13.75 0.176025 12.9688 0.176025 12C0.176025 11.0625 0.957275 10.25 1.92603 10.25ZM1.92603 5.25C2.86353 5.25 3.67603 6.0625 3.67603 7C3.67603 7.96875 2.86353 8.75 1.92603 8.75C0.957275 8.75 0.176025 7.96875 0.176025 7C0.176025 6.0625 0.957275 5.25 1.92603 5.25ZM1.92603 3.75C0.957275 3.75 0.176025 2.96875 0.176025 2C0.176025 1.0625 0.957275 0.25 1.92603 0.25C2.86353 0.25 3.67603 1.0625 3.67603 2C3.67603 2.96875 2.86353 3.75 1.92603 3.75Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </a>
                        <ul class="dropdown-menu ani-acc-menu custom_menu_login_usss" role="menu">
                            <div class="clip_top">
                                <img src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/d-cover.jpg">
                            </div>
                            <div class="image_dropdown">
                                <div class="" style="position: relative;">
                                    <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="users name">
                                </div>



                                <a class="name_channel" href="user_page.php">
                                    <div class="name_pes">
                                        <p><?= $name; ?></p>
                                    </div>
                                    <div class="channel_pass">My profile</div>
                                </a>
                            </div>









                            <li>
                                <a href="logout.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M16.56,5.44L15.11,6.89C16.84,7.94 18,9.83 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12C6,9.83 7.16,7.94 8.88,6.88L7.44,5.44C5.36,6.88 4,9.28 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12C20,9.28 18.64,6.88 16.56,5.44M13,3H11V13H13">
                                        </path>
                                    </svg> Log out
                                </a>
                            </li>


                            <span class="headtoppoint"></span>
                        </ul>
                    </li>


                </ul>
            </div>
        </nav>

        <nav class="navbar navbar-findcond navbar-fixed-top header-layout hidden search-bar nav_bg_solid">
            <div class="navbar-header">
                <form class="search-header-mobile" role="search" action="0533424127search" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search-bar-mobile" name="keyword" placeholder="Search for videos" autocomplete="off">
                    </div>
                    <div class="search-dropdown hidden"></div>
                </form>
            </div>
        </nav>


        <div class="clear"></div>
    </header><br><br><br><br>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = 1;
    };


    ?>
    <!-- <p style="color: #fff;"><?= $id; ?></p> -->

    <?php
    include("db.php")
    ?>
    <?php
    $sqlshow = "SELECT COUNT(`like`) FROM `likes` WHERE `user_id`= '$user_id' AND `vidios_id`= '$id' AND `like` = 1;";
    $results1 = mysqli_query($conn, $sqlshow);
    $row = mysqli_fetch_array($results1);
    $likenumber = $row['COUNT(`like`)'];

    ?>

    <?php
    $sqlshow = "SELECT COUNT(`Dislike`) FROM `likes` WHERE `user_id`= '$user_id' AND `vidios_id`= '$id' AND `like` = 0;";
    $results1 = mysqli_query($conn, $sqlshow);
    $row = mysqli_fetch_array($results1);
    $Dislikenumber = $row['COUNT(`Dislike`)'];

    ?>
    <div id="main" style="z-index: 150000;" style="padding: 2900px;">
        <button class="play-button">
            <img src="image/rubvidios.png" alt="Play Video">
        </button>
        <video src="<?= $file1 ?>" controls id="videoss-show" class="index-videos"></video>
        <br>
        <div>
            <a href="<?= "user_page_profile/index.php?id=" . $size1 ?>">
                <div style="position: relative;position: absolute;">
                    <img src="<?= $account_holder_image; ?>" alt="" style="border-radius: 50%; width: 70px; margin-left: 20px;width: 40px;height: 40px;border-radius: 50%;margin-right: 10px;">
                    <p style="font-weight: bold; position: absolute; left: 100px; top: 13px;"><?= $account_holder_name; ?></p>
                </div>
            </a>
            <div id="likeamddislike">
                <a href="<?= "likes-dislikes/like.php?id=" . $id ?>" id="iconsd">
                    <button style="background: #000; border: none;">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACQUlEQVR4nO2YMWsUQRiGxyASO68SQX9ACtMYwcpInEELKyFYphCye1gIik2a60yKgFiYTgQFzXwhYJHibi1OEJ3NxTaelYXmiKDRYJRYZPPKLFw48c7bWTe7s7gPfLDl++w38x63jBUUFBT8N0DyKUj+E8Q3QOIWyxOojx6E5N9AAnsjucvyAubPn/4tfDj8HcsLIH7zTwEBPBgdZHkAkr/sKkBnDjPbwRM+1DW8FLuoVAaYzQDsAIh73d++2GK2AxI3eoTX84bZDBb4ZRDf6SkgxVNmK5gXZ0Fi+y9vX4+dP2YgfhJSfO0THlgYG2a2gcWLx0H8fd/wUqww28DihWMg8bFveLNpgcQMaPxQ5CCe43/xXB8mg8djRyF5M+Hw6JgZE4HXxgIkXu1jeIDEemSBmuvLGAL7PWvRN+Cq2xYKTEffgONftUigZXyJnznqXFYCwb0j2LnDwgnmSggenvpkLFAtN05kKRDMlbD7aCR+C1UqGKi5/rYlRwjGLaTxXL+Z2xbS1By1lNsW0niOfze3LaTxHHU9bYEgiQZqU3WXL2UhEPxrA7XxymrIkiME4wbS1Cfqg56jAksE1owFwi246kNnyMbsKjbebuJzcxMrs6tpCkzHEqg5/vPOkDr4VutHOPo5BYFW7EscbsBR99MSCJJsoD0B15/qDKmPjQ6uRx+npAWCpBqoTXVSXbHgEq/H38Dk8khkgZ4fbzNqIM1S+UXJ6E89iYY1DRQHfeEgxTWQUCD+PdMGKigoKGBp8AtDCo3Yrxyy7gAAAABJRU5ErkJggg==" width="30px">
                    </button>
                    <span style="display: inline-block; margin-left: 10px;"><?= $likenumber; ?> like</span>
                </a>
                <a href="<?= "likes-dislikes/Dislike.php?id=" . $id ?>">
                    <button style="background: #000; border: none;">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB2UlEQVR4nO2XPUtcURCGxyBifoJgYWkTUwWt/BEpbRVsrKIspJqjBO42tptGxYiNcYMkjaRaEkiie2YD4n6IIYigbCEibLwqKL7hSoogq2v2nvtxyHlgqguHeZiZFy6Rw+FwWA/K3AXNExC1Cc2nEIW2S6tDCGeDN8N1lfPOKJdFq1pb9/qglQ7VtDQrzsYi0NjkDfPNq6DqsQj4xUiaBzQfGBN4urKA+doW3uxsY+jdklEBf3UUfn4MV58zt795xgRel7/jw96Pm1reraDDpEB+FI2lkZsKRC4/ZY6MH3GUAogsif5eobcLmKtuYbG2jUHDK4TIkijpI5awSZQGAR0miWIU8CNJojgF8lEkUdIrpMMmUdICEjaJUiOg6nYL6HaTKGYB33gSxS2QN51ESa+Qdink/R8p1Ciqb3/y2s4UWgt+6kVVIpyAR1EDedUTjDpdR/yPYIN7IWr/ASshlFYgM0+g1UlLiRIPUFpBiYch6rzFFDKUZlDi5xC+ukfiPaUdaH5xzwSqlHYA6oCoj3ckzC+yAQj33zGBa4AfkQ1A1JemEl9nH5MNQNRkU4ECd5MNoDj9rInAT7IFFLgTwo1bRzxONgFRL6H5AqKOITyVdD8Oh8NBxvgNg/BfSkJ7WvUAAAAASUVORK5CYII=" width="30px">
                    </button>
                    <span style="display: inline-block; margin-bottom: 20px;"><?= $Dislikenumber; ?> Dislike</span>

                </a>

                <button style="background: none; border: none;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADNElEQVR4nO2YX0hTURzHb0VBTFNTh1gkKpmlm6mRL5EQRi/1Es6eNOpeF5nonZam99pKK2tYmaJgJpHaH4SRNZRUgoiiqPwDQmmu+S+3Npl/Nh8kaL84A2sP6u7FdXcu7Avn8cKHc8+fz/kShC++iD/yLrt0b8/sVflLa398h3Vhz4vphdhn5r4YrbkiSmuSEjgn+dWcIrF71pbQNQOyTivE6aZhd7sFdmnNsLPtJ0Q9NtoiW4zpBL7wM46V4KOfmCCy1QgRD384tjVNpmO3bBJXmfm/8M1TsP3BJIQ3TsyHNRlDCVyC1nwCV/j7ExDWMA6hdaPlBC6Rd1kH+MBL68cguNbQR+ASWYfVzgc+pHYUgqoNNgKHKNTqTfHtpkU+8FurDRBQpZ/3KrhSqdxIqdiszLPnx5KaB3nBB97Sg//NEe8sIYVCsQGBUyrmO6Vi4VReCaRqtLzgt2hGQHJj+IrQ7OtIuvQYRTMDCHxpkDQDGXkMxLSM84Gf81MPhQhGnk0zaRTNfHYFdx3oLxwprUeXlFt4v8phx+Zrw8cFAVcWMAdImnm9ErjLcGTmXOiU3X5T5LykVpl5QeCV+WUpJM3oOIADqWJ7qMKy5KVv0Q2LLqngGkNv0B2DPaBKb/fXfOtFa35Ny4aLJZ7OK4mnaLYNzah7eOZttqoslcDBEqMfTy0cutzy7uS5ot/uZ5z5gDazIOA8LREOX6xzbshl4Wl2kCxgFOg0InC1xB0NesjIZZxH479jkv2Kzn21Wr2eEIMlplx66vwLJM0aEDi6uAgxWWKE5uOvrDOFuUgVCG9HJmZLRInTWWyis0TXxLZb+vlaYnj5e3yWUIzWXMHXEpOKW/HZxFFak9RZZXCED7w+CIqcEnyOURTUw6Aqg4MlQip9F6+LbCmoh1nNEv0qh+wpqkY8VYKPJWIrc0LqtBynbpTvg+bgo0/FWHajXJ6URyvuQWL3DODcja74qD+Rz8K+TjOIohtdrlZJq3nOHR6XbtS12Nrf9oUXPFbdKKoW5TrLos96xWa9/t7qRj1lvRIvdKMes16J0N2oh63XIVg36mnrlQjVja4lYf+rG/XFF8Jt/gDwG6QcmzXF2wAAAABJRU5ErkJggg==" width="30px"> Share videos</button>
                <!-- <button id="comment-btn" style="background: none; border: none;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD3UlEQVR4nO1bS08TURQ+BVuoQEASFzwSgloeFhVah/AQIuIaUFS2CuJ/MBqgLqEYjUAFXCDx8QdUDKALiWHnIwqiPHJD3LhUiNFEOeZce+uABdrSmTLD/ZIvmd553Hu+ud85ZxIAkJDQEzYAaAKABwAwAwDLfs74x875rzElGgFgHgBwE84BwGkwEeIBwCsCPJSXjDeu5OH7x+W4/LaGk45prMiRrBaiCwDiwATwUkA2a9xKX0cB/p6pRfx0Mih/fajFnvZ8tO6yrPhF6AQTbHuk4J8Pu9cNfC2fDbvQag2I0AAGhU143ucpCDl4wVtt+cIKs0ZNjE3C87TtZ8cqsOpoGtoT47Ba2YNz45WBYIOdIzs4HUlChLNgQDykxd+8ms+DPJy/KsFhcWFKQAASKdi565fzxNg9MCA+0uKnnpTzYOjNVrrS8PNEFVa4UvlvIQCN09jac+8elQkBqE8wHJZo8UtvasL2v+C31zVCAHqW4fCTFk9BRCrA11fHhQD0LE3xMoQOLSIKC0RClQW04IRaAM0mog5PHRR5vHB/Eg53OvHLZDUnHR88kITH3Gmrru3+lwS1YgB8gLHFqLGnp48/sygvmZc0EVR5Seq6C6JkqO4KSRQa7+31RXVtuggwOzuPGRmZ/LnU3qoDu99dhCfK0nFvuo2TjmlMLRSVT7o3KysL5+YWjCcAY4vo893mz7VZ43D8ritk748Nueh7gN87MDAY9XXpJgBji9jc3BIQgdpb9VsO9jFEb14E39p6SZM16SrAwgLDlpaLgUmpvaUOjzI89QhEOqaEJzwvgqd7DS8A87O/fwAzM//mhI2YnZ2Ng4N3NF1LTARgbJEnM6oO9fUNmJOTg3Z7IicdNzSc4tk+2glvWwnAtgmlACB3AEoLQAQ5wO12a92bb5mKomiXAxRFiXmAm7G0tFQmQRbNHeA2wLYP1w5hCaAYYNuHa4ewBGAmZMQCuA1gB1kFSmUVQPktwHT6GGpr68D4+PiY+Z3mbm/36JcE2RrS5LEWwOO5FjsBmEG5ZQHc27AchlL+oiaAsg27w1DKn7QAi3IOaJNVwCOrANuJVYAZnFIAkDsApQVA5gCUSVAFWQVA4169uLgEp6dnNi1RdA1dq9M3RAATekzY2HhmUwHoGp2CfwE6wmmxWL7TxF5v97rBd3V5+eIsFssPADgCJsMFCi4hIQFHRp7+F/zo6Dja7Xbxds6DSTFEAebm7sOpqelVvnc4HCJ4+u8x0yIJAKYo0Lq6+mC+pz+xTwGTw6nOB2b3/Xogj6PdvpvT7L7fMB/sBN9vlA8m/aRjCQnQH38AV3vRJ/l3RuIAAAAASUVORK5CYII=" width="30px"> comments</button> -->


                <div id="desc">
                    <p class="desc">
                        <?= $description; ?><br>
                    </p>
                </div>
                <!--comments !!!! -->
                <?php
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $database = 'all_codes';

                $conn = mysqli_connect($host, $user, $password, $database);

                if (!$conn) {
                    die('Connection failed: ' . mysqli_connect_error());
                }

                $sql = "SELECT * FROM users WHERE id = '$user_id'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    for ($i = 0; $i < mysqli_num_rows($result); $i++) {


                        $row = mysqli_fetch_assoc($result);

                        $imgac = $row['image'];
                        $nameuser = $row['name'];
                    }
                }

                ?>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                } else {
                    $id = 1; // تعيين قيمة افتراضية للمتغير إذا لم يتم تمريره في الـ URL
                }

                //echo $id;
                ?>
                <div>
                    <form method="POST">
                        <p style="font-weight: bold; position: absolute; color: white;" name="nameuse"><?= $nameuser; ?></p><br><br>
                        <img src="<?= "uploaded_img/" . $imgac; ?>" alt="" style="margin-left: -900px;border-radius: 50%; width: 70px; margin-left: 20px;width: 40px;height: 40px;border-radius: 50%;margin-right: 10px; top: -200px;" name="imgussr"><br><br>
                        <input type="text" id="" style="width: 1100px; height: 50px; border: none; border-radius:10px; margin-left: -600px; padding-left: 110px;" name="commentrr">
                        <button type="submit" name="comment" style="background: green; border: none; border-radius: 8px; height: 50px;">comment</button>
                    </form>
                </div>

                <?php
                // ...

                if (isset($_POST['comment'])) {
                    $name = $nameuser;
                    $immg = $imgac;
                    $comment = $_POST['commentrr'];

                    $sql = "INSERT INTO `comments` (`id`, `post_id`, `username`, `photoname`, `comment` , `user_id`) VALUES (NULL, '$id', '$name', '$immg', '$comment' , '$user_id');";
                    if (mysqli_query($conn, $sql)) {
                        echo "Comment added successfully.";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }

                // ...
                ?>
            </div>
            <center>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <a href="<?= "comments/show-videos/index.php?id=" . $id; ?>"> > show All comments</a>
            </center>
        </div>
    </div>
    <style>
        #likeamddislike {
            position: absolute;
            margin-left: 500px;

        }

        #iconsd {
            margin-left: 200px;
        }

        #desc {
            width: 600px;
            border: 1px solid black;
            padding: 10px;
            white-space: pre-wrap;
            word-wrap: break-word;
            margin: 0;
            padding: 0;
        }

        video::-webkit-media-controls-start-playback-button {
            appearance: none;
            width: 50px;
            height: 50px;
            background-image: url('https://th.bing.com/th/id/OIP.mCu5mHS3L8yInTXLSGIyyAAAAA?pid=ImgDet&w=280&h=280&rs=1');
            background-size: cover;
            border: none;
            cursor: pointer;
        }

        /* إضافة تأثير عند تحويل الماوس على زر التشغيل */
        video::-webkit-media-controls-start-playback-button:hover {
            opacity: 0.7;
        }

        #main {
            position: relative;
            width: 640px;

        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            cursor: pointer;
            border: none;
            background-color: transparent;
            margin-left: 170px;
        }

        .play-button img {
            width: 100%;
            height: auto;
        }

        video {
            display: block;
            width: 100%;
            height: auto;
        }
    </style>
    <script>
        const playButton = document.querySelector('.play-button');
        const video = document.querySelector('video');

        playButton.addEventListener('click', function() {
            video.play();
            playButton.style.display = 'none';
        });
        video.addEventListener('pause', function() {
            playButton.style.display = 'block';
        });
    </script>

    <div id="sidebar" style="z-index: 150000;">
        <h2></h2>
        <?php
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'all_codes';

        $conn = mysqli_connect($host, $user, $password, $database);

        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        $sql = "SELECT id, file, account_holder_name, video_name, account_holder_image FROM videos";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {


                $row = mysqli_fetch_assoc($result);

                $video_url = $row['file'];
                $nme = $row['video_name'];
                $idvidios = $row['id'];

                $account_holder_name1 = $row['account_holder_name'];



        ?>

                <a href="<?= "show-videos.php?id=" . $idvidios ?>">
                    <div class="user-info">
                        <div class="video-container">
                            <video src="<?= $video_url ?>" style="width: 360px;" id="vidios" controls: false; width="100%"></video>
                        </div>
                        <div class="name-container">
                            <p style="display: inline-block;" id="namevidios"><?= $nme ?></p>
                            <p style="color: #fff;"><?= $account_holder_name1 ?></p>
                        </div>
                    </div>

                </a>

            <?php } ?>
        <?php } ?>
        <style>
            #vidios {
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
                border-bottom-left-radius: 10px;

            }

            #namevidios {
                font-weight: bold;
                color: white;
                font-size: large;
            }
        </style>
    </div>
    <script>
        if (screen.width < 600 || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            // إذا كان المستخدم يستخدم جهازًا محمولًا، تعديل شكل الصفحة
            document.body.style.background = "black";
            document.querySelector("h1").style.fontSize = "24px";
            document.querySelector("p").style.lineHeight = "1.5";
        }
    </script>


    <script>
        function copyToClipboard() {
            var url = window.location.href; // get the current page URL
            navigator.clipboard.writeText(url); // copy the URL to clipboard
            alert("URL copied to clipboard!");
        }
    </script>
    <script>
        // Get references to the video player and sidebar
        const videoPlayer = document.getElementById("video-player");
        const sidebar = document.getElementById("sidebar");

        // Add an event listener to detect changes in the viewport size
        window.addEventListener("resize", () => {
            // Check the width of the viewport
            const width = window.innerWidth ||
                document.documentElement.clientWidth ||
                document.body.clientWidth;

            if (width < 600) {
                // Modify the styles of the video player and sidebar for small screens
                videoPlayer.style.width = "100%";
                videoPlayer.style.marginTop = "70px"; // add this line to adjust the margin top
                sidebar.style.display = "none";
                // Add other style modifications as needed
            } else {
                // Reset the styles of the video player and sidebar for larger screens
                videoPlayer.style.width = "600px";
                videoPlayer.style.marginTop = "0"; // add this line to reset the margin top
                sidebar.style.display = "block";
                // Add other style modifications as needed
            }
        });
    </script>

    <head>
        <script src="https://cdn.jsdelivr.net/npm/@simondmc/popup-js@1.4.0/popup.min.js"></script>
    </head>
</body>

</html>


<!-- <div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="https://profile-sir-hamed.netlify.app/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div> -->