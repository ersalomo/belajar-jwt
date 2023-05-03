<x-back.app-layout>
    <form action="{{route('admin.post-visitor')}}" method="post" enctype="multipart/form-data"
          class="multisteps-form__form mb-8" style="height: 408px;">
        @csrf
        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
            <h5 class="font-weight-bolder mb-0 mb-4">New Employee</h5>
            @if(session()->has('success'))
            <div class="alert alert-success">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="text text-bold text-xs">{{session()->get('success')}}</span>
            </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-control-label">Firstname</label>
                        <input class="form-control" name="firstname" type="text" value="" placeholder="firstname ..."
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
                        <input class="form-control" name="lastname" type="text" value="" placeholder="lastname ..."
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
                        <input class="form-control" name="username" type="text" value="" placeholder="username ..."
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
                        <input class="form-control" name="email" type="email" placeholder="email..." value=""
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
                        <input class="form-control" type="tel" name="phone" placeholder="phone..." id="phone">
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
                        <input class="form-control" name="address" placeholder="address..." type="tel" value=""
                               id="add">
                        @error('address')
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

            <div class="form-group">
                <label for="password" class="form-control-label">Password</label>
                <input class="form-control" type="password" name="password" value="" id="password">
                @error('password')
                <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-github" type="submit">submit</button>
            </div>

        </div>
    </form>
</x-back.app-layout>
