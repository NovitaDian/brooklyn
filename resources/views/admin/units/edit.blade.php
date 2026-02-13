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

<h5 class="fw-bold mb-3 text-warning">Detail Interior</h5>
<div class="row">
@for($i=1; $i<=6; $i++)
@php $field='detail'.$i; @endphp
<div class="col-md-4 mb-4">
    <label>Detail {{ $i }}</label>
    <input type="file" name="detail{{ $i }}" class="form-control">
    @if($unit->$field)
    <img src="{{ asset('storage/'.$unit->$field) }}" class="img-preview mt-2">
    @endif
</div>
@endfor
</div>

<button class="btn btn-warning px-4">Update Data</button>
<a href="{{ route('admin.units.index') }}" class="btn btn-secondary px-4">Batal</a>

</form>
</div>
</div>

</div>
@endsection
