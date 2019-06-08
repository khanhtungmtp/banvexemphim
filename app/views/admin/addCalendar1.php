<!doctype html>
<html lang="en" dir="ltr">

<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta http-equiv="Content-Language" content="en"/>
<meta name="msapplication-TileColor" content="#2d89ef">
<meta name="theme-color" content="#4188c9">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<link rel="icon" href="./favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico"/>
<!-- Generated: 2018-04-16 09:29:05 +0200 -->
<title>Admin-Quản lý CGV</title>
<link rel="stylesheet" href="<?= BASE_URL; ?>/public/admin_asset/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="<?= BASE_URL; ?>/public/admin_asset/css/datepicker.css">
<link rel="stylesheet" href="<?= BASE_URL; ?>/public/admin_asset/css/ggfont.css">
<link rel="stylesheet" href="<?= BASE_URL; ?>/public/css/form.css">

<script src="<?= BASE_URL; ?>/public/admin_asset/js/require.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<!-- jQuery Code executes on Date Format option ----->
<script src="<?= BASE_URL; ?>/public/ckeditor/ckeditor.js"></script>
<script>
requirejs.config({
baseUrl: '.'
});
</script>
<!-- Dashboard Core -->
<link href="<?= BASE_URL ?>/public/admin_asset/css/dashboard.css" rel="stylesheet"/>
<script src="<?= BASE_URL; ?>/public/admin_asset/js/dashboard.js"></script>
<script src="<?= BASE_URL; ?>/public/admin_asset/js/bootstrap-datepicker.js"></script>

</head>

<body>
<?php $this->view('admin/inc/menu'); ?>
<?php 
	$gio=['09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00'];
	$today = date('Y-m-d');
 ?>
<div class="my-3 my-md-5">
<div class="container">
<div class="row">
<div class="col-12">
<form action="<?= BASE_URL; ?>/admin/addCalendar/<?= $data['getMovie']->id; ?>" class="form" method="post">
	<section><input type="submit" name="submit" value="Cập nhập lịch" class="btn btn-green"/></section>

		<ul class="calendar_date">
			<li class="date"><input type="text" class="datepicker date_add" name="date_add" value="<?= $today; ?>" data-date-format="yyyy-mm-dd" /></li>
				<li>
					<select name="times[<?= $today; ?>]" class="times">
						<?php foreach ($gio as $h): ?>
							<option value="<?= $h; ?>"><?= $h; ?></option>
						<?php endforeach ?>
					</select>
					 <a href="javascript:;" class="del_time" onclick="delTime($(this));"><img src="<?= BASE_URL; ?>/public/img/delete1.png" /></a>
				</li>
			<a href="javascript:;" class="add_time" data-date="<?= $today; ?>" onclick="addTime($(this));"><img src="<?= BASE_URL; ?>/public/img/add.png" /></a>
		</ul>
	<a href="javascript:;" class="btn btn-primary" onclick="addDate($(this));">Thêm ngày</a>
</form>

</div>

</div>
</div>
</div>

<style type="text/css">
.cke_reset {
width: 738px;
}
</style>
<script type="text/javascript">

function delTime (obj) {
	// closest(): Chọn thành phần đầu tiên tính từ thành phần cha trở lên của chính thành phần được chọn.
	obj.closest('li').remove();
}

function addTime(obj) {
	var date = obj.attr('data-date');
	$.ajax({
		url: '<?php echo BASE_URL; ?>/admin/ajax_time/' + date,
		success: function(data) {
			obj.before(data);
		}
	});
}

function addDate(obj) {
	$.ajax({
		url: '<?php echo BASE_URL; ?>/admin/ajax_date',
		success: function(data) {
			obj.before(data);
		}
	});
}

</script>

<script>
    $(function () {
        $(".datepicker").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());

        // khi người dùng chọn ngày khác
        $(".datepicker").change(function() {
		var date = $(this).val();
		var parent = $(this).closest('.calendar_date');
		parent.find('.add_time').attr('data-date', date);

		var select = parent.find('select');
		select.each(function() {
			$(this).attr('name', 'times[' + date + '][]');
		});
	});


    });
</script>