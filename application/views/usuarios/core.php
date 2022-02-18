<?php
$this->load->view('layout/navbar');
?>
<div class="page-wrap">
    <?php
    $this->load->view('layout/sidebar');
    ?>
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="<?php echo $icone_view;?> bg-blue"></i>
                            <div class="d-inline">
                                <h5><?php echo $titulo?></h5>
                                <span><?php echo $sub_titulo ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?php echo base_url('/')?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="<?php echo ucwords($page_usuarios); ?> cadastrados" href="<?php echo base_url($page_usuarios); ?>"> <?php echo ucwords($page_usuarios); ?>&nbsp; cadastrados</a>
                                </li>
                                <li data-toggle="tooltip" data-placement="bottom" class="breadcrumb-item active" aria-current="page"><?php echo $titulo?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><?php echo(isset($usuario) ? '<i class="ik ik-calendar ik-2x"></i> &nbsp; Data da ultima alteração: &nbsp;'.formata_data_banco_com_hora($usuario->data_ultima_alteracao) : ''); ?></div>
                        <div class="card-body">

                            <form class="forms-sample" name="form_core" method="post">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="first_name" value=" <?php echo(isset($usuario) ? $usuario->first_name : set_value('first_name')) ; ?> ">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value=" <?php echo(isset($usuario) ? $usuario->email : set_value('email')) ?> ">
                                </div>
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" name="password" value=" <?php echo(isset($usuario) ? $usuario->password : set_value('password')) ?> ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Confirme sua Senha</label>
                                    <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input">
                                        <span class="custom-control-label">&nbsp;Lembre de mim</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                                <button class="btn btn-light">Cancelar</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="w-100 clearfix">
        </div>
    </footer>

</div>
