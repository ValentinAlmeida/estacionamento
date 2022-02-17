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
                        <div class="card-header ik ik-calendar ik-1x"><?php echo(isset($usuario) ? '&nbsp; Data da ultima alteração: &nbsp;'.formata_data_banco_com_hora($usuario->data_ultima_alteracao) : ''); ?></div>
                        <div class="card-body">

                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Username</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                    <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input">
                                        <span class="custom-control-label">&nbsp;Remember me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
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