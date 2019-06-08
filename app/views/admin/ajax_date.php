<?php
$gio=['09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00'];
$today = date('Y-m-d');
?>
<ul class="calendar_date">
	<li class="date">
		<input type="text" class="datepicker date_add" name="date_add" value="<?= $today; ?>" data-date-format="yyyy-mm-dd" />
	</li>
	<li>
		<select name="times[<?= $today; ?>][]" class="times">
			<?php foreach ($gio as $h): ?>
				<option value="<?= $h; ?>"><?= $h; ?></option>
			<?php endforeach ?>
		</select>
		 <a href="javascript:;" class="del_time" onclick="delTime($(this));"><img src="<?= BASE_URL; ?>/public/img/delete1.png" /></a>
	</li>
	<a href="javascript:;" class="add_time" data-date="<?= $today; ?>" onclick="addTime($(this));"><img src="<?= BASE_URL; ?>/public/img/add.png" /></a>
</ul>

<script>
    $(function () {
        $(".datepicker").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());
    });
</script>