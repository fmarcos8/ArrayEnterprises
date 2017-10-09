<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', 'modelUsuario');        
        $this->load->model('comentario_model', 'modelComentario');
    }
    
    public function detalhes($id, $slug = null){              
        $dados['title'] = 'Perfil'; 
        $dados['usuario'] = $this->modelUsuario->get_usuario($id);
        $dados['numComentarios'] = $this->modelUsuario->get_num_comentarios($id);
        if($this->session->userdata('usuarioLogado')){
            $this->load->view('usuario/perfil', $dados);
        }else{
            redirect('usuario/login');
        }
    }

    public function cadastro(){
        $dados['title'] = 'Cadastro'; 

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[2]');
	    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuario.email]');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]');       
        

        if($this->form_validation->run() === true){ 
            $nome = $this->input->post('nome');
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');

            if($this->modelUsuario->Cadastro_usuario($nome, $email, $senha)){
                $this->load->view('usuario/login');
            }else{                
                $this->load->view('usuario/cadastro', $dados);
            }
        }else{
            $this->load->view('usuario/cadastro', $dados);
        }
    }

    public function editar(){
        $id = $this->session->userdata('usuarioLogado')['id'];
        $dados['title'] = 'Editar dados';
        $dados['usuario'] = $this->session->userdata('usuarioLogado')['nome'];
        
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[2]');

        if($this->form_validation->run() === true){
            $nome = $this->input->post('nome');   
            if($this->modelUsuario->editar_dados($id, $nome)){
                $usuario = $this->modelUsuario->get_usuario($id);
                $session['nome'] = $this->session->userdata('usuarioLogado')['nome'];
                $_SESSION['usuarioLogado']['nome'] = $usuario->nome;
                redirect('perfil/'.$id.'/'.limpar($nome));            
            }
        }else{ 
            $this->load->view('usuario/editar', $dados);
        }
    }
    public function form_troca_foto(){
        $dados['title'] = 'Trocar Foto'; 
        $this->load->view('usuario/editar_imagem', $dados); 
    }
    public function imagem(){
        
        $id = $this->session->userdata('usuarioLogado')['id'];
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $id.'.jpg';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload()){
            echo $this->upload->display_errors();
        }else{
            $config2['source_image'] = './assets/upload/'.$id.'.jpg';
            $config2['create_thumb'] = false;
            $config2['width'] = 250;
            $config2['height'] = 250;
            $this->load->library('image_lib', $config2);
            if($this->image_lib->resize()){  
                if($this->modelUsuario->editar_imagem($id)){
                    $dados['title'] = "Perfil";
                    $dados['usuario'] = $this->modelUsuario->get_usuario($id);
                    redirect('perfil/'.$id.'/'.$this->session->userdata('usuarioLogado')['nome']);
                }
            }
        }
    }

    public function login(){
        $dados['title'] = 'Login';

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        
        if($this->form_validation->run() == true){
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');

            if($this->modelUsuario->Login_usuario($email, $senha)){
                $idUsuario = $this->modelUsuario->get_id_do_usuario($email);
                $usuario = $this->modelUsuario->get_usuario($idUsuario);
                
                $session['id'] = $usuario->idUsuario;
                $session['nome'] = $usuario->nome;
                
                $this->session->set_userdata('usuarioLogado', $session);
                redirect('perfil/'.$session['id'].'/'.$session['nome']);
            }else{
                $this->load->view('usuario/login', $dados);
            }
        }else{
            $this->load->view('usuario/login', $dados);
        }
    }

    public function logout(){        
        if($this->session->userdata('usuarioLogado')){
            unset($_SESSION['usuarioLogado']);
            redirect('home');
        }
    }
    
    public function comentarios(){
        $id = $this->input->post('id');
        $dados['comentarios'] = $this->modelComentario->Comentarios_usuario($id);
        $this->load->view('usuario/comentarios', $dados);
    }
}