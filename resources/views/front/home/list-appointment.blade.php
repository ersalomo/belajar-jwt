<x-app-layout pageTitle="List Appointment">
    @foreach ($appointments as $appointment)
        <div class="section mt-2">
            @if ($appointment->status == 'pending')
                <div class="card bg-warning">
                @elseif($appointment->status == 'rejected')
                    <div class="card bg-danger">
                    @else
                        <div class="card bg-success">
            @endif
            <div class="card-body">
                <h6 class="card-subtitle">
                    {{ __('#APPOINTMENT' . $loop->iteration . ' ' . "($appointment->status)") }}
                </h6>
                <p class="card-text">{{ __($appointment->purpose) }}</p>
            </div>
        </div>
        </div>
    @endforeach
</x-app-layout>
