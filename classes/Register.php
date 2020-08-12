<?php

class Register
{
    public static function registerUser($data)
    {
        if ($data['password'] == $data['password_repeat'] and !empty($data['password'])) {
            unset($data['password_repeat']);

            $data['password'] = md5($data['password'] . 'pass');

            $dbObj = new DB();

            return $dbObj->insert('users', $data);
        }
        return 'проверьте правильность ввода пароля';
    }
}