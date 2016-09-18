<?php

class Stats_model extends CI_Model {

        public function __construct() {
                
            $this->load->database();

        }

        public function get_stats($uid, $sid) {

        	$this->db->select('*');
			$this->db->from('statsdata');
			$this->db->join('statstype', 'statstype.sid = statsdata.sid');
			$this->db->where(array('statsdata.uid' => $uid, 'statsdata.sid' => $sid));
            $this->db->order_by('statsdata.datetime', 'asc');
			
			$query = $this->db->get();

            if ($query->num_rows() > 0) {

                return $query->result();

            }
            else{

                return false;
            
            }
		
		}

}