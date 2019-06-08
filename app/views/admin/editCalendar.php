<?php 
$gio=['09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00'];
$array = json_decode(json_encode($data['checkDateTime']) , true); 
?>
<div class="my-3 my-md-5">

    <div class="container">
      <?php if (empty($array)){
        echo "<div class='page-header'>
            <h1 class='page-title'>
                Phim hiện chưa có lịch chiếu  <a href='../listMovie' class='btn btn-primary'>Quay về</a>
            </h1>
        </div>";
        }else{
       ?>
        <div class="page-header">
            <h1 class="page-title">
                Sửa lịch chiếu
            </h1>
        </div>
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                     <form action="<?php echo BASE_URL; ?>/admin/editCalendar/<?php echo $data['getMovie']->id ?>" class="form" method="post">
                     <input type="submit" name="submit" value="Sửa lịch chiếu" class="btn btn-green" />
                    <?php   
                        $date = array();
                        $time = array();

                        $data_lenght = count($array);
                        for ($x = 0; $x < $data_lenght; $x++)
                        {
                          if (!in_array($array[$x]["ngay"], $date))
                            {
                              // thêm phần tử vào mảng date
                              array_push($date, $array[$x]["ngay"]);
                            }
                            if (!in_array($array[$x]["gio"], $time))
                            {
                              array_push($time, $array[$x]["gio"]);
                            }
                        }
                          $date_lenght = count($date);
                          for ($y = 0; $y < $date_lenght; $y++)
                          {
                        ?>
                            <div class="col-5">
                                <div class="form-group">
                                    <label style="font-weight: bold;margin-top: 10px"><?php echo $data['getMovie']->title; ?></label>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ngày chiếu</label>
                                    <div id="datepicker" class="input-group date" datepicker>
                                    <input class="form-control datepicker" readonly="" type="text" name="ngay" value="<?= $date[$y] ?>" id="datepicker"> 
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label class="form-label">Giờ chiếu</label>                                   
                                    <?php foreach ($gio as $h): ?>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="gio[]" value="<?= $h ?>" class="selectgroup-input" 
                                                    <?php 
                                                        for ($z = 0; $z < $data_lenght; $z++)
                                                        {
                                                            if($array[$z]["ngay"]!=$date[$y]){

                                                            }else{
                                                                if($array[$z]["gio"]!=$h){

                                                                }else{
                                                                    echo "checked";
                                                                }  
                                                            }
                                                             
                                                        }                                                  
                                                    ?>
                                                >        
                                                <span class="selectgroup-button"><?= $h ?></span>
                                            </label>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>

                      <?php } ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <?php } ?>
    </div>
</div>
</div>


    
    <script src="<?= BASE_URL; ?>/public/js/jquery-1.12.4.js"></script>
    <script src="<?= BASE_URL; ?>/public/js/jquery-ui.js"></script>
    <script src="<?= BASE_URL; ?>/public/admin_asset/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $(function () {
            $(".datepicker").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker({ minDate: new Date() });


        });
    
    </script>