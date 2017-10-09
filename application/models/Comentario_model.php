<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function Listar_comentarios(){
        $this->db->select('usuario.idUsuario AS idAutor,
                           usuario.nome AS nomeAutor, comentario.idComentario,
                           comentario.idUsuario, comentario.conteudo, 
                           comentario.dataCriacao, comentario.dataEdicao, usuario.foto');
        $this->db->from('comentario');
        $this->db->join('usuario', 'usuario.idUsuario = comentario.idUsuario');
        $this->db->order_by('comentario.dataCriacao', 'DESC');
        
        return $this->db->get()->result();
    }    

    public function Comentarios_usuario($id){
        $this->db->from('comentario');
        $this->db->where('idUsuario', $id);        
        $this->db->order_by('dataCriacao', 'DESC');
        return $this->db->get()->result();
    }
    
    public function get_comentario($id){
        $this->db->from('comentario');
        $this->db->where('idComentario', $id);
        return $this->db->get()->row();    
    }

    public function cadastrar_comentario($idUsuario, $conteudo){
        $data = array(
            'idUsuario' => $idUsuario,
            'conteudo' => $conteudo,
            'dataCriacao' => date('Y-m-j H:i:s')
        );
        return $this->db->insert('comentario', $data);
    }

    public function editar_comentario($id, $conteudo){
        $data = array(
            'conteudo' => $conteudo,
            'dataEdicao' => date('Y-m-j H:i:s')
        );
        $this->db->where('idComentario', $id);        
        $this->db->update('comentario', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function deletar_comentario($id){
        $this->db->where('idComentario', $id);
        $this->db->delete('comentario');
        if($this->db->affected_rows() > 0){
                return true;
        }else{
                return false;
        }
    }
}
