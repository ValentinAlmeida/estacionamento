

<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('<?php echo base_url('public/img/auth/login2-bg.jpg') ?>')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="<?php echo base_url('public/index.html')?>"><img src="<?php echo base_url('public/src/img/brand.svg')?>" alt=""></a>
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

                    <h3>Faça login no sistema de estacionamento</h3>
                    <p>Que bom ver você de novo!</p>
                    <form method="post" action="<?php echo base_url('login/auth')?>">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required="">
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Senha" required="">
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('https://code.jquery.com/jquery-3.3.1.min.js')?>"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url('public/src/js/vendor/jquery-3.3.1.min.js')?>"><\/script>')</script>
<script src="<?php echo base_url('public/plugins/popper.js/dist/umd/popper.min.js')?>"></script>
<script src="<?php echo base_url('public/plugins/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')?>"></script>
<script src="<?php echo base_url('public/plugins/screenfull/dist/screenfull.js')?>"></script>
<script src="<?php echo base_url('public/dist/js/theme.js')?>"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>
