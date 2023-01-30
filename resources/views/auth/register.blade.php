<div class="main-wrapper account-wrapper bg-wrapper">
    <div class="account-page">
        <div class="account-center">
            <div class="account-logo">
                <a href=""><img src="assets/img/logo.png" alt="Logo"></a>
            </div>
            <div class="account-box">
                <div class="login-header">
                    <h3>Let's Get Started</h3>
                    <p>Sign up to continue to Crypto</p>
                </div>
                <form action="/api/register" method="post" class="form-signup" id="sign-up">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Fullname">
                        <span class="profile-views"><img src="assets/img/icon/lock-icon-01.svg" alt=""></span>
                        <span class="text-danger name_error error-text"></span>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <span class="profile-views"><img src="assets/img/icon/lock-icon-03.svg" alt=""></span>
                        <span class="text-danger email_error error-text"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="profile-views"><img src="assets/img/icon/lock-icon-02.svg" alt=""></span>
                        <span class="text-danger password_error error-text"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Mobile Number">
                        <span class="profile-views"><img src="assets/img/icon/lock-icon-04.svg" alt=""></span>
                        <span class="text-danger phone_error error-text"></span>
                    </div>
                    <div class="forgotpass term-register">
                        <div class="remember-me">
                            <label class="custom_check me-2 mb-0 d-inline-flex remember-me"> I have read and agree
                                the <a href="javascript:;">Terms &amp; Conditions</a>
                                <input type="checkbox" name="radio">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary account-btn" type="submit">Sign up<i
                                class="fas fa-arrow-right ms-1"></i></button>
                    </div>
                    <div class="text-center login-link">
                        Already have an account?
                        <router-link to="/login">Sign In</router-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
