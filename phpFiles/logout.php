<?php
session_start();
session_unset();
session_destroy(); // Destroy the session
header("Location: ..\htmlFiles\index.php");
exit();

