<?php
$background = $background != 'null' ? $background : '';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Diary of My Soul</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="<?=base_url()?>style/templated-snapshot/assets/css/main.css" />
	</head>
	<body>
		<div class="page-wrap">
		<input type="hidden"  id="base_url" value="<?=base_url()?>" >
			<!-- Nav -->
			<nav id="nav"  class="media">
				<ul>

				    <!-- <li><a href='#' class="big-link" data-reveal-id="SetSoul"><span class="icon style2 fa-key"></span></a> -->
				    	<li><a href='#' class="big-link" data-reveal-id="SetMenu"><span class="icon style2 fa-cog"></span></a>
				    <li><a href='#' class="big-link" data-reveal-id="SetPreface"><span class="icon style2 fa-vimeo-square"></span></a>
			    	<li><a href='#' class="big-link" data-reveal-id="SetPicture"><span class="fa fa-camera-retro fati3"></span></a>
				    <!-- <li><a href='#' @click="toLayout()"><span class="icon style2 fa-sign-out"> </span></a></li> -->
				    <input type='hidden' id="RevealOn">
				</ul>
			</nav>
			<!-- Main -->
			<section id="main">
				<input type='hidden' id='background' value="<?=$background?>">
				<div id="banner" >
					<div class="inner">
						<h1><?=$Preface->memo;?></h1>
						<p><?=htmlspecialchars_decode($Preface->value);?></p>
					</div>
					<div class="menutabs">
						<ul class="titles">
							<li class="title" style="cursor: pointer;" id="diary" onclick="location.href='diary';">心情日記</li>
						<?php foreach ($SelMenuList as $list): ?>
							<li class="title" style="cursor: pointer;" id="Menulist<?=$list->serive?>"
							onclick="location.href='<?=$list->template?>?code=<?=$list->BookmarkCode?>&serive=<?=$list->serive?>'">
							<?=$list->BookmarkName?></li>
						<?php endforeach?>

						</ul>
					</div>
				</div>

				<?=$content?>
			</section>
		</div>
		<!-- Scripts -->
		<script src="<?=base_url()?>style/templated-snapshot/assets/js/jquery.min.js"></script>
		<script src="<?=base_url()?>style/templated-snapshot/assets/js/jquery.poptrox.min.js"></script>
		<script src="<?=base_url()?>style/templated-snapshot/assets/js/jquery.scrolly.min.js"></script>
		<script src="<?=base_url()?>style/templated-snapshot/assets/js/skel.min.js"></script>
		<script src="<?=base_url()?>style/templated-snapshot/assets/js/util.js"></script>
		<script src="<?=base_url()?>style/templated-snapshot/assets/js/main.js"></script>
	</body>
</html>

<div id="SetSoul" class="reveal-modal">
	<?=$SetSoul?>
</div>
<div id="SetPreface" class="reveal-modal">
	<?=$SetPreface?>
</div>
<div id="SetPicture" class="reveal-modal">
	<?=$SetPicture?>
</div>
<div id="SetMenu" class="reveal-modal">
	<?=$SetMenu?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="<?=base_url()?>style/asset/vue.min.js"></script>
<script src="<?=base_url()?>style/asset/axios.min.js"></script>
<script src="<?=base_url()?>style/asset/app.js"></script> -->
<link rel="stylesheet" href="<?=base_url()?>style/asset/reveal.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script src="<?=base_url()?>style/asset/jquery.reveal.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
	var background = $("#background").val();
	if(background != ''){
		$("#banner").css("background-image","url(/~xiaoyouli/diary/_public/SetPictitle/"+background+")");
	}else{
		$("#banner").css("background-image","url(style/templated-snapshot/images/banner.jpg)");
	}
});
$('.big-link').click(function(e){
	var modalLocation = $(this).attr('data-reveal-id');
	var RevealOn = $('#RevealOn').val();
	if(modalLocation != RevealOn){
		$('.reveal-modal').trigger('reveal:close');
	}
});

// $('.titles .title').click(function(e){
// 	$('.title .active').attr('class','title');
// 	$(this).attr('class','title active');
// });

</script>