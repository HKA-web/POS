<?php
class M_login extends CI_Model{
    function cekadmin($u,$p){
        $hasil=$this->db->query("SELECT * FROM user_login WHERE userid='$u' AND password=md5('$p')");
        return $hasil;
    }

}
