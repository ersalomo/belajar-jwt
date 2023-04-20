<x-back.app-layout page-title="Data Employee">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Employee table</h6>
                </div>
                {{ $dataTable->table() }}
            </div>
        </div>

    </div>
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-back.app-layout>
