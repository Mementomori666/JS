<?php
/**
 * @var $fio string
 * @var $article_name string
 * @var $email string
 * @var $phone string
 * @var $section string
 * @var $language string
 * @var $message string
 * @var $doi string
 * @var $eSertificate string
 * @var $pSertificate string
 * @var $journal string
 */
?>
Ф.И.О автора: <?= $fio?>

Действующий адрес электронной почты: <?= $email?>

Название статьи: <?=$article_name?>

Контактный номер телефона: <?=$phone?>

Раздел журнала: <?=$section?>

Язык статьи: <?= $language?>

<?php if(isset($doi)) echo 'Присвоить DOI (digital object identifier)'?>

<?php if(isset($eSertificate)) echo 'Печатный сертификат о публикации'?>

<?php if(isset($pSertificate)) echo 'Электронный сертификат о публикации'?>

<?php if(isset($journal)) echo 'Печатный экземпляр журнала'?>

<?php if(isset($message)) echo "Сообщение:\n $message"?>