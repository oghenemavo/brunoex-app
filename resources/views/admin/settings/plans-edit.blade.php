<x-layouts.dashboard.admin>

    <x-slot name="header">

        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title fw-normal">Edit Plan</h3>
                <div class="nk-block-des">
                    <p>Edit an existing plan.</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="card card-bordered h-100">
                <div class="col-lg-8">
                    <div class="card-inner">
                        <form id="edit-plan" action="{{ route('admin.plans.update', $plan->id) }}">
                            @csrf

                            <div class="form-group">
                                <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                    <input type="checkbox" class="custom-control-input" name="recommended" id="recommended" @if($plan->meta->get('recommended')) checked @endif >
                                    <label class="custom-control-label" for="recommended">Recommended Label</label>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-label" for="plan_name">Plan Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="plan_name" name="plan_name" value="{{ $plan->name }}" placeholder="Enter a Plan Name">
                                </div>
                            </div>

                            <div class="row g-gs">
                                <div class="col-lg-12">
                                    <h6 class="title mb-3">Media Icons</h6>
                                    <ul class="custom-control-group">
                                        <li>
                                            <div class="custom-control custom-checkbox custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="media" id="media1" value="s1" {{ $plan->meta->get('media') == 's1' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="media1"><em class="icon ni ni-user"></em><span>User</span></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="media" id="media2" value="s2" {{ $plan->meta->get('media') == 's2' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="media2"><em class="icon ni ni-loader"></em><span>Loading</span></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="media" id="media3" value="s3" {{ $plan->meta->get('media') == 's3' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="media3"><em class="icon ni ni-signal"></em><span>Network</span></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                                <input type="radio" class="custom-control-input" name="media" id="media4" value="" {{ $plan->meta->get('media') == '' ? 'checked' : '' }} >
                                                <label class="custom-control-label" for="media4"><em class="icon ni ni-wifi-off"></em><span>No Wifi</span></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label class="form-label" for="profit_type">Profit Type</label>
                                <select name="profit_type" class="form-select" id="profit_type" data-placeholder="Please select" data-ui="lg">
                                    <option value="percentage" @selected($plan->meta->get('profit_type') == "percentage")>Percentage</option>
                                    <option value="fixed" @selected($plan->meta->get('profit_type') == "fixed")>Fixed</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="profit">Profit</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="profit" name="profit" value="{{ $plan->meta->get('profit') }}" min="0.1" step="0.01">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="min_deposit">Minimum Deposit</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="min_deposit" name="min_deposit" value="{{ $plan->meta->get('min_deposit') }}" min="0.1" step="0.01">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="max_deposit">Maximum Deposit</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="max_deposit" name="max_deposit" value="{{ $plan->meta->get('max_deposit') }}" min="0.1" step="0.01">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="description" name="description" value="{{ $plan->meta->get('description') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="duration_unit">Duration Unit</label>
                                <select name="duration_unit" class="form-select" id="duration_unit" data-placeholder="Please select" data-ui="lg">
                                    <option value="daily" @selected($plan->meta->get('duration_unit') == "daily")>Daily</option>
                                    <option value="weekly" @selected($plan->meta->get('duration_unit') == "weekly")>Weekly</option>
                                    <option value="monthly" @selected($plan->meta->get('duration_unit') == "monthly")>Monthly</option>
                                    <option value="annually" @selected($plan->meta->get('duration_unit') == "annually")>Annually</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="duration">Duration</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="duration" name="duration" value="{{ $plan->meta->get('duration') }}" min="1">
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Edit Plan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    @push('scripts')
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script>
        $('#edit-plan').validate({
            rules: {
                plan_name: {
                    required: true,
                },
                profit_type: {
                    required: true,
                },
                profit: {
                    required: true,
                },
                min_deposit: {
                    required: true,
                },
                max_deposit: {
                    required: true,
                },
                description: {
                    required: true,
                },
                duration_unit: {
                    required: true,
                },
                duration: {
                    required: true,
                },
            },
            submitHandler: function(form) {
                $(form).find('button').attr('disabled', true)
                $(form).ajaxSubmit(ajaxOptions);
            }
        });

        const ajaxOptions = {
            type: 'PUT',
            url: $(this).prop('action'),
            data: $(this).serialize(),
            dataType: 'json',
            clearForm: null,
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
                $('#edit-plan').find('button').attr('disabled', false)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.status)
                console.log(XMLHttpRequest.statusText)
                console.log(errorThrown)

                // console.log(XMLHttpRequest)
                // let errors = XMLHttpRequest.responseJSON.errors;
                // console.log(errors)
                // if (errors.hasOwnProperty('product_name')) {
                //     $('div[data-error="product_name"]').text(errors.product_name[0])
                // } 
        
                $('#edit-plan').find('button').attr('disabled', false);
        
                // display toast alert
                // display toast alert
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Unable to process request now.',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        };
    </script>
    @endpush
</x-layouts.dashboard.admin>
