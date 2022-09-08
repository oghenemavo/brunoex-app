<x-layouts.dashboard.admin>

    <x-slot name="header">

        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title fw-normal">Transaction</h3>
                <div class="nk-block-des">
                    <p>All Transactions.</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="card card-preview">
        <div class="card-inner">
            <table id="transactions_table" class="nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Reference</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Name</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Email</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Type</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Amount</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Details</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Created at</span></th>
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
                    url: `{{ route('admin.data.transactions') }}`,
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
                "order": [],
                columns: [
                    { data : 'uuid', className : 'nk-tb-col tb-col-md' },
                    { data: 'name', className: 'nk-tb-col tb-col-md' },
                    { data : 'email', className : 'nk-tb-col tb-col-md' },
                    { data : 'type', className : 'nk-tb-col tb-col-md' },
                    { data : 'amount', className : 'nk-tb-col tb-col-md' },
                    { 
                        data        : 'details', className   : 'nk-tb-col tb-col-lg',
                        render      : function (data) {
                            return `<ul class="m-0 p-0">
                                <li>${data.narration}</li>
                                <li>${data.type}</li>
                                <li>${data.sender_type}</li>
                                <li>${data.sender}</li>
                            </ul>`;
                        } 
                    },
                    { 
                        data : 'status', className : 'nk-tb-col tb-col-md',
                        render: function(data) {
                            return `<span class="badge badge-dim badge-pill badge-success">
                                    <em class="icon ni ni-check-circle text-success"></em>&nbsp;
                                </span>`;
                        }
                    },
                    { 
                        data        : 'created_at', className   : 'nk-tb-col tb-col-lg',
                        render      : function (data) {
                            return `<span>${moment(data).format('DD-MM-YYYY')}</span>`;
                        } 
                    },
                ],
            });
        });
    </script>
    @endpush
</x-layouts.dashboard.admin>