<?php

session_unset();
session_destroy();
header('Location:/cab/auth');
exit();