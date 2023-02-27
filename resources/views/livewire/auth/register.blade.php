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
                        <i class="clear-input">
                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle">
                            </ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="email" class="form-control" id="email1" placeholder="Email address">
                        <i class="clear-input">
                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle">
                            </ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" id="password1" autocomplete="off"
                            placeholder="Password">
                        <i class="clear-input">
                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle">
                            </ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" id="password2" autocomplete="off"
                            placeholder="Password (again)">
                        <i class="clear-input">
                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle">
                            </ion-icon>
                        </i>
                    </div>
                </div>

                <div class=" mt-1 text-start">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="customCheckb1">
                        <label class="form-check-label" for="customCheckb1">I Agree <a href="#">Terms &amp;
                                Conditions</a></label>
                    </div>
                    <a href="{{ route('auth', [
                        'mode' => 'login',
                    ]) }}">back
                        to login</a>

                </div>

                <div class="form-button-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
                </div>

            </form>
        </div>
    </div>
</div>
