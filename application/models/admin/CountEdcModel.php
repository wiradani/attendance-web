<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CountEdcModel extends CI_Model {


    public function getTotalEDCDaily(){
		$query_date = date("Y-m-d");

		// First day of the month.
		$first =  date('Y-m-01', strtotime($query_date));

		// Last day of the month.
		$last = date('Y-m-t', strtotime($query_date));

		$query = $this->db->query("SELECT DAY(created_date) as date, COUNT(*) as total FROM heartbeat_terminal WHERE created_date BETWEEN '2020-09-01' AND '2020-09-30' GROUP BY WEEK(created_date) ORDER BY created_date");
		return $query->result();
	}





}
