<?php
session_start();
unset($_SESSION);
session_destroy();
header('Location: signin.php');
die;

# END OF FILE