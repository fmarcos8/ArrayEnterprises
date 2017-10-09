<?php foreach($comentarios as $comentario): ?>
    <div class="card card-body"></h4>
        <div class="row">
            <div class="col-10">
                <p class="content font-weight-bold"><?= $comentario->conteudo ?></p>
                <p style="font-size:small;">Postado : <?= postadoem($comentario->dataCriacao) ?></p>
                <?php if($comentario->dataEdicao != '0000-00-00 00:00:00'):?>
                    <p style="font-size:small;">Última edição feita : <?= postadoem($comentario->dataEdicao) ?></p>
                <?php endif;?>
            </div>      
            <?php if($this->session->userdata('usuarioLogado')['id'] == $comentario->idUsuario): ?>  
            <div class="col-2">
                <button data-id="<?= $comentario->idComentario ?>" class="btnDeletar btn btn-danger"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></button>
                <button data-toggle="modal" data-id="<?= $comentario->idComentario ?>" data-target="#modalEditarComentario" class="btnEditar btn btn-primary"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></button>
            </div> 
            <?php endif;?>           
        </div>
    </div>
    <br>
<?php endforeach; ?>

<script>
    function showAllCommentsUser(){
        $.ajax({
            url : path + 'usuario/comentarios',
            type : 'post',
            data : { id : $('#listaComentariosUsuario').attr('data-id-usuario') },
            success : function(response){
                $("#listaComentariosUsuario").html(response);
            }
        })
    }
    
    $("button.btnDeletar").on('click', function(){
        $.ajax({
            url : path +'comentario/deletar',
            data : { id : $(this).attr('data-id')},
            success : function(response){
                if(parseInt(response) == 1){ 
                    toastr.success('Comentário deletado com sucesso!');                  
                    showAllCommentsUser();
                }
            }
        });
    });

    $(".btnEditar").on('click', function(){
        $.ajax({
            url : path +'comentario/dados_comentario',
            dataType : 'json',
            data : { id : $(this).attr('data-id') },
            success : function(response){
                $("#conteudoEditado").val(response.conteudo);
                $("input[type=hidden]#idComentario").val(response.idComentario);
            }
        });
    });
    
    $("#btnEditar").on('click', function(){
        $.ajax({
            url : path + 'comentario/editar',
            type : 'post',
            data : {
                id : $("#idComentario").val(),
                conteudo : $("textarea#conteudoEditado").val()
            },
            success : function(response){
                if(parseInt(response) == 1){       
                    $("#modalEditarComentario").modal("hide");
                    toastr.success('Comentário editado com sucesso!');
                    showAllCommentsUser();
                }
            }
        });
    });
</script>
