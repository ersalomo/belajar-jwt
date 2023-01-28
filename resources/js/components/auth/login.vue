<template>
     <div class="main-wrapper account-wrapper bg-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-logo">
                    <a href="index.html"><img src="assets/img/logo.png" alt="Logo"></a>
                </div>
                <div class="account-box">
                    <div class="login-header">
                        <h3>Let's Get Started</h3>
                        <p>Sign in to continue to Crypto</p>
                    </div>
                    <form action="/api/login" method="post" class="form-signin" id="sing-in">
                        <div class="form-group">
                            <input type="text" autofocus="true" name="email" class="form-control"
                                placeholder="Username">
                            <span class="profile-views">
                                <img src="assets/img/icon/lock-icon-01.svg" alt="">
                            </span>
                            <span class="text-danger invalid-feedback email_error error-text"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="profile-views"><img src="assets/img/icon/lock-icon-02.svg" alt="">
                            </span>
                        </div>
                        <span class="text-danger password_error error-text "></span>
                        <div class="forgotpass">
                            <div class="remember-me">
                                <label class="custom_check me-2 mb-0 d-inline-flex remember-me"> Remember me
                                    <input type="checkbox" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <a href="forgot-password.html"><img src="assets/img/icon/lock-icon.svg" class="me-1"
                                    alt="">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Sign In <i
                                    class="fas fa-arrow-right ms-1"></i></button>
                        </div>
                        <div class="text-center register-link">
                            Don't have an account?
                            <router-link to="/register">Sign Up</router-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


