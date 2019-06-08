
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
            <li class="current"><span>Rạp chiếu phim</span></li>
          </ul>
          <!--form chọn ngày giờ chiếu phim-->
          <div class="site sitecgv">
            <?php 
               $array = json_decode(json_encode($data['calendar_view']) , true);
              // print_r($array);
              if (empty($array)){ 
            ?>
            <div class="site"><h3>Phim chưa có giờ chiếu, mời bạn quay lại sau, cám ơn</h3></div>
          <?php }else{ ?>
             <div class="site"><h3>CGV Aeon Canary</h3></div>
           <div class="cinema 2d"><h4>Rạp 2D</h4></div>
           <?php
             
              $date = array();
              $data_lenght = count($array);
              for ($x = 0; $x < $data_lenght; $x++)
                {
                if (in_array($array[$x]["ngay"], $date)){}
                  else
                  {
                  array_push($date, $array[$x]["ngay"]);
                  }
                }
              $date_lenght = count($date);

              for ($y = 0; $y < $date_lenght; $y++)
                {
                  // chuyển về ngày tháng năm
                $ngaychieu=date("d-m-Y", strtotime($date[$y])); 
                echo "<div class='cinema 2d'><h4>Ngày: $ngaychieu  </h4></div>";
                echo "<ul class='products-grid-movie tab-showtime'>";
                for ($z = 0; $z < $data_lenght; $z++)
                  {
                  if ($array[$z]["ngay"] != $date[$y]){}
                    else
                    {
             ?>           
                 <li class="item">
                   <a href="<?php echo BASE_URL; ?>/detail/camera_room/<?php echo $array[$z]["id"]; ?>/<?php echo $array[$z]["ngay"]; ?>/<?php echo $array[$z]["gio"]; ?>">
                     <span><?php echo $array[$z]["gio"]; ?></span><br>
                     <span>10 ghế trống</span>
                   </a>
                 </li>
             <?php         
                    }
                  }
                  echo "</ul>";
                }
              ?>  
          <?php } ?>
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