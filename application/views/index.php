<?php $this->load->view('template/header') ?>  
        <div style="overflow:hidden;" class="container">
        <hr>  
            <div class="row">
                <div class="col-10">
                    <h1 class="h1-responsive">Comentários</h1>
                </div>
                <div class="col-2">
                    <?php if($this->session->userdata('usuarioLogado')){ ?>
                        <div class="col-md-4">
                            <a href="<?php echo base_url('comentar') ?>"></a>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalComentar">Comentar</button>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-4">
                            <button class="btn btn-primary" disabled>Comentar</button>
                        </div>
                    <?php } ?>                
                </div>
            </div>
            <div id="comentarios">
                
            </div>
            <hr class="extra-margin my-5">
        </div>
<?php $this->load->view('template/footer'); ?>

