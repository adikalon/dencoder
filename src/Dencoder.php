<?php

namespace Hellpers;

/**
 * Набор методов кодирования/декодирования строк в разные форматы
 *
 * @author adikalon
 */
class Dencoder
{
    /**
     * @var array Массив запрещенных имен файлов/папкоу в системе windows
     */
    private static $antiNames = [
        'CON',
        'NUL',
        'AUX',
        'PRN',
        'COM1',
        'COM2',
        'COM3',
        'COM4',
        'COM5',
        'COM6',
        'COM7',
        'COM8',
        'COM9',
        'LPT1',
        'LPT2',
        'LPT3',
        'LPT4',
        'LPT5',
        'LPT6',
        'LPT7',
        'LPT8',
        'LPT9'
    ];

    /**
     * Преобразование кодировки в utf-8
     * @param string $string Строка для преобразования
     * @return string Преобразованная строка
     */
    public static function utf8($string)
    {
        return mb_convert_encoding($string, 'UTF-8', 'auto');
    }

    /**
     * Экранирование всех букв
     * @param string $string Строка
     * @return string Строка, каждая буква которой - экранирована
     */
    public static function quote($string)
    {
        return preg_replace('/(\w)/ui', '\\\$1', $string);
    }

    /**
     * Корректировка имени файла/папки
     * @param string $string Имя
     * @param string $symbol Символ, которым запрещенные символы будут заменены
     * @return string Откорректированное имя
     */
    public static function name($string, $symbol = '_')
    {
        $string = str_replace('/', $symbol, $string);
        if (stristr(strtolower(php_uname('s')), 'win') !== false) {
            $string = str_replace(['\\', ':', '*', '?', '"', '<', '>', '|'], $symbol, $string);
            if (in_array(strtoupper($string), self::$antiNames)) {
                $string .= $symbol;
            }
        }
        unset($symbol);
        return trim($string);
    }
}