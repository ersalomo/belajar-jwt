<div id="appCapsule" class="pt-0">
    <div class="login-form mt-1">
        <div class="section">
            <img src="/front/view29/assets/img/sample/photo/vector4.png" alt="image" class="form-image">
        </div>
        <div class="section mt-1">
            <h1>Get started</h1>
            <h4>Fill the form to log in</h4>
        </div>
        <div class="section mt-1 mb-5">
            <form wire:submit.prevent="loginHandler()">
                {{-- @csrf no wok --}}
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="email" wire:model.lazy="email" class="form-control" id="email1"
                            placeholder="Email address">
                        <i class="clear-input">
                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle">
                            </ion-icon>
                        </i>
                    </div>
                    @error('email')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="password" wire:model.lazy="password" class="form-control" id="password1"
                            placeholder="Password" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle">
                            </ion-icon>
                        </i>
                    </div>
                </div>
                @error('email')
                    <em class="text-danger">{{ $message }}</em>
                @enderror

                <div class="form-links mt-2">
                    <div>
                        <a
                            href="{{ route('auth', [
                                'mode' => 'register',
                            ]) }}">Register
                            Now</a>
                    </div>
                    <div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                </div>

                <div class="form-button-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>
    </div>
</div>
