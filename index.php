<?php

   echo "hello Dosto" . "<br>";

   class student{
      public $name;
      public $age;
      public $gender;
   }

   $s1 = new student();

   $s1->name = "sujal";
   $s1->age = 18;
   $s1->gender = "Male";

   echo "Roll No : " . $s1->name . "<br>";
   echo "Age : " . $s1->age . "<br>";
   echo "Gender : " . $s1->gender . "<br>";

?>
