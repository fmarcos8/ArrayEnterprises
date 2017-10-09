<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function Cadastro_usuario($nome, $email, $senha){
        $dados = array(
            'nome' => $nome,
            'email' => $email,
            'senha' => $this->Criptografar_senha($senha),
            'dataCadastro' => date('Y-m-j h:i:s')
        );
        return $this->db->insert('usuario', $dados);
    }

    private function Criptografar_senha($senha){
        return password_hash($senha, PASSWORD_BCRYPT);
    }

    public function Login_usuario($email, $senha){
        $this->db->select('senha');
        $this->db->from('usuario');
        $this->db->where('email', $email);
        $senhaHash = $this->db->get()->row('senha');
        return $this->Verifica_senha($senha, $senhaHash);        
    }

    public function get_num_comentarios($id){
        $this->db->count_all_results('comentario');
        $this->db->from('comentario');
        $this->db->where('idUsuario', $id);
        return $this->db->get()->num_rows();
    }

    public function get_usuario($id){
        $this->db->from('usuario');
        $this->db->where('idUsuario', $id);        
        return $this->db->get()->row();
    }
    
    private function Verifica_senha($senha, $senhaHash){
        return password_verify($senha, $senhaHash);
    }

    public function get_id_do_usuario($email){
        $this->db->select('idUsuario');
        $this->db->from('usuario');
        $this->db->where('email', $email);
        return $this->db->get()->row('idUsuario');
    }   

    public function editar_dados($idUsuario, $nome){
        $dados =  array(
            'nome' => $nome
        );        
        $this->db->where('idUsuario', $idUsuario);
        return $this->db->update('usuario', $dados);
    }


    public function editar_imagem($idUsuario){
        $dados =  array(
            'foto' => 1 
        );        
        $this->db->where('idUsuario', $idUsuario);
        return $this->db->update('usuario', $dados);
    }
}
