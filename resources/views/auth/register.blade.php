<x-app-layout pageTitle="Register">
    <div class="main-wrapper account-wrapper bg-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-logo">
                    <a href="index.html"><img src="assets/img/logo.png" alt="Logo"></a>
                </div>
                <div class="account-box">
                    <div class="login-header">
                        <h3>Let's Get Started</h3>
                        <p>Sign up to continue to Crypto</p>
                    </div>
                    <form action="{{ route('api.register') }}" method="post" class="form-signin">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Fullname">
                            <span class="profile-views"><img src="assets/img/icon/lock-icon-01.svg"
                                    alt=""></span>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                            <span class="profile-views"><img src="assets/img/icon/lock-icon-03.svg"
                                    alt=""></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password">
                            <span class="profile-views"><img src="assets/img/icon/lock-icon-02.svg"
                                    alt=""></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Mobile Number">
                            <span class="profile-views"><img src="assets/img/icon/lock-icon-04.svg"
                                    alt=""></span>
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
                            Already have an account? <a href="{{ route('login.index') }}">Sign in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
