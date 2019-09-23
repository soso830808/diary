<!DOCTYPE html>
<input type="hidden" id="BookmarkCode" value="<?=$diarybody[0]->BookmarkCode?>">
<input type="hidden" id="serive"value="<?=$diarybody[0]->menuid?>">
<html>
<head>
	<title></title>
</head>
<body>
	<h2><?=$diarybody[0]->BookmarkName?>列表</h2>
	<div id="editDiv" style="display:none">
		<input type='text' id='edittitle'>
		<textarea id="editbody" name='editbody' class="ckeditor"></textarea>
		<input type='hidden' id="SaveSerive">
		<input type='button' id ="SaveEditbody" value="儲存" onclick="SaveEditbody();">
		<input type='button' id ="cancelEditbody" value="取消" onclick="cancelEditbody();">
	</div>
<br>
	<div>
		<table>
			<tr>
				<td >標題</td>
				<td width='20%'></td>
			</tr>
			<?php foreach ($diarybody as $item): ?>
				<?php if (($item->articletitle) != '') {?>
				<tr  id="tr<?=$item->serive?>">
					<td id="title<?=$item->serive?>"><?=$item->articletitle?></td>
					<td>
						<input type='button' id='edit' value="修改" onclick="editDiary(<?=$item->serive?>);">
						<input type='button' id='del' value="刪除" onclick="DelDiary(<?=$item->serive?>);">
					</td>
				</tr>
				<?php }?>
			<?php endforeach?>
		</table>
	</div>
</body>
</html>
<script type="text/javascript">
	function editDiary(serive){
		$.ajax({
			type:'post',
			url:'article/editSelDiary',
			dataType:"json",
			data:{serive:serive},
			success:function(e,data){
				$("#edittitle").val(e.title);
				CKEDITOR.instances.editbody.setData(e.body);
				$("#SaveSerive").val(serive);
				$("#editDiv").show();
			}
		})
	}
	function SaveEditbody(){
		var editbody   =  CKEDITOR.instances['editbody'].getData();
		var SaveSerive = $("#SaveSerive").val();
		var edittitle  = $("#edittitle").val();
		$.ajax({
			type:'post',
			url:'article/editSave',
			data:{SaveSerive:SaveSerive,editbody:editbody,edittitle:edittitle},
			success:function(e){
				$("#editDiv").hide();
				alert('修改成功');
				$("#title"+SaveSerive).html(edittitle);
				$("#arttitle"+SaveSerive).html(edittitle);
				$("#artbody"+SaveSerive).html(editbody);
			}
		})
	}
	function DelDiary(serive){
		var chk = confirm('是否刪除')
		if(chk){
			$.ajax({
				type:'post',
				url:'article/DelDiary',
				data:{serive:serive},
				success:function(e){
					alert('刪除成功');
					$('#tr'+serive).remove();
					$("#artdiv"+serive).empty();
				}
			})
		}

	}
	function cancelEditbody(){
		$("#editDiv").hide();
	}
</script>