<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario extends CI_Controller {

    public function __construct() {
        parent::__construct();   
        $this->load->model('comentario_model', 'modelComentario');
    }

    public function cadastrar(){                
        $idUsuario = $this->session->userdata('usuarioLogado')['id'];
        $conteudo = $this->input->post('conteudo');
        echo ($this->modelComentario->cadastrar_comentario($idUsuario, $conteudo)) ? 1 : 0;        
    }

    public function lista_comentarios(){
        $dados['comentarios'] = $this->modelComentario->Listar_comentarios();
        $this->load->view('comentarios', $dados);
    }

    public function dados_comentario(){        
        $id = $this->input->get('id');
        $comentario = $this->modelComentario->get_comentario($id);
        echo json_encode($comentario);
    }

    public function editar(){
        $id = $this->input->post('id');
        $conteudo = $this->input->post('conteudo');
        echo ($this->modelComentario->editar_comentario($id, $conteudo)) ? 1 : 0;
    }

    public function deletar(){
        echo ($this->modelComentario->deletar_comentario($this->input->get('id'))) ? 1 : 0;
    }
}
