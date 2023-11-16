<?php
session_unset('email');
session_unset('id_usuario');
session_destroy();
header('Location: index.php');
?>