
<div class="my-3 my-md-5">
<div class="container">
<div class="row">
<div class="col-12">
<form action="<?php echo BASE_URL; ?>/admin/addCategory" class="card" method="post">
	<div class="card-header">
		<h3 class="card-title">Thêm mới Thể loại</h3>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="form-group">

					<?php if (isset($data['title_err'])): ?>
						<p class="alert alert-danger">
							<?= $data['title_err']; ?>
						</p>
					<?php endif ?>
					<label class="form-label">Tên thể loại</label>
					<input type="text" class="form-control" name="title" placeholder="Hài, tâm lý"
					value="<?php echo isset($data['title']) ? $data['title'] : '' ?>">
				</div>
			<input type="submit" name="submit" value="Đăng" class="btn btn-primary">
			</div>



		</div>
	</div>
</div>
</form>

</div>

</div>
</div>
</div>
