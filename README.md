# Dencoder
**hellpers/dencoder** - Набор методов кодирования/декодирования строк в разные форматы.

## Установка:
	composer require hellpers/dencoder

## Пример:
```php
<?php

use Hellpers\Dencoder;

// Преобразование в UTF-8
$string = mb_convert_encoding('Строка в кодировке cp1251', 'CP1251');
echo Dencoder::utf8($string) . PHP_EOL;

// Преобразование в CP1251
$string = mb_convert_encoding('Строка в кодировке utf-8', 'UTF-8');
echo Dencoder::cp1251($string) . PHP_EOL;
```