<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestao extends CI_Controller {

    //#########################################
    public function home(){

        if (!$this->session->has_userdata('id')) {
            redirect('/');
        }
		$this->load->view('layouts/topo');

        $this->load->model('Stock');
        $dados['produtos'] = $this->Stock->tudo();
		$this->load->view('stockv', $dados);

		$this->load->view('layouts/rodape');
    }

    //#########################################
    public function editar($id){

        if (!$this->session->has_userdata('id')) {
            redirect('/');
        }
		$this->load->view('layouts/topo');

        $this->load->model('Stock');
        $dados['produto'] = $this->Stock->produto($id)[0];
		$this->load->view('editar', $dados);

		$this->load->view('layouts/rodape');
    }

    //#########################################
    public function editarsalvar($id){
        $this->load->model('Stock');
        $resultado = $this->Stock->editar_produto($id);

        if (!$resultado['resultado']) {
            $this->load->view('layouts/topo');

            $this->load->model('Stock');
            $dados['produto'] = $this->Stock->dados_produto($id)[0];
            $dados['mensagem'] = $resultado['mensagem'];
            $this->load->view('editar', $dados);
    
            $this->load->view('layouts/rodape');
        }else{
            $this->home();
        }
    }

    //#########################################
    public function novo()
    {
		$this->load->view('layouts/topo');

		$this->load->view('novo');

		$this->load->view('layouts/rodape');
    }

    //#########################################
    public function novosalvar()
    {
        $this->load->model('Stock');
        $resultado = $this->Stock->novo_produto();


        if (!$resultado['resultado']) {
            $this->load->view('layouts/topo');

            $this->load->view('novo', $resultado);
    
            $this->load->view('layouts/rodape');
        }else{
            $this->home();
        }
    }

    //#########################################
    public function eliminar($id, $resposta = false){
        $this->load->model('Stock');
        $dados['produto'] = $this->Stock->dados_produto($id)[0];
        if (!$resposta) {

            $this->load->view('layouts/topo');

            $this->load->view('eliminar', $dados);
    
            $this->load->view('layouts/rodape');
        }else{
            $this->Stock->eliminar($id);
            $this->home();
        }
    }

    //#########################################
    public function adicionar($id)
    {
        if (is_null($this->input->post('count_quantidade'))) {
            $this->load->view('layouts/topo');

            $this->load->model('Stock');
            $dados['produto'] = $this->Stock->dados_produto($id)[0];
            $this->load->view('adicionar', $dados);
    
            $this->load->view('layouts/rodape');
        }else{
            $this->load->model('Stock');
            $this->Stock->alterar_quantidade($id, $this->input->post('count_quantidade'));
            $this->home();
        }
    }

    //#########################################
    public function subtrair($id)
    {
        if (is_null($this->input->post('count_quantidade'))) {
            $this->load->view('layouts/topo');

            $this->load->model('Stock');
            $dados['produto'] = $this->Stock->dados_produto($id)[0];
            $this->load->view('subtrair', $dados);
    
            $this->load->view('layouts/rodape');
        }else{
            $this->load->model('Stock');
            $this->Stock->alterar_quantidade($id, -$this->input->post('count_quantidade'));
            $this->home();
        }
    }

    //#########################################
    public function movimentos(){

		$this->load->view('layouts/topo');

        $this->load->model('Stock');
        $dados['movimentos'] = $this->Stock->movimentos();
		$this->load->view('movimentos', $dados);

		$this->load->view('layouts/rodape');
    }

    //#########################################
    public function limpartudo()
    {
        $this->load->model('Stock');
        $this->Stock->limpartudo();
        $this->movimentos();
    }
}