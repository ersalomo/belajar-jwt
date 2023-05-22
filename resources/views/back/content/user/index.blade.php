<x-back.app-layout page-title="Data User">
    @section('breadcrumb')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:">Admin</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">user</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Data users</h6>
        </nav>
    @endsection
    <livewire:user-data/>
</x-back.app-layout>
