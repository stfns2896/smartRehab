<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Pimpinan extends CI_Model
{
    public function pimpinan()
    {
        return $this->db->get('pimpinan')->row_array();
    }
}
