@extends('admin.layout')

@section('content')
<form action="{{ route('faq.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Pertanyaan</label>
        <input type="text" name="question" class="form-control"
            value="{{ old('question', $faq->question ?? '') }}">
    </div>

    <div class="mb-3">
        <label>Jawaban</label>
        <textarea name="answer" class="form-control" rows="4">{{ old('answer', $faq->answer ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label>Urutan</label>
        <input type="number" name="order" class="form-control"
            value="{{ old('order', $faq->order ?? 0) }}">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="is_active" class="form-control">
            <option value="1">Aktif</option>
            <option value="0">Nonaktif</option>
        </select>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>


@endsection