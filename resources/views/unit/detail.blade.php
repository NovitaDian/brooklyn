@extends('layout')

@section('content')
<section>
    <h2 class="gold">{{ $unit->nama }}</h2>

    <img src="{{ asset('storage/'.$unit->foto) }}" width="400">

    <h3>Spesifikasi Bangunan</h3>
    <table>
        <tr><td>Luas Tanah</td><td>{{ $unit->luas_tanah }} m²</td></tr>
        <tr><td>Luas Bangunan</td><td>{{ $unit->luas_bangunan }} m²</td></tr>
        <tr><td>Kamar Tidur</td><td>{{ $unit->kt }}</td></tr>
        <tr><td>Kamar Mandi</td><td>{{ $unit->km }}</td></tr>
        <tr><td>Listrik</td><td>{{ $unit->listrik }}</td></tr>
        <tr><td>Air</td><td>{{ $unit->air }}</td></tr>
        <tr><td>Lantai</td><td>{{ $unit->lantai }}</td></tr>
        <tr><td>Atap</td><td>{{ $unit->atap }}</td></tr>
        <tr><td>Dinding</td><td>{{ $unit->dinding }}</td></tr>
        <tr><td>Plafon</td><td>{{ $unit->plafon }}</td></tr>
        <tr><td>Kusen</td><td>{{ $unit->kusen }}</td></tr>
        <tr><td>Pintu & Jendela</td><td>{{ $unit->pintu_jendela }}</td></tr>
    </table>
</section>
@endsection
