<?php $admin = $this->session->userdata("admin"); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title; ?></title>
<link href="<?php echo base_url("assets/a/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/vendor/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/css/sb-admin.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/sweetalert2.min.css"); ?>" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
<?php $this->load->view("admin/menu");?>
<div class="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="<?php echo base_url("admin"); ?>">Panel</a>
</li>
<li class="breadcrumb-item active">Genel Ayarlar</li>
</ol>
<!-- genel ayarlar -->
<h4>Genel Ayarlar</h4>
<hr>
<form action="<?php echo base_url("admin/ayarlar/update"); ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="guncelleyen_id" value="<?php $user = $this->session->userdata("user"); echo $user["id"]; ?>">
<?php foreach ($genel_ayarlar as $row) { ?>
<div class="col-md-12">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Sitenin Adı (Title)</span>
</div>
<input type="text" class="form-control" name="site_title" value="<?php echo $row->site_title; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Açıklama (Description)</span>
</div>
<input type="text" class="form-control" name="site_description" value="<?php echo $row->site_description; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Anahtar Kelimeler (Keywords)</span>
</div>
<input type="text" class="form-control" name="site_keywords" value="<?php echo $row->site_keywords; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Anasayfada görünecek olan yazı sayısı</span>
</div>
<input type="text" class="form-control" name="anasayfa_yazi_sayisi" value="<?php echo $row->anasayfa_yazi_sayisi; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Anasayfada görünecek olan en çok okunan yazı sayısı</span>
</div>
<input type="text" class="form-control" name="enckokunan_yazi_sayisi" value="<?php echo $row->enckokunan_yazi_sayisi; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Kategori listeleme sayfasında görünecek olan yazı sayısı</span>
</div>
<input type="text" class="form-control" name="anasayfa_kategori_sayisi" value="<?php echo $row->anasayfa_kategori_sayisi; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Etiket listeleme sayfasında görünecek olan yazı sayısı</span>
</div>
<input type="text" class="form-control" name="anasayfa_etiket_sayisi" value="<?php echo $row->anasayfa_etiket_sayisi; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Arama sayfasında görünecek olan yazı sayısı</span>
</div>
<input type="text" class="form-control" name="arama_yazi_sayisi" value="<?php echo $row->arama_yazi_sayisi; ?>">
</div>
</div>
<!-- genel ayarlar -->

<!-- sosyal medya -->
<br>
<h4>Sosyal Medya Ayarları</h4>
<hr>
<div class="col-md-12">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Facebook</span>
</div>
<input type="text" class="form-control" name="site_facebook" value="<?php echo $row->site_facebook; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Twitter</span>
</div>
<input type="text" class="form-control" name="site_twitter" value="<?php echo $row->site_twitter; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Instagram</span>
</div>
<input type="text" class="form-control" name="site_instagram" value="<?php echo $row->site_instagram; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Youtube</span>
</div>
<input type="text" class="form-control" name="site_youtube" value="<?php echo $row->site_youtube; ?>">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Google Plus</span>
</div>
<input type="text" class="form-control" name="site_google_plus" value="<?php echo $row->site_google_plus; ?>">
</div>
</div>
<!-- sosyal medya --> 
<br>
<div class="col-12"><button type="submit" class="btn btn-primary">Ayarları Kaydet</button></div>
<br>
<?php } ?>
</form>
</div>
<footer class="sticky-footer">
<div class="container">
<div class="text-center">
<small>Copyright © Burak Dündar 2018</small>
</div>
</div>
</footer>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fa fa-angle-up"></i>
</a>
<?php $this->load->view("admin/cikis_yap");?>
</div>
</body>
<script src="<?php echo base_url("assets/a/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/jquery.dataTables.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin-datatables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/sweetalert2.all.js"); ?>"></script>
<?php $this->load->view("admin/alert"); ?>
</html>