<x-app-layout pageTitle="Login">
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
                    <form action="{{ route('api.login') }}" method="post" class="form-signin">
                        <div class="form-group">
                            <input type="text" autofocus="" name="email" class="form-control"
                                placeholder="Username">
                            <span class="profile-views"><img src="assets/img/icon/lock-icon-01.svg"
                                    alt=""></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="profile-views"><img src="assets/img/icon/lock-icon-02.svg"
                                    alt=""></span>
                        </div>
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
                            Don't have an account? <a href="{{ route('login.register') }}">Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script></script>
    @endpush
</x-app-layout>
