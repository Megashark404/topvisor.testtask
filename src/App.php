<?php

namespace Topvisor\Testtask;

use Topvisor\Testtask\models\Garden;

class App
{
    public function run()
    {
        $garden = new Garden(10, 50);

        // Введите количество дней для просчета
        $daysCount = 31;

        for ($i = 1; $i <= $daysCount; $i++) {
            $garden->passDay();
            echo $garden->getInfo() . '<br>'; // получить список висящих яблок на деревьях этого сада
        }

    }

}