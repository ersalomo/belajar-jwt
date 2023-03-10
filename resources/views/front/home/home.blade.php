<x-app-layout pageTitle="Home">
    <div class="section mt-3 mb-3">

        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-end">
                <div>
                    <h6 class="card-subtitle">Welcome</h6>
                    <h5 class="card-title mb-0 d-flex align-items-center justify-content-between">
                        {{ __(auth()->user()->name) }}
                    </h5>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodecontent">
                    <label class="form-check-label" for="darkmodecontent"></label>
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-3 mb-3">
        <div class="card">
            <img src="/assets/img/landing-img.jpg" class="card-img-top rounded" alt="image">
            <div class="card-body pt-2">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta porro dolores voluptatum, ab odio
                    molestiae maxime sit illo perferendis nostrum labore odit quod. Voluptatem, ad.</p>
            </div>
        </div>
    </div>


</x-app-layout>
