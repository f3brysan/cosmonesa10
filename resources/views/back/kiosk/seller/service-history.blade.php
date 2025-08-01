@extends('back.layouts.master')
@section('title', 'Kiosk Seller Daftar Jasa')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('back.kiosk.seller.head')
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!-- Profile -->
                <div class="card card-action mb-6">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i
                                class="icon-base bx bxs-user-detail icon-lg text-body me-4"></i>Riwayat Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama Jasa</th>
                                        <th>Pemesan</th>
                                        <th>Dipesan Pada</th>
                                        <th>Status Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactionHistories as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->code }}</td>
                                            <td>{{ $item->note }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-center">{{ $item->booking_date }}</td>
                                            <td class="text-center">{{ $item->payment_status }}</td>
                                            <td class="text-center">
                                                @if ($item->payment_status == 'paid')
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary">Pesanan
                                                        selesai</a>
                                                @else
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-info">Lihat</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    {{-- Swal --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                order: [
                    [0, 'desc']
                ]
            });

            $('#summernote').summernote({
                height: 200,
            });
        });

        function editProfile() {
            $.get("{{ URL::to('back/user/settings/profile/edit') }}",
                function(data) {
                    $('#profileModal').modal('show');
                    $('#profileForm').html(data);
                });
        }

        function deleteService(id, name, status) {
            if (status == 1) {
                var statustxt = 'deleted';
            } else {
                var statustxt = 'restored';
            }
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, " + statustxt + " it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ URL::to('back/kiosku/service/destroy') }}",
                        data: {
                            id: id,
                            name: name,
                            status: status,
                            _token: "{{ csrf_token() }}"

                        },
                        dataType: "JSON",
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your service has been " + statustxt + ".",
                                icon: "success"
                            });

                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Canceled!",
                        text: "Nothing has been deleted.",
                        icon: "success"
                    });
                }
            });
        }
    </script>

    <script>
        $(document).on('click', '#edit-btn-kiosk', function() {
            $('#edit-kiosk').modal('show');
        });
    </script>
@endpush
