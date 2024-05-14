@extends('front-end.layout')

@section('content')
<div class="container">
    <h2>Data Rumah Sakit</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nama Rumah Sakit</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Gambar</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hospitals as $hospital)
            <tr>
                <td>{{ $hospital->nama_rs }}</td>
                <td>{{ $hospital->latitude_rs }}</td>
                <td>{{ $hospital->longitude_rs }}</td>
                <td>
                    <img src="{{ $hospital->gambar_rs }}" alt="{{ $hospital->nama_rs }}" style="max-width: 100px;">
                </td>
                <td>
                    <a href="{{ route('hospitals.edit', ['id_rs' => $hospital->id_rs]) }}" class="btn btn-primary">Update</a>
                    <form action="{{ route('hospitals.destroy', ['id_rs' => $hospital->id_rs]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this hospital?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
