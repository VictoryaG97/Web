<?php
class User {
    # user information from the user db table
    private $account_id;
    private $email;
    private $first_name;
    private $last_name;
    private $role;

    # cookie constant information
    private const cookie_name = 'authentication_cookie';
    private const exp_time = 3600 * 24 * 5;

    # session information
    private $is_authenticated;
    private $session_id;

    public function __construct(){
        $this->account_id = NULL;
        $this->email = NULL;
        $this->first_name = NULL;
        $this->last_name = NULL;
        $this->role = NULL;
        $this->is_authenticated = FALSE;
        $this->session_id = NULL;
    }

    private function start_session($remember=FALSE){
        session_start();
        $_SESSION["login_user"] = $this->email;
        $_SESSION["user_role"] = $this->role;

        if ($remember){
            setcookie("email", $email, time() + 3600, "/", "", true, true);
            setcookie("role", $row["role"], time() + 3600, "/", "", true, true);
        }
        $this->session_id = session_id();
    }

    public function login($user_info, $remember=FALSE){
        $this->account_id = $user_info["id"];
        $this->email = $user_info["email"];
        $this->first_name = $user_info["first_name"];
        $this->last_name = $user_info["last_name"];
        $this->role = $user_info["role"];

        $this->is_authenticated = TRUE;
        $this->start_session($remember);
    }

    public function logout(){
        $this->account_id = NULL;
        $this->email = NULL;
        $this->first_name = NULL;
        $this->last_name = NULL;
        $this->role = NULL;
        $this->is_authenticated = FALSE;
        $this->session_id = NULL;
    }
}
?>