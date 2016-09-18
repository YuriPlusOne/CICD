<?php

class News_model extends CI_Model {

        public function __construct() {
                
            $this->load->database();

        }

        public function get_news_list($uid) {

        	$query = $this->db->order_by('postdate', 'desc')->get_where('news', array('uid' => $uid));
        
            if ($query->num_rows() > 0) {

                return $query->result_array();

            }
            else{

                return false;
            
            }
		
		}

}