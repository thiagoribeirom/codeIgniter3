<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {
    public function verficar_login()
    {
        $resultado = $this->db->from('usuarios')
        ->where('usuario', $this->input->post('user'))
        ->where('senha', md5($this->input->post('senha')))
        ->get();


        if ($resultado->num_rows() == 0) {
            return false;
        }
        else{
            $dadosuser = $resultado->row();

            $this->session->set_userdata('id', $dadosuser->id);
            $this->session->set_userdata('usuario', $dadosuser->usuario);
            return true;
        }
    }
}