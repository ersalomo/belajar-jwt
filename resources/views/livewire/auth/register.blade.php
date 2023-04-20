<div id="appCapsule">
    <div class="login-form">
        <div class="section">
            <h1>Register</h1>
            <h4>Fill the form to join us</h4>
        </div>
        <div class="section mt-2 mb-5">
            <form wire:submit.prevent="registerHandler">

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="email" class="form-control" id="name1" placeholder="Full name">

                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="email" class="form-control" id="email1" placeholder="Email address">

                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" id="password1" autocomplete="off"
                            placeholder="Password">

                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" id="password2" autocomplete="off"
                            placeholder="Password (again)">
                    </div>
                </div>

                <div class=" mt-1 text-start">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="customCheckb1">
                        <label class="form-check-label" for="customCheckb1">I Agree <a href="#">Terms &amp;
                                Conditions</a></label>
                    </div>

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
