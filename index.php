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



<!DOCTYPE html>
<html id="html" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title>videos ["SocialFuse"]</title>
	<!-- <link rel="stylesheet" href="Phttps://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/jquery-ui.min.css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/jquery.tagit.css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/font-awesome.min.css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/twemoji-awesome.css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/bootstrap-glyphicons.css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/bootstrap.min.css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/sweetalert2.min.css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/notifIt.min.css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/style.css" id="style-css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/night-mode.css" class="night-mode-css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/custom.style.css">
	<link href="code/material.css" rel="stylesheet" type="text/css">
	<link href="code/roboto.css" rel="stylesheet">
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/jquery-3.min.js"></script>
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/jquery-ui.min.js"></script>
	<script type="text/javascript" src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/jquery.form.min.js"></script>
	<script type="text/javascript" src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/tag-it.min.js"></script>
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/mediaelementplayer.min.css">

	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/sweetalert2.js"></script>
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/notifIt.min.js"></script>
	<link href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/bootstrap-toggle.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/bootstrap-select.min.css">
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/bootstrap-select.min.js"></script>
	<link rel="stylesheet" href="code/owl.carousel.min.css">
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/owl.carousel.min.js"></script>
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/speed.min.js"></script>
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/speed.min.css">
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/speed-i18n.js"></script>
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/jump-forward.min.js"></script>
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/jump-forward.min.css">
	<script src="code/ads.min.js"></script>
	<link rel="stylesheet" href="code/ads.min.css">
	<script src="code/ads-i18n.js"></script>
	<script src="code/ads-vast-vpaid.js"></script>
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/quality.min.js"></script>
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/quality.min.css">
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/facebook.min.js"></script>
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/fingerprint2.js"></script>
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/emojionearea.js"></script>
	<link rel="stylesheet" type="text/css" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/emojionearea.min.css">
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/bootstrap-colorpicker.min.css">
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/bootstrap-colorpicker.min.js"></script>
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/v1.js"></script>
	<script type="text/javascript" src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/2co.min.js"></script>
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/socket.io.js"></script>
	<link rel="stylesheet" href="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/swiper-bundle.min.css">
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/swiper-bundle.min.js"></script>
	<script src="https://64b353cf9a72cb69a4efe04d--bucolic-frangipane-5fa4dc.netlify.app/plupload.full.min.js"></script> -->
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
	<script>
		function RunLiveAgora(channelName, DIV_ID, token) {
			var agoraAppId = '9471c47b589c4a35abf3f7338ef18629';
			var token = token;

			var client = AgoraRTC.createClient({
				mode: 'live',
				codec: 'vp8'
			});
			client.init(agoraAppId, function() {


				client.setClientRole('audience', function() {}, function(e) {});

				client.join(token, channelName, 0, function(uid) {}, function(err) {});
			}, function(err) {});

			client.on('stream-added', function(evt) {
				var stream = evt.stream;
				var streamId = stream.getId();

				client.subscribe(stream, function(err) {});
			});
			client.on('stream-subscribed', function(evt) {
				var video_id = $('#video-id').val();
				if (!video_id) {
					return false;
				}
				$('#' + DIV_ID).html('<div class="wow_liv_counter"><span id="live_word_' + video_id + '">Live</span> <span id="live_count_' + video_id + '"> 0</span></div><div id="live_post_comments_' + video_id + '" class="wow_liv_comments_feed user-comments"></div>');
				var remoteStream = evt.stream;
				remoteStream.play(DIV_ID);
				$('#player_' + remoteStream.getId()).find('video').css('position', 'relative');
			});
		}
		var site_url = '#';

		function PT_Ajax_Requests_File() {
			return site_url + '/';
		}

		function PT_Page_Loading_File() {
			return site_url + '/page_loading.php';
		}

		function OpenShareWindow(url, windowName) {
			newwindow = window.open(url, windowName, 'height=600,width=800');
			if (window.focus) {
				newwindow.focus();
			}
			return false;
		}

		function getCookie(name) {
			var value = "; " + document.cookie;
			var parts = value.split("; " + name + "=");
			if (parts.length == 2) return parts.pop().split(";").shift();
		}
	</script>
	<script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/header.js"></script>
	<script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/ima3.js" type="text/javascript"></script>
	<script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/agora.js"></script>
	<script type="text/javascript">
		window.UpdateChatU = 0;
		$(document).on('click', 'a[data-load]', function(event) {
			if ($('#live_post_id').length > 0) {
				DeleteLive();
				window.location = $(this).attr('href');
				return false;
			}
			$('#bar_loading').show();
			event.preventDefault();
			var url = $(this).attr('data-load');
			if ($('video').length > 0) {
				$('video')[0].pause();
			}
			$.ajax({
					url: PT_Page_Loading_File() + url,
					type: 'GET',
					dataType: 'html'
				})
				.done(function(data_html) {
					if ($(data_html).filter('#json-data').length > 0) {
						if (typeof(ads_) != 'undefined') {
							clearInterval(ads_);
						}

						data = JSON.parse($(data_html).filter('#json-data').val());

						(data.page == 'register' ||
							data.page == 'login' ||
							data.page == 'shorts' ||
							data.page == 'latest' ||
							data.page == 'top' ||
							data.page == 'trending' ||
							data.page == 'stock' ||
							data.page == 'upload-video' ||
							data.page == 'import-video' ||
							data.page == 'messages') ? $('#header_ad_').addClass('hidden'): $('#header_ad_').removeClass('hidden');

						(data.page == 'home') ? $('#home_menu_').addClass('active'): $('#home_menu_').removeClass('active');
						(data.page == 'history') ? $('#history_menu_').addClass('active'): $('#history_menu_').removeClass('active');
						(data.page == 'articles') ? $('#articles_menu_').addClass('active'): $('#articles_menu_').removeClass('active');
						(data.page == 'latest') ? $('#latest_menu_').addClass('active'): $('#latest_menu_').removeClass('active');
						(data.page == 'trending') ? $('#trending_menu_').addClass('active'): $('#trending_menu_').removeClass('active');
						(data.page == 'paid-videos') ? $('#paid_videos_').addClass('active'): $('#paid_videos_').removeClass('active');
						(data.page == 'top') ? $('#top_menu_').addClass('active'): $('#top_menu_').removeClass('active');
						(data.page == 'movies') ? $('#movies_menu_').addClass('active'): $('#movies_menu_').removeClass('active');
						(data.page == 'popular_channels') ? $('#popular_channels_menu_').addClass('active'): $('#popular_channels_menu_').removeClass('active');
						(data.page == 'stock') ? $('#stock_menu_').addClass('active'): $('#stock_menu_').removeClass('active');
						(data.page == 'shorts') ? $('#shorts_menu_').addClass('active'): $('#shorts_menu_').removeClass('active');


						window.history.pushState({
							state: 'new'
						}, '', data.url);
						$('#container_content').html(data_html);
						$('meta[name=title]').attr('content', data.title);
						$('meta[name=description]').attr('content', data.description);
						$('meta[name=keywords]').attr('content', data.keyword);
						$('title').text(data.title);
						var main_container_class = 'main-content ';
						(data.page != 'login') ? main_container_class += ' container ': main_container_class += ' welcome-page ';
						if (data.is_movie == true) {
							$('.toggle-mode').hide();
							$('.logo-img img').attr('src', '#');
							(data.page == 'watch') ? main_container_class += ' movies-container ': main_container_class += ' ';
						} else {
							if ($('#toggle-mode').prop("checked") === true) {
								$('.logo-img img').attr('src', '#');
							} else {
								$('.logo-img img').attr('src', '#');
							}
							$('.toggle-mode').show();
							(data.page == 'watch') ? main_container_class += ' watch-container ': main_container_class += ' ';
						}

						(data.page == 'movie') ? main_container_class += ' movies-container ': main_container_class += ' ';
						(data.page == 'go_pro') ? main_container_class += ' p-relative ': main_container_class += ' ';
						(data.page == 'home') ? main_container_class += ' home-container ': main_container_class += ' ';
						$('#main-container').attr('class', main_container_class);

						(data.page == 'watch') ? $('#header_change_2').attr('class', 'container watch-container'): $('#header_change_2').attr('class', 'container');
						(data.page == 'watch') ? $('#header_change_3').attr('class', 'container watch-container'): $('#header_change_3').attr('class', 'container');
					} else {
						window.location.href = site_url + '/login';
					}
				})
				.fail(function() {
					if (typeof(getCookie('user_id')) == 'undefined') {
						window.location.href = site_url + '/login';
					} else {
						window.location.href = site_url + '/404';
					}
				})
				.always(function() {
					window.scrollTo(0, 0);
					$('#bar_loading').delay(300).fadeOut(300);
					$(".video-player").hover(
						function(e) {
							$('.watermark').css('display', 'block');
						},
						function(e) {
							setTimeout(function() {
								if ($('.video-player:hover').length == 0) {
									$('.watermark').css('display', 'none');
								}
							}, 1000);
						}
					);
				});

		});

		function load_more_sub() {
			var id = $('.subscribers_').last().attr('data_subscriber_id');
			var user_id = '40261';
			$.post(PT_Ajax_Requests_File() + 'aj/user/get_more_subscribers_', {
				id: id,
				user_id: user_id
			}, function(data, textStatus, xhr) {
				if (data.status == 200) {
					if (data.html != '') {
						$('.user_subscribers_').append(data.html);
					} else {
						$('#user_subscribers__load').html("<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='currentColor' d='M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M17,13H7V11H17V13Z' /></svg> No more subscriptions");
					}

				}

			});
		}
	</script>
	<link rel="stylesheet" href="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/emojione.sprites.css">
	<form action="secyrety/ *"></form>
