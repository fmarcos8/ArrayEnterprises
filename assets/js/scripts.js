$(document).ready(function(){

	showAllComments();
	
	showAllCommentsUser();
	//Funcção que cadastra comentário apartir do modal
	$("#btnComentar").on('click', function(){
		if($("#conteudo").val() != ''){
			$.ajax({
				url : 'comentario/cadastrar',
				type : 'post',
				data : { conteudo : $("#conteudo").val() },
				dataType : 'json',
				success : function(response){
					if(response == 1){						
						$("#conteudo").val('');
						$("#modalComentar").modal("hide");
						toastr.success('Comentário enviado com sucesso!');
						showAllComments();
					}				
				}
			})
		}else{
			return false;
		}
		
	})
	/*--------------------------------------------------*/

	//Função que mostra todos os comentários cadastrados no banco	
	function showAllComments(){
		$.ajax({
			url : 'comentario/lista_comentarios',
			dataType : 'html',
			success : function(response){
				$("#comentarios").html(response);
			}
		})
	}
	/*--------------------------------------------------*/

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

	$('#loader').hide();

	//CONFIG AJAX
    $.ajaxSetup({
        beforeSend: function () {
            $('#loader').show();
        },
        complete: function () {
            $('#loader').hide();
        },
    });
    //CONFIG AJAX


})