<?php
    if (!function_exists('alert_msg')) {
        /**
         * alert message and redirect page
         *
         * @param  string  msg  需要顯示的訊息
         * @param url href 要跳轉的頁面，以controller指定
         */
        function alert_msg($msg, $href)
        {
            echo "<script>
                alert('" . $msg . "');
                window.location.href='" . site_url($href) . "';
                </script>";
        }
    }
?>