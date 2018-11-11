<?php

namespace Hellpers;

use Exception;

/**
 * Набор методов кодирования/декодирования строк в разные форматы
 *
 * @author adikalon
 */
class Dencoder
{
    /**
     * @var array Массив возможных кодировок
     */
    private static $encodings = [
        'UTF-8',
        'CP1251',
        'ASCII',
    ];

    /**
     * @var array Массив синонимов вызываемых методов
     */
    private static $synonyms = [
        'UTF-8'  => [
            'utf-8',
            'utf8',
        ],
        'CP1251' => [
            'cp1251',
            '1251',
            'windows1251',
            'windows-1251',
            'win1251',
            'win-1251',
            'ansi',
        ],
    ];

    /**
     * Определяем какой метод необходимо вызвать
     * @param string $name Имя вызываемого метода
     * @param array $arguments Параметры переданный в метод
     * @return mixed Результат работы метода
     * @throws Exception
     */
    public static function __callStatic(string $name, array $args)
    {
        foreach (self::$synonyms as $encoding => $synonyms) {
            if (in_array(mb_strtolower($name), $synonyms)) {
                unset($name, $synonyms);
                return self::encode($args[0], $encoding);
            }
            unset($encoding, $synonyms);
        }

        unset($args);

        throw new Exception("Отсутствует метод " . __CLASS__ . "::$name()");
    }

    /**
     * Изменение кодировки строки
     * @param string $string Строка, которой необходимо изменить кодировку
     * @param string $encoding Новая кодировка
     * @return string Строка в новой кодировке
     */
    private static function encode(string $string, string $encoding): string
    {
        $stringEncoding = mb_detect_encoding($string, self::$encodings);

        if ($stringEncoding != $encoding) {
            $string = mb_convert_encoding($string, $encoding, $stringEncoding);
        }

        unset($encoding, $stringEncoding);

        return $string;
    }

}
