<x-layouts.dashboard.admin>

    <x-slot name="header">

        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title fw-normal">Transaction Request</h3>
                <div class="nk-block-des">
                    <p>All Transactions Request.</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="card card-preview">
        <div class="card-inner">
            <table id="transactions_table" class="nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Name</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Email</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Request Type</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Amount</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Details</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Created at</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div><!-- .card-preview -->

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script>
        $(function() {
            NioApp.DataTable($('#transactions_table'), {
                ajax: {
                    url: `{{ route('admin.data.transactions.request') }}`,
                    dataSrc: 'transactions'
                },
                buttons: [
                    {
                        text: 'Reload',
                        className: 'btn reload px-2 btn-primary btn-sm',
                        action: function ( e, dt, node, config ) {
                            dt.ajax.reload();
                        },
                    },
                ],
                columns: [
                    { data: 'name', className: 'nk-tb-col tb-col-md' },
                    { data : 'email', className : 'nk-tb-col tb-col-md' },
                    { data : 'request', className : 'nk-tb-col tb-col-md' },
                    { data : 'amount', className : 'nk-tb-col tb-col-md' },
                    { 
                        data        : 'details', className   : 'nk-tb-col tb-col-lg',
                        render      : function (data) {
                            return `<span>${data.narration}</span>`;
                        } 
                    },
                    { 
                        data        : 'created_at', className   : 'nk-tb-col tb-col-lg',
                        render      : function (data) {
                            return `<span>${moment(data).format('DD-MM-YYYY')}</span>`;
                        } 
                    },
                ],
                columnDefs: [
                    {
                        targets   : 6,
                        className : 'nk-tb-col nk-tb-col-tools',
                        data      : null,
                        render    : function (data, type, full, meta) {
                            return `
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end" style="">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a data-type="accept" class="text-success interact" href="#"><em class="icon ni ni-check-circle-fill"></em><span>Accept</span></a></li>
                                                    <li class="divider"></li>
                                                    <li><a class="text-danger interact" href="#"><em class="icon ni ni-cross-circle-fill text-danger"></em><span>Reject</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            `;
                        }
                    }
                ],
            });
            $('#transactions_table tbody').on('click', 'a.interact', function (e) { // activate user
                e.preventDefault();

                const actionType = $(this).attr('data-type');
                const action = actionType == 'accept' ? '1' : '2';
                
                
                const dt = $.fn.DataTable.Api( $('#transactions_table') );
                let dtr = dt.row( $(this).parents('tr') ); // table row
                let data = dtr.data(); // row data
                
                let url = fireText = fireConfirmText = '';

                if (data.request == 'DEPOSIT') {
                    fireText = actionType == 'accept' ? 'This action would validate user deposit!' : 'This action would Invalidate user deposit!';
                    fireConfirmText = actionType == 'accept' ? 'Yes, Accept Deposit!' : 'No, Reject Deposit!';
                    url += `{{ route('admin.validate.deposit', ':id') }}`;
                } else if(data.request == 'WITHDRAW') {
                    url += `{{ route('admin.validate.withdraw', ':id') }}`;
                    fireText = actionType == 'accept' ? 'This action would validate user withdrawal!' : 'This action would Invalidate user withdrawal!';
                    fireConfirmText = actionType == 'accept' ? 'Yes, Accept withdrawal!' : 'No, Reject withdrawal!';
                }

                if (url) {
                    url = url.replace(':id', data.id);
                }

                // console.log(url);

                Swal.fire({
                    title: 'Are you sure?',
                    text: fireText,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: fireConfirmText
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            type: 'PUT',
                            url: url,
                            data: {
                                "_token": `{{ csrf_token() }}`, 
                                action
                            },
                            success: function(response) {
                                if (response.hasOwnProperty('status') && response.status) {
                                    Swal.fire('Accepted!', response.message, 'success');
                                } else {
                                    Swal.fire('Oops!', response.message, 'error');
                                }
                                dt.ajax.reload();
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









<!-- <form action="" method="POST">
    @csrf
    @method('PUT')

    <select name="action">
        <option value="1">Accept</option>
        <option value="2">Reject</option>
    </select>

    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Invest
        </button>
    </div>

</form> -->