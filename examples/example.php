<?php
header('Content-type: text/html; charset=utf-8');
require_once(__DIR__ . '/../vendor/autoload.php');

use Hellpers\Dencoder;

// UTF-8
$string = 'Тестовая строка на русском языке';
echo Dencoder::utf8($string) . PHP_EOL;

// Экранирование
$string = 'Hello, World!';
echo Dencoder::quote($string) . PHP_EOL;

// Корректировка имени файла/папки
$string = 'File <Name>?';
echo Dencoder::name($string) . PHP_EOL;