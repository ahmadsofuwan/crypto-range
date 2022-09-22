<?php
$action = 'add';
$display = '';
if (isset($_POST['action']))
	$action = $_POST['action'];
if ($action == 'update')
	$display = 'style="display: none;"'
?>
<div class="row justify-content-center">
	<div class="col-lg-10">
		<div class="row">
			<div class="col-lg">
				<div class="p-5">
					<?php echo $err ?>
					<h3 class="text-center"><b><?php echo strtoupper($title) ?></b></h3>
					<form method="post" enctype="multipart/form-data">
						<input type="hidden" name="pkey" value="">
						<input type="hidden" name="action" value="<?php echo $action ?>">

						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Nama</label>
							<div class="col-sm">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Harga</label>
							<div class="col-sm">
								<div class="input-group">
									<input type="number" class="form-control" name="price" placeholder="Harga">
									<div class="input-group-append">
										<span class="input-group-text">BUSD</span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Persentasi</label>
							<div class="col-sm">
								<div class="input-group">
									<input type="number" class="form-control" name="percentage" placeholder="Persentasi">
									<div class="input-group-append">
										<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Label</label>
							<div class="col-sm">
								<select class="form-control" name="labelKey">
									<option selected="true" value="0">Pilih Label</option>
									<?php foreach ($label as $key => $value) { ?>
										<option value="<?php echo $value['pkey'] ?>"><?php echo $value['label'] ?></option>
									<?php } ?>

								</select>
							</div>
						</div>



						<div class="form-group row mt-5">
							<div class="col-sm">
								<button type="submit" class="btn btn-primary btn-block">Submit</button>
							</div>
							<div class="col-sm">
								<a href="<?php echo base_url($baseUrl . 'List') ?>" class="btn btn-warning btn-block">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>