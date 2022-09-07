<x-layouts.dashboard.user>

    <x-slot name="header">

        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title fw-normal">Transfer</h3>
                <div class="nk-block-des">
                    <p>Transfer to your Brunoex Buddy.</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="card card-bordered h-100">
                <div class="col-lg-8">
                    <div class="card-inner">
                        <form id="transfer" action="{{ route('user.make.transfer') }}">
                            @csrf

                            <div class="form-group">
                                <label class="form-label" for="email">Recipient's Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="amount">Amount</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="amount" name="amount" min="0.1" step="0.01">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="narration">Narration</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="narration" name="narration">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary">Transfer</button>
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
            $('#transfer').validate({
                rules: {
                    amount: {
                        required: true,
                    },
                    narration: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
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
                    $('#transfer').find('button').attr('disabled', false)
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
            
                    $('#transfer').find('button').attr('disabled', false);
            
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