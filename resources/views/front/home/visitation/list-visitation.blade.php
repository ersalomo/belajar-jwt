<x-app-layout pageTitle="List Visitations">
    <div class="section mt-2 mb-2">
        <div class="section-title">Found {{__($visitations->count())}} results for "<span
                class="text-primary">Visitors</span>"
        </div>
        <div class="card">
            <ul class="listview image-listview media transparent flush list-visitations">
                @foreach ($visitations as $visitation)
                    <li class="">
                        <a href="#" class="item">
                            <div class="imageWrapper">
                                <img src="{{$visitation->appointment->visitor["detail"]->picture}}" alt="image"
                                     class="image">
                            </div>
                            <div class="in">
                                <div>
                                    <b class="">{{$visitation->appointment->visitor->name}}</b>
                                    <div class="text-bolder">
                                        <strong>purpose</strong>{{$visitation->appointment->purpose}}
                                    </div>
                                    <div class="text-bold">
                                        <strong>Visitation by:</strong>{{$visitation->appointment->name_emp}}
                                    </div>
                                </div>

                                <span class="badge">
                                    @foreach([$visitation->checkin, $visitation->checkout] as $status)
                                        @if($status)
                                        <span class="{{$status ? 'text-success': 'text-danger'}}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-circle-check-filled" width="24"
                                                 height="24"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                               <path
                                                   d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                                                   stroke-width="0" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        @else
                                            <span class="{{$status ? 'text-success': 'text-danger'}}">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-tabler icon-tabler-square-rounded-x" width="24"
                                                     height="24"
                                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                     fill="none"
                                                     stroke-linecap="round" stroke-linejoin="round">
                                                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10l4 4m0 -4l-4 4"></path>
                                                    <path
                                                        d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                                </svg>
                                        </span>
                                        @endif

                                    @endforeach
                                </span>

                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    <div class="modal fade dialogbox" id="modal-status" data-bs-backdrop="static" tabindex="-1"
         style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Approve Visitor</h5>
                </div>
                <div class="modal-body">
                    <img src="" class="image avatar-lg rounded-0 image-wrapper" width="80px">
                    <p>
                        This visitor already checkin
                    </p>
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <button class="btn btn-text-primary" data-bs-dismiss="modal">
                            <ion-icon name="close-outline" role="img" class="md hydrated"
                                      aria-label="close-outline"></ion-icon>
                            okay
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('ul.list-visitations').on('click', 'li', function (e) {
                    const image = $(this).find('img').attr('src');

                    $('#modal-status').modal('show');
                    $('#modal-status img').attr('src', image);
                });
            })
            // $('#modal-status').modal('show')
        </script>
    @endpush
</x-app-layout>
