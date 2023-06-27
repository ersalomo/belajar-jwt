<div class="tab-content mt-1">
    <!-- pilled tab -->
    <div class="tab-pane fade active show" id="pilled" role="tabpanel">
        <div class="section full mt-1">
            <div class="wide-block pt-2 pb-2">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{$tab == 'profile' ? 'active' : ''}}" wire:click.prevent="$set('tab','profile')"
                           data-bs-toggle="tab" href="?tab=profile" role="tab"
                           aria-selected="false">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$tab == 'contact' ? 'active' : ''}}" data-bs-toggle="tab"
                           wire:click.prevent="$set('tab','contact')" href="?tab=detail" role="tab"
                           aria-selected="false">
                            Detail
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$tab == 'change-pwd' ? 'active' : ''}}" data-bs-toggle="tab"
                           wire:click.prevent="$set('tab','change-pwd')" href="?tab=change-pwd" role="tab"
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
                    <div class="tab-pane fade {{$tab == 'profile' ? 'active show' : ''}}" id="profile" role="tabpanel">
                        <div>
                            <form wire:submit.prevent.lazy="updateProfile">
                                <div class="form-group mt-1">
                                    <label for="">name</label>
                                    <input type="text" class="form-control" id="name"

                                           value="" wire:model="name" placeholder=""/>
                                    @error('name')
                                    <em class="text text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" disabled
                                          wire:model="email"  placeholder="">
                                    @error('email')
                                    <em class="text text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label for="email">Username</label>
                                    <input type="text" wire:model="username" class="form-control" id="email" disabled
                                            placeholder="">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="email">Lastname</label>
                                    <input type="text" class="form-control" id="email" wire:model="ln"
                                            placeholder="">
                                    @error('ln')
                                    <em class="text text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label for="email">Gender</label>
                                    <select class="form-control" wire:model="gender">
                                        @foreach(['Female','Male'] as $i => $g)
                                            <option
                                                value="{{$i}}" {{$this->gender==$i ? 'selected': ''}} >{{$g}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-1">
                                    <button class="btn btn-primary btn-block" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade {{$tab == 'contact' ? 'active show' : ''}}" id="contact" role="tabpanel">
                        <div>
                            <form wire:submit.prevent.lazy="updateDetail">
                                <div class="form-group mt-1">
                                    <label for="phone">Phone</label>
                                    <input type="text" disabled
                                            class="form-control"
                                           wire:model="phone"
                                           id="phone" placeholder="">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="phone">NIK</label>
                                    <input type="number"
                                           wire:model="nik"
                                            class="form-control"
                                           id="phone" placeholder="">
                                    @error('nik')
                                    <em class="text text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label for="phone">Address
                                    </label>
                                    <textarea wire:model="address" class="form-control"></textarea>
                                    @error('address')
                                    <em class="text text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label for="co">Company Name</label>
                                    <input type="text"
                                           wire:model="company_name"
                                           class="form-control"
                                           id="co" placeholder="">
                                    @error('company_name')
                                    <em class="text text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label for="oc">Occupation</label>
                                    <input type="text"
                                           wire:model="occupation"
                                           class="form-control"
                                           id="oc" placeholder="">
                                    @error('occupation')
                                    <em class="text text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <button class="btn btn-primary btn-block" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade {{$tab == 'change-pwd' ? 'active show' : ''}}" id="change-password"
                         role="tabpanel">
                        <form wire:submit.prevent.lazy="changePassword">
                            <div class="form-group mt-1">
                                <label for="old-password">Old password</label>
                                <input type="text" class="form-control" id="old-password" wire:model="password"
                                       placeholder="old password">
                                @error('password')
                                <em class="text text-danger">{{ $message }}</em>

                                @enderror
                            </div>
                            <div class="form-group mt-1">
                                <label for="new-password">New password</label>
                                <input type="text" class="form-control" wire:model="new_password" id="new-password"
                                       placeholder="new password">
                                @error('new_password')
                                <em class="text text-danger">{{ $message }}</em>
                                @enderror
                            </div>
                            <div class="form-group mt-1">
                                <label for="new-password">Confirm new password</label>
                                <input type="text" class="form-control" id="new-password"
                                       wire:model="confirm_new_password" placeholder="confirm new password">
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
<div id="toast-update" class="toast-box toast-center">
    <div class="in">
        <div class="text">
            Auto close in 2 seconds
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            Livewire.on('alert:update', function (e) {
                $('#toast-update .text').text(e.message)
                toastbox('toast-update', 2000)
            })
        })
    </script>
@endpush
