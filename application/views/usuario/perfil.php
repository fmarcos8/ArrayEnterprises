<?php $this->load->view('template/header'); ?>
    <div style="overflow:hidden;" class="container">
        <hr>
        <div class="row">
            <div id="dadosUsuario" class="col-3">               
                <?php if($usuario->foto == 1){ ?>
                    <img style="width: 200px;margin-bottom: 10px;" class="card img-thumbnail" src="<?php echo base_url('assets/upload/'.$usuario->idUsuario.'.jpg') ?>">
                <?php }else{ ?>
                    <img style="width: 200px;margin-bottom: 10px;" style="width: 200px;" class="card img-thumbnail" src="<?php echo base_url('assets/upload/sem_foto.jpg') ?>">
                <?php } ?>
                <div>
                    <p class="media-heading">Nome : <?php echo $usuario->nome ?></p>
                    <p class="media-heading">Email : <?php echo $usuario->email ?></p>
                    <p class="media-heading">Total de comentários : <span class="badge blue"><?php echo $numComentarios ?></span></p>
                    <p class="small media-heading">Usuário desde : <?php echo postadoem($usuario->dataCadastro) ?></p>
                    <?php if($this->session->userdata('usuarioLogado')['id'] == $usuario->idUsuario): ?>   
                        <b><a href="<?php echo base_url('editar_imagem') ?>">Alterar foto</a></b>  <br>                               
                        <b><a href="<?php echo base_url('editar-dados/'.$this->session->userdata('usuarioLogado')['id']) ?>">Alterar dados</a></b>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-9">
                <h4>Todos os Comentarios de <?php echo $usuario->nome ?></h4>
                <br>
                <div id="listaComentariosUsuario" data-id-usuario="<?php echo $usuario->idUsuario ?>">
                    
                </div>
            </div>            
        </div> 
        <hr class="extra-margin my-5">
    </div>
<?php $this->load->view('template/footer'); ?>