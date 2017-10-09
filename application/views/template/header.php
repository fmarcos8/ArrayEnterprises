<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">        
        <link href="<?php echo base_url('assets/css/toastr.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/mdb.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">

        <!-- Template styles -->
        <style rel="stylesheet">
            /* TEMPLATE STYLES */

            main {
                margin-top: 3rem;
            }

            .lead {
                text-align: justify;
            }

            @media only screen and (max-width: 768px) {
                .post-title {
                    margin-top: 1rem;
                }
            }

            @media only screen and (max-width: 768px) {
                .read-more {
                    text-align: center;
                }
            }

            .extra-margin {
                margin-top: 2rem;
                margin-bottom: 2rem;
            }

            .navbar {
                background-color: #555658;
            }

            .navbar .btn-group .dropdown-menu a:hover {
                color: #000 !important;
            }

            .navbar .btn-group .dropdown-menu a:active {
                color: #fff !important;
            }

            footer.page-footer {
                background-color: #555658;
            }
            html, body{
                height:100%;
            }
        </style>

    </head>

    <body>
    <div style="min-height:100%;position:relative;">
        <div id="loader">
            <div class="preloader-wrapper">
                <img src="<?php echo base_url('assets/img/Pacman.gif')?>">
            </div>
        </div>
        <?php $nome = $this->session->userdata('usuarioLogado')['nome']; ?>
        <header>
            <!--Navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo base_url('home')?>">ArraysEnterprise</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('home')?>">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <?php if($this->session->userdata('usuarioLogado')){?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('perfil/'.$this->session->userdata('usuarioLogado')['id'].'/'.limpar($nome)) ?>"><?php echo $nome; ?><span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('logout'); ?>">Sair<span class="sr-only">(current)</span></a>
                                </li>     
                            <?php }else{ ?>    
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('login')?>">Entrar<span class="sr-only">(current)</span></a>
                                </li>                            
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('cadastro')?>">Cadastrar-se<span class="sr-only">(current)</span></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>            
            <div style="display: none;"  id="msg" class="container">
                
            </div>