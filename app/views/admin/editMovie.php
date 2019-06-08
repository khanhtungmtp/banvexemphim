
<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="<?php echo BASE_URL; ?>/admin/editMovie/<?php echo $data['getMovie']->id ?>" class="form" method="post" enctype="multipart/form-data">
                    <div class="card-header">
                        <h3 class="card-title">Thêm mới phim</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <?php if (isset($data['title_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?= $data['title_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <label class="form-label">Tên phim</label>
                                    <input type="text" class="form-control" name="title" placeholder="Em chưa 18"
                                           value="<?php echo isset($data['getMovie']->title) ? $data['getMovie']->title : '' ?>">
                                </div>

                                <div class="form-group">
                                    <?php if (isset($data['khoichieu_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?= $data['khoichieu_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <label class="form-label">Ngày khởi chiếu</label>
                                    <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd"><input
                                                class="form-control" readonly="" type="text" name="khoichieu"> <span
                                                class="input-group-addon"><i
                                                    class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <?php if (isset($data['thoiluong_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?= $data['thoiluong_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <label class="form-label">Thời lượng</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="basic-url" placeholder="120"
                                               name="thoiluong"
                                               value="<?php echo isset($data['getMovie']->thoiluong) ? $data['getMovie']->thoiluong : '' ?>">
                                        <span class="input-group-prepend" id="basic-addon3">
                  <span class="input-group-text">Phút</span>
                                            </span>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <?php if (isset($data['daodien_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?= $data['daodien_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <label class="form-label">Đạo diễn</label>
                                    <input type="text" class="form-control" name="daodien" placeholder="Nguyễn văn tèo"
                                           value="<?php echo isset($data['getMovie']->daodien) ? $data['getMovie']->daodien : '' ?>">
                                </div>

                                <div class="form-group">
                                    <?php if (isset($data['dienvien_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?= $data['dienvien_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <label class="form-label">Diễn viên</label>
                                    <input type="text" class="form-control" name="dienvien"
                                           value="<?php echo isset($data['getMovie']->dienvien) ? $data['getMovie']->dienvien : '' ?>"
                                           placeholder="Lê thị bưởi">
                                </div>

                                <div class="form-group">
                                    <div class="form-label">Trạng thái</div>
                                    <input type="radio" name="trangthai" value="1" 
                                           checked="checked"> Đang chiếu <br>
                                    <input type="radio" name="trangthai" value="2"> Sắp
                                    chiếu
                                </div>
								
								<div class="form-group">
                                    <?php if (isset($data['photo_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?php echo $data['photo_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <p><img src="<?php echo BASE_URL.'/'.$data['getMovie']->hinh ?>" width='80'></p>
                                    <div class="form-label">Hình phim</div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="photo"
                                               value="<?php echo isset($data['getMovie']->hinh) ? $data['getMovie']->hinh : '' ?>">
                                        <input type="hidden" name="photo_hidden" value="<?php echo isset($data['getMovie']->hinh) ? $data['getMovie']->hinh : '' ?>" class="noidung" />
                                        <label class="custom-file-label">Chọn hình</label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6 col-lg-4">

                                <div class="form-group">
                                    <?php if (isset($data['trailer_url_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?= $data['trailer_url_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <label class="form-label">URL ID Youtube</label>
                                    <div class="input-group">
                                            <span class="input-group-prepend" id="basic-addon3">
                  <span class="input-group-text">www.youtube.com/embed/=</span>
                                            </span>
                                        <input type="text" class="form-control" id="basic-url"
                                               aria-describedby="basic-addon3" placeholder="ABCDEFGH" name="trailer_url"
                                               value="<?php echo isset($data['getMovie']->trailer_url) ? $data['getMovie']->trailer_url : '' ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <?php if (isset($data['rated_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?= $data['rated_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <label class="form-label">Đối tượng</label>
                                    <input type="text" class="form-control" name="rated" class="noidung"
                                           placeholder="P - PHIM DÀNH CHO MỌI ĐỐI TƯỢNG"
                                           value="<?php echo isset($data['getMovie']->rated) ? $data['getMovie']->rated : '' ?>">
                                </div>

                                <div class="form-group">
                                    <?php if (isset($data['noidung_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?= $data['noidung_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <label class="form-label">Nội dung <span
                                                class="form-label-small">56/100</span></label>
                                    <textarea class="form-control" name="noidung"><?php echo isset($data['getMovie']->noidung) ? $data['getMovie']->noidung : '' ?></textarea>
                                </div>
                                <script type="text/javascript">
                                    CKEDITOR.replace('noidung');
                                </script>

                                <div class="form-group">
                                    <input type="submit" name="submit" value="Đăng" class="btn btn-primary">
                                </div>


                            </div>
                            <div class="col-md-6 col-lg-4">
                                
                                <div class="form-group">
                                    <?php if (isset($data['ngonngu_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?= $data['ngonngu_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <label class="form-label">Ngôn ngữ</label>
                                    <input type="text" name="ngonngu"
                                           value="<?php echo isset($data['getMovie']->ngonngu) ? $data['getMovie']->ngonngu : '' ?>"
                                           class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <?php if (isset($data['theloai_err'])): ?>
                                        <p class="alert alert-danger">
                                            <?= $data['theloai_err']; ?>
                                        </p>
                                    <?php endif ?>
                                    <label class="form-label">Thể loại</label>
                                    <select name="theloai" class="form-control custom-select" id="select-beast">
                                        <?php foreach ($data['listMn'] as $value): ?>
                                            <option value="<?php echo $value->id ?>" <?php if($value->id==$data['getMovie']->category_id){echo "selected";} ?>><?php echo $value->title ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<style type="text/css">
.cke_reset {
width: 738px;
}
</style>
    <script src="<?= BASE_URL; ?>/public/js/jquery-1.12.4.js"></script>
    <script src="<?= BASE_URL; ?>/public/js/jquery-ui.js"></script>
    <script src="<?= BASE_URL; ?>/public/ckeditor/ckeditor.js"></script>
    <script src="<?= BASE_URL; ?>/public/admin_asset/js/bootstrap-datepicker.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });
    </script>
    <script type="text/javascript">
        CKEDITOR.replace('noidung');
    </script>