<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_id extends CI_Model {

	function getid($table,$id){
        $LastID = "";
        $query = $this->db->query("SELECT MAX(".$id.") AS id FROM ".strtolower($table)." ORDER BY ".$id." DESC LIMIT 1");

        if ($query->num_rows() > 0){
                $getdata = $query->row();
                $GetLastID = (int)$getdata->id;
                $GetLastID++;
                for($i=strlen($GetLastID);$i<5;$i++)
                {
                        $LastID .= "0";
                }
                $LastID .= $GetLastID;
                $end_lastid = $LastID;
        }
        else{
                $end_lastid = "00001";
        }
        return $end_lastid;
    }	

}

/* End of file M_id.php */
/* Location: ./application/models/M_id.php */

