<?php

class User{
    public $id;
    public $username;
    public $password;
 
    public function __construct($id=null,$username=null,$password=null)
    {
        $this->id=$id;
        $this->username=$username;
        $this->password=$password;
    }
    public static function logInUser($kor,mysqli $con){
        $query = "SELECT * FROM user WHERE user.username='$kor->username' and user.password='$kor->password'";
        
        return $con->query($query);
    }
}
?>