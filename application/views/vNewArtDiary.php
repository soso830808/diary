<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>新增<?=$diarybody[0]->BookmarkName?></h2>
<form name="Frm" id="Frm" method="post"  enctype="multipart/form-data" action="article/SaveDiary" onsubmit="return SaveDiary(this)" >
標題<input type="text" name="diarytitle" id="diarytitle">
<br>
<textarea id="newbody" name='newbody' class="ckeditor"></textarea>
<input type="hidden" name="BookmarkCode" value='<?=$diarybody[0]->BookmarkCode?>'>
<input type="hidden" name="serive"value='<?=$diarybody[0]->menuid?>'>
<br>
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
		if(diarytitle == ''){
			alert('標題空白');
			return false;
		}

	}
</script>
