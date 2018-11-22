<?php
require_once "DAO/DAOUsuario.php";
require_once "DAO/DAOPessoa.php";
require_once "modelo/Pessoa.php";

// require_once 'DAO/DAOView.php';
// require_once 'modelo/View.php';
require_once "DAO/mySQL.class.php";


include "header.php";
$daoUsuario = new DAOUsuario();
$daoPessoa = new DAOPessoa();

$pessoa = new Pessoa();
$pessoa->id = $_SESSION['p_id'];
$pessoa = $daoPessoa->querySelectPessoa($pessoa);
// $view = new View();
// $daoView = new DAOView();

// $view->user_id = $_SESSION['id'];

// $total_amount = $daoView->queryCountTotalAmount($view);
// $last_day = $daoView->queryCountLastDayAmount($view);
?>

<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total de Usuários</span>
      <!-- <div class="count"><?php echo $daoUsuario->countRows();?></div> -->
    </div>
    <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Tempo de Sessão</span>
    <div class="count">123.50</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
  </div> -->
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total de Pessoas</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total de Homens</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total de Mulheres</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total de Notícias</span>
    <div class="count">3</div>
  </div>
</div>
<!-- /top tiles -->


<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_content">
        <?php  if($pessoa['cidade_id'] == NULL || $pessoa['cadastro_nacional'] == 0 || $pessoa['cadastro_nacional'] == '')
                echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Você possui informações pendentes para adicionar no seu perfil. Vá até o menu perfil e adicione-as!</strong>
                  </div></center>';

        ?>
   <div class="row">
      <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
         <div class="tile-stats">
            <h3></h3>
            <p></p>
         </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
         <div class="tile-stats">
            <h3></h3>
            <p></p>
         </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
         <div class="tile-stats">
            <h3></h3>
            <p></p>
         </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
           <div class="tile-stats">
              <h3></h3>
              <p></p>
           </div>
        </div>
   </div>
   <div class="row">
     <div class="x_panel">
   <div class="x_title">
      <h2>Convide outros usuários para nosso sistema</h2>
      <div class="clearfix"></div>
   </div>
   <div class="x_content">
      <p> <input class="form-control" onclick="copiarClipboard('link_indicacao')" readonly="readonly" type="text" value="http://mandiokinha.net/?ind=15#cadastro" id="link_indicacao"> <br> Divulgue a nossa plataforma para seus amigos. </p>
   </div>
</div>
   </div>
</div>
    </div>
  </div>
</div>



<!-- <div class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2>Weekly Summary <small>Activity shares</small></h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Settings 1</a>
</li>
<li><a href="#">Settings 2</a>
</li>
</ul>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">

<div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
<div class="col-md-7" style="overflow:hidden;">
<span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
<canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
</span>
<h4 style="margin:18px">Weekly sales progress</h4>
</div>

<div class="col-md-5">
<div class="row" style="text-align: center;">
<div class="col-md-4">
<canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
<h4 style="margin:0">Bounce Rates</h4>
</div>
<div class="col-md-4">
<canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
<h4 style="margin:0">New Traffic</h4>
</div>
<div class="col-md-4">
<canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
<h4 style="margin:0">Device Share</h4>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
-->


<!-- <div class="row">
<div class="col-md-4">
<div class="x_panel">
<div class="x_title">
<h2>Top Profiles <small>Sessions</small></h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Settings 1</a>
</li>
<li><a href="#">Settings 2</a>
</li>
</ul>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<article class="media event">
<a class="pull-left date">
<p class="month">April</p>
<p class="day">23</p>
</a>
<div class="media-body">
<a class="title" href="#">Item One Title</a>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
</article>
<article class="media event">
<a class="pull-left date">
<p class="month">April</p>
<p class="day">23</p>
</a>
<div class="media-body">
<a class="title" href="#">Item Two Title</a>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
</article>
<article class="media event">
<a class="pull-left date">
<p class="month">April</p>
<p class="day">23</p>
</a>
<div class="media-body">
<a class="title" href="#">Item Two Title</a>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
</article>
<article class="media event">
<a class="pull-left date">
<p class="month">April</p>
<p class="day">23</p>
</a>
<div class="media-body">
<a class="title" href="#">Item Two Title</a>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
</article>
<article class="media event">
<a class="pull-left date">
<p class="month">April</p>
<p class="day">23</p>
</a>
<div class="media-body">
<a class="title" href="#">Item Three Title</a>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
</article>
</div>
</div>
</div> -->

</div>
<!-- /page content -->
<?php
include_once "footer.php";
?>
