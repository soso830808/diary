<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2><?=$diarybody->BookmarkName?></h2>
<form name="Frm" id="Frm" method="post"  enctype="multipart/form-data" action="page/SavePageDiary" onsubmit="return SaveDiary(this)" >
<textarea id="newbody" name='newbody' class="ckeditor"><?=$diarybody->pagebody?></textarea>
<br>
<input type="hidden" name="BookmarkCode" value='<?=$diarybody->BookmarkCode?>'>
<input type="hidden" name="serive"value='<?=$diarybody->serive?>'>
<input type='submit' value='儲存' id='savediary'>
</form>
</body>
</html>
<script type="text/javascript">
	function SaveDiary(){
		var newbody  =  CKEDITOR.instances['newbody'].getData();
		var diarytitle = $("#diarytitle").val();
		if(newbody == ''){
			alert('內容空白');
			return false;
		}
	}
</script>
