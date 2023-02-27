<x-app-layout pageTitle="Make Appointment">
    <div class="section mt-2 mb-2">
        <div class="card bg-primary comment-box">
            <img src="/front/view29/assets/img/sample/avatar/avatar8.jpg" alt="avatar" class="imaged w140 rounded">
            <button class="btn-sm mx-auto btn-primary rounded shadowed w16">
                <span class="justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                        <path d="M16 5l3 3"></path>
                        <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                    </svg>
                </span>
            </button>
            <h4 class="card-title">{{ __(auth()->user()->name) }}</h4>
            <div class="card-text">Sep 23, 2020</div>
            <div class="text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet leo eget maximus ultricies.
            </div>
        </div>
    </div>
    <div class="tab-content mt-1">
        <!-- pilled tab -->
        <div class="tab-pane fade active show" id="pilled" role="tabpanel">
            <div class="section full mt-1">
                <div class="wide-block pt-2 pb-2">

                    <ul class="nav nav-tabs style1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-selected="true">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#contact" role="tab"
                                aria-selected="false">
                                Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#change-password" role="tab"
                                aria-selected="false">
                                Change password
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2">
                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="tab-pane fade active show" id="profile" role="tabpanel">
                            <div>
                                <form action="">
                                    <div class="form-group mt-1">
                                        <label for="">name</label>
                                        <input type="text" class="form-control" id="name"
                                            value="{{ __(auth()->user()->name) }}" placeholder="">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" disabled
                                            value="{{ __(auth()->user()->email) }}" placeholder="">
                                    </div>

                                    <div class="form-group mt-1">
                                        <button class="btn btn-primary btn-block" type="submit">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel">
                            <div>
                                <label for="phone">Phone
                                    <input type="text" disabled
                                        value="{{ auth()->user()->phone ?? '0852-****-0988' }}" class="form-control"
                                        id="phone" placeholder="">
                                </label>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="change-password" role="tabpanel">
                            <form action="{{ route('home.me.change-password') }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group mt-1">
                                    <label for="old-password">Old password</label>
                                    <input type="text" class="form-control" id="old-password" name="password"
                                        placeholder="old password">
                                    @error('password')
                                        <em class="text text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label for="new-password">New password</label>
                                    <input type="text" class="form-control" name="new_password" id="new-password"
                                        placeholder="new password">
                                    @error('new_password')
                                        <em class="text text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label for="new-password">Confirm new password</label>
                                    <input type="text" class="form-control" id="new-password"
                                        name="confirm_new_password" placeholder="confirm new password">
                                    @error('confirm_new_password')
                                        <em class="text text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <button type="submit" class="btn btn-primary btn-block">change password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * pilled tab -->
    </div>
    @push('scripts')
        <script></script>
    @endpush
</x-app-layout>
