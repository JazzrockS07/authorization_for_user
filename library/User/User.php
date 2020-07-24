<?php

use FW\User\Authorization;

/*
 * Class User наследует \FW\User\User и дополняет его, используется для проверки на каждой странице прав пользователя,
 * если IP пользователя внесен в черный список - пользователю выводится заглушка,
 * если пользователь забанен, то осуществлялся выход и переадресация на главную страницу,
 * если пользователь админ и он находится в админке, логируем URL, дату посещения и метод обращения GET или POST,
 * если пользователь не авторизирован, то в свойство captcha меняем на 1, чтобы потом выводить каптчу для неавторизованных пользователей
 * @version 1.0.0
 */

class User extends \FW\User\User {
    /*
	 * @var содержит аватарку пользователя
	 */
    static $avatar = '';
    /*
	 * @var содержит 1 - выводить каптчу, 0 - не выводить каптчу пользователю
	 */
    static $captcha = 0;

    /*
	 * Расширяет метод Start наследуемого класса \FW\User\User
     * проверяет, не внесен ли IP пользователя в черній список, не забанен ли пользователь, если пользователь админ - логируем его действия,
     * если пользователь не авторизован меняем свойство каптчи, чтобы потом выодить каптчу для неавторизованных пользователей
	 *
	 * @param array $auth содержит $_SESSION['user']['id'] пользователя
	 */
    static function Start($auth = []) {
        self::$datas = ['id','role','login','avatar','active'];
        parent::Start($auth = []);
        if(count($auth)) {
            $res = q("
                    SELECT * FROM `ip_black_list`
                    WHERE `ip` = '".es($_SERVER['REMOTE_ADDR'])."'
                    LIMIT 1
		    ");
            if($res->num_rows) {
                header("HTTP/1.0 503 Service Unavailable");
                require './skins/stubroutine.tpl';
                exit;
            }
            $res->close();
            if(self::$data['active'] != 'active') {
                Authorization::logout();
                redirect('/');
            }
            $page = substr($_SERVER['REQUEST_URI'], 1, 5);
            if(self::$data['role'] == 'admin' && $page == 'admin') {
                q("
                    INSERT INTO `monitor_admin` SET 
                    `user_id` = ".int(self::$data['id']).",
                    `url`     = '".es($_SERVER['REQUEST_URI'])."',
                    `date`    = '".es(date("Y-m-d H:i:s"))."',
                    `method`  = '".es($_SERVER['REQUEST_METHOD'])."'
                ");
            }
        }
        if(!count($auth) && !isset($_COOKIE['autologinid'],$_COOKIE['autologinhash'])) {
            self::$captcha = 1;
        }
    }
}