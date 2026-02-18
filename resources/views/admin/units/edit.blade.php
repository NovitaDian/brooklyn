@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <h3 class="mb-4 fw-bold">Edit Data Unit</h3>

    <div class="card shadow border-0">
        <div class="card-body p-4">

            <form method="POST" action="{{ route('admin.units.update',$unit->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h5 class="fw-bold mb-3 text-warning">Informasi Utama</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Unit</label>
                        <input name="nama" class="form-control" value="{{ $unit->nama }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Luas Tanah</label>
                        <input name="luas_tanah" class="form-control" value="{{ $unit->luas_tanah }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Luas Bangunan</label>
                        <input name="luas_bangunan" class="form-control" value="{{ $unit->luas_bangunan }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Kamar Tidur</label>
                        <input name="kt" class="form-control" value="{{ $unit->kt }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Kamar Mandi</label>
                        <input name="km" class="form-control" value="{{ $unit->km }}">
                    </div>
                </div>

                <hr>

                <h5 class="fw-bold mb-3 text-warning">Spesifikasi Bangunan</h5>
                <div class="row">
                    @foreach([
                    'listrik','air','lantai','atap','dinding',
                    'plafon','kusen','sanitary','pintu','jendela'
                    ] as $f)
                    <div class="col-md-4 mb-3">
                        <label>{{ ucfirst($f) }}</label>
                        <input name="{{ $f }}" class="form-control" value="{{ $unit->$f }}">
                    </div>
                    @endforeach
                </div>

                <hr>

                <h5 class="fw-bold mb-3 text-warning">Foto Utama & Denah</h5>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label>Foto Utama</label>
                        <input type="file" name="foto" class="form-control">
                        <img src="{{ asset('storage/'.$unit->foto) }}" class="img-preview mt-2">
                    </div>

                    <div class="col-md-4 mb-4">
                        <label>Denah</label>
                        <input type="file" name="denah" class="form-control">
                        @if($unit->denah)
                        <img src="{{ asset('storage/'.$unit->denah) }}" class="img-preview mt-2">
                        @endif
                    </div>
                </div>

                <hr>

                {{-- ================= GALERI INTERIOR ================= --}}
                <h5 class="fw-bold mb-3 text-warning">Detail Interior</h5>

                {{-- gambar lama --}}
                <div class="row mb-4">
                    @foreach($unit->images as $img)
                    <div class="col-md-3 text-center mb-3">
                        <img src="{{ asset('storage/'.$img->image) }}"
                            class="img-fluid rounded shadow mb-2">

                        <div>
                            <label class="text-danger">
                                <input type="checkbox" name="delete_images[]" value="{{ $img->id }}">
                                Hapus
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- upload baru --}}
                <div id="image-wrapper">
                    <div class="mb-3 image-group">
                        <label>Tambah Interior Baru</label>
                        <div class="input-group">
                            <input type="file" name="images[]" class="form-control image-input">
                            <button type="button" class="btn btn-success add-image">Add</button>
                        </div>
                    </div>
                </div>

                <div class="row mt-3" id="preview-container"></div>

                <button class="btn btn-warning px-4">Update Data</button>
                <a href="{{ route('admin.units.index') }}" class="btn btn-secondary px-4">Batal</a>

            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {

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

        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("remove-image")) {
                e.target.closest(".image-group").remove();
            }
        });

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

@endsection