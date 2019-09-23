<h3>設定登入資料</h3>
<p>修改密碼
<input type="text" id="UpPasswod"></p>
<p></p>
<p>密碼提示
<input type="text" id="UpPassPrompt"></p>
<input class="button" type="button"  id='Setbun' value="送出">
<script type="text/javascript">
$('#Setbun').click(function(){
	var UpPasswod = $("#UpPasswod").val();
	var UpPassPrompt = $("#UpPassPrompt").val();
	if(UpPasswod != ''){
		$.ajax({
			url:"diary/SetSoulPass",
			method:"POST",
			data:{UpPasswod:UpPasswod,UpPassPrompt:UpPassPrompt},
			success:function(response){
				alert('修改成功');
				$("#UpPasswod").val('');
				$("#UpPassPrompt").val('');
			}
		});
	}else{
		alert('密碼未填寫');
	}
	
});
</script>