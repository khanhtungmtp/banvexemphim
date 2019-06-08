<?php if (!isset($_SESSION['ten'])) {
    redirect('index');
} ?>
<!-- login -->
<div class="container">
  <div class="main-container col1-layout">
   <div class="main">
    <div class="col-main">
     <div class="account-wrap">
      <div class="col2-set">
       <div class="col-1">
        <div class="product-collateral account-tabs">
          <ul class="toggle-tabs">
            <li class="current"><span>Chi tiết đơn hàng</span></li>
          </ul>
          <!--form chọn ngày giờ chiếu phim-->
           <div class="site"><h3><?php echo $_SESSION['ten']; ?></h3></div>
           <div>
            <h4>Ngày:<?php 
                // chuyển về ngày tháng năm
                $ngaychieu=date("d-m-Y", strtotime($_SESSION['ngay'])); 
                echo $ngaychieu;
                 ?>
             </h4>
            </div>
           <div><h4>Giờ:<?php echo $_SESSION['gio'] ?></h4></div>
           <div><h4>Ghế ngồi:<span style="font-weight: bold;"><?php echo $_SESSION['ghe'] ?></span></h4></div>
           <div class="message">
              Cảm ơn bạn đã đặt ghế xem bộ phim này. Vui lòng mang theo mã dưới đây để lấy vé.<br><br>
              <div class="buy_code">Mã code của bạn là <?php echo $_SESSION['code'] ?></div>

           </div>
          <!-- khu vực ghế ngồi -->
         <div class="board">
           <div class="btn" style="float: right;">
             <a href="javascript:;" class="btn_cancel">Về trang chủ</a>
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
<script type="text/javascript" src="<?php echo BASE_URL;?>/public/js/jquery-1.12.4.js"></script>
<script src="<?php echo BASE_URL;?>/public/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function() {
  // khi nhấn nút cancel thì quay về trang chủ
  $('.btn_cancel').click(function() {
    <?php 
    unset($_SESSION['ten']); 
    unset($_SESSION['ngay']); 
    unset($_SESSION['gio']); 
    unset($_SESSION['ghe']); 
    unset($_SESSION['code']); 
    ?>
    window.location = '<?php echo BASE_URL; ?>';
  });

  });
</script>
</body>
</html>