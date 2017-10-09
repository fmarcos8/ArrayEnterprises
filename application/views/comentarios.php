<?php foreach($comentarios as $comentario): ?>
    <div class="row " style="padding-bottom: 15px;padding-top: 15px;">
        <div class="col-2">
            <?php if($comentario->foto == 1){ ?>
                <img style="width: 200px;" class="img-thumbnail" src="<?php echo base_url('assets/upload/'.$comentario->idAutor.'.jpg') ?>">
            <?php }else{ ?>
                <img style="width: 200px;" class="img-thumbnail" src="<?php echo base_url('assets/upload/sem_foto.jpg') ?>">
            <?php } ?>    
        </div>
        <br>
        <div class="col-10 card card-body">
            <div class="row">
                <div class="col-11 ">
                    <p>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <a href="<?php echo base_url('perfil/'.$comentario->idAutor.'/'.limpar($comentario->nomeAutor)) ?>" data-usuario-id="<?= $comentario->idAutor ?>"><b><?php echo $comentario->nomeAutor ?></b></a>
                    </p>
                    <p style="font-size:small;">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <?php echo postadoem($comentario->dataCriacao) ?>
                    </p>
                </div>                           
            </div>
            <div>
                <p class="font-weight-bold"><?php echo $comentario->conteudo ?></p>
            </div>
            <div class="row">
            <div class="col-2">
                <a id="btnLike" href="#"><i class="icon-rotate icon-flipped fa fa-thumbs-up fa-lg" aria-hidden="true"></i><span class="badge green">5</span></a>
                <a id="btnDeslike" href="#"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i><span class="badge red">5</span></a>                
            </div>
            </div>   
        </div>
    </div>
    <br> 
<?php endforeach; ?>