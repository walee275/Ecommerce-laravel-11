<x-app-layout title="Banner Page">

    <!-- DataTales Example -->
    <div class="mb-4 shadow card">
        <div class="row">
            <div class="col-md-12">
                <x-backend.alert-message />
            </div>
        </div>
        <div class="py-3 card-header">
            <h6 class="float-left m-0 font-weight-bold text-primary">Banners List</h6>
            <a wire:navigate href="{{ route('banner.create') }}" class="float-right btn btn-primary btn-sm"
                data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Banner</a>
        </div>
        <div class="card-body">
            {{-- <livewire:banner.banner-list> --}}
            <livewire:banner.banner-table />

        </div>
    </div>

    @push('styles')
        <style>
            div.dataTables_wrapper div.dataTables_paginate {
                display: none;
            }

            .zoom {
                transition: transform .2s;
                /* Animation */
            }

            .zoom:hover {
                transform: scale(3.2);
            }
        </style>
    @endpush

    @push('scripts')
        <!-- Page level custom scripts -->
        <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
        <script>
            $('#banner-dataTable').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": [3, 4, 5]
                }]
            });

            // Sweet alert

            function deleteData(id) {

            }
        </script>
        <script>
            document.addEventListener('livewire:navigated', () => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.dltBtn').click(function(e) {
                    var form = $(this).closest('form');
                    var dataID = $(this).data('id');
                    // alert(dataID);
                    e.preventDefault();
                    swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this data!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                form.submit();
                            } else {
                                swal("Your data is safe!");
                            }
                        });
                })
            })
        </script>
    @endpush

</x-app-layout>
