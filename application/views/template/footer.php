
    
       <!-- Modal Cadastrar Comentário -->
        <div class="modal fade" id="modalComentar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">Escrever Comentário</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <form id="formEnviarComentario">
                            <br>
                            <div class="md-form">
                                <i class="fa fa-pencil prefix grey-text"></i>
                                <textarea type="text" id="conteudo" name="conteudo" class="md-textarea" style="height: 100px"></textarea>
                                <label for="conteudo">Seu comentário</label>
                            </div>
                        </form>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" id="btnComentar" class="btn btn-primary">Enviar Comentário</button>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>

        <div class="modal fade" id="modalEditarComentario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">Editar Comentário</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <form>
                            <br>
                            <div>
                                <input type="hidden" name="idComentario" id="idComentario">
                            </div>
                            <div class="md-form">
                                <i class="fa fa-pencil prefix grey-text"></i>
                                <textarea type="text" id="conteudoEditado" name="conteudo" class="md-textarea" style="height: 100px"></textarea>
                            </div>
                        </form>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" id="btnEditar" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Footer-->
        <footer style="position:absolute;bottom:0;width:100%;" class="footer page-footer center-on-small-only">
            <div class="footer-copyright">
                <div style="height: 100px" class="containter-fluid">
                    © 2017 Copyright: <a target="_blank" href="https://www.facebook.com/Fmarcos00"><button style="border-radius: 50px" class="btn btn-floating btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i></button> </a>
                </div>
            </div>
        </footer>
        </main>
        

        <script type="text/javascript">
            path = "<?= base_url() ?>";
        </script>

        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.1.min.js')?>"></script>  
        <script type="text/javascript" src="<?php echo base_url('assets/js/toastr.min.js')?>"></script>      
        <script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js')?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/js/mdb.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js')?>"></script>

        <script>
            new WOW().init();
        </script>
    </div>
    </body>
</html>
