@extends('front-end.layout')

@section('content')
<div class="container">
    <h2>Edit Rumah Sakit</h2>
    <form action="{{ route('hospitals.update', $hospital->id_rs) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_rs" class="form-label">Nama Rumah Sakit</label>
            <input type="text" name="nama_rs" class="form-control" id="nama_rs" value="{{ $hospital->nama_rs }}" required>
        </div>

        <div class="mb-3">
            <label for="latitude_rs" class="form-label">Latitude</label>
            <input type="text" name="latitude_rs" class="form-control" id="latitude_rs" value="{{ $hospital->latitude_rs }}" required>
        </div>

        <div class="mb-3">
            <label for="longitude_rs" class="form-label">Longitude</label>
            <input type="text" name="longitude_rs" class="form-control" id="longitude_rs" value="{{ $hospital->longitude_rs }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar_rs" class="form-label">Gambar</label>
            <input type="file" name="gambar_rs" class="form-control" id="gambar_rs">
            @if($hospital->gambar_rs)
                <img src="data:image/jpeg;base64,{{ base64_encode($hospital->gambar_rs) }}" alt="{{ $hospital->nama_rs }}" style="max-width: 100px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection