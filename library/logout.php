<?php
setcookie("user", $user, time()-60*60*24*30, "/", "media.ntxmc.com", 0);   // Unsetting The Cookie (By Setting The Time To Negative 30 Days)
setcookie("pass", $pass, time()-60*60*24*30, "/", "media.ntxmc.com", 0);   // Unsetting The Cookie (By Setting The Time To Negative 30 Days)
header("Location: ../index.php");   // Redirect To index.php
?>
