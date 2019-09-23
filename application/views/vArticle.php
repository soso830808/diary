<?php
?>
<style type="text/css">
.wgt-best-mask{
    position: relative;
    z-index: 888;
    margin-top: -100px;
    width: 100%;
    padding-top: 100px;
    background-image: linear-gradient(-180deg,rgba(113, 28, 28, 0) 0%,#f1f1f1 70%)
}
.wgt-best-showbtn{
	position: relative;
	margin-top: -25px;
	z-index: 9999;
}
.wgt-btn{
	margin-left: 8px;
    margin-right: 8px;
    margin-top: 6px;
    margin-bottom: 6px;
    padding: 0 8px;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
    text-align: center;
    border: none;
    background-color: transparent;
    height: 34px;
    line-height: 32px;
    min-width: 72px;
    cursor: pointer;
    text-decoration: none;
    cursor: pointer;
    color: #000000c2;
	border: 1px solid #000000c2;
}
.bodyshow{
	z-index: 1;
}
</style>
<input type="hidden" id="code" value="<?=$code?>">
<input type="hidden" id="serive"value="<?=$serive?>">
<div id="management" class="reveal-modal">
	<?=$ArticleDiary?>
</div>
<div id="new" class="reveal-modal">
	<?=$SetNewDiary?>
</div>

<!-- Banner -->

<!-- Gallery -->
<section id="galleries">
	<!-- Photo Galleries -->
	<div class="gallery">
		<header class="special">
			<h2>
				<a href='#' class="big-link" data-reveal-id="management"><span class="fa fa-book"></span></a>
				<?=$Articlediary[0]->BookmarkName?>
				<a href='#' class="big-link" data-reveal-id="new"><span class="icon style2 fa-gratipay"></span></a>
			</h2>
		</header>
		<div class="content"  style="margin:0 auto;" id="diarybody">
			<div class="media"  >
				<?php foreach ($Articlediary as $item): ?>
				<div id='artdiv<?=$item->serive?>'>
					<h3 id='arttitle<?=$item->serive?>'><?=$item->articletitle?></h3>
					<div id='artbody<?=$item->serive?>' class="bodyshow">
						<?=htmlspecialchars_decode($item->articlebody);?>
					</div>
					<div class="wgt-best-mask" id=openmore<?=$item->serive?> style="display:none;">
					</div>
					<div class="wgt-best-showbtn" id=readmore<?=$item->serive?> style="text-align:center;" onclick='showtable(<?=$item->serive?>)'></div>
					<HR color="#000000" size="1" width="165%">
				</div>
				<?php endforeach?>
			</div>
		</div>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {

	var serive= $("#serive").val();
	$("#Menulist"+serive).attr('class','title active');
    $(".bodyshow").each(function(){
        var slideHeight = 300; // px
        var bodyid = $(this).attr("id").substring(7);
		var defHeight = $(this).height();
		if(defHeight >= slideHeight){
			$(this).css('height' , slideHeight +'px');
			$(this).css('overflow' , 'hidden');
			$("#openmore"+bodyid).show();
			$("#readmore"+bodyid).html('<p class="wgt-btn">展開全部</p>');
		}
    });
});
function showtable(e){
	var slideHeight = 300;
	var defHeight = $("#artbody"+e).height();
	if(defHeight == slideHeight){
		$("#artbody"+e).removeAttr('style');
		$("#openmore"+e).hide();
		$("#readmore"+e).html('<p class="wgt-btn">隱藏內容</p>');
	}else{
		$("#artbody"+e).css('height' , slideHeight +'px');
		$("#artbody"+e).css('overflow' , 'hidden');
		$("#openmore"+e).show();
		$("#readmore"+e).html('<p class="wgt-btn">展開全部</p>');
	}
}

</script>
