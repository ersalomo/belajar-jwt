<ul class="listview image-listview flush">
    @foreach($visitations as $visitation)
        <li>
            <a href="#" class="item" wire:click="openModalApprove({{$visitation->id}})">
                <div class="icon-box">
                    <img src="{{$visitation->appointment->visitor['detail']->picture}}" class="image"/>
                </div>
                <div class="in">
                    <div>
                        <div class="mb-05"><strong> {{$visitation->appointment->visitor['name']}}</strong></div>
                        <div class="text-small mb-05">{{__($visitation['appointment']->purpose)}}</div>
                        <div class="text-xsmall">{{$visitation->created_at}}</div>
                    </div>
                    @if($visitation->checkout)
                        <span class="text-success">Checkout
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled"
                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                             <path
                                 d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                                 stroke-width="0" fill="currentColor"></path>
                        </svg>
                    </span>
                    @else
                        <span class="text-danger">Not checkout
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-letter-x"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                               <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                               <path d="M10 8l4 8"></path>
                               <path d="M10 16l4 -8"></path>
                            </svg>
                        </span>
                    @endif
                </div>
            </a>
        </li>
    @endforeach
</ul>

