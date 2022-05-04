<?php
include "./vendor/autoload.php";

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Employee
{
    public function __construct(public int $id, public string $name, public int $money, public DateTime $date)
    {}

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints('id', [
            new Assert\NotBlank(),
            new Assert\Length(['min' => 1, 'max' => 10]),
        ]);
        $metadata->addPropertyConstraints('name', [
            new Assert\NotBlank(),
            new Assert\Length(['min' => 3, 'max' => 100]),
        ]);
        $metadata->addPropertyConstraints('money', [
            new Assert\NotBlank(),
            new Assert\Length(['min' => 1, 'max' => 6]),
        ]);;
        $metadata->addPropertyConstraints('date', [
            new Assert\NotBlank(),
        ]);;
    }

    public function getCurrentOpit()
    {
        return $this->date->diff(new DateTime('now'))->format("%y year");
    }
}
