<?php
    include "../vendor/autoload.php";
    include "./Employee.php";

    use \Symfony\Component\Validator\ValidatorBuilder;
   /**
    * @mixin ValidatorBuilder
    */
   function validateEmployee(Employee $employee)
   {
        $validator = (new ValidatorBuilder())->addMethodMapping('loadValidatorMetadata')->getValidator();
        $errors = $validator->validate($employee);

        if (count($errors) > 0)
        {
           foreach ($errors as $error)
           {
              echo $error . "\n";
           }
        }
   }
      $employees = [];
      $employees[] = new Employee(10000000, "names", 8000000, new DateTime('2018-06-03'));
      foreach ($employees as $employee)
         validateEmployee($employee);
         //getCurrentOpit();
         echo "opit ".$employee->getCurrentOpit()."\n";
   