<?php
$metin = $yazi_icerik->yazi_icerik;
$uzunluk = strlen($metin);
$sinir = 120;
if ($uzunluk> $sinir) {
$yazi_icerik_v2 = substr($metin,0,$sinir);
}
else if($uzunluk<$sinir){
$yazi_icerik_v2 = $metin;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $yazi_icerik->yazi_baslik; ?> | <?php echo strip_tags($ayarlar->site_title); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Burak Dündar" />
<meta name="description" content="<?php echo strip_tags($yazi_icerik_v2); ?>...">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="Burak Dündar" />
<meta name="copyright" content="Copyright Burak Dündar - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@desponres"/>
<meta name="twitter:url" content="<?php echo base_url(strip_tags("yazi/".$yazi_icerik->yazi_url)); ?>">
<meta name="twitter:title" content="<?php echo $yazi_icerik->yazi_baslik; ?>">
<meta name="twitter:description" content="<?php echo strip_tags($yazi_icerik_v2); ?>...">
<meta name="twitter:image" content="<?php echo base_url("uploads/$yazi_icerik->yazi_resim"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="<?php echo $yazi_icerik->yazi_baslik; ?>">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo base_url(strip_tags("yazi/".$yazi_icerik->yazi_url)); ?>">
<meta property="og:image" content="<?php echo base_url("uploads/$yazi_icerik->yazi_resim"); ?>">
<meta property="og:image:width" content="150">
<meta property="og:image:height" content="150">
<meta property="og:description" content="<?php echo strip_tags($yazi_icerik_v2); ?>...">
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
<?php $this->load->view("menu"); ?>
</ul>
</div>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-lg-8">
<?php $alert = $this->session->userdata("alert");
if($alert){ ?>
<hr>
<div class="alert alert-<?php echo $alert["type"]; ?>">
<strong><?php echo $alert["title"]; ?></strong> <?php echo $alert["message"]; ?>
</div>
<hr>
<?php } ?>
<h1 class="mt-4"><?php echo $yazi_icerik->yazi_baslik; ?></h1>
<hr>
<p><strong><?php echo strip_tags($yazi_icerik->uye_ad_soyad); ?></strong> tarafından, <a href="<?php echo base_url("kategori/".strip_tags($yazi_icerik->kategori_url)); ?>"><?php echo strip_tags($yazi_icerik->kategori_adi); ?></a> kategorisinde <?php $tarih = $yazi_icerik->createdAt; echo $this->fonksiyonlar->timeConvert($tarih); ?> paylaşıldı. <strong style="float:right;"><a href="#" data-toggle="modal" data-target="#paylas<?php echo $yazi_icerik->id; ?>"><i data-toggle="tooltip" data-placement="top" title="Sosyal Medyada Paylaş" class="fa fa-share-alt-square"></i></a></strong>
</p>
<div class="modal fade" id="paylas<?php echo $yazi_icerik->id; ?>" tabindex="-1" role="dialog" aria-labelledby="paylas<?php echo $yazi_icerik->id; ?>" aria-hidden="true">
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
<div class="btnsylfa facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url("yazi/".$yazi_icerik->yazi_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a></div>
<div class="btnsyl twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo base_url("yazi/".$yazi_icerik->yazi_url); ?>&text=<?php echo strip_tags($yazi_icerik_v2); ?>..." target="_blank"><i class="fa fa-twitter"></i></a></div>
<div class="btnsyl whatsapp"><a href="whatsapp://send?text=<?php echo base_url("yazi/".$yazi_icerik->yazi_url); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a></div>
<div class="btnsyl linkedin"><a href="https://www.linkedin.com/shareArticle?url=<?php echo base_url("yazi/".$yazi_icerik->yazi_url); ?>&title=<?php echo strip_tags($yazi_icerik_v2); ?>..." target="_blank"><i class="fa fa-linkedin"></i></a></div>
<div class="btnsyl google-plus"><a href="https://plus.google.com/share?url=<?php echo base_url("yazi/".$yazi_icerik->yazi_url); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></div>
</div>
<div class="input-group mb-3">
<input id="yazi_url" type="text" class="form-control" value="<?php echo base_url("yazi/".$yazi_icerik->yazi_url); ?>">
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
<hr>
<p><?php echo $yazi_icerik->yazi_icerik; ?></p>
<hr>
<?php if(empty(!$yazi_etiketler)) { ?>
<div class="etiketler">
<strong class="etiket_baslik">Etiketler: </strong>
<ul class="etiket-listesi">
<?php foreach ($yazi_etiketler as $etiket) : ?>
<li>
<a href="<?php echo base_url() . 'etiket/' . strip_tags($etiket->etiket_url); ?>">
<?php echo strip_tags($etiket->etiket); ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</div>
<div class="temizle"></div>
<hr>
    <?php } ?>
<hr style="background:#000;height: 2px;">
<?php
if(!empty($yorumlar)){ ?>
<h4><strong>"<?php echo $yazi_icerik->yazi_baslik; ?>" için yapılan yorumlar</strong></h4>
<hr>
<?php } else { ?>
<h4><strong>Bu yazı için henüz yorum yazılmamış, ilk yorumu sen yaz :)</strong></h4>
<hr>
<?php }
foreach ($yorumlar as $yorum) : ?>
<div class="yorum media mb-4">
<img class="d-flex mr-3 rounded-circle" src="<?php echo base_url("assets/images/user.png"); ?>" width="50" height="50">
<div class="media-body">
<h5 class="mt-0"><?php echo strip_tags($yorum->yorum_ad_soyad); ?></h5>
<?php echo $yorum->yorum_icerik; ?>
</div>
</div>
<?php endforeach; ?>
<div class="card my-4">
<h5 class="card-header">Yorum yaz:</h5>
<div class="card-body">
<form method="post" action="<?php echo base_url("yorum-ekle"); ?>">
<input type="hidden" name="yazi_id" value="<?php echo $yazi_icerik->id; ?>">
<input type="hidden" name="yazi_url" value="<?php echo $yazi_icerik->yazi_url; ?>">
<div class="form-group">
<input name="yorum_ad_soyad" type="text" class="form-control" placeholder="Ad & Soyad">
</div>
<div class="form-group">
<input name="yorum_email" type="text" class="form-control" placeholder="E-Mail Adresiniz">
<small class="form-text text-muted">E-Mail adresiniz yorumda gözükmeyecektir.</small>
</div>
<div class="form-group">
<textarea name="yorum_icerik" class="form-control" rows="4" placeholder="Yorumunuz"></textarea>
</div>
<button type="submit" class="btn btn-primary">Gönder</button>
</form>
</div>
</div>
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
<button class="btn btn-secondary" type="submit">Ara!</button>
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
<!-- Footer -->
<footer class="footer bg-dark">
<div class="container">
<p class="m-0 text-center text-white">Copyright &copy; 2018 - <a target="_blank" href="https://desponres.ml/">Burak Dündar</a> tarafından ıssız gecelerde kodlanmıştır :)</p>
</div>
<!-- /.container -->
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
