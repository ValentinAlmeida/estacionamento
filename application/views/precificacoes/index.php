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
                                <i class="<?php echo $icone_view; ?> bg-blue"></i>
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

                <?php if($message = $this->session->flashdata('success')) : ?>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert bg-success alert-success text-white alert-dismissible fade show" role="alert">
                                <strong> <?php $message ?> </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ik ik-x"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

                <?php if($message = $this->session->flashdata('danger')) : ?>

                    <div class="row">
                        <div class="col-md-12">
                                    <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
                                        <strong> <?php $message ?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="ik ik-x"></i>
                                        </button>
                                    </div>
                        </div>
                    </div>

                <?php endif; ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-block"><a data-toggle="tooltip" title="Cadastrar usuario" class="btn bg-blue float-right text-white" href="<?php echo base_url($this->router->fetch_class().'/core') ?>">+Novo</a> </div>
                            <div class="card-body">
                                <table class="table data-table">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Categoria</th>
                                        <th>Valor Hora</th>
                                        <th>Valor mensalidade</th>
                                        <th>Numero de Vagas</th>
                                        <th>Ativo</th>
                                        <th class="nosort text-right pr-25">Ações</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($precificacoes as $precificacao) : ?>
                                    <tr>
                                        <td><?php echo $precificacao->precificacao_id; ?></td>
                                        <td><?php echo $precificacao->precificacao_categoria; ?></td>
                                        <td><?php echo $precificacao->precificacao_valor_hora; ?></td>
                                        <td><?php echo $precificacao->precificacao_valor_mensalidade; ?></td>
                                        <td><?php echo $precificacao->precificacao_numero_vagas; ?></td>
                                        <td><?php echo ($precificacao->precificacao_ativa == 1 ? '<span class="badge badge-pill badge-success mb-1">Sim</span>': '<span class="badge badge-pill badge-danger mb-1">Não</span>'); ?></td>
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="bottom" title="Editar <?php echo $this->router->fetch_class(); ?>" href="<?php echo base_url($this->router->fetch_class().'/core/'.$precificacao->precificacao_id) ?>" class="btn btn-icon btn-primary"><i class="ik ik-edit-2"></i></a>
                                            <button title="Editar <?php echo $this->router->fetch_class(); ?>" type="button" class="btn btn-icon btn-danger" data-toggle="modal" href="" data-target="#user-<?php echo $precificacao->precificacao_id; ?>"><i class="ik ik-trash-2"></i></button>
                                        </td>
                                    </tr>

                                        <div class="modal fade" id="user-<?php echo $precificacao->precificacao_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterLabel"><i class="fas fa-exclamation-triangle text-danger" ></i> &nbsp; Tem certeza que deseja excluir o usuario?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Se deseja excluir o usuario, clique em <strong>Sim, excluir</strong></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-toggle="tooltip" data-placement="bottom" title="Cancelar" type="button" class="btn btn-secondary" data-dismiss="modal">Não, voltar</button>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="Excluir <?php echo $this->router->fetch_class(); ?>" href="<?php echo base_url($this->router->fetch_class().'/del/'.$precificacao->precificacao_id) ?>" class="btn btn-danger">Sim, excluir</a>

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
