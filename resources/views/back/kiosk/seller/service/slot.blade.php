@extends('back.layouts.master')
@section('title', 'Tambah Slot Baru Jasa ' . $service->name)

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- Breadcrumb --}}
        <div class="row">
            <div class="col-xl-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ URL::to('back/master/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ URL::to('back/kiosku/service') }}">Kiosku</a>
                        </li>
                        <li class="breadcrumb-item active">Slot Jasa {{ $service->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Slot Jasa {{ $service->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-6">
                                <a href="javascript:void(0);" class="btn btn-primary" id="tambah-btn"><i
                                        class="icon-base bx bx-plus me-1"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-datatable">
                            <table id="myTable" class="datatables-basic table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">Hari</th>
                                        <th class="text-center">Jam</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CRUD Modal -->
    <div class="modal fade" id="crudModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crudModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="crudForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="service_id" value="{{ Crypt::encrypt($service->id) }}">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Day</label>
                            <select name="day" id="day" class="form-control form-select">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($days as $item)
                                    <option value="{{ $item }}">{{ ucfirst($item) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Start At</label>
                            <input type="text" class="timepicker form-control" name="start_at" id="start_at"/>
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">End At</label>
                            <input type="text" class="timepicker form-control" name="end_at" id="end_at"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kembali</span>
                        </button>
                        <button type="submit" class="btn btn-primary" id="save-btn">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.timepicker').timepicker({
                zindex: 9999999,
                timeFormat: 'HH:mm',
                interval: 30,
                minTime: '00:00',
                maxTime: '23:59',
                defaultTime: '08:00',
                startTime: '00:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });


            table = $('#myTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ URL::to('back/kiosku/service/set-slot/' . Crypt::encrypt($service->id) . '') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'day',
                        name: 'day',
                    },

                    {
                        data: 'active_hours',
                        name: 'active_hours',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                ],
                order: [
                    [0, 'asc']
                ]
            });

            $("#tambah-btn").click(function() {
                $("#crudModal").modal('show');
                $("#crudModalLabel").html('Tambah Slot');
            });

            if ($("#crudForm").length > 0) {
                $("#crudForm").validate({
                    submitHandler: function(form) {
                        var actionType = $('#save-btn').val();
                        $('#save-btn').html('Menyimpan . .');

                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('back/kiosku/service/add-slot') }}",
                            data: $('#crudForm').serialize(),
                            dataType: 'json',
                            success: function(data) {
                                $('#crudForm').trigger("reset");
                                $('#crudModal').modal("hide");
                                $('#save-btn').html('Simpan');

                                table.ajax.reload(null, false);
                                Swal.fire({
                                    title: "Berhsil!",
                                    text: data.message,
                                    icon: "success"
                                });
                            },
                            error: function(data) {
                                console.log('Error', data);
                                $('#save-btn').html('Simpan');
                            }
                        });
                    }
                })
            }
        });
    </script>
@endpush
