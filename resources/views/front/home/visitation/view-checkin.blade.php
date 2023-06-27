<x-app-layout pageTitle="view checkin">
    <div class="section mt-2 mb-2">
        <div class="listed-detail mt-3">
            <img src="{{$detail["picture"]}}" alt="{{$detail['name']}}-img" class="imaged w-75 mx-auto d-block">
            <h3 class="text-center mt-2">{{$detail["name"]}}</h3>
        </div>

        <ul class="listview flush transparent simple-listview no-space mt-3">
            <li>
                <strong>Status</strong>
                <span class="text-success">{{$detail["status"]}}</span>
            </li>
            <li>
                <strong>To</strong>
                <span>{{$detail["to"]}}</span>
            </li>
            <li>
                <strong>Purpose</strong>
            </li>
            <li>
                <span>{{$detail["purpose"]}}</span>
            </li>
            <li>
                <strong>checkin at</strong>
                <span>{{$detail["checkin_at"]}}</span>
            </li>
        </ul>
    </div>
</x-app-layout>
