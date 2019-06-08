<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <?php 
    			if (isset($_SESSION['delCategory'])) {
    			echo "<p class='alert alert-success'>Xóa thành công </p>";
    			unset($_SESSION['delCategory']);
    			}elseif (isset($_SESSION['updateCategory'])) {
    				echo "<p class='alert alert-success'>Sửa thành công </p>";
    				unset($_SESSION['updateCategory']);
    				}
		      ?>
            <h1 class="page-title">
                Danh sách vé bán ra
            </h1>
            <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                  <input type="search" class="form-control header-search" placeholder="Tìm kiếm theo tên,mã code" id="checkcode" name="checkcode">
                  <div class="input-icon-addon" id="result">
                    <i class="fa fa-search"></i>
                  </div>
                </form>
            </div>
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
                                    <th>Người mua</th>
                                    <th>Vé Phim</th>
                                    <th>Ngày giờ</th>
                                    <th>Giờ</th>
                                    <th>Ghế</th>
                                    <th>Mã code</th>
                                    <th>Xác nhận</th>
                                </tr>
                            </thead>

                           <tbody class="danhsach">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>/public/js/jquery-1.12.4.js"></script>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?= BASE_URL ?>/admin/checkCode",
   method:"POST",
   data:{query:query},// lấy data
   success:function(data) // chuyển data vào class danhsach
   {
    $('.danhsach').html(data);
   }
  });
 }
 $('#checkcode').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>