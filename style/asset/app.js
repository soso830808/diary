
//login
var loginlist =new Vue({
	el:'#login',

	data:{
		errormsg:'',
		successmsg:'',
		login:{Soul:''},
	},
	mounted(){
		var out = GetQueryString("out");
		if( out != null){
			this.checkLayout();
		}
	},

	methods:{
		keymonitor: function(event) {
       		if(event.key == "Enter"){
         		loginlist.checkLogin();
        	}
        },
        
		checkLogin: function(){
			base_url=$('#base_url').val();
			
			var data = loginlist.toFormData(loginlist.login);
			axios.post(base_url+'login/check',data).then(function(response){
				if(response.data.error ){
					loginlist.errormsg = response.data.msg;
				}else{
					loginlist.successmsg = response.data.msg;
					setTimeout(function(){
						window.location.href=base_url;
					},500);
				}
			});
			
		},
		toFormData: function(obj){
			
			var form_data = new FormData(); // 將文件轉二進制(物件)
			for(var key in obj){//將jasn變成陣列
				form_data.append(key,obj[key]);
			}
			return form_data;
		},
		checkLayout: function(){
			var out=location.search;
			if(out != '' || out !='undefined'){
				this.successmsg = "成功登出";
			}
		},
	}
});

//Main
var Mainset =new Vue({
	el:'#banner',
	data:{
		Preface:'',
	},
	mounted(){
		// base_url=$('#base_url').val();
		axios.get(base_url+'Preface').then(function(response) {
			Mainset.Preface = response.data;
		})
	},
});

var navclick =new Vue({
	el:'#nav',
	methods:{
		toLayout:function(){
			window.location.href=base_url+'login?out=Y';
		},
	},
});
function GetQueryString(name){
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");

　 // match()方法可在 字符串内检索指定的值，或找到一个或多个正则表达式的匹配
    var r = window.location.search.substr(1).match(reg); 
    if(r!=null){
          return  unescape(r[2]); 
    }else{
          return null;
    }
}