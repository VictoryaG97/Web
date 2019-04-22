<?php
class User{
    private $email;
    private $first_name;
    private $last_name;
    private $pass;
    private $role;

    private $db_conn;
    private $session;

    function __construct($db){
        $this->email = NULL;
        $this->first_name = NULL;
        $this->last_name = NULL;
        $this->pass = NULL;
        $this->role = NULL;

        $this->db_conn = $db;
        $this->session = NULL;
    }

    function get_role(){
        return $this->role;
    }

    function emailValidation($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function userExists($email){
        $stmt = $this->db_conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return true;
        }
        return false;
    }

    // function get_user_data(){
    //     $stmt = $this->db_conn->prepare("SELECT * FROM users WHERE email = ?");
    //     $stmt->execute([$this->email]);
    //     $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //     return $row;
    // }

    function start_session(){

    }

    function login($email, $password){

    }

    function logout(){

    }
}
?>