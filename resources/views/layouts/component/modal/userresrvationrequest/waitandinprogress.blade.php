<div id="userreservationwaitandinprogress{{ $request->id }}" class="modal offers fade" aria-hidden="true"  aria-labelledby="staticBackdropLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="div d-flex justify-content-start px-4">
                    <div class="d-flex flex-column">
                    <h3 class="mb-0 font-bold">{{ $request->random_id }}</h3>

                    @if( $request->status == 'Waiting'  && $request->date_time==now()->toDateString() && ($request->from<=now() ||$request->to <=now()))

                    <span class="inprogress">In process</span>

                    @else
                    <span class="inprogress">Waiting</span>
                    @endif
                  
                    </div>
                    <div class="align-slef-end" style="flex-grow: 1;display: flex;align-items: center;justify-content: flex-end;">
                        <a  href="#" data-bs-toggle="offcanvas" data-bs-target="#chat" aria-controls="offcanvasRight">
                            <i class="uil-comments-alt" style="font-size:20px;"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex flex-column px-5">
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Freelancer Name</p>
                        <p class="fw-900 mb-0 text-black">{{ App\Models\User::where('id', $request->freelancer_id)->first()->name }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0">Occasion</p>
                        <p class="fw-900 mb-0 text-black">{{ $request->occasion }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0">Due Date</p>
                        <p class="fw-900 mb-0 text-black">{{date_format(new dateTime($request->date_time),'d/m/Y')}}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Time</p>
                        <div class="d-flex">
                        <span class="text-black-50 mx-1">From</span>
                        <p class="fw-900 mb-0 text-black">{{\Carbon\Carbon::parse($request->from)->format('h:i A') }}</p>
                        <span class="text-black-50 mx-1">To</span>
                        <p class="fw-900 mb-0 text-black">{{ \Carbon\Carbon::parse($request->to)->format('h:i A') }}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class=" mb-0">Location</p>
                        <p class="fw-900 mb-0 text-black"><i class="fa fa-location"></i>{{$request->location }}</p>
                    </div>

                <h5 class="text-black border-top pt-2">Total price</h5>
                <div class="d-flex justify-content-between">
                    <p class=" mb-0">Price</p>
                    <p class="fw-900 mb-0 text-black">{{$request->offer->first()->price}}<span class="text-black-50 mx-1">SR</span></p>
                </div>
            </div>

            @if(strtotime( $request->date_time) - time() > 48 * 3600)
            
            <div class="btn-contianer d-flex flex-column justify-between align-items-center my-3">
                <p class="craz-color fw-light" style="font-size: 14px;">You can cancel your reservation before 48 hours from reserve date</p>
                <button class=" btn-cormoz btn-modal border-0"type="button" data-bs-toggle="modal" data-bs-target="#surdeletereservation{{$request->id}}">Cancel</button>
            </div>
             @endif
            </div>
        </div>
    </div>

    <div  style="position:fixed ; bottom:0;right:0; font-size:30px">
        <button class="addrequesticon" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat{{$request->id}}" aria-controls="offcanvasRight"><i class="uil-comments-alt"></i></button>
    </div>
</div>

