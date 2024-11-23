<table class="table table-bordered table-striped" id="portfolio-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>

@push('scripts')

<script>
$(document).on('change', '.categoryDropdown', function() {
        var rowId = $(this).data('id');
        var selectedStatus = $(this).val();
        $.ajax({
            url: '{{ url('/portfolio/update-category') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                rowId: rowId,
                categoryId: selectedStatus
            },
            success: function(result) {
                toastr.success('Category updated successfully');
            },
            error: function(jqXHR, exception) {
                toastr.error('Failed to update data');
            }
        });
    });

    function Delete(url) {
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
                        url: url,
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