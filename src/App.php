<?php

namespace Topvisor\Testtask;

use Topvisor\Testtask\models\Garden;

class App
{
    public function run()
    {
        $n = 10; // количество деревьев
        $n2 = 50; // количество яблок на каждом дереве
        $daysCount = 31; // количество суток для просчета

        $garden = new Garden($n, $n2);

        for ($i = 1; $i <= $daysCount; $i++) {
            $garden->passDay();
            echo $garden->getInfo() . '<br>'; // получить список висящих яблок на деревьях этого сада
        }

    }

}