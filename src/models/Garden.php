<?php
namespace Topvisor\Testtask\models;

class Garden
{
    private int $age;
    private array $trees = [];

    public function __construct($treesCount, $applesPerTreeCount)
    {
        $this->age = 0;
        $this->addTrees($treesCount, $applesPerTreeCount);
    }

    private function addTrees($treesCount, $applesPerTreeCount)
    {
        for ($i = 1; $i <= $treesCount; $i++) {
            $this->trees[] = new Tree($applesPerTreeCount);
        }
    }

    public function passDay(): void
    {
        $this->age++;
        foreach ($this->trees as $tree) {
            $tree->passDay();
        }
    }

    public function getInfo(): string
    {
        return 'Прошло суток: ' . $this->age . '. ' . 'Сад содержит ' . $this->getTreesCount() . ' деревьев и ' . $this->getApplesCount() . ' яблок';
    }

    private function getTreesCount(): int
    {
        return count($this->trees);
    }

    public function getApplesCount(): int
    {
        $applesCount = 0;
        foreach ($this->trees as $tree) {
            $applesCount += count($tree->apples);
        }

        return $applesCount;
    }
}
