<?php $this->load->view('template/header'); ?>
    <main>
        <div class="container">
            <div class="row justify-content-center">                
                <div class="col-6">
                    <form action="<?php echo base_url('Usuario/editar'); ?>" method="POST">
                        <input type="hidden" value="<?php echo $this->session->userdata('usuarioLogado')['id'] ?>" name="idUsuario" id="idUsuario">
                        <p class="h5 text-center mb-4">Atualizar dados</p>
                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="nome" name="nome" value="<?php echo $this->session->userdata('usuarioLogado')['nome'] ?>" class="form-control">
                            <label for="nome">Nome</label>
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