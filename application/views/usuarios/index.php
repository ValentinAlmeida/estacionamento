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
                                <i class="ik ik-users bg-blue"></i>
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
                                    <li data-toggle="tooltip" data-placement="bottom" class="breadcrumb-item active" aria-current="page"><?php echo $titulo?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <?php if($this->session->flashdata('success')) : ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong> <?php $this->session->flashdata("success") ?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="ik ik-x"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

                <?php if($this->session->flashdata('danger')) : ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong> <?php $this->session->flashdata("danger") ?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="ik ik-x"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>




                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><a data-toggle="tooltip" title="Cadastrar usuario" class="btn btn-success" href="<?php echo base_url($this->router->fetch_class().'/core') ?>">+Novo</a> </div>
                            <div class="card-body">
                                <table class="table data-table">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Usuario</th>
                                        <th>E-mail</th>
                                        <th>Nome</th>
                                        <th>Perfil de acesso</th>
                                        <th>Ativo</th>
                                        <th class="nosort text-right pr-25">Ações</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($usuarios as $user) : ?>
                                    <tr>
                                        <td><?php echo $user->id; ?></td>
                                        <td><?php echo $user->username; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td><?php echo $user->first_name; ?></td>
                                        <td><?php echo ($this->ion_auth->is_admin($user->id) ? 'Administrador' : 'Atendente')  ?></td>
                                        <td><?php echo ($user->active == 1 ? '<span class="badge badge-pill badge-success mb-1">Sim</span>': '<span class="badge badge-pill badge-danger mb-1">Não</span>'); ?></td>
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="bottom" title="Editar <?php echo $this->router->fetch_class(); ?>" href="<?php echo base_url($this->router->fetch_class().'/core/'.$user->id) ?>" class="btn btn-icon btn-primary"><i class="ik ik-edit-2"></i></a>
                                            <button type="button" class="btn btn-icon btn-danger" data-toggle="modal" data-target="#user- <?php echo $user->id;?>" title="Excluir"><i class="ik ik-trash"></i></button>
                                        </td>
                                    </tr>

                                        <div class="modal fade" id="user-<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger">Sim, excluir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
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
