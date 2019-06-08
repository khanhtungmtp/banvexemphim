<!-- header.php ở đây -->


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
                        <li class="current"><span>Đăng nhập</span></li>
                        <li class="last"><span><a href="<?php echo BASE_URL;?>/index/register">Đăng ký</a></span></li>
                     </ul>
                     <div id="collateral-tabs">
                        <dd class="tab-container current">
                           <dl class="tab-content">
                              <div class="account-login">




            <form action="<?php echo BASE_URL;?>/index/login" method="post" id="login-form" class="scaffold-form">
               <div class=" registered-users">
                  <div class="content fieldset format-login-page">
                     <p class="form-instructions">Vui lòng nhập tên người dùng
                        (email) và mật khẩu của bạn...
                     </p>
                     <div class="from-login-account">

                        <ul class="form-list">
                           <li class="login-input-email">
                              <div class="input-box">
                                 <!-- hiển thị lỗi -->
                                    <?php echo isset($data['email_err']) ? $data['email_err'] : '' ?>

                                 <input type="text" autocapitalize="off"
                                    autocorrect="off" spellcheck="false"
                                    name="email" value="<?php echo isset($data['email']) ? $data['email'] : '' ?>"
                                    id="email"
                                    class="input-text required-entry validate-no-html-tags"
                                    title="Địa chỉ email" placeholder="Email">
                              </div>
                           </li>
                           <li class="login-input-pass">
                              <div class="input-box">
                                 <!-- hiển thị lỗi -->
                                    <?php echo isset($data['password_err']) ? $data['password_err'] : '' ?>

                                 <input type="password"
                                    name="password"
                                    class="input-text required-entry validate-no-html-tags validate-password"
                                    id="pass" title="Mật khẩu" placeholder="Mật khẩu">
                              </div>
                           </li>
                          
                        </ul>

                        <div class="buttons-set login-button-submit">
                           <button type="submit" class="button"
                              title="Đăng nhập" name="send" id="send2">
                           <span><span>Đăng nhập</span></span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>





                              </div>
                           </dl>
                        </dd>
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