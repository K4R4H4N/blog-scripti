<div class="card my-4">
<h5 class="card-header">En çok okunanlar</h5>
<div class="card-body">
<div class="row">
<div class="encklg col-lg-6">
<ul class="enck list-unstyled mb-0">
<?php foreach(enckokunanlar() as $enck) { ?>
<li><i class="fa fa-angle-double-right"></i> <a href="<?php echo base_url("yazi/$enck->yazi_url"); ?>"><?php echo $enck->yazi_baslik; ?></a></li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>