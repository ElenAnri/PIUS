<?php
    include "./vendor/autoload.php";
    use Symfony\Component\Validator\Constraints\Length;
    use Symfony\Component\Validator\Constraints\NotBlank;
    use Symfony\Component\Validator\Validation;

class Employelse {

    public string $currentOpit;

    public function __construct(public int $id, public string $name, public int $money, public DateTime $date)
    {
        $this->currentOpit = $date->sub(date('m/d/Y h:i:s a', time()))->format("$Y");
    }


    public static function loadValidatorMetadata(ClassMetadata $metadata)
 {
     $metadata->addPropertyConstraint('id', [
        new Assert\NotBlanc(),
        new Assert\Length(['min' =>1, 'max' =>10]),
    ]);
     $metadata->addPropertyConstraint('name', [
        new Assert\NotBlanc(),
        new Assert\Regex(['pattern' => '/\d/']),
    ]);
     $metadata->addPropertyConstraint('money', [
        new Assert\NotBlanc(),
        new Assert\Length(['min' =>1, 'max' =>1000000]),
    ]);;
     $metadata->addPropertyConstraint('date', [
        new Assert\NotBlanc(),
    ]);;
 }
 
}