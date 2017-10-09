<?php $this->load->view('template/header'); ?>
    <main>
        <div class="container">
            <div class="row justify-content-center">                
                <div class="col-6">
                    <form action="<?php echo base_url('usuario/imagem'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $this->session->userdata('usuarioLogado')['id'] ?>" name="idUsuario" id="idUsuario">
                        <p class="h5 text-center mb-4">Trocar foto</p>
                        <div>                            
                            <div><span>Escolha a foto</span></div>
                            <input type="file" name="userfile">
                        </div>
                        <br>
                        <div class="text-center">
                            <button class="btn btn-deep-orange">Salvar</button>
                        </div>
                    </form>
                </div>            
            </div>           
        </div>
    </main>
<?php $this->load->view('template/footer'); ?>