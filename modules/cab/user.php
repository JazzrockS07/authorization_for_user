<?php

if (!isset($_SESSION['user']['login'])) {
    header('Location:/cab/auth');
    exit();
}


