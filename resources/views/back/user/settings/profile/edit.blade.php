<form id="profileFormInput">
    @csrf
    <div class="row">
        <div class="col-md-12 mb-6">
            <label for="nameLarge" class="form-label">Name</label>
            <input type="text" id="nameLarge" name="name" class="form-control" placeholder="Enter Name"
                value="{{ $user->name ?? '' }}" required />
        </div>
        <div class="col-md-12 mb-6">
            <label for="emailLarge" class="form-label">Email</label>
            <input type="email" id="emailLarge" name="email" class="form-control" placeholder="xxxx@xxx.xx"
                value="{{ $user->email ?? '' }}" required />
        </div>
    </div>
    <div class="row mb-6">
        <div class="col mb-0">
            <label for="emailLarge" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="exampleFormControlSelect1" name="gender"
                aria-label="Default select example" required>
                @php
                    $gender = $profile->gender ?? '';
                @endphp
                <option value="">Silahkan Pilih</option>
                <option value="L" {{ $gender == 'L' ? 'selected' : '' }}>Laki - laki</option>
                <option value="W" {{ $gender == 'W' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="col mb-0">
            <label for="dobLarge" class="form-label">DOB</label>
            <input type="date" id="dobLarge" class="form-control" name="dob" value="{{ $profile->dob ?? '' }}"
                required />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-6">
            <label for="nameLarge" class="form-label">No HP</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon11">+62</span>
                @php
                    $nomor = null;
                    if (!empty($profile->hp)) {
                        $nomor = substr($profile->hp, 2);
                    }
                @endphp
                <input type="text" class="form-control" name="hp" placeholder="88-8888-8888"
                    value="{{ $nomor ?? '' }}"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required />
            </div>
        </div>
    </div>
    <div class="row text-end">
        <div class="col-md-12">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {

        $("#profileFormInput").on('submit', function(e) {
            e.preventDefault(); // Mencegah reload halaman

            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{ URL::to('back/user/settings/profile/update') }}",
                data: formData,
                dataType: "JSON",
                success: function(response) {
                    if (response.status == 'success') {
                        $("#profileModal").modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location.reload();
                        });
                    }
                }
            });

        });

    });
</script>
