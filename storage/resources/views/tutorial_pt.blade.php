@extends('layout.default')

@section('page')
{{trans('interface.name', ['page'=>trans('menu.tutorial')])}}
@stop

@section('head')
<link href="{{ asset('/css/dash_styles.css') }}" rel="stylesheet" type="text/css"/>
<style>
    .img-tutorial{
        width: 80%;
        padding: 20px;
    }
    h3{
        margin-top: 30px;
    }
    h4{
        padding: 30px;
    }
    @media screen and (min-width: 650){
        #side{
            position:fixed;
        }
    }
    .scrollup {
        position: fixed;
        bottom: 2em;
        right: 0px;
        text-decoration: none;
        color: white;
        background-color: grey;
        display: none;
        width: 40px;
        height: 40px;
        border-radius: 50% 50%;
        font-size: 15pt;
        font-weight: bold;
        text-align: center;
    }
    .scrollup>i{
        padding-top:10px;
    }
    .scrollup:hover{    
        opacity: 0.6;
    }
</style>
@stop

@section('content')
<a href="#" class="scrollup"><i class="fa fa-angle-up" ></i></a>
<div class="row" style="margin:0; padding:0;">
    <div class="col-md-4"  >
        <div class="sidebar content-box col-lg-10" id='side' >
            <ul class="nav">
                <!-- Main menu -->
                <li class="current visible-xs visible-sm">
                    <a href="#" data-toggle="collapse" 
                       data-target="#goup" aria-expanded="true" aria-controls="goup">
                        <i class="glyphicon glyphicon-th-large"></i> {{trans('interface.menu')}}
                        <i class="caret pull-right"></i>
                    </a>
                </li>
            </ul>
            <ul id='goup' class='nav collapse in'>
                <li><a href='#create'>Criar Conta</a></li>
                <li><a href='#login'>Entrar no Sistema</a></li>
                <li><a href='#logout'>Sair do Sistema</a></li>
                <li><a href='#recover'>Recuperar Senha</a></li>
                <li class="submenu">
                    <a href="#">
                        Acessar Experimentos<i class="fa fa-caret-down"></i>
                    </a>
                    <!-- Sub menu -->
                    <ul>
                        <li><a href="#painel_cc">Painel El??trico CC</a></li>
                        <li><a href="#painel_ca">Painel El??trico CA</a></li>
                        <li><a href="#conducao">Condu????o de calor em barras met??licas</a></li>
                        <li><a href="#arduino">Ambiente para Desenvolvimento em Arduino</a></li>
                        <li><a href="#propagacao">Meios de Propaga????o de Calor</a></li>
                        <li><a href="#microscopio">Microsc??pio Remoto</a></li>
                    </ul>
                </li>

                <li><a href='#report'>Gerar Relat??rio</a></li>
                <li><a href='#embed'>Incorporar Experimento</a></li>
                <li><a href='#create_lab'>Criar Experimento</a></li>
            </ul>

        </div>
    </div>
    <div class="col-md-8 content-box-large">
        <h2 style='padding:0 0 10px; margin:0;'>Tutoriais</h2>
        <h3 id='create'>Criar Conta</h3>
        <?php include('help/create_user_pt.php'); ?>

        <h3 id='login'>Entrar no Sistema</h3>
        <?php include('help/login_pt.php'); ?>

        <h3 id='logout'>Sair do Sistema</h3>
        <?php include('help/logout_pt.php'); ?>

        <h3 id='recover'>Recuperar Senha</h3>
        <?php include('help/recover_pt.php'); ?>

        <h3 id='lab'>Acessar Experimentos</h3>
        <h4 id="painel_cc">Painel El??trico CC</h4>
        <?php include('help/labs/cc_pt.php'); ?>
        <h4 id="painel_ca">Painel El??trico CA</h4>
        <?php include('help/labs/ca_pt.php'); ?>
        <h4 id="conducao">Condu????o de calor em barras met??licas</h4>
        <?php include('help/labs/conducao.php'); ?>
        <h4 id="arduino">Ambiente para Desenvolvimento em Arduino</h4>
        <?php //include('help/labs/arduino_pt.php'); ?>
        <i>Em desenvolvimento</i>
        <h4 id="propagacao">Meios de Propaga????o de Calor</h4>
        <?php //include('help/labs/propagacao_pt.php'); ?>
        <i>Em desenvolvimento</i>
        <h4 id="microscopio">Microsc??pio Remoto</h4>
        <?php //include('help/labs/microscopio_pt.php'); ?>
        <i>Em desenvolvimento</i>
        <h4 id='plano'>Plano Inclinado</h4>
        <?php //include('help/labs/plano_pt.php'); ?>
        <i>Em desenvolvimento</i>

        <h3 id='report'>Gerar Relat??rio</h3>
        <?php include('help/report_pt.php'); ?>

        <h3 id='embed'>Incorporar Experimento</h3>
        <?php include('help/embed_pt.php'); ?>

        <h3 id='create_lab'>Criar Experimento</h3>
        <i>*Esta fun????o s?? pode ser executada por usu??rios com permiss??o de administrador.</i><br><br>
        <?php include('help/create_lab_pt.php'); ?>

    </div>
</div>
@stop

@section('script')
<script src="{{ asset('/js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/dash_custom.js') }}" type="text/javascript"></script>
<script>
$(function () {
    var offset = 150;
    var duration = 500;
    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.scrollup').fadeIn(duration);
        } else {
            $('.scrollup').fadeOut(duration);
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $('a[href*=#]:not([href=#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
                return false;
            }
        }
    });
});
$(window).resize(function () {
    if ($(window).width() < 1050) {
        $('#goup').removeClass('in');
    } else {
        $('#goup').addClass('in');
    }
}).resize();

</script>
@yield('script_dash')
@stop