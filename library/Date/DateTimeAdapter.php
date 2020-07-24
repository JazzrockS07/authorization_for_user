<?php
namespace Date;

/*
 * Class DateTimeAdapter получает дату в формате "01 июня 2016 года", преобразует и возвращает ее в в стандартном для класса DateTime формате
 * @version 1.0.0
 */
class DateTimeAdapter {

    /*
	 * получает дату в формате "01 июня 2016 года", преобразует и возвращает ее в в стандартном для класса DateTime формате
	 *
     * @param String $date
	 * @param String $format
     * @return String дата, в стандартном для класса DateTime формате.g
	 */
    public function format($date,$format='') {
        $month = [
            'января' => 1,
            'февраля' => 2,
            'марта' => 3,
            'апреля' => 4,
            'мая' => 5,
            'июня' => 6,
            'июля' => 7,
            'августа' => 8,
            'сентября' => 9,
            'октября' => 10,
            'ноября' => 11,
            'декабря' => 12
        ];
        $date = preg_replace('#\sгода#u','',$date);
        foreach($month as $key => $value) {
            $date = preg_replace('#'.$key.'#u',$value,$date);
        }
        $data = \DateTime::createFromFormat('d m Y',$date);
        if ($format != '') {
            return $data->format($format);
        } else {
            return $data->format('Y-m-d');
        }
    }
}