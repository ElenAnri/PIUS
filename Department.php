<?php
    include "./vendor/autoload.php";
    include "./Employee.php";

class Department
{
    public function __construct(public array $employees, public string $name){}

    public function getSumMoney()
    {
        $sumMoney = 0;
        foreach ($this ->employees as $employee)
            $sumMoney +=$employee->money;
        return $sumMoney;
    }

    public function printGetSumMoney()
    {
        echo $this->name . " sum money: " . $this->getSumMoney() . "\n";
    }
}