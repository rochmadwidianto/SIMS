
<section class='content-header'>
	<h1>
		Brand
		<small>Daftar Brand</small>
	</h1>
	<ol class='breadcrumb'>
		<li><a href='#'><i class='fa fa-suitcase'></i>Manajemen Referensi</a></li>
		<li class='active'>Daftar Brand</li>
	</ol>
</section>   
<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box box-primary'>
                <div class='box-header'>
                <h3 class='box-title'> Detail Brand Read</h3>
        <table class="table table-bordered">
	    <tr><td>Brand</td><td><?php echo $brand_nama; ?></td></tr>
	    <tr><td>User</td><td><?php echo $user_id; ?></td></tr>
	</table>
        <div class='box-footer'>
        <a href="<?php echo site_url('brand') ?>" class="btn btn-primary">Back</a>
        </div>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->