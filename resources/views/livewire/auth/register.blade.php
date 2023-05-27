<div id="appCapsule">
    <div class="login-form">
        <div class="section">
            <h1>Register</h1>
            <h4>Fill the form to join us</h4>
        </div>
        <div class="section mt-2 mb-5">
            <form wire:submit.prevent.lazy="registerHandler">

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="text" wire:model.lazy="fullname" class="form-control" id="name1" placeholder="Full name">
                    </div>
                    @error('fullname')
                    <div class="text-start text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="text" wire:model.lazy="username" class="form-control" id="name1" placeholder="Username">
                    </div>
                    @error('username')
                    <div class="text-start text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="tel" wire:model.lazy="phone" class="form-control" id="name1" placeholder="Phone">
                    </div>
                    @error('phone')
                    <div class="text-start text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="email"  wire:model.lazy="email" class="form-control" id="email1" placeholder="Email address">

                    @error('email')
                    <div class="text-start text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="password" wire:model.lazy="password" class="form-control" id="password1" autocomplete="off"
                            placeholder="Password">
                    @error('password')
                    <div class="text-start text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="password" wire:model.lazy="confirmation_password" class="form-control" id="password2" autocomplete="off"
                            placeholder="Password (again)">
                    </div>
                    @error('confirmation_password')
                    <div class="text-start text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class=" mt-1 text-start">
                    <div class="form-check">
                        <input type="checkbox" wire:model.lazy="term_condition" class="form-check-input" id="customCheckb1">
                        <label class="form-check-label" for="customCheckb1">I Agree <a href="#">Terms &amp;
                                Conditions</a>
                        </label>
                    </div>
                        @error('term_condition')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror

                </div>

                <div class="form-button-group">
                    <a href="{{ route('auth', ['mode' => 'login']) }}" class="btn btn-primary btn-lg w-0 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l14 0"></path>
                            <path d="M5 12l6 6"></path>
                            <path d="M5 12l6 -6"></path>
                        </svg>
                    </a>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
