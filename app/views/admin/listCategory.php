
<div class="my-3 my-md-5">

    <div class="container">
        <?php 

            if (isset($_SESSION['delCategory'])) {
            echo "<p class='alert alert-success'>Xóa thành công </p>";
            unset($_SESSION['delCategory']);
            }
            if (isset($_SESSION['updateCategory'])) {
                echo "<p class='alert alert-success'>Sửa thành công </p>";
                unset($_SESSION['updateCategory']);
                }
                if (isset($_SESSION['success'])) {
                echo "<p class='alert alert-success'>Thêm mới thành công </p>";
                unset($_SESSION['success']);
                }
         ?>
        <div class="page-header">
            <div class="col-6"><h1 class="page-title">
                Danh sách thể loại 
            </h1></div>
            <div class="col-6"><a href="<?= BASE_URL ?>/admin/addCategory" class="btn btn-primary pull-right">Thêm mới</a></div>
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
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <?php 
                                if($data['listCategory']==null){
                                
                                ?>
                             <tbody>
                                <tr>
                                    <td colspan="4"><h3>Hiện chưa có thể loại nào <a href="<?= BASE_URL?>/admin/addCategory">Thêm ngay</a></h3></td>
                                </tr>
                            </tbody>
                            <?php 
                                }else{
								$i=0;
									foreach ($data['listCategory'] as $listCategory): 
								$i++;
								?>
                            <tbody>
                                <tr>
                                    <td><span class="text-muted"><?= $i ?></span></td>
                                    <td><?php if (strlen($listCategory->title) <=50) {
                                      echo $listCategory->title;
                                    } else {
                                      echo substr($listCategory->title, 0, 40) . '...';
                                    } ?></td>
                                    <td>
                                    <?php 
                                    // chuyển về ngày tháng năm
                                        $ngaytao=date("d-m-Y", strtotime($listCategory->created)); 
                                        echo $ngaytao;
                                    ?>
                                    </td>
                                    
                                    <td><a href="<?php echo BASE_URL; ?>/admin/editCategory/<?php echo $listCategory->id; ?>"><img src="<?php echo BASE_URL;?>/public/img/edit.png" width="16" title='Sửa thể loại'></a>||
					<a href="<?php echo BASE_URL; ?>/admin/delCategory/<?php echo $listCategory->id; ?>" onclick="return confirm('Bạn có muốn xóa thể loại này?');"><img src="<?php echo BASE_URL;?>/public/img/delete.png" width="16" title='Xóa thể loại'></a></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                            <?php } ?>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>