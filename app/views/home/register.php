<!-- header.php ở đây -->


<!-- register -->
<div class="container">
<div class="main-container col1-layout">
   <div class="main">
      <div class="col-main">
         <div class="account-wrap">
            <div class="col2-set">
               <div class="col-1">
                  <div class="product-collateral account-tabs">
                     <ul class="toggle-tabs">
                        <li class="last"><span><a href="<?php echo BASE_URL;?>/index/login">Đăng nhập</a></span></li>
                        <li class="current"><span>Đăng ký</span></li>
                     </ul>
                     <!--form đăng ký-->
                     <div class="container">
                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4 tuy">
                              <legend><a href=""><i class="glyphicon glyphicon-globe"></i></a> Đăng ký tài khoản!
                              </legend>


<form action="<?php echo BASE_URL; ?>/index/register" method="post" class="form" role="form">

   <!-- hiển thị lỗi -->
   <?php echo isset($data['fullname_err']) ? $data['fullname_err'] : '' ?>
   <label>Họ và tên</label>
   <input class="form-control" name="fullname" placeholder="Họ và tên"autofocus="" type="text" value="<?php echo isset($data['fullname']) ? $data['fullname'] : '' ?>">
   <?php echo isset($data['email_err']) ? $data['email_err'] : '' ?>
   <label>Email</label>
   <input class="form-control" name="email" placeholder="Email" type="email" value="<?php echo isset($data['email']) ? $data['email'] : '' ?>"> 
   <?php echo isset($data['password_err']) ? $data['password_err'] : '' ?>
   <label>Mật khẩu</label>
   <input class="form-control" name="password" placeholder="Mật khẩu" type="password"> 
   <?php echo isset($data['phone_err']) ? $data['phone_err'] : '' ?>
   <label>Số điện thoại</label>
   <input class="form-control" name="phone" placeholder="Số điện thoại" type="tel" value="<?php echo isset($data['phone']) ? $data['phone'] : '' ?>">
   <label>Địa chỉ</label>
   <input class="form-control" name="address" placeholder="Địa chỉ" type="text" value="<?php echo isset($data['address']) ? $data['address'] : '' ?>">
   <label>Năm sinh</label>
   <input class="form-control" name="birthday" placeholder="Năm sinh" type="text">  
   <label for=""> Giới tính</label>
   <label class="radio-inline">
   <input name="gioitinh" id="inlineCheckbox1" value="1" type="radio" checked="checked">Nam</label> 
   <label class="radio-inline">          
   <input name="gioitinh" id="inlineCheckbox2" value="2" type="radio">Nữ</label>
   <br>
   <br>
   <button class="btn btn-lg btn-danger btn-block" type="submit"> Đăng ký</button>
</form>





                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<hr style="border-bottom: 3px solid #241d1e;">
<!-- cuối trang -->
<div class="footer">
   <div class="footer-cgv-address">
      <div class="cgv-address-content">
         <div class="logo-footer-cgv">&nbsp;</div>
         <div class="text-cgv-address">
            <h3>Đồ án môn Công nghệ phần mềm</h3>
            <p>Đề tài website bán vé xem phim online</p>
            <p>Nhóm 7 lớp D15C02A</p>
            <p>Hotline: 0338716085</p>
            <p>COPYRIGHT 2018 Nguyễn khanh tùng .</p>
         </div>
      </div>
   </div>
</div>


<!-- footer.php ở đây -->