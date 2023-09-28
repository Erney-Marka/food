<?php

if (!isset($_SESSION['autoriz'])) {
    header('location: ../admin/login.php');
} 