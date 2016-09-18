<?php

class Users_model extends CI_Model {

        public function __construct() {
                
            $this->load->database();

        }

		public function get_user($uid) {

        	$query = $this->db->get_where('users', array('uid' => $uid));

            if ($query->num_rows() > 0) {

                return $query->row_array();;

            }
            else{

                return false;
            
            }
		
		}

        public function auth_user($login, $password) {

            $this->db->select('uid');
            $this->db->from('users');
            $this->db->where('login', $login);
            $this->db->where('password', $password);
            $this->db->limit(1);
            
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {

                return $query->result();

            }
            else{

                return false;
            
            }
        
        }

}