<?php 
//Ta da, xong rau e zai :3 anh hay thaatj, em tưởng chỉ có vòng lặp ở ngoài thôi chứ,a lam thu cong, nen thuong
//mang chuyen ve dang chuoi, hoac mang don thoi
//chu mang trong mang de dien dau lam... T^T', mà
// $string_temp = ""; đâu phải mảng mà sao nó vô đc mảng vậy anh
//$dadat = explode(",",$string_temp); ham tao mang tu chuoi :> ok anh trai ;D roi, vay nha... bb e zai :>
  $session_user=Session::getSession('id');
    // nếu tồn tại session thì in ra tên 
    if($session_user==false){
      redirect('index/login');
    }
  $rows = array('A','B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'); 
  $ghedadat = json_decode(json_encode($data['camera_room']) , true);

  $ghedadat_length = count($ghedadat);
  $string_temp = "";
  

  for($x = 0; $x < $ghedadat_length; $x++){
    if($string_temp!=""){
      $string_temp = $string_temp.",".$ghedadat[$x]["seat"];
    }else{
      $string_temp = $string_temp.$ghedadat[$x]["seat"];
    }
  }
  $dadat = explode(",",$string_temp);
?>

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
            <li class="current"><span>Sơ đồ chỗ ngồi</span></li>
          </ul>
          <!--form chọn ngày giờ chiếu phim-->
           <div class="site"><h3><?php echo $data['getMovie']->title; ?></h3></div>
           <div>
            <h4>Ngày:<?php 
                // chuyển về ngày tháng năm
                $ngaychieu=date("d-m-Y", strtotime($data['ngay'])); 
                echo $ngaychieu;
                 ?>
             </h4>
            </div>
           <div><h4>Giờ:<?php echo $data['gio'] ?></h4></div>
          <!-- khu vực ghế ngồi -->
          <div class="board">
          <ul class="chairs">
            <?php foreach ($rows as $row) : ?>
              <li><?php echo $row; ?></li>
            <?php endforeach; ?>
          </ul>

          <table class="seats">
            <?php foreach ($rows as $row) :?>
              <tr>
                <?php for ($seat = 1;$seat <= 16;$seat++) : 
                  // ví dụ A_01 A_02,A_03
                  $dataSeat = $row.sprintf('%02d', $seat);                  
                ?>
                  <td data-seat="<?php echo $dataSeat; ?>" 
                   <?php
                    $dadat_length = count($dadat);
                    for($x = 0; $x < $dadat_length; $x++){
                       if ($dadat[$x]!=$dataSeat){     
                        }else{?>
                          class="booked"
                        <?php
                        }
                    }
                  ?>
                  ><?php echo sprintf('%02d', $seat); ?></td>
                  <?php if ($seat == 8) : ?>
                    <td class="empty">&nbsp;</td>
                    <td class="empty">&nbsp;</td>
                    <td class="empty">&nbsp;</td>
                    <td class="empty">&nbsp;</td>
                  <?php endif; ?>
                <?php endfor; ?>
              </tr>
              <?php //} ?>
            <?php endforeach; ?>
          </table>
          
          <form action='<?php echo BASE_URL; ?>/detail/order/<?php echo $data['id']; ?>/<?php echo $data['ngay']; ?>/<?php echo $data['gio']; ?>' method="POST">
            <input type="hidden" name="seats" id="seats"/>
          </form>
          
          <div class="btn" style="float: right;">
            <a href="javascript:;" class="btn_cancel">Hủy</a>
            <a href="javascript:;" class="btn_buy">Tiếp tục</a>
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
  $('.seats td').click(function() {
    var cls = $(this).attr('class');
    // nếu gặp ghế đã book hoặc ghế trống thì ko làm gì cả
    if (cls == 'empty' || cls == 'booked') {
      return;
    }

    $(this).toggleClass('selected');
  });

  $('.btn_buy').click(function() {
    var seats = [];
    var idx = 0;
    $('.seats td').each(function() {
      if ($(this).attr('class') == 'selected') {
        seats[idx] = $(this).attr('data-seat');
        idx++;
      }
    });
    $('#seats').val(seats.join(','));
    
    
    $.get('<?= BASE_URL; ?>/detail/order/',{ghengoi:seats},function(data){
      //alert(seats);
    });
    $('form').submit();
  });
  
  $('.btn_cancel').click(function() {
    window.location = '<?php echo BASE_URL; ?>';
  });
});
</script>
</body>
</html>