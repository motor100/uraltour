<?php

namespace App\Services;

class Excerpt
{
    protected $text;
    protected $charlength;
    
    /**
     * @param string $text
     */
    public function __construct($text, $charlength)
    {
        $this->text = $text;
        $this->charlength = $charlength;
    }

    /**
     * Создание выдержки из текста
     * 
     * @param
     * @return string
     */
    public function create(): string
    {
        // Удаление html тегов
        // $text = strip_tags($this->text);

        // Замена всех тегов на пробелы
        $text = preg_replace("(<[^<>]+>)", ' ', $this->text);

        // Обрезка текста
        $this->charlength++;
    
        if ( mb_strlen( $text ) > $this->charlength ) {
            $subex = mb_substr( $text, 0, $this->charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                return mb_substr( $subex, 0, $excut ) . '...';
            } else {
                return $subex;
            }
        } else {
            return $text;
        }
    }
}