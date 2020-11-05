<?php
    defined('BASEPATH') OR exit('no direct script access allowed');

    //login model
    class Login_model extends CI_MODEL
    {
        protected $username;
        protected $password;

        
        public function __construct()
        {
            parent::__construct();            
        }

        //function login
        public function login($username = '', $password = '')
        {
            $this->username = $username;
            $this->password = $password;
        }

        //function user exist or Not
        public function is_user_exist()
        {
            $username = $this->username;

            $check = $this->db
                ->where('username',$username)
                ->get('users')
                ->num_rows();
            return($check > 0) ? TRUE : FALSE;
        }

        //get username from database
        protected function _get($row = '')
        {
            $username = $this->username;

            $field = $this->db
                ->select($row)
                ->where('username',$username)
                ->get('users')
                ->row()
                ->$row;
            return $field;
        }

        public function get_role()
        {
            return $this->_get('role_id');
        }
    
        public function get_password()
        {
            return $this->_get('password');
        }
    
        public function logged_user_id()
        {
            return $this->_get('id');
        }
        
    }
?>