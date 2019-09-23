<!DOCTYPE html>
<html>
<head>
	<h2>心情小語</h2>
</head>
<body>
	<input type="text" id=PrefaceTitle value="<?=$Preface->memo?>">
	<textarea id="Preface" name='Preface' class="ckeditor"><?=$Preface->value?></textarea>
	<input type="button" id="savePreface" value="儲存">
</body>
</html>

<script src="<?=base_url("style/jquery/ckeditor/ckeditor.js")?>"></script>
<script type="text/javascript">
$("#savePreface").click(function(){
	var Preface      =  CKEDITOR.instances['Preface'].getData();
	var PrefaceTitle = $("#PrefaceTitle").val();
	$.ajax({
		type:'post',
		method:'post',
		url:'diary/SavePreface',
		data:{Preface:Preface,PrefaceTitle:PrefaceTitle},
		success:function(e){
			alert('修改成功');
			location.reload(true);
		}
	})
});
</script>