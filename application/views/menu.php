<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>">Anasayfa</a></li>
<?php foreach(helper_menu() as $sayfalar){ ?>
<li class="nav-item"><a class="nav-link" href="<?php echo base_url("sayfa/$sayfalar->sayfa_url");?>"><?php echo $sayfalar->sayfa_baslik; ?></a></li>
<?php } ?>
<li class="nav-item"><a class="nav-link" href="<?php echo base_url("iletisim");?>">İletişim</a></li>