</head>

<body itemscope="" itemtype="http://schema.org/Organization" id="pt-body" class=" ">
	<style>
		.theme_switch {
			position: fixed;
			top: 200px;
			z-index: 9999;
			right: 15px;
		}

		.theme_switch .btn {
			box-shadow: 0 -5px 20px 5px rgb(0 0 0 / 15%);
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			overflow: hidden;
			padding: 8px 6px;
			width: 66px;
			height: 66px;
			background-color: #fff;
			border-radius: 6px;
			font-size: 13px;
			line-height: 1;
			font-weight: 500;
			color: #4a5259 !important;
		}

		.theme_switch .btn svg {
			width: 26px;
			height: 26px;
			margin: 0 0 7px;
		}

		.theme_switch_box {
			max-width: 950px;
		}

		.theme_switch_box .modal-content {
			box-shadow: 0 11px 15px -7px rgba(0, 0, 0, .2), 0 24px 38px 3px rgba(0, 0, 0, .14), 0 9px 46px 8px rgba(0, 0, 0, .12) !important;
			padding: 24px 24px 1px !important;
			border-radius: 10px !important;
			border: 0 !important;
		}

		.theme_switch_box .modal-header {
			border: 0 !important;
			background: transparent !important;
			padding: 0 !important;
			margin: 0 0 20px !important;
			display: flex;
			justify-content: space-between;
		}

		.theme_switch_box .modal-header:before,
		.theme_switch_box .modal-header:after {
			display: none;
		}

		.theme_switch_box .modal-header .modal-title {
			font-size: 20px !important;
			line-height: 32px !important;
			font-weight: 500 !important;
			font-family: "Roboto", sans-serif;
		}

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

		@media (min-width: 768px) {
			.theme_switch_box .modal-body .row {
				margin-left: -.5rem;
				margin-right: -.5rem;
			}

			.theme_switch_box .modal-body .row>div {
				padding-left: .5rem;
				padding-right: .5rem;
			}
		}

		@media (max-width: 768px) {
			.theme_switch_box .modal-body>p {
				display: none;
			}
		}
	</style>
	
	
	<div id="pop_up_18" class="modal matdialog et_plus" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<svg xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" viewBox="0 0 328.863 328.863" height="120" width="120" xml:space="preserve">
						<g id="_x34_4-18Plus_movie">
							<g>
								<path fill="currentColor" d="M104.032,220.434V131.15H83.392V108.27h49.121v112.164H104.032z"></path>
							</g>
							<g>
								<path fill="currentColor" d="M239.552,137.23c0,9.76-5.28,18.4-14.08,23.201c12.319,5.119,20,15.84,20,28.32c0,20.16-17.921,32.961-45.921,32.961 c-28.001,0-45.921-12.641-45.921-32.48c0-12.801,8.32-23.682,21.28-28.801c-9.44-5.281-15.52-14.24-15.52-24 c0-17.922,15.681-29.281,40.001-29.281C224.031,107.15,239.552,118.83,239.552,137.23z M180.51,186.352 c0,9.441,6.721,14.721,19.041,14.721c12.32,0,19.2-5.119,19.2-14.721c0-9.279-6.88-14.561-19.2-14.561 C187.23,171.791,180.51,177.072,180.51,186.352z M183.391,138.83c0,8.002,5.76,12.48,16.16,12.48c10.4,0,16.16-4.479,16.16-12.48 c0-8.318-5.76-12.959-16.16-12.959C189.15,125.871,183.391,130.512,183.391,138.83z">
								</path>
							</g>
							<g>
								<path fill="currentColor" d="M292.864,120.932c4.735,13.975,7.137,28.592,7.137,43.5c0,74.752-60.816,135.568-135.569,135.568 S28.862,239.184,28.862,164.432c0-74.754,60.816-135.568,135.569-135.568c14.91,0,29.527,2.4,43.5,7.137V5.832 C193.817,1.963,179.24,0,164.432,0C73.765,0,0.001,73.764,0.001,164.432s73.764,164.432,164.431,164.432 S328.862,255.1,328.862,164.432c0-14.807-1.962-29.385-5.831-43.5H292.864z">
								</path>
							</g>
							<g>
								<polygon fill="currentColor" points="284.659,44.111 284.659,12.582 261.987,12.582 261.987,44.111 230.647,44.111 230.647,66.781 261.987,66.781 261.987,98.309 284.659,98.309 284.659,66.781 316.186,66.781 316.186,44.111 ">
								</polygon>
							</g>
						</g>
					</svg>
					<h4>Please note that if you are under 18, you won't be able to access this site. </h4>
					<p>Are you 18 years old or above?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success matbtn" id="pop_up_18_yes">Yes</button>
					<button class="btn matbtn" id="pop_up_18_no">No</button>
				</div>
			</div>
		</div>
	</div>
	<a href="" id="link_redirect_to_page" data-load=""></a>
	<div id="bar_loading"></div>
	<input type="hidden" class="main_session" value="96081ec5f774946c7766b23bed372b284e43d4cf">
	<header>
		<nav class="navbar navbar-findcond navbar-fixed-top header-layout nav_bg_solid">
			<div class="pt_main_hdr" id="header_change">
				<div class="navbar-header">
					<div class="yp_slide_menu">
						<span id="open_slide" title="" data-toggle="tooltip" data-placement="bottom" onclick="SlideSetCookie('open_slide','yes',1);" data-original-title="Expand">
							<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 276.167 276.167">
								<g fill="currentColor">
									<path d="M33.144,2.471C15.336,2.471,0.85,16.958,0.85,34.765s14.48,32.293,32.294,32.293s32.294-14.486,32.294-32.293 S50.951,2.471,33.144,2.471z">
									</path>
									<path d="M137.663,2.471c-17.807,0-32.294,14.487-32.294,32.294s14.487,32.293,32.294,32.293c17.808,0,32.297-14.486,32.297-32.293 S155.477,2.471,137.663,2.471z">
									</path>
									<path d="M243.873,67.059c17.804,0,32.294-14.486,32.294-32.293S261.689,2.471,243.873,2.471s-32.294,14.487-32.294,32.294 S226.068,67.059,243.873,67.059z">
									</path>
									<path d="M32.3,170.539c17.807,0,32.297-14.483,32.297-32.293c0-17.811-14.49-32.297-32.297-32.297S0,120.436,0,138.246 C0,156.056,14.493,170.539,32.3,170.539z">
									</path>
									<path d="M136.819,170.539c17.804,0,32.294-14.483,32.294-32.293c0-17.811-14.478-32.297-32.294-32.297 c-17.813,0-32.294,14.486-32.294,32.297C104.525,156.056,119.012,170.539,136.819,170.539z">
									</path>
									<path d="M243.038,170.539c17.811,0,32.294-14.483,32.294-32.293c0-17.811-14.483-32.297-32.294-32.297 s-32.306,14.486-32.306,32.297C210.732,156.056,225.222,170.539,243.038,170.539z">
									</path>
									<path d="M33.039,209.108c-17.807,0-32.3,14.483-32.3,32.294c0,17.804,14.493,32.293,32.3,32.293s32.293-14.482,32.293-32.293 S50.846,209.108,33.039,209.108z">
									</path>
									<path d="M137.564,209.108c-17.808,0-32.3,14.483-32.3,32.294c0,17.804,14.487,32.293,32.3,32.293 c17.804,0,32.293-14.482,32.293-32.293S155.368,209.108,137.564,209.108z">
									</path>
									<path d="M243.771,209.108c-17.804,0-32.294,14.483-32.294,32.294c0,17.804,14.49,32.293,32.294,32.293 c17.811,0,32.294-14.482,32.294-32.293S261.575,209.108,243.771,209.108z">
									</path>
								</g>
							</svg>
						</span>

					</div>
					<div class="mobile">
						<a class="navbar-brand logo-img" href="index.php" itemprop="url">
							<img itemprop="logo" src="image/logo2.png" alt="SocialFuse" >
						</a>
					</div>




					<form class="navbar-form navbar-left search-header" role="search" action="index.php" method="GET">
						<div class="form-group">
							<a href="search_pages/search1.php"><input type="text" class="form-control" id="search-bar" name="search" placeholder="Search for videos" autocomplete="off"></a>
							<span class="search_line">
							</span>
							<svg class="feather feather-search" onclick="javascript:$('.search-header input').focus();" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" name="submit">
								<g id="Group_304" data-name="Group 304" transform="translate(941 2420)">
									<g id="Search_1" data-name="Search 1" transform="translate(-939.756 -2417.756)">
										<path id="Path_57" data-name="Path 57" d="M2,7.752A6.752,6.752,0,1,1,8.752,14.5,6.752,6.752,0,0,1,2,7.752ZM7.971,3.209a.563.563,0,0,1-.468.644A3.189,3.189,0,0,0,4.853,6.5a.563.563,0,0,1-1.112-.176A4.314,4.314,0,0,1,7.327,2.741.563.563,0,0,1,7.971,3.209Z" fill="currentColor" fill-rule="evenodd"></path>
										<path id="Path_58" data-name="Path 58" d="M18.47,17.47a.75.75,0,0,1,1.061,0l4,4A.75.75,0,1,1,22.47,22.53l-4-4A.75.75,0,0,1,18.47,17.47Z" transform="translate(-4.238 -4.238)" fill="currentColor"></path>
									</g>
									<rect id="Rectangle_321" data-name="Rectangle 321" width="24" height="24" transform="translate(-941 -2420)" fill="none"></rect>
								</g>
							</svg>
						</div>
						<div class="search-dropdown hidden"></div>
					</form>


				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="show-in-mobile pull-left top-header">
						<a href="search_pages/search1.php" class="search-icon hdr_hover_btn">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<g id="Group_304" transform="translate(941 2420)">
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
						<a href="privet-chat/users.php" class="hdr_hover_btn">
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
					<li class="dropdown profile-nav hide_upload_mobi_link">
						<a href="javascript:void(0);" class="dropdown-toggle hdr_hover_btn" data-toggle="dropdown">
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
							<li class="hide_up_imp">
								<a href=<?= "uploadpost/upload.php?id=" . $user_id ?> class="uploadd">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M7 10.25L6.96421 10.25C6.05997 10.25 5.33069 10.25 4.7424 10.3033C4.13605 10.3583 3.60625 10.4746 3.125 10.7524C2.55493 11.0815 2.08154 11.5549 1.7524 12.125C1.47455 12.6063 1.35826 13.1361 1.3033 13.7424C1.24998 14.3307 1.24999 15.06 1.25 15.9642L1.25 15.9642L1.25 16L1.25 16.0358L1.25 16.0358C1.24999 16.94 1.24998 17.6693 1.3033 18.2576C1.35826 18.8639 1.47455 19.3937 1.7524 19.875C2.08154 20.4451 2.55493 20.9185 3.125 21.2476C3.60625 21.5254 4.13605 21.6417 4.7424 21.6967C5.33067 21.75 6.05992 21.75 6.96412 21.75L6.96418 21.75L7 21.75L17 21.75L17.0357 21.75C17.94 21.75 18.6693 21.75 19.2576 21.6967C19.8639 21.6417 20.3937 21.5254 20.875 21.2476C21.4451 20.9185 21.9185 20.4451 22.2476 19.875C22.5254 19.3937 22.6417 18.8639 22.6967 18.2576C22.75 17.6693 22.75 16.94 22.75 16.0358L22.75 16L22.75 15.9642C22.75 15.06 22.75 14.3307 22.6967 13.7424C22.6417 13.1361 22.5254 12.6063 22.2476 12.125C21.9185 11.5549 21.4451 11.0815 20.875 10.7524C20.3937 10.4746 19.8639 10.3583 19.2576 10.3033C18.6693 10.25 17.94 10.25 17.0358 10.25L17 10.25L16 10.25C15.5858 10.25 15.25 10.5858 15.25 11C15.25 11.4142 15.5858 11.75 16 11.75L17 11.75C17.9484 11.75 18.6096 11.7507 19.1222 11.7972C19.6245 11.8427 19.9101 11.9274 20.125 12.0514C20.467 12.2489 20.7511 12.533 20.9486 12.875C21.0726 13.0899 21.1573 13.3755 21.2028 13.8778C21.2493 14.3904 21.25 15.0516 21.25 16C21.25 16.9484 21.2493 17.6096 21.2028 18.1222C21.1573 18.6245 21.0726 18.9101 20.9486 19.125C20.7511 19.467 20.467 19.7511 20.125 19.9486C19.9101 20.0726 19.6245 20.1573 19.1222 20.2028C18.6096 20.2493 17.9484 20.25 17 20.25L7 20.25C6.05158 20.25 5.39041 20.2493 4.87779 20.2028C4.37549 20.1573 4.0899 20.0726 3.875 19.9486C3.53296 19.7511 3.24892 19.467 3.05144 19.125C2.92737 18.9101 2.8427 18.6245 2.79718 18.1222C2.75072 17.6096 2.75 16.9484 2.75 16C2.75 15.0516 2.75072 14.3904 2.79718 13.8778C2.84271 13.3755 2.92737 13.0899 3.05144 12.875C3.24892 12.533 3.53296 12.2489 3.875 12.0514C4.0899 11.9274 4.37549 11.8427 4.87779 11.7972C5.39041 11.7507 6.05158 11.75 7 11.75L8 11.75C8.41421 11.75 8.75 11.4142 8.75 11C8.75 10.5858 8.41421 10.25 8 10.25L7 10.25ZM16.5303 6.46967L12.5303 2.46967C12.2374 2.17678 11.7626 2.17678 11.4697 2.46967L7.46967 6.46967C7.17678 6.76256 7.17678 7.23744 7.46967 7.53033C7.76256 7.82322 8.23744 7.82322 8.53033 7.53033L11.25 4.81066L11.25 16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16L12.75 4.81066L15.4697 7.53033C15.7626 7.82322 16.2374 7.82322 16.5303 7.53033C16.8232 7.23744 16.8232 6.76256 16.5303 6.46967Z" fill="currentColor"></path>
									</svg> Upload posts
								</a>
							</li>



							<li class="divider"></li>
							<li class="hide_up_imp">
								<a href="shorts-vidios.php">
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
					<li class="dropdown hide-from-mobile pull-left profile-nav">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<img class="header-image" src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="users name" style="width: 40px;height: 40px;border-radius: 50%;margin-right: 10px;">
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
									<img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="users name" style="width: 40px;height: 40px;border-radius: 50%;margin-right: 10px;">
								</div>



								<a class="name_channel" href="<?= "user_page_profile/index.php?id=" . $user_id; ?>">
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

					<script type="text/javascript">
						$(function() {
							$('.switch input').on("click", function() {
								$(this).parent().toggleClass('active');
							});
						});
					</script>
				</ul>
			</div>
		</nav>

		<nav class="navbar navbar-findcond navbar-fixed-top header-layout hidden search-bar nav_bg_solid">
			<div class="navbar-header">
				<form class="search-header-mobile" role="search" action="index.php" method="GET">
					<div class="form-group">
						<input type="text" class="form-control" id="search-bar-mobile" name="keyword" placeholder="Search for videos" autocomplete="off">
					</div>
					<div class="search-dropdown hidden"></div>
				</form>
			</div>
		</nav>

		<script>
			jQuery(document).ready(function($) {
				pt_get_notifications({
					type: 'new'
				});
				UpdateInfo();

				$("#get-notifications").click(function(event) {
					if ($('#notifications').css('display') == 'none') {
						var notfi_cont = $("ul.notfi-dropdown");

						if ($("span#new-notifications").html() != '') {
							$(this).find('span#new-notifications').empty();
						}

						pt_get_notifications({
							sa: 1
						});
					}
				});

				setInterval(function() {
					pt_get_notifications({
						type: 'new'
					});
				}, 6000);
			});

			function UpdateInfo() {
				$.post('0533424127aj/user/update_info?hash=' + $('.main_session').val(), function(data, textStatus, xhr) {});
			}

			function pt_get_notifications(args) {
				if (!args) {
					args = {};
				}
				var notfi_cont = $("ul.notfi-dropdown");
				var notfi_set = $("ul#notifications");

				defparams = {
					type: false,
					sa: false
				}

				options = Object.assign(defparams, args);
				data = {
					'hash': $('.main_session').val()
				};

				if (options['type']) {
					data['t'] = options['type'];
				}

				if (options['sa']) {
					data['sa'] = options['sa'];
					notfi_set.find('i.spin').removeClass('hidden');
				}

				$.ajax({
						url: '0533424127aj/get_notifications',
						type: 'GET',
						dataType: 'json',
						data: data
					})
					.done(function(data) {
						if (data.status == 200) {
							if (data.new) {
								$("span#new-notifications").html($('<b>', {
									text: data.new
								}));
							} else {
								notfi_set.find('b').text(data.len);
								notfi_set.find('ul').html(data.html);
							}
						} else if (data.status == 304 && options['sa']) {
							notfi_set.find('ul').html('<li class="empty_state no-notifications"><svg class="feather" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g id="Group_307" data-name="Group 307" transform="translate(1002 2420)"><g id="Notification_2" data-name="Notification 2" transform="translate(-1002.25 -2420.25)"><path id="Path_52" data-name="Path 52" d="M5.5,7.6A5.645,5.645,0,0,1,11.1,1.25h1.7A5.625,5.625,0,0,1,16.893,3a3,3,0,1,0,1.434,5.689,3.134,3.134,0,0,0,1,2.113l.044.041a4.562,4.562,0,0,1-3.1,7.9H8.041a4.72,4.72,0,0,1-4.247-2.66l-.1-.213a4.4,4.4,0,0,1,.975-5.155A2.9,2.9,0,0,0,5.578,8.23Z" fill="currentColor"></path><path id="Path_53" data-name="Path 53" d="M8.733,20.4a.75.75,0,0,1,1.05.15l.3.4a2.625,2.625,0,0,0,4.2,0l.3-.4a.75.75,0,1,1,1.2.9l-.3.4a4.125,4.125,0,0,1-6.6,0l-.3-.4A.75.75,0,0,1,8.733,20.4Z" fill="currentColor"></path><path id="Path_54" data-name="Path 54" d="M19.183,6a2,2,0,1,1-2-2A2,2,0,0,1,19.183,6Z" fill="currentColor"></path></g><rect id="Rectangle_319" data-name="Rectangle 319" width="24" height="24" transform="translate(-1002 -2420)" fill="none"></rect></g></svg> You do not have any notifications</li>');
						}

						if (data.count_messages > 0) {
							$('#new-messages').html('<b>' + data.count_messages + '</b>');
						} else {
							$('#new-messages').html('');
						}

						if (options['sa']) {
							notfi_set.find('i.spin').addClass('hidden');
						}

					})
					.fail(function() {
						console.log("error");
					});
			}
		</script>

		<script>
			$('.search-icon').on('click', function(event) {
				event.preventDefault();
				$('.search-bar').toggleClass('hidden');
			});

			$('#open_slide').on('click', function(event) {
				event.preventDefault();
				$('body').toggleClass('side_open');
			});

			current_width = $(window).width();
			if (current_width <= 1300) {
				$('#open_slide').on('click', function(event) {
					$('body').addClass('mobi_side_open');
				});
			}

			$('#search-bar').keyup(function(event) {
				var search_value = $(this).val();
				var search_dropdown = $('.search-dropdown');
				if (search_value == '') {
					search_dropdown.addClass('hidden');
					search_dropdown.empty();
					return false;
				} else {
					search_dropdown.removeClass('hidden');
				}
				$.post('0533424127aj/search', {
					search_value: search_value
				}, function(data, textStatus, xhr) {
					if (data.status == 200) {
						search_dropdown.html(data.html);
					} else {
						search_dropdown.addClass('hidden');
						search_dropdown.empty();
						return false;
					}
				});
			});

			jQuery(document).click(function(event) {
				if (!(jQuery(event.target).closest(".search-dropdown").length)) {
					jQuery('.search-dropdown').addClass('hidden');
				}
			});
		</script>
		<div class="clear"></div>
	</header>
	<div class="yp_side_menu has_side_menu">
		<div id="main-container" class="container    home-container main-content" data-logged="true">
			<div class="ads-placment" id="header_ad_"></div>
			<div class="announcement-renderer">

			</div>

			<div id="" class=" new_left_right">
				<div class="left_menu desktop">
					<div class="top_logo hide_iam_from_mobile">
						<a class="navbar-brand logo-img" href="index.php" itemprop="url">
							<img itemprop="logo" src="image/logo2.png" alt="SocialFuse">
						</a>
					</div>

					<div class="yp_side_drawer">
						<span class="open_side_menu_head">
							<span onclick="javascript:$('body').removeClass('side_open');$('body').removeClass('mobi_side_open');">
								<svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
									<path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z">
									</path>
								</svg>
							</span>
						</span>

						<ul class="sections pt-200">
							<div class="menu_static_text top_static">
								MENU
							</div>
							<li class="active" id="home_menu_">
								<a href="index.php" data-load="?link1=home">

									<img src="image/video-camera.png" alt="" style="width: 26px; color: #fff; margin-bottom: 5px;">
									<span>videos</span>
								</a>
							</li>
						</ul>



						<ul class="sections">
							<li class="hide-from-mobile " id="shorts_menu_">
								<a href="shorts-vidios.php">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<g id="Group_290" data-name="Group 290" transform="translate(1296 2420)">
											<path id="Group_261" data-name="Group 261" d="M14,1.732a6,6,0,0,0-6,0L3.608,4.267a6,6,0,0,0-3,5.2v5.072a6,6,0,0,0,3,5.2L8,22.267a6,6,0,0,0,6,0l4.392-2.536a6,6,0,0,0,3-5.2V9.464a6,6,0,0,0-3-5.2ZM10.1,16.247q.627.057,1.159.057a8.134,8.134,0,0,0,1.539-.142,4.885,4.885,0,0,0,1.339-.427,2.5,2.5,0,0,0,.931-.8,2.254,2.254,0,0,0-.01-2.432,2.574,2.574,0,0,0-1.092-.836,8.634,8.634,0,0,0-1.891-.579,7.84,7.84,0,0,1-1.938-.618,1.09,1.09,0,0,1-.665-1,.866.866,0,0,1,.323-.7,2.065,2.065,0,0,1,.865-.4,4.89,4.89,0,0,1,1.168-.133,6.971,6.971,0,0,1,1.216.095,5.879,5.879,0,0,0,.912.086,1.111,1.111,0,0,0,.37-.057.54.54,0,0,0,.266-.181.521.521,0,0,0,.1-.333q0-.209-.275-.361a2.621,2.621,0,0,0-.722-.266,8.13,8.13,0,0,0-.969-.161,9.034,9.034,0,0,0-1-.057,7.981,7.981,0,0,0-1.587.152,5.118,5.118,0,0,0-1.339.437,2.645,2.645,0,0,0-.922.741,1.646,1.646,0,0,0-.332,1.026,1.9,1.9,0,0,0,.389,1.2,3.03,3.03,0,0,0,1.14.855,8.838,8.838,0,0,0,1.843.57,11.855,11.855,0,0,1,1.653.437,1.976,1.976,0,0,1,.845.513,1.105,1.105,0,0,1,.247.751.942.942,0,0,1-.408.807,2.53,2.53,0,0,1-1.026.418,6.715,6.715,0,0,1-1.3.124,6.841,6.841,0,0,1-1.216-.1q-.57-.114-1.026-.218a3.312,3.312,0,0,0-.713-.1.77.77,0,0,0-.5.142.525.525,0,0,0-.171.428.508.508,0,0,0,.171.4,1.668,1.668,0,0,0,.475.266,5.039,5.039,0,0,0,.95.256A11.4,11.4,0,0,0,10.1,16.247Z" transform="translate(-1294.608 -2419.928)" fill="currentColor" fill-rule="evenodd"></path>
											<rect id="Rectangle_310" data-name="Rectangle 310" width="24" height="24" transform="translate(-1296 -2420)" fill="none"></rect>
										</g>
									</svg>

									<span>Shorts</span>
								</a>
							</li>
						</ul>

						<ul class="sections subs_list">

							<!-- <h3>Subscriptions</h3> -->

							<!--<li><a href="javascript:void(0)" onclick="load_more_sub()" id="user_subscribers__load">Show more</a></li>-->
						</ul>

						<ul class="sections more_links_list">
							<li>
								<a href="posts.php">

									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFcUlEQVR4nO2ae4hXVRDHP/vQsmzVDKotdTPLsqAylZJAiDIqKSuKsqckFmVttYEVFC49LA1qIxeiLAjTLHpb0QMr7SmZbVmJuPbAVw8js922Mn8x8D0wXO69v/u7+9vd3x8NHH535pydc7/nnJkzM3cBlgOFCmkr6QYVKqzlpm4rKBP9DyRpJZb3kU2UfUf6yiZ6DEhPU9K8I4GqciosRnsBTcAq4DdgO/AqMKGb8xaAP6R3IXATMBmo7wkgQ4E1KcfFXqIh57wbgd0Jen8FXtYilgXIY+6FJwH7AAcANwPt6vsgJxCk70RgJvAw8K5AhDGjKQOQPbT1/wLDYvoH6piZjkNS9CTNu1/C+D2BXcBfQL9yAGlQ/4aUMR9qzMQcQApa/Y+BJ4Ax6j9WfWtLVZhEw9X/fcqYtRpzdA4gP0dAPaj+S8QvLReQ/tpeO1oDEvr/BLp0HPLMOxR4Sfz1kt0r/v5yAennbODQmP5R6vtd9pJ33o/Enyz+FTdmG/CCnMtELV7JQEY7N1kd01+tY2djjsgJpEoLYfz+kn0r/qcYt/xFHiAD3CSzYvrnqG97knfJAKTBvXRwx3a3dAA18oZmM097e81zj1yqMXYpRndjo/pOL6Ijbd4z9WwBrNEJ4tcDg9zfTJd8SV4gtW6LL3PyRsnaM8RLafPO1vND4q90/TuAAyMX86y8QIxmaNzzTrZMMpu4GKXN+6Se7WY3eiBiEyHu+lr8cd0BMlXjzHsEel2ys7sJ5LPIhfqW6zejDy7a7GanTkjJQOzInAp8qXGtrq9Fss3AVcDeOYDU6B7a7exhi+tfJNkU8W9nWZmot7pOBhfGrIuE14OB91y/hffzFVBmBXK4fn9wK++P1TWSzxXfXAqQ8c6PW/sOuCXhZrcduxBYEYmdpmQEcq5+X5N8UgSIxVw4/ZOzAhnmQujVwDna/ix0jJKtgo5LCADT5r1Dv/MkvzbisWp0k3cqGh6UFcgS8YuDUZVItkMLpMOSomLzLo249VbX92bkXmnzExUDEuKqEeSng53NFJv3K/2OldwfUYsaUPobdTSJCnurRef9W0cm2J/PDM1bGj0n/uI0ICt7EcSKhAVcL9lBTmbg6iTfGpeBxnmpviAPxFbc6DQnWxNJEzYnKagkIM2SNTmZFSGMLhf/TJKCSgJygWSPO9k0yR4R35ikoJKAjJFslZM1ROoB45MU9DWF9wjlnmqVnbw9DFatoDOkt3EKKqW16b1GOlmwhzPEvxO3Er3pbrO0+Xqvs5zsRsnuFH93li3eocGfAo/KqE5JiGDLTQPd860OyITItxtLhYvSJymr9Yu21Vzh1cBJwJCewcRTmrNTNlMrm7E8Zd+sSoareDDXhQ1hp+LaJuANFc+my6OkJVVZqE26Lb8xGudisZJpaiQLq9cxa5Q/f995lri2RWlqi6LZ4xNymCjVqlLp7eEG8TZvyRTKlC8mVN6Rmxwl0Lcp7G+TG40D949W1TzR7cB5ygp9jnOkGx8SshDeX5EHSMhFCi79XKyUd2yR/KRWL3S+wu9ngW8EJA6gJV6rVUFZJFmXs4dNkh2WB0i9vMcyl5f4tlPHrlkBXohO06i/MseLgHtUrN6gi64QaaGuNUL8j3m/L3qqUugwQ98t1sVMvEvHaoFKmsU+v3myz2njdHTmaedD7XhaTOmprFQn458jo+6MAbdVlfTZctf2xatUapUuq773CtXKMzXqrIeqvG8d8nYtsh8r9xSjz/W39l2xz6heL9yiaCHOFtoFfCZwVMQO6nRku3LuZo/REAV/dylK6IgBtk320OTuD9vFiqYa7YLthu1K+CwRbff19YvmIXO35qksprNc3cpIqf9R8R9Fhq2uDkMTPgAAAABJRU5ErkJggg==" width="30px">


									<span>posts</span>
								</a>
							</li>
						</ul>


						<ul class="sections more_links_list">
							<li>
								<a href="privet-chat">

									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADpklEQVR4nO2aaYhOURjHf5gZZBDGMgkToTAo5YtkGUOSTGq+KFuh5Iuyi2wlWbImERFFQnYiNLYQsmTfs8Uwtuxmrs70f3V7Zy7vve9d3g/+9Xw5557nPP+zPs9zLrhHdaAvMAfYB9wESoCfwBfgGXAV2A1MBroDGaQQugAbgPeA5VKKgWVAxygJdAYOxxl2GVgIDAZygfpAGlATaKqyIcAKzY697Q6gVZgEqgMLtGSMAV+B1UBrD7o6akY+Sdd3YBZQlYCRDZxVp6XAcqCJT3rXAb+k+xDQgICQAzxQRy+B/AD6yANeqY9bQCO/O2gEPFQHF4PowAazl67Z9lxdvxRXA05K8Q0gi+DRGLijPvf6pXSaFD7VaIWFHNuRPjxZZcbwz0CZ1m/YGCkiJUC9ZBStkqLtRIfYsp7iVUFt4KOUdCA6DLAtbXOHuUahFJwiWlQBbssWczQvAdq5UbBWjScRPRbFuTNmz24FmifS+IIaGS81ahQ6OJ1fNNBm1hxRrI+DvPwSRad/eNE7gTpOjb/ro1SIGZonEBJccvICvumDGkSPlgnGN8ahrRXf+KUqw7zNndDVRbC2Mb5xkSqC8HLdYpjLyHOQvfESFc4leqx3SeSFfUvkq/B6tBzKb/PXHvIBY2MK0pT5MIU9IiQy1AMJI/ft98t0FRrHLQpkyCDLo5j7pxyZttMr6ZjAA+YkQcJS/qyCe/DBrbOWJPJsmRrLo+xyOjUeAc1CSvp5SfhZlVyQFU6OE6p87DGHlSh6Au98IGEpYVIBmbZ00IwACKRpTf/wiYTlRKSFzZFs6zOJfKV+LJ/lUmXH4DFV7vfJeJNMGA2cD4CAJdkaT2KPKt5qZpzQXtHcNCWy87RxjdPXDxgFLAbO+XAiWQnIhJhhDW2b3CSauzmM7AjgdAiGWS6lPGnSBniiguca2RiyZPwB275JNbkSMzaWdTeyBpgNbNFLVJmtzmTQj+rdY3wKELAkZv+V48xfPvqg57XRcTF9OnA3BUjcky1/NnkBME8POzM16p2V2HbCwLgZC1vKgD74hFhQFoUsxUeka9+ETeKQPARfYULNgyGSuKhH10CQoRMvDCJv/HzdckKBx7jbS/xRNWgymXrj8MtFtxxkR5BLLN6lGaO8WWlAZIqSfeFyC+Pq9NcdtVme9Vk5lUeATfqBYJuHOOWa3u9TDtnAxEp+/UjYjU9F5AJTgeP/cFpTnogdJvveCxgHzAdWaqn2DuME+w9c4jdPY1U3ZHF4FQAAAABJRU5ErkJggg==" style="width:30px;">


									<span>privet-chat</span>
								</a>
							</li>
						</ul>

						<ul class="sections more_links_list">
							<li>
								<a href="<?= "grou-chat/index.php?id=" . $user_id ?>">

									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAACXBIWXMAAAsTAAALEwEAmpwYAAAHCElEQVR4nO2cd4wVVRSHv7e7LrsKKIoUERE7QpAVSwQjiIhEgahYwRgFxYpREEWJMRrU2HuN2P/QBLGtvSHBrpQo0kVEigUjJjYExpzkN8nNdd7u473Zt/Pezpe8ZHfKmXPvzJxz7rnnDqSkpKSkpKSkpORBJVAHnA/cDrwIfAWsBH4F/gU26u+V2mfH3KZz6iSjRbELMB54E/gdCAr8mYw3gIuBzpQp1cBo4ANgs9cBi4HHgUnAicABQFegHVCln/29G9AHGAlcoXMWe7I26xqjgG0oA9oAU4A1TiP/AKYDpwIdYrhGR+B04HngT+c6q4GrgNaUIFWyUeucBs0Fzga2a8LrmuwxwDznumuBcdKpJOgDzHcaMAsY2Mg5GTXcXl+X19UZFc62bjl2yJHAbEePeRHyE0UlcI28pim8BDg+x3N76BxzBi6vAXO8DpymY62DcsHs6lKd849MSuI89w5qfGjI7wBqsxxrzmAFMNF7As9RWJJLZ0+SYwo5TQ6lZ5ZzTJe7HAdmN2Z7EsJewCLH3gxo5Pg9gQ3A9THqMFFP/mGNHDfQscsLpUuzsq+8XaBXzcIPn0HAkCLo0sr7v2+Wm7mbHFroqfehmdjPCU/eArbNcpwd83cz2J3VDVzXvPXbzdmJO8uOBbJ92eydcSxwCsXnZOCsBvbXOp24DNipWIpVK9oPgI+Amoi7629LClURnfiJ2vJesUYvt+uC3wOdIhS0V/ZLkscL0s0P5G38/IPadHNTK3G4QgHzeAdF7M9I0QdIHg8CX0Q4G+NQZX425eDJ86bGCUivo/yYqrYtytLJscRagYZpZZHpiLDtX6uNlxIzbYFfJHyot2+AhkhjKR2Okw0/ImK7tfEnZZJi42oJnhmx7xAZYQsbSoVTdNOtw3xmqa2T47qYBaLfSejRlD/HqK3fekmMvBnmBJuxCEw4GcdZWmcWzDMSZml0fyjXn9JnD6CLt+0qtfnJQoVXyKAGShy4LFU82CQuv0hUaFLKXleX/dXmdXoi8+Zgxx74jNoKdx/E/MtVfi7cEPF24dh9y+rkzXgJebQQISS7A7PxmGRcVIiQhyTkEloel6nt9xciJIyJjvISBoO9lHqpk5FTdO3d0Q3EvjmzTELc1PdYbZtI+XCe2mTTriF7a5s5y7wJPbAlUEO6yz7sR/lwoEpNejvbOqjtPxYi+B8Jyfd1DWJwEPnKKdSZtNK5Ni2QN39JSL4Z5qCld+BaCenkBZ8tYUjXIY5XeKGE2GR2yHyVSZQbr2vC3XciVmFRcBjjllG8CtRTfszV3HbIkDjCmPskZALlT8aLA2MJpMOY7+nC9aOphnHZZBPTUO7CQoTUZbEDtYoHy6UDu0dEGislx2LEvKlwyjd6ejnCTWUSTPdQW9zcX0+1eW2h6SxkA0zYtc620Zr/bUvps73aYmXC/hzQE3FcYJCEfRPH3SgBKpT/DOKqKquUDQw0P1LuDFVbl8c5YDjXKSbyOQG4s8RS+6br3VlKkMO66ivjvuCaLI91PbBFkXupsI90ftnbPtwZvsU6se4+hUs8l79zofMGzYSFJ+29h+SbpszAmz34UBewQpxy4ybHWTZZtr23swCwf8T+GtUGJrG8zeZ3ZmTZ10+x4CaVujUpE5wgc1dvX2vZSlt2lTTmqB7ar5nu4tj3G4ulzLO64GcRFZ9JXVJVE6GrFcZ/rra8XUzdW+uOBkr3NOX6t3wZ2UggvK3qosOJox0pMu21ADpQ3jB2t18AlZrPsbK7KOyGvyvdV2mxULPQ0XH981WokxSGZVlPt7uzmrNZO899EmdKofURFazFYKqubZ3TEIOdqdoFSbrh1cAjUsyq+Efkcf7l3txLNvpqYaKb2JishT9+VODau3s1+jAdX0liJqna+QZCLqsuozI+tpTVDdzneRM9aFlZVLldFBmVHi93piivTOqs4nApaeUgW0uVFlHbYuqQCk301Ecs6D67kdRaRrUtHzsZalsj0osEM12K3tKMOrTR6x1GB4E88ZgkLrJ26eWsYMrFMGf02poXLxRbqnWGssphJUWgZQyTGlhFmijqpbTNZDWGvabvOA21yfunVCU6Qk6isz51ktGinnbysHWyaZM1hxFWj4U/G8u+ry+CJHVE9D/OlPIbPBvmk5GdCx2NhR0/xzBL95sczQUxPdFFpbfTIQ2tVOqnbHbY6Oeckrlu+jCE1Sq/JGO/Rp972uJ8+mmFgvUZsrPjdP1EetRc6OrMndo0ZxR7O84lzPSeVGQ9E1u5tEidMjtiUrpO1QwbHdv0sJcBbrHUKmkaKE6zT56gEjiraP/Us1H1Sf/gTbG51fkG1hTgHo0YwmFS+MTNKEZ2txRZ34BHXKDF2FGfP0kRgb6Stkoec5pCiHKok0lJSUlJSUlJoYXwHyhqmiARarY1AAAAAElFTkSuQmCC" width="30px">


									<span>group-chat</span>
								</a>
							</li>
						</ul>

						<ul class="sections more_links_list">
							<li>
								<a href="user_page.php">

									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEGklEQVR4nO2aS2xWRRTHf0hpSyzRPihEIVRXIChEEyJ7DLWJ2OoKH0tSVmChGzbWuBICK3wGwoIVcWmxoguliQEsatAYH4USwksCmCYmyKsPc5L/TSb92ntn5k5bNPyTSb5895w59//NnDPnnPngAf6/eBTYCOwGeoHfgOvALQ37/CvwmWReAh7hPkEN8DpwFBgBxgOH6XwBvKa5Zhy1wHbgsvNSt4FjQA/QAawEGiVbq8+rgFck0w/ccfQvAW9JdkbwInDWeYEfgE6gPmKueun+6Mx3BtjANMJ+qQ8dg2a8NdHcc/QDnXbm3zcd220R8L0M/ANsA+amNgJUAV0KDmZrAGhONXmLltsm/h14ukB+BbAT+AYYEvGbwDngELDOw+ZqYFA2B/UOpVciI3FSDjsVmoCDwGhBpBoD3pV8HpqA7xwyzWV8IttOJ4C6HFkz8ktg6L0HfAI8nDNvnUNmINZnPnK2U95KPAR8G3GGZMN0qwtWZlCy74eSaHMcu8gnXi1BIhvdBTbWOAHAOzTPl5Oa0lYP+d4ERM572Oly/MVri+1wzom5HvH/7wREbDzpEZp/kqyF/0IHvxywhAsTkbCxPmDLXypalTckaNHKB4sTEmn3sDfHSWc25Ql+JaHNnkSaExLxdeItku/LS+BGlMVabeGDBTrgUhBZ7mmzQVnzvanqmXZN+DVhuJCAxGhg+t4vPSvOKrBHD98OJNKXgMjPgTbfkZ5VmhU4oocvB076QQIilqOFoEN6VjZXIEsDLHv1haUnfyYgckVz+WKlkz5V4C89NGfyRUPCqBViNzu/rk32MKuf8xK4iZinfKwsiduBmW2No5eECOqglCVinZQQZETsnZNsLcNzqgBjSZjus4E2m6R7I8/ZfQ+myaJIzDDdUDyV5+x9keE3W+prESSuRmxl9/C2I6MCeyMPxAzdEUSsyReDnrwDMTZFcSPYqQASA6oxYnAsL0VpVCIWkjROxJIAIo9H2mhQtLqb955fBqbxk62KL5HY1eiU/ud5Qm9KyIqXGNQFEMlrL/kUVnYLkBt9slI3pq/7RAARkw1Fm3Qv+kS7LPqcDlz+FnUjfYlY029ZwPxVSvfHdf1QiBqnHeSjsBbYH3m6m84B4HkPO9ulMxhy9rSphLWm2DNTpAhbJ1wDlB32a3dN0ePNGnRjMVs+a5n+4TScrUt+eMJNU+pxF/hUL5+l7GecO5NgzHcayCdUCRZ12lOOUeBjx++Ol7mWW6x7jfFZHkO64iiFpc7SzsY4FxmqJ8VjgaE11TiuXZEUtdqzqRpyeWNMPjmtd++t0+w3Z4EXmCHUKOZfSUjAUqNtkYVWaVTr7xdHFf9DX/6OGg+blDnfF6hXcbZLZbP9gWbYeelhfWfP3lNJHfNviQfgv4B/ARxzhNGFGL+bAAAAAElFTkSuQmCC" width="30px">


									<span>profile : <?= $name; ?></span>
								</a>
							</li>
						</ul>
						<div class="hidden cats_section">
							<div class="menu_static_text" style="margin-top: 20px;">

							</div>

						</div>
					</div>
				</div>

				<div class="content_main_wrapper" style="width: 200px;">

					<div id="container_content">
						<style type="text/css">
							#container_content {
								margin-top: 66px;
							}

							.swal2-modal {
								width: 600px !important;
							}
						</style>

						<div class="top_marsking">

						</div>
						<div class="owl-carousel pl_feat_vid_slider owl-theme home_feat pt_new_home_feat_vidd owl-loaded owl-drag" style="width: 200px;">



							<!--===========================vidios=====================================-->

							<?php
							$host = 'localhost';
							$user = 'root';
							$password = '';
							$database = 'all_codes';

							$conn = mysqli_connect($host, $user, $password, $database);

							if (!$conn) {
								die('Connection failed: ' . mysqli_connect_error());
							}

							$sql = "SELECT id, file, video_name, account_holder_image FROM videos";
							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result) > 0) {
								for ($i = 0; $i < mysqli_num_rows($result); $i++) {


									$row = mysqli_fetch_assoc($result);

									$video_url = $row['file'];
									$nme = $row['video_name'];
									$idvidios = $row['id'];
									$image_url = $row['account_holder_image'];
							?>

									<a href="<?= "show-videos.php?id=" . $idvidios ?>" style="display: inline-block; width: 360px;">
										<div class="user-info" style="display: inline-block;">
											<div class="video-container">
												<video src="<?= $video_url ?>" style="width: 360px;" id="vidios"></video>
											</div>
											<div class="name-container">
												<img src="<?= $image_url ?>" class="user-image" style="border-radius: 50%; display: inline-block; width: 40px; border: none;width: 40px;height: 40px;border-radius: 50%;margin-right: 10px;">
												<p style="display: inline-block;"><?= $nme ?></p>
											</div>
										</div>
									</a>

								<?php } ?>
							<?php } ?>
							<br><br>
							<style>
							

								.user-info {
									display: flex;
									align-items: center;
									justify-content: space-between;
									padding: 10px;
									background-color: #1b1b1b;
									border-radius: 10px;
									box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
									transition: all 0.3s ease-in-out;
									/* width: 2900px; */
								}

								.user-info:hover {
									transform: translateY(-5px);
									box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
								}

								.video-container {
									position: relative;
									width: 360px;
									height: 200px;
									margin-right: 20px;
									overflow: hidden;
									border-radius: 10px;
								}

								.video-container::before {
									content: "";
									display: block;
									position: absolute;
									top: 0;
									left: 0;
									width: 100%;
									height: 100%;
									background-color: rgba(0, 0, 0, 0.5);
									z-index: 1;
									transition: all 0.3s ease-in-out;
									opacity: 0;
								}

								.video-container:hover::before {
									opacity: 1;
								}

								.video-container video {
									position: absolute;
									top: 50%;
									left: 50%;
									transform: translate(-50%, -50%);
									width: 100%;
									height: 100%;
									object-fit: cover;
									z-index: 0;
								}

								.name-container {
									display: flex;
									align-items: center;
								}

								.user-image {
									margin-right: 10px;
									border-radius: 50%;
									width: 40px;
									height: 40px;
									border: none;
								}

								p {
									margin: 0;
									font-size: 18px;
								}
							</style>













							<div class="owl-dots disabled"></div>
						</div>
						<div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="https://profile-sir-hamed.netlify.app/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div>



						<!-- Modal -->
						<div class="share_feat_vid hidden">
							<div class="pt_wallet_forms">
								<div class="form-group">
									<label>
										<span>Share</span>
									</label>
								</div>
							</div>
							<div class="video_section_wrap form-group">
								<a href="">
									<div class="share-video" style="width: 100%;">
										<div class="row share-input" style="width: 100%;">
											<div class="col-md-10">
												<input type="text" value="0533424127watch/w5ul4cegwQVShpf" id="copy_feaat_vid" class="form-control input-md" readonly="readonly" onclick="this.select();">
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>


					</div>
				</div>

			</div>




			<input type="hidden" id="main-url" value="#">
			<div class="ads-placment" id="footer_ad_"></div>
		</div>
	</div>



	<script type="text/javascript" src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/script.js"></script>
	<script type="text/javascript" src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/bootstrap.min.js"></script>
	<script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/bootstrap-toggle.min.js"></script>
	<script src="PlayTube%20-%20The%20Ultimate%20Video%20Sharing%20Platform_files/footer.js"></script>
	


</body>

</html>
<!-- <footer><p>&copy; 2023 Social Fuse All rights reserved.</p></footer> -->