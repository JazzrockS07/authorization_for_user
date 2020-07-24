<?php
namespace Date;

/*
 * Class MyDate возращает завтрашний день в формате "01 июня 2016 года" на русском языке
 * @version 1.0.0
 */
class MyDate {

    /*
	 * возращает завтрашний день в формате "01 июня 2016 года" на русском языке
	 *
     * @return String завтрашний день в формате "01 июня 2016 года" на русском языке
	 */
    public function getNextDay() {
        $arr = [
            'января',
            'февраля',
            'марта',
            'апреля',
            'мая',
            'июня',
            'июля',
            'августа',
            'сентября',
            'октября',
            'ноября',
            'декабря'
        ];
        $month = date('n',strtotime("tomorrow"))-1;
        return date('d',strtotime("tomorrow")).' '.$arr[$month].' '.date('Y года',strtotime("tomorrow"));
    }

}