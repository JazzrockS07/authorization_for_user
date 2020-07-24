<?php
if (isset($_SESSION['user']['login'])) {
    header('Location:/cab/user');
    exit();
}

$current_time = time();

if (!isset($_SESSION['user_blocked_time'])) $_SESSION['user_blocked_time'] = 0;
if (!isset($_SESSION['try'])) $_SESSION['try'] = 0;

if (isset($_SESSION['user_blocked_time']))
{
    if ($_SESSION['user_blocked_time'] > $current_time) {
        $_SESSION['try'] = 0;
        $interval = $_SESSION['user_blocked_time'] - $current_time;
        $block = 'Попробуйте еще раз через '.$interval.' секунд';
    }
    if ($_SESSION['user_blocked_time'] < $current_time)  {
        $_SESSION['user_blocked_time'] = 0;
    }
}

if (isset($_POST['login'],$_POST['pass'])) {
    if (($handle = fopen('./users/users.csv', "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $login = $data[0];
            $pass = $data[1];
            if (es($_POST['login']) == $login && es(myHash($_POST['pass'])) == $pass) {
                $_SESSION['user']['login'] = hc($login);
                $_SESSION['user']['pass'] = $pass;
                $status = 'OK';
                $block = 'NO';
            }
        }
        fclose($handle);
    }

    if(isset($status) && $status = 'OK') {
        header('Location:/cab/user');
        exit();
    }

    if (!isset($_SESSION['user']['login'])) {
        $errors = 'Неверные данные';
        $_SESSION['try']++;
        if ($_SESSION['try'] >= 3) {
            $_SESSION['user_blocked_time'] = $current_time+300;
            $block = 'Попробуйте еще раз через 300 секунд';
            }
    }
}

