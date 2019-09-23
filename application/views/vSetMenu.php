<?php
?>
<!DOCTYPE html>
<html>
<head>
	<h2>設定書籤</h2>
</head>
<body>
	<table id="MewnList">
		<tr style="border-top:0px ;border-bottom:0px ;">
			<td ><input type="text" name="BookmarkName" id="BookmarkName" value="" ></td>
			<td ><input type="text" name="NewBookmarkCode" id="NewBookmarkCode" value="" ></td>
			<td>
				<select name="template" class='site'>
					<option value="">請選擇</option>
					<option value="page">page</option>
					<option value="article">article</option>
				</select>
			</td>
			<td><input type="button" id="MenuNew" value="新增"></td>
		<tr>
		<tr>
			<td width="25%">書籤名稱</td>
			<td width="25%">書籤代碼</td>
			<td width="25%">書籤版面</td>
			<td width="25%"></td>
		</tr>

		<tr>
			<td ><input type="text" value="心情日記" readonly></td>
			<td ><input type="text" value="diary" readonly></td>
			<td ><input type="text" value="article" readonly></td>
			<td > </td>
		<tr>
	<?php foreach ($SelMenuList as $list): ?>
		<tr id="SMenulist<?=$list->serive;?>">
			<td><input type="text" value="<?=$list->BookmarkName;?>" readonly></td>
			<td><input type="text" value="<?=$list->BookmarkCode;?>" readonly></td>
			<td><input type="text" value="<?=$list->template;?>" readonly></td>
			<td><input type="button" value="刪除" onclick="MenuDel('<?=$list->serive;?>','<?=$list->BookmarkCode;?>','<?=$list->template;?>')"></td>
		</tr>
	<?php endforeach?>
	</table>
</body>
</html>

<script src="<?=base_url("style/jquery/ckeditor/ckeditor.js")?>"></script>
<script type="text/javascript">
$("#MenuNew").click(function(){
	var BookmarkName = $("#BookmarkName").val();
	var BookmarkCode = $("#NewBookmarkCode").val();
	var template=$("select[name='template']").val();

	$.ajax({
		url:"diary/SetMenuNew",
			method:"POST",
			type:'POST',
			data:{BookmarkName:BookmarkName,BookmarkCode:BookmarkCode,template:template},
			success:function(response){
				alert('新增成功');
				// $("#BookmarkName").val('');
				// $("#BookmarkCode").val('');
				// $("select[name='template']").val('');
				// var addlist="<tr id=list"+response+">";
				// 	addlist+="<td><input type='text' value='"+BookmarkName+"'></td>";
				// 	addlist+="<td><input type='text' value='"+BookmarkCode+"'></td>";
				// 	addlist+="<td><input type='text' value='"+template+"'></td>";
				// 	addlist+="<td><input type='button' value='刪除' onclick='MenuDel("+response+")>'";
				// 	addlist+="</tr>";
				// $("#MewnList").append(addlist);
				window.location.href = 'diary';
			}
	});
});
function MenuDel(serive,BookmarkCode,template){
	$.ajax({
		url:"diary/SetMenuDel",
			method:"POST",
			type:'POST',
			data:{serive:serive,BookmarkCode:BookmarkCode,template:template},
			success:function(response){
				alert('刪除成功');
				$("#list"+serive).empty();
				$("#Menulist"+serive).empty();
				$("#SMenulist"+serive).empty();
			}
	});
}
</script>