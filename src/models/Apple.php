<?php

namespace Topvisor\Testtask\models;

class Apple
{
    const COLORS = [
        0 => 'red',
        1 => 'yellow',
        2 => 'green',
    ];

    const STATUS_FALLED = 0;
    const STATUS_ON_TREE = 1;

    private int $age;
    private string $color;
    private int $size;
    private int $status;
    private int $freshness;
    private Tree $tree;

    public function __construct(Tree $tree, int $age, int $color)
    {
        $this->tree = $tree;
        $this->age = $age;
        $this->color = self::COLORS[$color];
        $this->status = self::STATUS_ON_TREE;
        $this->freshness = 1;
    }

    public function fall(): void
    {
        $this->status = self::STATUS_FALLED;
    }

    public function spoil(): void
    {
        $this->freshness = 0;
        $this->tree->removeApple($this);
    }

    public function passDay(): void
    {
        $this->age++;

        if ($this->isFalled()) {
            $this->spoil();
        }

        if ($this->readyToFall()) {
            $this->fall();
        }
    }

    private function readyToFall()
    {
        $fallAge = rand(1, 10) < 5 ? 28 : 32;
        return ($this->status == self::STATUS_ON_TREE AND $this->age % $fallAge == 0);
    }

    private function isFalled()
    {
        return $this->status == self::STATUS_FALLED;
    }


}