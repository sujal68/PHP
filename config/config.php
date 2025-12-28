<?php

class Config
{
    private $HOST = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB_NAME = "Hyper-pre-processer";
    private $result;

    public function initDataBase()
    {
        // bolean value return karenga 
        $this->result = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);
        return $this->result;
    }

    public function InsertStudent($name, $age, $course)
    {
        $this->initDataBase();
        // write query 
        $query = "INSERT INTO student (name , age , course) VALUES ('$name' , $age , '$course');";

        // predefine function 
        return mysqli_query($this->result, $query); // return boolean value karenga 

    }
}



?>