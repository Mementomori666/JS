<?php

/**
 * Created by PhpStorm.
 * User: driln
 * Date: 20.10.2016
 * Time: 23:23
 */
class Breadcrumbs
{
    protected $breadcrumbs = [
        'Главная' => 'index',
        'О журнале' => 'about',
        'Архив' => 'arch',
        'Редакция' => 'editorial-board',
        'Контакты' => 'contacts',
        'Правила для авторов' => 'guide-for-authors',
        'Этика публикаций' => 'publication-ethics',
        'Порядок рассмотрения' => 'editorial-policies',
        'Условия оплаты' => 'payment',
        'Опубликовать статью' => 'services',
        'Статья опубликована' => 'article-load-ok',
        'Ошибка публикации' => 'article-load-error',
        'Страница не найдена' => 'not-found',
        'Оплата успешно проведена' => 'payok',
        'DOI' => 'doi',
        'Авторский взнос и информация об авторских правах' => 'open-access',
        'Партнерская программа' => 'affiliate'
    ];

    public function getBreadcrumbs(array $array){
        $str = '<div id="wb_Breadcrumb1"><ul id="Breadcrumb1">';
        for($i = 0; $i < count($array); $i++){
            if($i == (count($array) -1)){
                $str .= '<li class="active">' . $array[$i];
            }else{
                $bread = $this->breadcrumbs;
                $bread = $bread[$array[$i]];
                $str .= "<li><a href='$bread'>$array[$i]</a></li>";
            }
        }
        $str .= '</ul></div>';
        return $str;
    }
}