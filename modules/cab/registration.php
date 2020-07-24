<?php

//Обработка регистрации

if (isset($_POST['login'],$_POST['password'])) {
    $errors = [];
    if(empty($_POST['login'])) {
        $errors['login'] = 'Вы не заполнили логин';
    }
    elseif(mb_strlen($_POST['login']) < 2) {
        $errors['login'] = 'Логин слишком короткий';
    }
    elseif(mb_strlen($_POST['login']) > 16) {
        $errors['login'] = 'Логин слишком длинный';
    }
    if(mb_strlen($_POST['password']) < 5) {
        $errors['password'] = 'Пароль должен быть длинее 4-х символов';
    }


    if (!count($errors)) {
        if (($handle = fopen('./users/users.csv', "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $login = $data[0];
                $pass = $data[1];
                if (($_POST['login']) == $login) {
                    $errors['login'] = 'Такой логин уже занят';
                }
            }
            fclose($handle);
        }
    }


    if(!count($errors)) {
        $fp = fopen('./users/users.csv', 'a');
        fputcsv($fp, array(es($_POST['login']),es(myHash($_POST['password']))));
        fclose($fp);
        $_SESSION['regok'] = 'OK';
        header("Location:/cab/activate");
        exit();
    }
}