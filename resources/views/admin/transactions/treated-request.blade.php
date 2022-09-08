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
                    url: `{{ route('admin.data.transactions.treated.request') }}`,
                    dataSrc: 'transactions'
                },
                buttons: [{
                    text: 'Reload',
                    className: 'btn reload px-2 btn-primary btn-sm',
                    action: function(e, dt, node, config) {
                        dt.ajax.reload();
                    },
                }, ],
                columns: [{
                        data: 'name',
                        className: 'nk-tb-col tb-col-md'
                    },
                    {
                        data: 'email',
                        className: 'nk-tb-col tb-col-md'
                    },
                    {
                        data: 'request',
                        className: 'nk-tb-col tb-col-md'
                    },
                    {
                        data: 'amount',
                        className: 'nk-tb-col tb-col-md'
                    },
                    {
                        data: 'details',
                        className: 'nk-tb-col tb-col-lg',
                        render: function(data) {
                            return `<span>${data.narration}</span>`;
                        }
                    },
                    {
                        data: 'status',
                        className: 'nk-tb-col tb-col-lg',
                        render: function(data) {
                            let ui = '';
                            if (data == 'completed') {
                                ui += `<span class="badge badge-dot bg-success">Completed</span>`;
                            } else {
                                ui += `<span class="badge badge-dot bg-danger">Rejected</span>`;
                            }
                            return ui;
                        }
                    },
                    {
                        data: 'created_at',
                        className: 'nk-tb-col tb-col-lg',
                        render: function(data) {
                            return `<span>${moment(data).format('DD-MM-YYYY')}</span>`;
                        }
                    },
                ],
            });
        });
    </script>
    @endpush

</x-layouts.dashboard.admin>