<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo strip_tags($etiket); ?> | <?php echo strip_tags($ayarlar->site_title); ?></title>
<meta name="author" content="Burak Dündar" />
<meta name="robots" content="all"/>
<meta name="description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="Burak Dündar" />
<meta name="copyright" content="Copyright Burak Dündar - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@desponres"/>
<meta name="twitter:url" content="<?php echo $etiket_urlsi; ?>">
<meta name="twitter:title" content="<?php echo strip_tags($etiket); ?>">
<meta name="twitter:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="twitter:image" content="<?php echo base_url("assets/images/bd.png"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="<?php echo strip_tags($etiket); ?>">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo $etiket_urlsi; ?>">
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
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
<a class="navbar-brand" href="<?php echo base_url();?>"><?php echo strip_tags($ayarlar->site_title); ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ml-auto">
<?php $this->load->view("menu"); ?>
</ul>
</div>
</div>
</nav>
<!-- Page Content -->
<div class="container">
<div class="row">
<div class="col-md-8">
<h3 class="my-4"><?php echo $etiket; ?></h3>
<?php foreach ($yazilar as $row) { ?>
<?php
$metin = $row->yazi_icerik;
$uzunluk = strlen($metin);
$sinir = 250;
if ($uzunluk>$sinir) {
$yazi_icerik_v2 = substr($metin,0,$sinir);
}
else if($uzunluk<$sinir){
$yazi_icerik_v2 = $metin;
}
?>
<div class="card mb-4">
<?php if($row->yazi_resim){  ?>
<img class="card-img-top" src="<?php echo base_url("uploads/$row->yazi_resim"); ?>" alt="<?php echo $row->yazi_baslik; ?>">
<strong style="border:1px solid #F0F0F0;"></strong>
<?php } ?>
<div class="card-body">
<h4 class="card-title"><?php echo $row->yazi_baslik; ?></h4>
<p class="card-text"><?php echo substr(strip_tags($row->yazi_icerik), 0 , 250); ?>...</p>
<a href="<?php echo base_url("yazi/".$row->yazi_url); ?>" class="btn btn-primary">Devamını oku &rarr;</a>
</div>
<div class="card-footer text-muted"><strong><?php echo strip_tags($row->uye_ad_soyad); ?></strong> tarafından <?php $tarih = $row->createdAt; echo $this->fonksiyonlar->timeConvert($tarih); ?> paylaşıldı.
<strong style="float:right;"><a href="#" data-toggle="modal" data-target="#paylas<?php echo $row->id; ?>"><i data-toggle="tooltip" data-placement="top" title="Sosyal Medyada Paylaş" class="fa fa-share-alt-square"></i></a></strong>
</div>
</div>
<div class="modal fade" id="paylas<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="paylas<?php echo $row->id; ?>" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Yazıyı Sosyal Medyada Paylaş</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="col-12">
<div class="input-group mb-4 sosyal_paylas">
<div class="btnsylfa facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url("yazi/".$row->yazi_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a></div>
<div class="btnsyl twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo base_url("yazi/".$row->yazi_url); ?>&text=<?php echo substr(strip_tags($row->yazi_icerik), 0 , 250); ?>..." target="_blank"><i class="fa fa-twitter"></i></a></div>
<div class="btnsyl whatsapp"><a href="whatsapp://send?text=<?php echo base_url("yazi/".$row->yazi_url); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a></div>
<div class="btnsyl linkedin"><a href="https://www.linkedin.com/shareArticle?url=<?php echo base_url("yazi/".$row->yazi_url); ?>&title=<?php echo substr(strip_tags($row->yazi_icerik), 0 , 250); ?>..." target="_blank"><i class="fa fa-linkedin"></i></a></div>
<div class="btnsyl google-plus"><a href="https://plus.google.com/share?url=<?php echo base_url("yazi/".$row->yazi_url); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></div>
</div>
<div class="input-group mb-3">
<input id="yazi_url" type="text" class="form-control" value="<?php echo base_url("yazi/".$row->yazi_url); ?>">
<div class="input-group-append">
<button data-clipboard-target="#yazi_url" class="btn btn-outline-secondary" type="button">Kopyala</button>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
</div>
</div>
</div>
</div>
<?php } ?>
<nav>
<?php echo $this->pagination->create_links(); ?>
</nav>
</div>
<!-- Sidebar Widgets Column -->
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
</div><!-- row -->
</div><!-- container -->
<footer class="footer bg-dark">
<div class="container">
<p class="m-0 text-center text-white">Copyright &copy; 2018 - <a target="_blank" href="https://desponres.ml/">Burak Dündar</a> tarafından ıssız gecelerde kodlanmıştır :)</p>
</div>
</footer>
<script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/jquery/clipboard.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/jquery/clipboard.dm.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>
