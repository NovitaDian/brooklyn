@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <h3 class="mb-4 fw-bold">Tambah Data Unit</h3>

    <div class="card shadow border-0">
        <div class="card-body p-4">

            <form method="POST" action="{{ route('admin.units.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- ================= INFORMASI UTAMA ================= --}}
                <h5 class="fw-bold mb-3 text-warning">Informasi Utama</h5>
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Unit</label>
                        <input name="nama" class="form-control" placeholder="Contoh: Type Crown">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga</label>
                        <input
                            type="text"
                            name="harga"
                            id="harga"
                            class="form-control"
                            placeholder="Masukkan harga">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Luas Tanah (m²)</label>
                        <input name="luas_tanah" class="form-control" type="number">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Luas Bangunan (m²)</label>
                        <input name="luas_bangunan" class="form-control" type="number">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Kamar Tidur</label>
                        <input name="kt" class="form-control" type="number">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Kamar Mandi</label>
                        <input name="km" class="form-control" type="number">
                    </div>

                </div>

                <hr class="my-4">

                {{-- ================= SPESIFIKASI ================= --}}
                <h5 class="fw-bold mb-3 text-warning">Spesifikasi Bangunan</h5>
                <div class="row">

                    @foreach([
                    'listrik' => 'Listrik',
                    'air' => 'Air',
                    'lantai' => 'Lantai',
                    'atap' => 'Atap',
                    'dinding' => 'Dinding',
                    'plafon' => 'Plafon',
                    'kusen' => 'Kusen',
                    'sanitary' => 'Sanitary',
                    'pintu' => 'Pintu',
                    'jendela' => 'Jendela'
                    ] as $name => $label)

                    <div class="col-md-4 mb-3">
                        <label class="form-label">{{ $label }}</label>
                        <input name="{{ $name }}" class="form-control" placeholder="Spesifikasi {{ $label }}">
                    </div>

                    @endforeach

                </div>

                <hr class="my-4">

                <h5 class="fw-bold mb-3 text-warning">Galeri Foto Unit</h5>

                <div class="row">

                    {{-- FOTO UTAMA --}}
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Foto Utama</label>
                        <input type="file" name="foto" class="form-control img-input" data-preview="preview_foto">
                        <img id="preview_foto" class="img-preview mt-2">
                    </div>

                    {{-- DENAH --}}
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Foto Denah</label>
                        <input type="file" name="denah" class="form-control img-input" data-preview="preview_denah">
                        <img id="preview_denah" class="img-preview mt-2">
                    </div>

                </div>

                <hr>


                <h5 class="fw-bold mb-3 text-warning">Detail Interior (Opsional)</h5>

                <div id="image-wrapper">

                    <div class="mb-3 image-group">
                        <label class="form-label">Upload Detail Interior</label>
                        <div class="input-group">
                            <input type="file" name="images[]" class="form-control image-input">
                            <button type="button" class="btn btn-success add-image">Add</button>
                        </div>
                    </div>

                </div>

                <div class="row mt-3" id="preview-container"></div>

        </div>


        <div class="mt-4">
            <button class="btn btn-warning px-4">
                <i class="bi bi-save"></i> Simpan Data
            </button>
            <a href="{{ route('admin.units.index') }}" class="btn btn-secondary px-4">
                Batal
            </a>
        </div>

        </form>

    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        // ADD MORE IMAGE
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("add-image")) {

                let html = `
            <div class="mb-3 image-group">
                <div class="input-group">
                    <input type="file" name="images[]" class="form-control image-input">
                    <button type="button" class="btn btn-danger remove-image">Remove</button>
                </div>
            </div>`;

                document.getElementById("image-wrapper")
                    .insertAdjacentHTML("beforeend", html);
            }
        });

        // REMOVE IMAGE
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("remove-image")) {
                e.target.closest(".image-group").remove();
            }
        });

        // PREVIEW IMAGE
        document.addEventListener("change", function(e) {
            if (e.target.classList.contains("image-input")) {

                let preview = document.getElementById("preview-container");
                preview.innerHTML = "";

                document.querySelectorAll(".image-input").forEach(input => {

                    if (input.files[0]) {
                        let reader = new FileReader();

                        reader.onload = function(ev) {
                            preview.insertAdjacentHTML("beforeend", `
                            <div class="col-md-3 mb-3">
                                <img src="${ev.target.result}" 
                                     class="img-fluid rounded shadow">
                            </div>
                        `);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                });
            }
        });

    });
</script>


</div>
@endsection