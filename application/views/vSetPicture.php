<?php
?>
<style>
.bar {
      height: 18px;
      background: #a4e8a4;
      text-align: center;
      font-weight: bold;
  }
.btn-primary{
	    background: linear-gradient(135deg, #6e8efb, #a777e3);
	    padding: 0.5em 1em;
	    color: white;
	    border-radius:6px;
 }
table{
    border:0px solid black;
}
label {
    font-size: 0.9em;
    font-weight: 700;
    margin: 0 0 0 0;
}
</style>
<html>
<body>
<h3>背景圖片上傳</h3>
<p>標題<input type="text"  size="35"  id="pictitle"></p>
 
<form id="TestForm" aciton="" method="post">
	<table  >
		<tr>
		<td  valign="middle" border='0'>
	    <div class="input-group" valign="middle">
	    	<label class="input-group-btn">
            <span class="btn btn-primary">
                選取&hellip;<input type="file" id="FileSelect" name="files" style="display: none;" accept="image/*">
            </span>
        </label>
	    </div>
		</td>
		<td id="FileName">
		</td>
		<td id="File">
		</td>
		<td id="FileAction">
		</td>
		</tr>
	</table>
</form>
<p>列表</p>
<div  style="width:100%;">
<input type="button" value="儲存" onclick='SaveisON()'>
</div>
<div id=pictable style="width:100%;">
<?php foreach($SelPicture as $item):?>
		<dir style="width:50%;height:110px;text-align:center;float:left;">
			<input type="radio" id='<?=$item->serial;?>' name='drone' value='<?=$item->serial;?>' 
			<?=$item->serial==$item->isOn ? "checked" : '';?> >
        	<label for=<?=$item->serial;?>><?=$item->title;?></label>
        	<img src='/~xiaoyouli/diary/_public/SetPictitle/<?=$item->Picture;?>' width="200" height="100" align="middle" >
        </dir>
<?php endforeach?>
</div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?=base_url('style/jquery/jQuery-File-Upload-8.8.5/js/vendor/jquery.ui.widget.js')?>"></script>
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?=base_url('style/jquery/jQuery-File-Upload-8.8.5/js/jquery.iframe-transport.js')?>"></script>
<script src="<?=base_url('style/jquery/jQuery-File-Upload-8.8.5/js/jquery.fileupload.js')?>"></script>
<script src="<?=base_url('style/jquery/jQuery-File-Upload-8.8.5/js/jquery.fileupload-process.js')?>"></script>
<script src="<?=base_url('style/jquery/jQuery-File-Upload-8.8.5/js/jquery.fileupload-image.js')?>"></script>
<script src="<?=base_url('style/jquery/jQuery-File-Upload-8.8.5/js/jquery.fileupload-audio.js')?>"></script>
<script src="<?=base_url('style/jquery/jQuery-File-Upload-8.8.5/js/jquery.fileupload-video.js')?>"></script>
<script src="<?=base_url('style/jquery/jQuery-File-Upload-8.8.5/js/jquery.fileupload-validate.js')?>"></script>
<script type="text/javascript">
$('#TestForm').fileupload({
 	url: 'diary/uploadfile',
    dataType: 'json',
    autoUpload: false,
    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
    maxFileSize: 999000,
   	disableImageResize: /Android(?!.*Chrome)|Opera/
        .test(window.navigator.userAgent),
    previewMaxWidth: 100,
    previewMaxHeight: 100,
    previewCrop: true  
 }).on('fileuploadadd', function (e, data) {
 		$.each(data.files, function (index, file) {
        		data.context = $('<p/>').appendTo('#FileName').text(file.name);
        		var ActionBtn= "";
        		 	ActionBtn+="<input type='button' class='fileUpload' value='上傳檔案'>";
        		 	ActionBtn+="<input type='button' class='fileCancel btn btn-primary' value='取消'>";
        		$("#FileAction").append(ActionBtn);
        		$(".fileCancel").click(function(){
        	 	$("#FileAction").html('');
        	 	$("#FileName").html('');
        	 	$("#File").html('');
   			});
   			$(".fileUpload").click(function(){
   				var pictitle =$("#pictitle").val();
   				if(pictitle == ''){
   					alert("標題尚未填寫");
   					$("#pictitle").focus();
   					return false;
   				}
   				data.formData = {'pictitle':pictitle}
   				data.submit().always(function (e,data) {
                   var  pictable ="";
                   		pictable+='<div style="width:50%;height:100px;text-align:center;float:left;">';
                   		pictable+='<input type="radio" id='+e.serial+' name="drone" value='+e.serial+'>';
                   		pictable+='<label for='+e.serial+'>'+e.titletext+'</label>';
                   		pictable+="<img src='/~xiaoyouli/diary/_public/SetPictitle/"+e.Picture+"' width='200' height='100' align='middle' >";
                   		pictable+="</div>";
                   $("#pictable").append(pictable);
                   $("#FileName").html('');
                   $("#File").html('');
                   $("#FileAction").html('');
                });
   			});
   		
    	});
    }).on('fileuploadprocessalways', function (e, data) {
    	data.context = $('#File');
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            data.context
                .prepend(file.preview);
        }
       
    });
function SaveisON(){
	var drone =$('input[name=drone]:checked').val();
	if(drone == ''){
		alert('請選擇圖片');
		return false;
	}else{
		$.ajax({
			method:"json",
			url:"diary/SetPic",
			data:{'drone':drone},
			success:function(response){
				alert("設定成功");
			}
		});
	}
	
}
</script>