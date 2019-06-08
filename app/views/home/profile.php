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
                        <li class="current"><span>Thông tin cá nhân</span></li>
                     </ul>

                      <h1>Thông tin chung</h1>
                      <p>Tên đầy đủ: <?php echo $_SESSION['fullname']; ?></p>
                      <p>Giới tính:<?php echo $_SESSION['gioitinh']==2 ? 'Nữ' :'Nam'; ?></p>
                      <p>Email:<?php echo $_SESSION['email']; ?></p>
                      <p>Năm sinh: <?php echo $_SESSION['birthday']; ?></p>
                      <p>Số điện thoại: <?php echo $_SESSION['phone']; ?></p>
                      <p>Địa chỉ: <?php echo $_SESSION['address']!=='' ? $_SESSION['address'] :'--'; ?></p>

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