<x-layouts.dashboard.user>

    <x-slot name="header">

        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title fw-normal">Invest</h3>
                <div class="nk-block-des">
                    <p>Select a plan and invest.</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="card card-bordered h-100">
                <div class="col-lg-8">
                    <div class="card-inner">
                        <form id="invest" action="{{ route('user.make.investment') }}">
                            @csrf

                            <div class="form-group">
                                <label for="plan" class="form-label">Plans</label>
                                <div class="form-control-wrap">
                                    <select name="plan" id="plan" class="form-select js-select2">
                                        @foreach($plans as $plan)
                                            <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="amount">Amount</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="amount" name="amount" min="1" max="1000">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary">Invest</button>
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
            $('#invest').validate({
                rules: {
                    plan: {
                        required: true,
                    },
                    amount: {
                        required: true,
                    },
                },
                submitHandler: function(form) {
                    $(form).find('button').attr('disabled', true)
                    $(form).ajaxSubmit(ajaxOptions);
                }
            });

            const ajaxOptions = {
                type: 'POST',
                url: $(this).prop('action'),
                data: $(this).serialize(),
                dataType: 'json',
                clearForm: true,
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
                    $('#invest').find('button').attr('disabled', true)
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
            
                    // $(this).find('button').attr('disabled', false);
            
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
</x-layouts.dashboard.user>
