<?php
require_once("../config.php");
    session_start();
    session_destroy();
    echo "<script>alert('Anda telah keluar.');</script>";
	echo "<script>location='".web."';</script>";
?>