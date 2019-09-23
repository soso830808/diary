<style>

.pagebody{
	z-index: 1;
}
</style>
<!DOCTYPE html>
<html>
<input type="hidden" id="code" value="<?=$code?>">
<input type="hidden" id="serive"value="<?=$serive?>">
<section id="galleries">
<div id="management" class="reveal-modal">
	<?=$PageDiary?>
</div>
	<!-- Photo Galleries -->
	<div class="gallery">
		<header class="special">
			<h2><?=$pageidary->BookmarkName?>
			<a href='#' class="big-link" data-reveal-id="management"><span class="fa fa-book"></span></a>
			</h2>
		</header>
		<div class="content"  style="margin:0 auto;" id="pagebody">
			<?=htmlspecialchars_decode($pageidary->pagebody);?>
		</div>
	</div>
</section>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
	var serive= $("#serive").val();
	$("#Menulist"+serive).attr('class','title active');
});
</script>
