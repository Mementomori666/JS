<?php

class FormHelper
{
    const ERROR_EMPTY = "Проверьте заполненность формы:";
    const ERROR_FIO = "ФИО пуст или не в надлежащем формате";
    const ERROR_EMAIL = "email пуст не в надлежащем формате";
    const ERROR_PHONE = "Телефон пуст или не в надлежащем формате";
    const ERROR_UNIQUE = "Не отмечена уникальность статьи";
    const ERROR_IS_AUTHOR = "Не отмечено авторство статьи";
    const ERROR_FILE = "Файл должен быть в формате .doc/.docx";
    const ERROR_EMAIL_FAIL = "Что-то пошло не так, пожалуйста, напишите о своих действиях на info@jscientia.org";

    public static function clearStr($str){
        return htmlspecialchars(trim($str), ENT_NOQUOTES | ENT_HTML401);
    }

    public static function lettersAndMarks($str){
        $preg= '/^[-A-zА-яЁё.,\'\s]+$/u';
        return preg_match($preg, $str);
    }

    public static function emailValidator($email){
        return preg_match('/^.+@.+\..+$/', $email);
    }

    public static function phoneValidator($phone){
        return preg_match('/^[-0-9()\+]+$/', $phone);
    }

    public static function fileValidator($ext){
        return $ext == 'doc' || $ext == 'docx';
    }
}