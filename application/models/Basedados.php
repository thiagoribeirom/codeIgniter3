<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basedados extends CI_Model{

    public function reset(){
        $this->db->empty_table('produtos');
        $this->db->empty_table('usuarios');

        $this->db->query("ALTER TABLE usuarios AUTO_INCREMENT = 1");
        $this->db->query("ALTER TABLE produtos AUTO_INCREMENT = 1");
        $this->db->query("ALTER TABLE movimentos AUTO_INCREMENT = 1");
    }

    public function inserir_usuarios()
    {
        $this->db->empty_table('usuarios');
        $this->db->query('ALTER TABLE usuarios AUTO_INCREMENT = 1');

        $dados = [
            'usuario' => 'adm',
            'senha' => md5('adm')
        ];
        $this->db->insert('usuarios', $dados);

        $dados = [
            'usuario' => 'joao',
            'senha' => md5('joao')
        ];
        $this->db->insert('usuarios', $dados);

        $dados = [
            'usuario' => 'carla',
            'senha' => md5('carla')
        ];
        $this->db->insert('usuarios', $dados);
    }

    public function inserir_produtos()
    {
        $this->db->empty_table('produtos');
        $this->db->query('ALTER TABLE produtos AUTO_INCREMENT = 1');

        $dados = [
            ['nome'=>'Ryzen 5 2600', 'quantidade'=>'3'],
            ['nome'=>'Placa Mae', 'quantidade'=>'3']
        ];

        $this->db->insert_batch('produtos', $dados);



        $this->db->empty_table('movimentos');
        $this->db->query('ALTER TABLE movimentos AUTO_INCREMENT = 1');

        $dados = [
            ['id_produto'=>'1', 'quantidade'=>'3', 'data'=>date("Y-m-d H:m:s")],
            ['id_produto'=>'2', 'quantidade'=>'3', 'data'=>date("Y-m-d H:m:s")]
        ];

        $this->db->insert_batch('movimentos', $dados);
    }
}