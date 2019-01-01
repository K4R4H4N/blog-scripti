<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo strip_tags($sayfa_title); ?> | <?php echo strip_tags($ayarlar->site_title); ?></title>
<meta name="author" content="Burak Dündar" />
<meta name="robots" content="all"/>
<meta name="description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="Burak Dündar" />
<meta name="copyright" content="Copyright Burak Dündar - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@desponres"/>
<meta name="twitter:url" content="<?php echo base_url($sayfa_url); ?>">
<meta name="twitter:title" content="<?php echo strip_tags($sayfa_title); ?>">
<meta name="twitter:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="twitter:image" content="<?php echo base_url("assets/images/bd.png"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="<?php echo strip_tags($sayfa_title); ?>">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo base_url($sayfa_url); ?>">
<meta property="og:image" content="<?php echo base_url("assets/images/bd.png"); ?>">
<meta property="og:image:width" content="150">
<meta property="og:image:height" content="150">
<meta property="og:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/blg.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
<a class="navbar-brand" href="<?php echo base_url();?>"><?php echo strip_tags($ayarlar->site_title); ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ml-auto">
<li class="nav-item">
<?php $this->load->view("menu"); ?></ul>
</div>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="card my-4">
<div class="card-header"><?php echo $sayfa_title; ?></div>
<div class="card-body">
<?php echo $sayfa_icerik; ?>
</div>
</div>
</div>
<div class="col-md-4">
<!-- Search Widget -->
<div class="card my-4">
<h5 class="card-header">Ara</h5>
<div class="card-body">
<form action="<?php echo base_url("arama"); ?>">
<div class="input-group">
<input type="text" class="form-control" name="q" placeholder="Sitede ara..." required>
<button class="btnara btn btn-secondary" type="submit">Ara!</button>
</div>
</form>
</div>
</div>
<?php $this->load->view("enckokunanlar"); ?>
<div class="card my-4">
<h5 class="card-header">Kategoriler</h5>
<div class="card-body">
<div class="row">
<div class="ktgrlg col-lg-6">
<ul class="ktgr list-unstyled mb-0">
<?php foreach($kategoriler as $ktg) { ?>
<li><i class="fa fa-angle-double-right"></i> <a href="<?php echo base_url("kategori/$ktg->kategori_url"); ?>"><?php echo $ktg->kategori_adi; ?></a></li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>
</div><!-- col-md-4 -->
</div>
</div>
<footer class="footer bg-dark">
<div class="container">
<p class="m-0 text-center text-white">Copyright &copy; 2018 - <a target="_blank" href="https://desponres.ml/">Burak Dündar</a> tarafından ıssız gecelerde kodlanmıştır :)</p>
</div>
</footer>
<script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
</body>
</html>