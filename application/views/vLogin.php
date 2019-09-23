

<!DOCTYPE HTML>
<html >
  <head>
    <title>Diary of My Soul</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?=base_url()?>style/templated-visualize/assets/css/main.css" />
  </head>
  <body>

    <!-- Wrapper -->
      <div id="login">

        <!-- Header -->
          <header id="header">
            <h1> <strong>Diary of My Soul </strong></h1>
            <p>Enter mind password</p>
            <input type='password' v-model='login.Soul' id='Soul' style='width:16em;text-align:center;margin-left:65px;' maxlength='25' v-on:keyup="keymonitor" />

            <span  class="icon style2 fa-eye" id="eye" ></span>
            <input type="hidden"  id="base_url" value="<?=base_url()?>" ><span class="label"></span>

          </header>
        <!-- Footer -->
          <!-- <footer id="footer"> -->
          <!-- </footer> -->
          <!--登入訊息提示-->
                <div style="width:300px;height:60px;text-align:center;margin-left:65px;margin:0 auto;" v-if="errormsg">
                    <span class="icon style2 fa-exclamation-triangle"></span> {{ errormsg }}
                </div>
                <div style="width:300px;height:60px;text-align:center;margin-left:65px;margin:0 auto;" v-if="successmsg">
                    <span class="icon style2 fa-check"></span> {{ successmsg }}
                </div>
            <!--登入訊息提示-->
      </div>
    <!-- Scripts -->
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?=base_url()?>style/asset/vue.min.js"></script>
<script src="<?=base_url()?>style/asset/axios.min.js"></script>
<script src="<?=base_url()?>style/asset/app.js"></script>

<script>
  $("#eye").mousedown(function(){
    $('#eye').attr('class','icon style2 fa-eye-slash');
    $('#Soul').attr('type','text');
    $('#Soul').focus()
  });
   $("#eye").mouseup(function(){
    $('#eye').attr('class','icon style2 fa-eye');
    $('#Soul').attr('type','password');
    $('#Soul').focus()
  });
   $("#eye").mouseout(function(){
    $('#eye').attr('class','icon style2 fa-eye');
    $('#Soul').attr('type','password');
    $('#Soul').focus()
   });
</script>