<?php

class SQL_CRUD {

    public $column;
    public $col_new_value;
    public $table;
    public $where_col_field;
    public $where_value;
    public $query;
    public $message;
    public $update_completed;

    // public $records;

    function __construct($query,$table,$column,$col_new_value,$where_col_field,$where_value) {
        $this->column = $column;
        $this->col_new_value = $col_new_value;
        $this->table = $table;
        $this->where_col_field = $where_col_field;
        $this->where_value = $where_value;
        $this->set_runtime_query();
        if($query != ''){
            $this->query = $query;
        }
    }

    // NOTE: Functional Programming comes to mind as possibly being helpful here. \
    public function Connect_DB_execute_Close(){
        include('includes/connection_strings.php');
        $lk = mysqli_connect($database_host, $user, $password, $database);
        if (mysqli_connect_errno()) {
            $this->message = "Sorry. There was an issue".mysqli_connect_error();
            $this->update_completed = false;
            $this->message = 'Not ok';
        }else{
            $this->update_completed = true;
            $this->message = 'ok';
        }
        mysqli_query($lk,$this->query);
        mysqli_close($lk);
    }

    private function set_runtime_query() {
        $this->query = "UPDATE $this->table SET $this->column = '$this->col_new_value' where $this->where_col_field = '$this->where_value';";
    }

}

class SQL_Update extends SQl_CRUD{
    private function set_runtime_query() {
        $this->query =
       "UPDATE $this->table 
        SET $this->column = '$this->col_new_value' 
        where $this->where_col_field = '$this->where_value';"; 
    }

}

class SQL_Insert extends SQl_CRUD{
    private function set_runtime_query() {
        $this->query = "INSERT into  $this->table (SET $this->column) VALUES ($this->where_value);";
    }
}


class SQL_Counter_Increment extends SQL_CRUD {

    public $addQu;
    public $minusQu;
    public $zeroinator;

    function __construct($table,$column,$where_col_field,$where_value) {
        $this->column = $column;
        $this->table = $table;
        $this->where_col_field = $where_col_field;
        $this->where_value = $where_value;
        $this->add();
        $this->subtract();
        $this->Reset_To_Zero();
    }
    // Same thing as the execute, but the method name has better sounding
    public function Add_one(){
        include('includes/connection_strings.php');
        $lk = mysqli_connect($database_host, $user, $password, $database);
        if (mysqli_connect_errno()) {
            $this->message = "Sorry. There was an issue".mysqli_connect_error();
            $this->update_completed = false;
        }else{
            $this->update_completed = true;
            $this->message = 'ok';
        }
        mysqli_query($lk,$this->addQu);
        mysqli_close($lk);
    }
    public function Subtract_one(){
        include('includes/connection_strings.php');
        $lk = mysqli_connect($database_host, $user, $password, $database);
        if (mysqli_connect_errno()) {
            $this->message = "Sorry. There was an issue".mysqli_connect_error();
            $this->update_completed = false;
            $this->message = 'Update Failed';
        }else{
            $this->update_completed = true;
            $this->message = 'ok';
        }
        mysqli_query($lk,$this->minusQu);
        mysqli_close($lk);
    }
    public function Reset_Counter(){
        include('includes/connection_strings.php');
        $lk = mysqli_connect($database_host, $user, $password, $database);
        if (mysqli_connect_errno()) {
            $this->message = "Sorry. There was an issue".mysqli_connect_error();
            $this->update_completed = false;
            $this->message = 'Update Failed';
        }else{
            $this->update_completed = true;
            $this->message = 'ok';
        }
        mysqli_query($lk,$this->zeroinator);
        mysqli_close($lk);
    }

    private function add(){
        $this->addQu = "UPDATE $this->table SET $this->column = $this->column + 1 where $this->where_col_field = '$this->where_value';";
    }
    private function subtract(){
        $this->minusQu = "UPDATE $this->table SET $this->column = $this->column - 1 where $this->where_col_field = '$this->where_value';";
    }
    public function Reset_To_Zero(){
        $this->zeroinator = "UPDATE $this->table SET $this->column = 0 where $this->where_col_field = '$this->where_value';";
    }
}

class SQL_Select extends SQL_CRUD {
    
    public $records_arr;
    function __construct($query,$table,$column,$col_new_value,$where_col_field,$where_value){
        $this->column = $column;
        $this->col_new_value = $col_new_value;
        $this->table = $table;
        $this->where_col_field = $where_col_field;
        $this->where_value = $where_value;

        if($query != ''){
            $this->query = $query;
        }else{
            $this->set_runtime_query();
        }
        // echo $this->query;
    }
    public function Connect_DB_execute_Close(){
        include('includes/connection_strings.php');
        $lk = mysqli_connect($database_host, $user, $password, $database);
        if (mysqli_connect_errno()) {
            $this->message = "Sorry. There was an issue".mysqli_connect_error();
            $this->update_completed = false;
            $this->message = 'Update Failed';
        }else{
            $this->update_completed = true;
            $this->message = 'ok';
        }
        if ($result = mysqli_query($lk,$this->query)){
            for ($set = array(); $row = $result->fetch_assoc(); $set[] = $row);
            // var_dump($set);
            $this->records_arr = $set;
        }
        mysqli_close($lk);
    }

    private function set_runtime_query(){
        $this->query = "SELECT $this->column from $this->table where $this->where_col_field = '$this->where_value';";
        // echo $this->query;
    }
}



?>