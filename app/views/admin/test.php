<tr>
                                    <td><span class="text-muted"><?= $i ?></span></td>
                                    <td><?= $listOrder->fullname ?></td>
                                    <td><?= $listOrder->title ?></td>
                                    <td>
                                    <?php 
                                    // chuyển về ngày tháng năm
                                        $ngaymua=date("d-m-Y", strtotime($listOrder->day)); 
                                        echo $ngaymua;
                                    ?>
                                    </td>
                                    <td><?= $listOrder->gio ?></td>
                                    <td><?= $listOrder->seat ?></td>
                                    <td><?= $listOrder->code ?></td>
                                    
                                    <td>
                                    <?php if($listOrder->confirm==0){
                                    echo"<a href='confirmOrder/$listOrder->bkID'><img src='../admin_asset/images/success.png' width='16'></a>  || <a href='delOrder/$listOrder->bkID' onclick='return confirm('Bạn có muốn xóa thể loại này?');'><img src='../public/img/delete.png' width='16'></a>";}elseif($listOrder->confirm==-1)
                                    echo "<div class='text-danger'>Đã hủy</div>";
                                    else
                                    echo"<div class='text-success'>Đã xác nhận</div>"; ?>
                                    </td>
                                </tr>




                                <td>
                                    if($listOrder->confirm==0){
                                    <a href='confirmOrder/$listOrder->bkID'><img src='../admin_asset/images/success.png' width='16'></a>  || <a href='delOrder/$listOrder->bkID' onclick='return confirm('Bạn có muốn xóa thể loại này?');'><img src='../public/img/delete.png' width='16'></a>}elseif($listOrder->confirm==-1)
                                    <div class='text-danger'>Đã hủy</div>
                                    else
                                    <div class='text-success'>Đã xác nhận</div>
                                </td>