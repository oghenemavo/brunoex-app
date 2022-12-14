<x-layouts.dashboard.admin>
    
    <x-slot name="header">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">All Users</h3>
            <div class="nk-block-des">
                <p>All Users</p>
            </div>
        </div>
    </x-slot>

    <div class="card card-preview">
        <div class="card-inner">
            <table id="users_table" class="nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">User</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Balance</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Verified</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
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
            NioApp.DataTable($('#users_table'), {
                ajax: {
                    url: `{{ route('admin.data.users') }}`,
                    dataSrc: 'users'
                },
                createdRow: function( row, data, dataIndex ) {
                    $(row).addClass( 'nk-tb-item' );
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
                    { 
                        data        : '', className: 'nk-tb-col',
                        render      : function(data, type, full) {
                            return `
                                <div class="user-card">
                                    <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                        <span>${full.initials}</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">
                                            ${full.name} 
                                            <span class="dot dot-success d-md-none ml-1"></span>
                                        </span>
                                        <span>${full.email}</span>
                                    </div>
                                </div>
                            `;
                        }
                        
                    },
                    { 
                        data        : 'balance', className: 'nk-tb-col tb-col-mb',
                        render      : function(data) {
                            return `<span class="tb-amount">&dollar;${data}</span>`;
                        }
                    },
                    { 
                        data        : 'verified', className   : 'nk-tb-col tb-col-lg',
                        render      : function (data) {
                            let result = '';
                            if (data) {
                                result = '<li><em class="icon text-success ni ni-check-circle"></em><span>Email</span></li>';
                            } else {
                                result = '<li><em class="icon text-warning ni ni-alert-circle"></em><span>Email</span></li>';
                            }
                            return `
                                <ul class="list-status">
                                    ${result}
                                </ul>
                            `;
                        }
    
                    },
                    {
                        data: 'is_active', className: 'nk-tb-col tb-col-md',
                        render : function(data) {
                            let activity = '';
                            if (data == '0') {
                                activity += '<span class="tb-status text-danger">Inactive</span>';
                            } else {
                                activity += '<span class="tb-status text-success">Active</span>';
                            }
                            return activity;
                        }
                    },
                    { 
                        data        : 'created_at', className   : 'nk-tb-col tb-col-lg',
                        render: function (data) {
                            return `<span>${moment(data).format('DD-MM-YYYY')}</span>`;
                        } 
                    },
                ],
                columnDefs: [
                    {
                        targets   : 5,
                        className : 'nk-tb-col nk-tb-col-tools',
                        data      : null,
                        render    : function (data, type, full, meta) {
                            let user_position = '';
                            if (data.status == 'ACTIVE') {
                                user_position += '<li><a href="#" class="suspend-user"><em class="icon ni ni-na text-danger"></em><span>Suspend User</span></a></li>';
                            } else {
                                user_position += '<li><a href="#" class="activate-user"><em class="icon ni ni-check-circle text-success"></em><span>Activate User</span></a></li>';
                            }
                            return `
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#view_user_${data.id}"><em class="icon ni ni-eye"></em><span>View User</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                                    <li class="divider"></li>
                                                    ${user_position}
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
    
                                <!-- @View User Modal-->
                                <div class="modal fade" tabindex="-1" role="dialog" id="view_user_${data.id}">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                            <div class="modal-body modal-body-lg">
                                                <h5 class="modal-title">User</h5>
                                                
                                                <dl class="row pt-3">
                                                    <dt class="col-sm-3">Full Name</dt>
                                                    <dd class="col-sm-9">${data.name}</dd>
    
                                                    <dt class="col-sm-3">Email Address</dt>
                                                    <dd class="col-sm-9">${data.email}</dd>
    
                                                    <dt class="col-sm-3">Phone Number</dt>
                                                    <dd class="col-sm-9">${data.phone ?? 'Not Set'}</dd>
    
                                                    <dt class="col-sm-3">Gender</dt>
                                                    <dd class="col-sm-9">${data.gender ?? 'Not Set'}</dd>
    
                                                    <dt class="col-sm-3">Date of Birth</dt>
                                                    <dd class="col-sm-9">${data.dob ?? 'Not Set'}</dd>
    
                                                    <dt class="col-sm-3">Address</dt>
                                                    <dd class="col-sm-9">${data.address ?? 'Not Set'}</dd>
    
                                                    <dt class="col-sm-3">city</dt>
                                                    <dd class="col-sm-9">${data.city ?? 'Not Set'}</dd>
    
                                                    <dt class="col-sm-3">state</dt>
                                                    <dd class="col-sm-9">${data.state ?? 'Not Set'}</dd>
    
                                                    <dt class="col-sm-3">zip</dt>
                                                    <dd class="col-sm-9">${data.zip ?? 'Not Set'}</dd>
    
                                                    <dt class="col-sm-3">country</dt>
                                                    <dd class="col-sm-9">${data.country ?? 'Not Set'}</dd>
    
                                                    <dt class="col-sm-3">nation</dt>
                                                    <dd class="col-sm-9">${data.nation ?? 'Not Set'}</dd>
    
    
                                                    <dt class="col-sm-3">Balance</dt>
                                                    <dd class="col-sm-9">&dollar;${data.balance ?? '0.00'}</dd>
    
                                                    <dt class="col-sm-3">Email Verification</dt>
                                                    <dd class="col-sm-9">
                                                        ${data.email_verified_at ? '<span class="badge badge-dim badge-pill badge-success">Verified</span>' : '<span class="badge badge-dim badge-pill badge-warning">Not Verified</span>'}
                                                    </dd>
    
                                                    <dt class="col-sm-3">Status</dt>
                                                    <dd class="col-sm-9">
                                                        ${data.status == 'ACTIVE' ? '<span class="badge badge-dot badge-success">Active</span>' : '<span class="badge badge-dot badge-danger">Inactive</span>'}
                                                    </dd>
    
                                                    <dt class="col-sm-3">Registered at</dt>
                                                    <dd class="col-sm-9">${moment(data.created_at).format('DD-MM-YYYY')}</dd>
    
                                                    <dt class="col-sm-3">Last Login at</dt>
                                                    <dd class="col-sm-9">${moment(data.last_login_at).format('DD-MM-YYYY')}</dd>
                                                </dl>
                                            
                                            </div><!-- .modal-body -->
                                        </div><!-- .modal-content -->
                                    </div><!-- .modal-dialog -->
                                </div>
                                <!--View User .modal -->
                            `;
                        }
                    }
                ],
            });
            
            // $('#users_table tbody').on('click', 'a.activate-user', function (e) { // activate user
            //     e.preventDefault();
    
            //     const dt = $.fn.DataTable.Api( $('#users_table') );
            //     let dtr = dt.row( $(this).parents('tr') ); // table row
            //     let data = dtr.data(); // row data
    
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "User would be able to have access after confirming!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonText: 'Yes, activate user!'
            //     }).then(function (result) {
            //         if (result.value) {
            //             $.ajax({
            //                 type: 'PUT',
            //                 url: "route('admin.activate.user')",
            //                 data: {
            //                     "_token": `{{ csrf_token() }}`, 
            //                     user_id: data.id,
            //                 },
            //                 success: function(response) {
            //                     if (response.hasOwnProperty('success')) {
            //                         dt.ajax.reload();
            //                         Swal.fire('Activated!', 'User has been activated.', 'success');
            //                     }
            //                 },
            //                 error: function(XMLHttpRequest, textStatus, errorThrown) {
            //                     console.log( XMLHttpRequest.responseJSON.errors);
            //                     console.log(XMLHttpRequest.status)
            //                     console.log(XMLHttpRequest.statusText)
            //                     console.log(errorThrown)
                        
            //                     // display toast alert
            //                     toastr.clear();
            //                     toastr.options = {
            //                         "timeOut": "7000",
            //                     }
            //                     NioApp.Toast('Unable to process request now.', 'error', {position: 'top-right'});
            //                 }
            //             });
                        
            //         }
            //     });
            // });
    
            // $('#users_table tbody').on('click', 'a.suspend-user', function (e) { // add product to cart
            //     e.preventDefault();
    
            //     const dt = $.fn.DataTable.Api( $('#users_table') );
            //     let dtr = dt.row( $(this).parents('tr') ); // table row
            //     let data = dtr.data(); // row data
    
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "User won't have access after confirming!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonText: 'Yes, suspend user!'
            //     }).then(function (result) {
            //         if (result.value) {
            //             $.ajax({
            //                 type: 'PUT',
            //                 url: "route('admin.suspend.user')",
            //                 data: {
            //                     "_token": `{{ csrf_token() }}`, 
            //                     user_id: data.id,
            //                 },
            //                 success: function(response) {
            //                     if (response.hasOwnProperty('success')) {
            //                         dt.ajax.reload();
            //                         Swal.fire('Suspended!', 'User has been suspended.', 'success');
            //                     }
            //                 },
            //                 error: function(XMLHttpRequest, textStatus, errorThrown) {
            //                     console.log( XMLHttpRequest.responseJSON.errors);
            //                     console.log(XMLHttpRequest.status)
            //                     console.log(XMLHttpRequest.statusText)
            //                     console.log(errorThrown)
                        
            //                     // display toast alert
            //                     toastr.clear();
            //                     toastr.options = {
            //                         "timeOut": "7000",
            //                     }
            //                     NioApp.Toast('Unable to process request now.', 'error', {position: 'top-right'});
            //                 }
            //             });
                        
            //         }
            //     });
            // });
        });
        
    </script>
@endpush

</x-layouts.dashboard.admin>