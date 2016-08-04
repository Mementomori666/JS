<?php

$file = fopen("menu.txt", "r");
if(!$file)
    throw new Exception('файл не существует');
while (!feof($file)){
    $arrMenu = explode(';',fgets($file));
    echo "<li><a href='".$arrMenu[1]."'>".$arrMenu[0]."</a>";
}

