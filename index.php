<?php

include('config/config.php');
$config = new Config();

$res = $config->initDataBase();

if ($res) {
   echo "Data Base Is Connectd ...😄😄";
} else {
   echo "Data Base Connection Is Failed..";
}

echo "<br>";
echo "<br>";

$editData = null;

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $result = $config->getStudent($id);
   $editData = mysqli_fetch_assoc($result);
}
// echo "hello Dosto" . "<br>";

// class student{
//    public $name;
//    public $age;
//    public $gender;

//    // setter 
//    public function setStudentData($name, $age, $gender){
//       $this->name = $name;
//       $this->age = $age;
//       $this->gender = $gender;
//    }

//    // getter 
//    public function getStudentData(){
//       return "Name : " . $this->name . ", Age : " . $this->age . ", Gender : " . $this->gender;
//    }
// }
// $s1 = new student();
// $s2 = new student();

// $s1->setStudentData("Sujal", 20, "Male");
// $s2->setStudentData("Rohit", 37, "Male");

// echo $s1->getStudentData() . "<br>";
// echo $s2->getStudentData() . "<br>";

// super global variable fatch data from form 
// $_GET
// $_POST
// $_REQUEST

// is set function check data is present or not_empty($data) {


// @ error controll operator
// insert logic 
if (isset($_POST["btn-submit"])) {
   $name = $_POST["name"];
   $age = $_POST["age"];
   $course = $_POST["course"];

   echo "Name : " . $name . "<br>";
   echo "Age : " . $age . "<br>";
   echo "course : " . $course . "<br>";

   $response = $config->InsertStudent($name, $age, $course);

   if ($response) {
      echo "Student Insertion Successfully..";
      header("Location: config/dashboard.php");
   } else {
      echo "Student Insertion Failed..";
   }
}
if (isset($_POST['btn-submit'])) {

   $name = $_POST['name'];
   $age = $_POST['age'];
   $course = $_POST['course'];

   if (isset($_POST['student_id'])) {
      $id = $_POST['student_id'];
      $response = $config->updateStudent($id, $name, $age, $course);
   } else {
      $response = $config->InsertStudent($name, $age, $course);
   }

   header("Location: /config/dashboard.php");
   exit();
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Student Form</title>
   <style>
      body {
         margin: 0;
         padding: 0;
         font-family: "Segoe UI", Arial, sans-serif;
         background: #f3f2ef;
      }

      .container {
         width: 420px;
         margin: 60px auto;
         background: #fff;
         border-radius: 10px;
         box-shadow: 0 4px 12px rgba(0, 0, 0, .12);
         padding: 30px;
      }

      h1 {
         margin: 0 0 20px;
         font-size: 22px;
         text-align: center;
         color: #0a66c2;
      }

      .form-group {
         margin-bottom: 18px;
      }

      label {
         display: block;
         font-size: 14px;
         color: #555;
         margin-bottom: 6px;
      }

      input {
         width: 100%;
         padding: 10px 12px;
         border: 1px solid #ccc;
         border-radius: 6px;
         font-size: 14px;
         outline: none;
      }

      input:focus {
         border-color: #0a66c2;
         box-shadow: 0 0 0 2px rgba(10, 102, 194, .15);
      }

      button {
         width: 100%;
         background: #0a66c2;
         border: none;
         padding: 12px;
         color: white;
         font-size: 15px;
         border-radius: 6px;
         cursor: pointer;
         margin-top: 10px;
      }

      button:hover {
         background: #004182;
      }

      .footer-text {
         text-align: center;
         font-size: 12px;
         margin-top: 15px;
         color: #777;
      }
   </style>
</head>

<body>

   <div class="container">
      <h1>Student Information</h1>

      <form method="post" action="">

         <input type="hidden" name="student_id" value="<?php echo $editData['id'] ?? ''; ?>">
         <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your name" value="<?php echo $editData['name'] ?? ''; ?>"
               required>
         </div>

         <div class=" form-group">
            <label>Age</label>
            <input type="number" name="age" placeholder="Enter your age" value="<?php echo $editData['age'] ?? ''; ?>"
               required>
         </div>

         <div class="form-group">
            <label>Course</label>
            <input type="text" name="course" placeholder="Enter your course"
               value="<?php echo $editData['course'] ?? ''; ?>" required>
         </div>

         <button type="submit" name="btn-submit">
            <?php echo $editData ? "Update Student" : "Save Student"; ?>
         </button>
      </form>

      <div class="footer-text">
         © 2025 Student Portal
      </div>
   </div>

</body>

</html>