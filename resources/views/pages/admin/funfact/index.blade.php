@extends('layouts.admin.app')

@push('header')
    <!-- Include DataTables styles -->
    <link href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p class="mb-0">All Fun Facts</p>

                    <a href="{{ route('funfacts.create') }}" class="btn btn-sm btn-primary ms-auto" title="Create New Fun Fact">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">
                    <!-- Table for Fun Facts -->
                    <table class="table table-bordered table-striped" id="funfacts-table">
                        <thead>
                            <tr>
                                <th>Label</th>
                                <th>Count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Include DataTables scripts -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>

    <script>
        var table = $('#funfacts-table').DataTable({
            'paging': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            'processing': true,
            'serverSide': true,
            'stateSave': true,
            'responsive': true,
            'ajax': {
                'url': '{{ route('funfacts.search') }}', // Adjust the route for your funfacts' server-side processing
            },
            columns: [
                {
                    data: 'label', 
                    name: 'label'
                },
                {
                    data: 'count',
                    name: 'count'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                }
            ],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });

        function Delete(rowId) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success py-2 px-4",
                    cancelButton: "btn btn-danger mx-4 py-2 px-4"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,

            }).then((result) => {
                if (result.isConfirmed) {
                    // AJAX call
                    $.ajax({
                        url: '{{ url('/funfacts/destroy') }}' + '/' + rowId,
                        method: 'get',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(result) {
                            swalWithBootstrapButtons.fire({
                                title: "Success!",
                                text: "Slider Deletd successfully.",
                                icon: "success",
                                timer: 2000
                            });
                            window.location.reload();
                        },
                        error: function(jqXHR, exception) {
                            toastr.error('Failed to update data');
                        }
                    });
                }
            });
        }
    </script>
@endpush
