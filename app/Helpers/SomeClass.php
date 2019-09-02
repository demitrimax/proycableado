<?php

namespace App\Helpers;

class SomeClass
{
    public static function bytesToHuman($bytes)
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public static function normalizeString ($str = '')
        {
            $str = strip_tags($str);
            $str = preg_replace('/[\r\n\t ]+/', ' ', $str);
            $str = preg_replace('/[\"\*\/\:\<\>\?\'\|]+/', ' ', $str);
            $str = strtolower($str);
            $str = html_entity_decode( $str, ENT_QUOTES, "utf-8" );
            $str = htmlentities($str, ENT_QUOTES, "utf-8");
            $str = preg_replace("/(&)([a-z])([a-z]+;)/i", '$2', $str);
            $str = str_replace(' ', '-', $str);
            $str = rawurlencode($str);
            $str = str_replace('%', '-', $str);
            return $str;
        }

  public static function cortar_string ($string, $largo) {
             $marca = "<!--corte-->";

             if (strlen($string) > $largo) {

                 $string = wordwrap($string, $largo, $marca);
                 $string = explode($marca, $string);
                 $string = $string[0];
             }
             return $string;

          }

}
