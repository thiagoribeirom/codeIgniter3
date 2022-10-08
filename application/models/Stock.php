<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Model {

    //#########################################
    public function tudo()
    {
        return $this->db->query('SELECT * FROM produtos')->result_array();
    }

    //#########################################
    public function produto($id)
    {
        return $this->db->query('SELECT * FROM produtos WHERE id = ?', $id)->result_array();
    }

    //#########################################
    public function editar_produto($id)
    {
        $nome = $this->input->post('nome');
        $resultado = $this->db->query("SELECT * FROM produtos WHERE id != ? AND nome = ?", [$id, $nome]);
        if($resultado->num_rows() != 0){
            return array(
                'resultado' => false,
                'mensagem' => 'Já existe produto com esse nome.'
            );
        }

        $this->db->set('nome', $nome)->where('id', $id)->update('produtos');
        return array(
            'resultado' => true,
            'mensagem' => ''
        );
    }

    //#########################################
    public function dados_produto($id)
    {
        return $this->db->query('SELECT * FROM produtos WHERE id = ?', $id)->result_array();
    }

    //#########################################
    public function novo_produto()
    {
        $nome = $this->input->post('nome');
        $resultado = $this->db->query("SELECT * FROM produtos WHERE nome = ?", $nome);
        if($resultado->num_rows() != 0){
            return array(
                'resultado' => false,
                'mensagem' => 'já existe produto com esse nome.'
            );
        }

        $dados = array(
            'nome' => $nome,
            'quantidade' => 0
        );

        $this->db->insert('produtos', $dados);
        return array(
            'resultado' => true,
            'mensagem' => ''
        );
    }


    //#########################################
    public function eliminar($id)
    {
        $this->db->delete('produtos', array('id'=> $id));
    }

    //#########################################
    public function alterar_quantidade($id, $quantiade)
    {
        $this->db->where('id', $id)->set('quantidade', 'quantidade + '.$quantiade, false)->update('produtos');

        $dados = array('id_produto'=>$id, 'quantidade'=>$quantiade, 'data'=>date('Y-m-d H:i:s'));

        $this->db->insert('movimentos', $dados);
    }

    //#########################################
    public function movimentos()
    {
        $resultados = $this->db->select('m.*, p.nome nome, p.quantidade temp')
        ->from('movimentos as m')
        ->join('produtos as p', 'm.id_produto = p.id', 'left')
        ->get();

        return $resultados->result_array();
    }

    //#########################################
    public function limpartudo()
    {
        $this->db->empty_table('movimentos');
        $this->db->query('ALTER TABLE movimentos AUTO_INCREMENT = 1');
    }
}