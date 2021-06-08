<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kantor_Model extends CI_Model
{
    public function showKantor()
    {
        return $this->db->get('kantor')->result();
    }
}