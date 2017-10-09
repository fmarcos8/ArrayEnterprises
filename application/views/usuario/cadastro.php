<?php $this->load->view('template/header'); ?>
    <main>
        <div class="container">
            <div class="row justify-content-center">                
                <div class="col-6">
                    <?php if (validation_errors()) : ?>
                        <div class="col">
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo base_url('usuario/cadastro'); ?>" method="POST">
                        <p class="h5 text-center mb-4">Cadastrar</p>

                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="nome" name="nome" class="form-control">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email">Email</label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" id="senha" name="senha" class="form-control">
                            <label for="senha">Senha</label>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-deep-orange">Cadastrar</button>
                        </div>
                    </form>
                </div>            
            </div>           
        </div>
    </main>
<?php $this->load->view('template/footer'); ?>