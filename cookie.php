<?php 

setCookie('zeroDengue_user', base64_encode($name));
setCookie('zeroDengue_email',  base64_encode($email));
setCookie('zeroDengue_logged',  base64_encode(1));