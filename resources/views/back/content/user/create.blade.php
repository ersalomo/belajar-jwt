<x-back.app-layout>
    <form action="
    {{$user ? route('admin.user.update', $user['id']):route('admin.user.store')}}" method="post"
          enctype="multipart/form-data"
          class="multisteps-form__form mb-8" style="height: 408px;">
        @csrf
        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
            <h5 class="font-weight-bolder mb-0 mb-4">{{$user ? 'Edit User': 'Create New'}}</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-control-label">Firstname</label>
                        <input class="form-control" name="firstname" type="text" value="{{$user['name'] ?? ''}}"
                               placeholder="firstname ..."
                               id="name">
                        @error('firstname')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname" class="form-control-label">Lastname</label>
                        <input class="form-control" name="lastname" type="text" value="{{$user->detail['ln'] ?? ''}}"
                               placeholder="lastname ..."
                               id="lastname">
                        @error('lastname')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username" class="form-control-label">Username</label>
                        <input class="form-control" name="username" type="text"
                               value="{{$user->detail['username'] ?? ''}}" placeholder="username ..."
                               id="username">
                        @error('username')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-control-label">Email</label>
                        <input class="form-control" name="email" type="email" placeholder="email..."
                               value="{{$user['email'] ?? ''}}"
                               id="email">
                        @error('email')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="form-control-label">Phone</label>
                        <input class="form-control" type="tel" placeholder="phone..." name="phone"
                               value="{{$user->detail['phone'] ?? ''}}" id="phone">
                        @error('phone')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="add" class="form-control-label">Address</label>
                        <input class="form-control" name="address" type="text" placeholder="address.."
                               value="{{$user->detail['address'] ?? ''}}"
                               id="add">
                        @error('address')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="form-control-label">Role</label>
                        <select class="form-control" name="role_id">
                            <option value="0" class="text-black">--choose--</option>
                            @foreach(\App\Models\Role::all() as $role)
                                <option value="{{$role->id}}"
                                        {{$user ? $user['role_id'] == $role['id'] ? 'selected' : '':''}} class="text-black">{{$role->role_name}}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender" class="form-control-label">Gender</label>
                        <select class="form-control" name="gender">
                            <option class="text-black">--choose--</option>
                            @php
                                $genders = ['Female','Male']
                            @endphp
                            @foreach($genders as $i=>$gender)
                                <option value="{{$i}}" {{$user && $user['gender'] == $i ? 'selected' : ''}} class="text-black">{{$gender}}</option>
                            @endforeach
                        </select>
                        @error('gender')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pic" class="form-control-label">Picture</label>
                <input class="form-control" name="picture" type="file" value="" id="pic">
                @error('picture')
                <span class="text-danger fa-sm">{{$message}}</span>
                @enderror
            </div>
            {{--            @if($user && $user['role_id'] != 4)--}}
            <div class="row" id="department-field">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="department" class="form-control-label">Department</label>
                        <select class="form-control" name="department_id">
                            <option>--choose---</option>
                            @foreach($departments as $department)
                                <option value="{{$department['id']}}" {{$user && $user->emp_department && $user->emp_department['department_id'] == $department['id'] ? 'selected' : false}}>{{__($department['department'])}}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="department-field" class="form-control-label">Title</label>
                        <input class="form-control"
                               type="text"
                               value="{{$user->emp_department['title'] ?? ''}}"
                               placeholder="title..." name="title"
                               id="department-field">
                        @error('title')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
            </div>
            {{--            @endif--}}
            @if(!$user)
                <div class="form-group">
                    <label for="password" class="form-control-label">Password</label>
                    <input class="form-control" placeholder="password..." type="password" name="password" value=""
                           id="password">
                    @error('password')
                    <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                    @enderror
                </div>
            @endif

            <div class="form-group">
                <button class="btn btn-github" type="submit">submit</button>
            </div>
        </div>
    </form>
</x-back.app-layout>
