# Dencoder
**hellpers/dencoder** - Набор методов кодирования/декодирования строк в разные форматы. В основном служит помощником для других классов из серии.

## Установка:
	composer require hellpers/dencoder

## Пример:
```php
<?php

use Hellpers\Dencoder;

// UTF-8
$string = 'Тестовая строка на русском языке';
echo Dencoder::utf8($string).PHP_EOL;

// Экранирование
$string = 'Hello, World!';
echo Dencoder::quote($string).PHP_EOL;

// Корректировка имени файла/папки
$string = 'File <Name>?';
echo Dencoder::name($string).PHP_EOL;
```