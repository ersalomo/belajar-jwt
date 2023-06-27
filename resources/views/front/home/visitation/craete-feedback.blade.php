<x-app-layout pageTitle="Create new Feedback">
    @if(session()->has('success'))
    <div class="alert-success alert mx-2 mt-2">
        {{session()->get('success')}}
    </div>
    @endif
        @if(session()->has('error'))
    <div class="alert-danger alert mx-2 mt-2">
        {{session()->get('error')}}
    </div>
    @endif

    @error('notes')
        <div class="alert-danger alert mx-2 mt-2">
        {{$message}}
    </div>
    @enderror
        <div class="section full mt-2 mb-2 p-2">
            <p>Hy {{Auth::user()->name}}, bagaimana kunjungannya, kamu bisa mengisi form dibawah ini sebagai umpan balik pada kunjungan
            atau saran perbaikan
            </p>
                <form action="{{route('home.checkout-visit', $visit['id'])}}" method="post">
                    @csrf
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="address5">Notes</label>
                            @if($visit['notes'] == "")
                            <textarea id="address5" rows="2" class="form-control" name="notes" ></textarea>
                            @else
                            <textarea id="address5" rows="2" class="form-control" name="notes" disabled>{{$visit["notes"]}}</textarea>
                            @endif
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>

                    </div>
                    <div class="form-group boxed mt-05">
                        <button type="submit" class="btn-primary btn-block radius" {{$visit["notes"] != "" ? "disabled":""}}>submit</button>
                    </div>
                </form>
        </div>
</x-app-layout>
