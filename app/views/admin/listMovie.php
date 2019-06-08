
<div class="my-3 my-md-5">

    <div class="container">
        <?php
        if (isset($_SESSION['addMovie'])) {
            echo "<p class='alert alert-success'>Thêm phim thành công </p>";
            unset($_SESSION['addMovie']);
        }
        if (isset($_SESSION['delMovie'])) {
            echo "<p class='alert alert-success'>Xóa phim thành công </p>";
            unset($_SESSION['delMovie']);
        }
        if (isset($_SESSION['updateMovie'])) {
            echo "<p class='alert alert-success'>Sữa phim thành công</p>";
            unset($_SESSION['updateMovie']);
        }
        if (isset($_SESSION['addCalendar'])) {
            echo "<p class='alert alert-success'>Thêm lịch chiếu phim thành công</p>";
            unset($_SESSION['addCalendar']);
        }
        if (isset($_SESSION['updateCalendar'])) {
            echo "<p class='alert alert-success'>Sữa lịch chiếu phim thành công</p>";
            unset($_SESSION['updateCalendar']);
        }
        ?>
        <div class="page-header">
            <div class="col-6"><h1 class="page-title">
                Danh sách phim đang chiếu
            </h1></div>
            <div class="col-4">
                <select name="cat" class="form-control custom-select" id="select-beast">
                    <option value="1" class="movie">Phim đang chiếu</option>
                    <option value="0" class="movie">Phim sắp chiếu</option>
                </select>
            </div>
            <div class="col-2"><a href="<?=BASE_URL?>/admin/addMovie" class="btn btn-primary pull-right">Thêm mới</a></div>
        </div>
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th class="w-1">Thứ tự</th>
                                    <th>Tên phim</th>
                                    <th>Ngày khởi chiếu</th>
                                    <th>Thời lượng</th>
                                    <th>Trạng thái</th>
                                    <th>Ngôn ngữ</th>
                                    <th>Lịch chiếu</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <?php
                            if (($data['listMovie']) == null) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td colspan="9">
                                            Hiện không có phim nào. <a href="<?=BASE_URL?>/admin/addMovie">Tạo mới ngay</a>!
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                            } else {
                                $i = 0;
                                foreach ($data['listMovie'] as $listMovie):
                                    $i++; ?>
                                    <tbody>
                                     <tr class="content">
                                         <td><span class="text-muted"><?=$i?></span></td>
                                         <td><?php if (strlen($listMovie->title) <= 50) {
                                        echo $listMovie->title;
                                    } else {
                                        echo substr($listMovie->title, 0, 40) . '...';
                                    } ?></td>
                                        <td>
                                        <?php
                                         // chuyển về ngày tháng năm
                                         $ngaykhoichieu = date("d-m-Y", strtotime($listMovie->khoichieu));
                                            echo $ngaykhoichieu; 
                                        ?>
                                     </td>
                                     <td><?=$listMovie->thoiluong?> Phút</td>
                                     <td>
                                         <span class="status-icon <?= $listMovie->is_public == 1 ? 'bg-success' : 'bg-danger' ?>"></span><?= $listMovie->is_public == 1 ? 'Đang chiếu' : 'Sắp chiếu'?>
                                     </td>
                                     <td><?php if (strlen($listMovie->ngonngu) <= 40) {
                                    echo $listMovie->ngonngu;
                                } else {
                                    echo substr($listMovie->ngonngu, 0, 35) . '...';
                                } ?></td>
                                    <td>
                                     <a href="<?=BASE_URL; ?>/admin/addCalendar/<?=$listMovie->id; ?>" class="btn btn-secondary btn-sm"><img src="<?=BASE_URL; ?>/public/img/add.ico" width="20" title='Thêm lịch chiếu'></a>
                                     <a href="<?=BASE_URL; ?>/admin/editCalendar/<?=$listMovie->id; ?>" class="btn btn-secondary btn-sm"><img src="<?=BASE_URL; ?>/public/img/edit.png" width="20" title='Sửa lịch chiếu'></a>
                                 </td>
                                 <td>
                                     <a class="btn btn-secondary btn-sm" href="<?=BASE_URL; ?>/admin/editMovie/<?=$listMovie->id; ?>">
                                       <i class="fa fa-edit" title='Sửa phim'></i>
                                   </a>
                                   <a class="btn btn-secondary btn-sm" href="<?=BASE_URL; ?>/admin/delMovie/<?=$listMovie->id; ?>" onclick="return confirm('Bạn có muốn xóa phim này?');">
                                       <i class="fa fa-trash" title='Xóa phim'></i>
                                   </a>
                               </td>
                           </tr>
                       </tbody>
                   <?php endforeach;
                            }?>
           </table>
       </div>
   </div>
</div>
</div>
</div>
</div>
</div>

<script src="<?=BASE_URL;?>/public/js/jquery-1.12.4.js"></script>
<script src="<?=BASE_URL;?>/public/js/jquery-ui.js"></script>
<script src="<?=BASE_URL;?>/public/admin_asset/js/bootstrap-datepicker.js"></script>
<!-- jQuery Code executes on Date Format option ----->
<script src="<?php echo BASE_URL; ?>/public/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function($) {
   $('.content').isotope({
      itemSelector: 'td'
   });
   $('.movie').click(function(event) {
      // var type = $(this).attr('data-type');
      //var type = $(this).data('type');
      // console.log(type);
      //var ten_loai = $(this).text();
      //$('.title').text(ten_loai);
      type = '.'+type;
      $('.content').isotope({
         filter:type
      });
   });
});
</script>
