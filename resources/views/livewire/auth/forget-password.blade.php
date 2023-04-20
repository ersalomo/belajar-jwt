<div id="appCapsule" class="pt-0">
    <div class="login-form mt-1">
        <div class="section mt-5 mb-5">
            <h2>Forget Password</h2>
        </div>
        @if(session()->has('fail'))
            <div class="alert alert-danger">
                {{session()->get('fail')}}
            </div>
        @endif
        <div class="section mt-5" >
            <form wire:submit.prevent="loginHandler()" class="">
                <div class="form-group mt-5">
                    <div class="input-wrapper">
                        <input type="email" style="margin-top: 125px" wire:model.lazy="email" class="form-control" id="email"
                               placeholder="Enter email address">
                    </div>
                    @error('email')
                    <em class="text-danger">{{ $message }}</em>
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
                    <button type="submit" class="btn btn-primary btn-block btn-lg">submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
