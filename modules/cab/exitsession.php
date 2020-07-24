<?php

session_unset();
session_destroy();
echo '<pre>';
print_r($_COOKIE);
'</pre>';

echo '<pre>';
print_r($_SESSION);
'</pre>';

echo '<pre>';
print_r($_SERVER['REMOTE_ADDR']);
'</pre>';