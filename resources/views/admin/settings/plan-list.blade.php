<x-layouts.dashboard.admin>
        
    <x-slot name="header">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Investment Plans</h3>
                <div class="nk-block-des text-soft">
                    <p>A full overview of created investment plans.</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="nk-block">
        <div id="plans-list" class="row g-gs">
            @foreach($plans as $plan)
                <div class="col-md-4 col-xxl-3">
                    <div class="card card-bordered pricing recommend">
                        @if($plan->meta->get('recommended'))
                            <span class="pricing-badge badge bg-primary">Recommend</span>
                        @endif

                        <div class="pricing-head">
                            <div class="pricing-title">
                                <h4 class="card-title title">{{ ucfirst($plan->name) }}</h4>
                                <p class="sub-text">{{ $plan->description }}</p>
                            </div>
                            @if($plan->meta->get('media'))
                                <div class="pricing-media">
                                    <img src="{{ asset($plan->meta->get('media')) }}" alt="">
                                </div>
                            @endif
                            <div class="card-text">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="h4 fw-500">{{ $plan->meta->get('profit') }}{{ $plan->meta->get('profit_type') ? '%' : ' USD' }}</span>
                                        <span class="sub-text">Interest</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="h4 fw-500">{{ $plan->meta->get('duration') }}</span>
                                        <span class="sub-text">{{ ucfirst(setDurationName($plan->meta->get('duration_unit'), $plan->meta->get('duration'))) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="pricing-features">
                                <li><span class="w-50">Min Deposit</span> - <span class="ms-auto">${{ $plan->meta->get('min_deposit') }}</span></li>
                                <li><span class="w-50">Max Deposit</span> - <span class="ms-auto">${{ $plan->meta->get('max_deposit') }}</span></li>
                                <li><span class="w-50">Deposit Return</span> - <span class="ms-auto">Yes</span></li>
                                <!-- <li><span class="w-50">Total Return</span> - <span class="ms-auto">300%</span></li> -->
                            </ul>
                            <div class="pricing-action">
                                <a href="{{ route('admin.plans.edit', $plan->id) }}" class="btn btn-outline-light">Edit this plan</a>
                            </div>
                            <div class="pricing-action">
                                <button data-id="{{ $plan->id }}" class="delete-plan btn btn-danger">Delete this plan</button>
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
            @endforeach

        </div>
    </div><!-- .nk-block -->


    @push('scripts')
        <script>
            $(function() {
                $('#plans-list').on('click', 'button.delete-plan', function (e) {
                    e.preventDefault();

                    const id = $(this).attr('data-id');
                    let url = `{{ route('admin.plans.destroy', ':id') }}`;
                    url = url.replace(':id', id);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action will delete this plan",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete this plan!'
                    }).then(function (result) {
                        if (result.value) {
                            $.ajax({
                                type: 'DELETE',
                                url,
                                data: {
                                    "_token": `{{ csrf_token() }}`,
                                },
                                success: function(response) {
                                    if (response.hasOwnProperty('status') && response.status) {
                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: response.message,
                                            showConfirmButton: false,
                                            timer: 2000
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: response.message,
                                        })
                                    }
                                    setTimeout(() => window.location.reload(), 3000);
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                    console.log( XMLHttpRequest.responseJSON.errors);
                                    console.log(XMLHttpRequest.status)
                                    console.log(XMLHttpRequest.statusText)
                                    console.log(errorThrown)
                            
                                    // display toast alert
                                    toastr.clear();
                                    toastr.options = {
                                        "timeOut": "7000",
                                    }
                                    NioApp.Toast('Unable to process request now.', 'error', {position: 'top-right'});
                                }
                            });
                            
                        }
                    });

                });
            });
        </script>
    @endpush

</x-layouts.dashboard.admin>
