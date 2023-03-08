<div class="account-popup-area signin-popup-box">
    <div class="account-popup">
        <span class="close-popup"><i class="la la-close"></i></span>
        <h3>Đăng Nhập</h3>
        <form action="{{ route('post.login') }}" method="POST" id="formLogin">
            <div class="cfield">
                <input type="email" name="email" required form="formLogin" placeholder="Email Đăng nhập" />
                <i class="la la-user"></i>
            </div>
            <div class="cfield">
                <input type="password" name="password" required form="formLogin" placeholder="********" />
                <i class="la la-key"></i>
            </div>
            <a href="#" title="">Quên mật khẩu?</a>
            <button type="submit" class="js-Login">Đăng Nhập</button>
        </form>
        <div class="extra-login">
            <span>Or</span>
            <div class="login-social">
                <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
                <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>
</div><!-- LOGIN POPUP -->

<div class="account-popup-area signup-popup-box">
    <div class="account-popup">
        <span class="close-popup"><i class="la la-close"></i></span>
        <h3>Đăng Ký</h3>
        <form action="{{ route('post.register') }}" method="POST" id="formRegister">
            <div class="cfield">
                <input type="text" form="formRegister" name="name" required placeholder="Name" />
                <i class="la la-user"></i>

            </div>
            <div class="cfield">
                <input type="Email" form="formRegister" name="email" required placeholder="Email" />
                <i class="la la-envelope-o"></i>
            </div>
            <div class="cfield">
                <input type="password" form="formRegister" name="password" required placeholder="********" />
                <i class="la la-key"></i>
            </div>
            <div class="cfield">
                <input type="text" placeholder="Phone Number" required form="formRegister" name='phone' />
                <i class="la la-phone"></i>
            </div>
            <button type="submit" class="js-register">Đăng Ký</button>
        </form>
        <div class="extra-login">
            <span>Or</span>
            <div class="login-social">
                <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
                <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>
</div><!-- SIGNUP POPUP -->
