<x-app-layout pageTitle="Make Appointment">
    <div class="section full mt-2 mb-2">
        <div class="wide-block mt-3 pb-1 pt-2">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <form method="post" action="{{ route('home.appointment.store') }}">
                @csrf
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="form-label" for="kode">* <span class="text-danger">Kode Employee</span></label>
                        <input type="text" class="form-control" id="kode" placeholder="Enter kode employee">
                    </div>
                </div>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="form-label" for="Purpose">* Purpose</label>
                        <textarea id="Purpose" name="purpose" rows="5" class="form-control"></textarea>
                    </div>
                    @error('purpose')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                </div>
                <div class="form-group boxed">
                    <button class="btn btn-primary btn-block">Submit</button>
                    <button class="btn btn-danger btn-block mt-1">cancel</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
