<?php
    defined('BASEPATH') OR exit('No Direct Script Access Allowed');

    class User extends CI_Model {

        function Get_Pengasuh(){
            $hsl=$this->db->query("select * from pengasuh");
            return $hsl;
        }
        
    }
?>