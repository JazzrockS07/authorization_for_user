<?php

namespace Date;

/*
 * Class MyDateAdpter модифициует дату от текущей даты по входному условию,
 * возвращает полученную дату в необходимом формате
 * @version 1.0.0
 */
class MyDateAdapter {
    /*
	 * @var содержит дату
	 */
    private $date = '';

    /*
	 * формирует текущую дату при вызове класса
	 *
	 * @return String свойство date текущая дата
	 */
    function __construct() {
        $this->date = date('d m Y');
    }

    /*
	 * преобразует текущую дату в соответствии с входными параметрами с помощью метода getNextDay экземпляра класса MyDate
	 * @param String $modify
	 * @return \Date\MyDate->getNextDay() вызов функции, которая отвечает за преобразованиие даты
	 */
    public function modify($modify) {
        if ($modify == '+1 day') {
            $nextday = new MyDate();
            $this->date = $nextday->getNextDay();
        }
    }

    /*
	 * выводит преобразованную ранее дату в методе modify в нужном формате с помощью метода format экземпляра класса DateTimeAdapter
	 * @param String $format
	 * @return \Date\DateTimeAdapter->format() вызов функции, которая отвечает за вывод даты в нужном формате
	 */
    public function format($format) {
        $adapter = new DateTimeAdapter();
        return $adapter->format($this->date,$format);
    }
}