<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
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
            <h1 class="page-title">
                Danh sách user trong hệ thống
            </h1>
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
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Giới tính</th>
                                    <th>Năm sinh</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <?php
                                if (($data['listUser'])!==NULL){ 
                                    $i=0; 
                                    foreach($data['listUser'] as $listUser): 
                                    $i++;
                            ?>
                            <tbody>
                                <tr>
                                    <td><span class="text-muted"><?= $i ?></span></td>
                                    <td><?= $listUser->fullname; ?></td>
                                    <td><?= $listUser->email ?></td>
                                    <td><?= $listUser->phone ?></td>
                                    <td><?= $listUser->address ? $listUser->address : '------' ?></td>
                                    <td><?= $listUser->gioitinh==1 ? 'Nam' :'Nữ' ?></td>
                                    <td><?= $listUser->birthday ?></td>
                                    <td>
                                        
                                        <a class="btn btn-secondary btn-sm" href="<?= BASE_URL; ?>/admin/delUser/<?= $listUser->id; ?>" onclick="return confirm('Bạn có muốn xóa tài khoản này?');">
                              <i class="fa fa-trash" title='Xóa tài khoản'></i>
                            </a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php endforeach; }else{ ?>
                            <tbody>
                                <tr>
                                    <td colspan="9">
                                        Hiện không có user nào. <a href="">Tạo mới ngay</a>!
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>