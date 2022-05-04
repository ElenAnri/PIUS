<?php
    include "./vendor/autoload.php";
//    include "./Employee.php";
    include "./Department.php";

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

      $employees1 = [];
      $employees1[] = new Employee(100000000, "Elena Danilenko", 80000, new DateTime('2018-06-03'));
      $employees1[] = new Employee(10000000, "ED", 800000, new DateTime('2017-06-03'));
      $employees1[] = new Employee(10000000, "El Dan", 8000000, new DateTime('2018-02-06'));
      $employees1[] = new Employee(10000000, "names", 8000000, new DateTime('2018-06-03'));
      
      $department1 = new Department($employees1, "OAO AAA");
      $employees2 = [];
      $employees2[] = new Employee(100000000, "Elena Danilenko", 100000, new DateTime('2018-06-03'));
      $employees2[] = new Employee(10000000, "ED", 70000, new DateTime('2017-06-03'));
      $employees2[] = new Employee(10000000, "El Dan", 50000, new DateTime('2018-02-06'));
      $employees2[] = new Employee(10000000, "names", 60000, new DateTime('2018-06-03'));
      $department2 = new Department($employees2, "OAO BBB");
      $employees3 = [];
      $employees3[] = new Employee(100000000, "Elena Danilenko", 100000, new DateTime('2018-06-03'));
      $employees3[] = new Employee(10000000, "ED", 70000, new DateTime('2017-06-03'));
      $employees3[] = new Employee(10000000, "El Dan", 50000, new DateTime('2018-02-06'));
      $employees3[] = new Employee(10000000, "names", 60000, new DateTime('2018-06-03'));
      $department3 = new Department($employees3, "OAO CCC");
      $department1->printGetSumMoney();
      $department2->printGetSumMoney();
      $department3->printGetSumMoney();
      foreach ($employees1 as $employee)
         {validateEmployee($employee);
         echo "Work experience ".$employee->getCurrentOpit()."\n";}

      function minDepartmentMoney(array $departments)
      {
         echo "\nminDepartmentMoney: ";
         $minMoney = -1;
         foreach ($departments as $department)
         {
            if($department->getSumMoney() < $minMoney ||  $minMoney < 0)
               $minMoney = $department->getSumMoney();
         }

         $minCountEmployee = -1;
         foreach ($departments as $department)
         {
            if($department->getSumMoney() == $minMoney)
               {
                  if(Count($department->employees) < $minCountEmployee || $minCountEmployee < 0)
                     $minCountEmployee = Count($department->employees);
               }
         }

         foreach ($departments as $department)
         {
            if($department->getSumMoney() == $minMoney && Count($department->employees) == $minCountEmployee)
               echo $department->name . "\t";
         }
      }

      function maxDepartmentMoney(array $departments)
      {
         echo "\nmaxDepartmentMoney: ";
         $maxMoney = -1;
         foreach ($departments as $department)
         {
            if($department->getSumMoney() > $maxMoney)
               $maxMoney = $department->getSumMoney();
         }

         $maxCountEmployee = -1;
         foreach ($departments as $department)
         {
            if($department->getSumMoney() == $maxMoney)
               {
                  if(Count($department->employees) > $maxCountEmployee)
                     $maxCountEmployee = Count($department->employees);
               }
         }

         foreach ($departments as $department)
         {
            if($department->getSumMoney() == $maxMoney && Count($department->employees) == $maxCountEmployee)
               echo $department->name . "\t";
         }
      }

      $departments = [$department1,$department2,$department3];

      minDepartmentMoney($departments);
      maxDepartmentMoney($departments);

