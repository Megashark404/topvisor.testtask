<?php

namespace Topvisor\Testtask\models;

class Tree
{
    private int $applesCount;
    public array $apples = [];
    private int $age;

    public function __construct($applesCount)
    {
        $this->age = 0;
        $this->applesCount = $applesCount;
        for ($i = 1; $i <= $applesCount; $i++) {
            $this->addApple();
        }
    }

    private function addApple()
    {
        $appleAge = rand(0,30);
        $color = rand (0, count(Apple::COLORS) - 1);
        $this->apples[] = new Apple($this, $appleAge, $color);
        $this->applesCount++;
    }

    public function removeApple(Apple $apple)
    {
        $index = array_search($apple, $this->apples);
        if ($index !== false) {
            unset($this->apples[$index]);
        }
        $this->applesCount--;
    }

    public function passDay()
    {
        $this->age++;
        if ($this->age % 30 == 0) {
            $this->addApple();
        }
        foreach ($this->apples as $apple) {
            $apple->passDay();
        }
    }

}