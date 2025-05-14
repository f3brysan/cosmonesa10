{{-- Breadcrumb --}}
<div class="row">
    <div class="col-xl-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('back/master/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Kiosk {{ ucfirst($active) }}</li>
            </ol>
        </nav>
    </div>
</div>
{{-- Breadcrumb --}}

<!-- Header -->
<div class="row">
    <div class="col-12">
        <div class="card mb-6">
            <div class="user-profile-header-banner">
                <img src="https://picsum.photos/2252/500" alt="Banner image" class="rounded-top"
                    style="block-size: 250px; inline-size: 100%; object-fit: cover;" />
            </div>
            <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-8">
                <div class="flex-grow-1 mt-3 mt-lg-5">
                    <div
                        class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4 class="mb-2 mt-lg-7">{{ $kiosk->name ?? 'Unamed Kios' }}</h4>
                            <ul
                                class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">
                                <li class="list-inline-item"><i class="icon-base bx bx-palette me-2 align-top"></i><span
                                        class="fw-medium">{{ $kiosk->phone ?? 'Belum diset' }}</span></li>
                                <li class="list-inline-item"><i class="icon-base bx bx-map me-2 align-top"></i><span
                                        class="fw-medium">{{ $kiosk->address ?? 'Belum diset' }}</span></li>
                                <li class="list-inline-item"><i
                                        class="icon-base bx bx-calendar me-2 align-top"></i><span class="fw-medium">
                                        Since {{ Carbon\Carbon::parse($kiosk->created_at)->format('d F Y') }}</span>
                                </li>
                                @if ($kiosk->is_verifed == 1)
                                    <li class="list-inline-item"><i
                                            class="icon-base bx bx-badge-check me-2 align-top text-info"></i><span
                                            class="fw-medium label bg-label-info">Terverifikasi</span></li>
                                @else
                                    <li class="list-inline-item"><i
                                            class="icon-base bx bx-x-circle me-2 align-top text-warning"></i><span
                                            class="fw-medium label bg-label-warning">Belum Terverifikasi</span></li>
                                @endif
                            </ul>
                        </div>
                        <a href="javascript:void(0)" id="edit-btn-kiosk" class="btn btn-primary mb-1"> <i
                                class="icon-base bx bx-cog icon-sm me-2"></i>Edit </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-6">
            <div class="card-body">
                <h5>Deskripsi Lapak</h5>
                {!! $kiosk->description ?? 'Tidak ada deskripsi' !!}
            </div>
        </div>
    </div>
</div>
<!--/ Header -->

<!-- Navbar pills -->
<div class="row">
    <div class="col-md-12">
        <div class="nav-align-top">
            <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-sm-0 gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'service' ? 'active' : '' }}"
                        href="{{ URL::to('back/kiosku/service') }}"><i
                            class="icon-base bx bx-archive icon-sm me-1_5"></i> Daftar Jasa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'history-service' ? 'active' : '' }}"
                        href="{{ URL::to('back/kiosku/service-history') }}"><i
                            class="icon-base bx bxs-store-alt icon-sm me-1_5"></i> Riwayat Pesanan</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--/ Navbar pills -->

<!-- Large Modal -->
<div class="modal fade" id="edit-kiosk" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Perbarui Kiosk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formTambahJasa" action="{{ URL::to('back/kiosku/about/update') }}" method="post">
                    @csrf
                    <div class="col-md-12 mb-6">
                        <label for="nameLarge" class="form-label">Nama Kios</label>
                        <input type="text" id="nameLarge" name="name" class="form-control"
                            placeholder="Enter Name" value="{{ $kiosk->name ?? '' }}" required />
                    </div>
                    <div class="col-md-12 mb-6">
                        <label for="nameLarge" class="form-label">Phone</label>
                        <input type="text" id="nameLarge" name="phone" class="form-control"
                            placeholder="Enter Name" value="{{ $kiosk->phone ?? '' }}" required />
                    </div>
                    <div class="col-md-12 mb-6">
                        <label for="nameLarge" class="form-label">Alamat</label>
                        <textarea name="address" class="form-control" id="">{{ $kiosk->address ?? '' }}</textarea>
                    </div>
                    <div class="col-md-12 mb-6">
                        <label for="nameLarge" class="form-label">Deskripsi Kios</label>
                        <textarea class="form-control" id="summernote" name="description" rows="10">{{ old('description', $kiosk->description) }}</textarea>
                    </div>                    
                    <div class="col-md-12 mb-4 text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
