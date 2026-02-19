@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Siteplan Manager</h2>

    <div style="position:relative; max-width:1000px;">
        <img src="{{ asset('images/siteplan.png') }}" id="siteplan" style="width:100%; display:block;">

        @foreach($points as $p)
        <form method="POST" action="/admin/siteplan/{{ $p->id }}"
            style="
            position:absolute;
            left:{{ $p->x }}%;
            top:{{ $p->y }}%;
            transform:translate(-50%,-50%);
          "
            onsubmit="return confirm('Hapus titik {{ $p->nama_unit }} ?')">
            @csrf
            @method('DELETE')

            <button type="submit" title="Hapus {{ $p->nama_unit }}"
                style="
                width:18px;
                height:18px;
                border-radius:50%;
                border:2px solid white;
                cursor:pointer;

                @if($p->status=='dijual') background:green;
                @elseif($p->status=='booked') background:yellow;
                @elseif($p->status=='build') background:blue;
                @else background:red;
                @endif
            ">
            </button>
        </form>
        @endforeach

    </div>

    <hr>

    <form method="POST" action="/admin/siteplan">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit" required>
            </div>
            <div class="col-md-2">
                <input type="number" step="0.01" name="x" id="x" class="form-control" placeholder="X %" readonly>
            </div>
            <div class="col-md-2">
                <input type="number" step="0.01" name="y" id="y" class="form-control" placeholder="Y %" readonly>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-control" required>
                    <option value="dijual">Dijual</option>
                    <option value="booked">Booked</option>
                    <option value="build">Build</option>
                    <option value="dihuni">Dihuni</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
<div class="card border-0 shadow-sm rounded-4 mt-4">
    <div class="card-body p-4">

        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Unit</th>
                        <th width="140">Status</th>
                        <th width="90">X</th>
                        <th width="90">Y</th>
                        <th width="140" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($points as $p)
                    <tr class="table-row">
                        <td class="fw-semibold">
                            {{ $p->nama_unit }}
                        </td>

                        <td>
                            <span class="badge
                                @if($p->status=='dijual') bg-success
                                @elseif($p->status=='booked') bg-warning text-dark
                                @elseif($p->status=='build') bg-primary
                                @else bg-danger
                                @endif">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>

                        <td>{{ $p->x }}</td>
                        <td>{{ $p->y }}</td>

                        <td class="text-center">
                            <form method="POST"
                                action="/admin/siteplan/{{ $p->id }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus titik ini?')"
                                    class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>

<style>
    .table-row:hover {
        background: #f8fafc;
        transition: .2s;
    }
</style>



<script>
    const img = document.getElementById('siteplan');

    img.addEventListener('click', function(e) {
        const rect = img.getBoundingClientRect();

        const xPercent = ((e.clientX - rect.left) / rect.width) * 100;
        const yPercent = ((e.clientY - rect.top) / rect.height) * 100;

        document.getElementById('x').value = xPercent.toFixed(2);
        document.getElementById('y').value = yPercent.toFixed(2);
    });
</script>
@endsection