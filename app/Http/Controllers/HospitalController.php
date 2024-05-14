<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use Illuminate\Support\Facades\DB;


class HospitalController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'nama_rs' => 'required',
            'latitude_rs' => 'required',
            'longitude_rs' => 'required',
            'gambar_rs' => 'required|image',

            // Sesuaikan dengan nama-nama field yang ada pada tabel
        ]);

        // Baca isi file gambar sebagai base64
        $gambarData = file_get_contents($request->file('gambar_rs')->getRealPath());

        // Memasukkan data ke dalam database
        $data = Hospital::create([
            'nama_rs' => $validatedData['nama_rs'],
            'latitude_rs' => $validatedData['latitude_rs'],
            'longitude_rs' => $validatedData['longitude_rs'],
            'gambar_rs' => $gambarData,

            // Sesuaikan dengan nama-nama field yang ada pada tabel
        ]);

        // Jika data berhasil dimasukkan, Anda dapat menangani respons di sini
        return redirect('/show-hospitals')->with('success', 'Data rumah sakit berhasil disimpan.');
    }

    public function show()
    {
        // Ambil data rumah sakit dari database menggunakan model
        $hospitals = Hospital::all();

        // Konversi data gambar dari base64
        foreach ($hospitals as $hospital) {
            $hospital->gambar_rs = 'data:image/jpeg;base64,' . base64_encode($hospital->gambar_rs);
        }

        // Kirim data ke tampilan
        return view('front-end.show_hospitals', compact('hospitals'));
    }


    public function edit($id_rs)
    {
        $hospital = Hospital::findOrFail($id_rs);
        return view('front-end.edit_hospital', compact('hospital'));
    }

public function update(Request $request, $id_rs)
    {
        $validatedData = $request->validate([
            'nama_rs' => 'required',
            'latitude_rs' => 'required',
            'longitude_rs' => 'required',
            'gambar_rs' => 'image|nullable',
        ]);

        $hospital = Hospital::where('id_rs', $id_rs)->firstOrFail();
        $hospital->nama_rs = $validatedData['nama_rs'];
        $hospital->latitude_rs = $validatedData['latitude_rs'];
        $hospital->longitude_rs = $validatedData['longitude_rs'];

        if ($request->hasFile('gambar_rs')) {
            $gambarData = file_get_contents($request->file('gambar_rs')->getRealPath());
            $hospital->gambar_rs = $gambarData;
        }

        $hospital->save();

        return redirect()->route('show_hospitals')->with('success', 'Hospital updated successfully');
    }

    
    public function destroy($id_rs)
    {
        $hospital = Hospital::findOrFail($id_rs);
        $hospital->delete();
    
        return redirect()->route('show_hospitals')->with('success', 'Hospital deleted successfully');
    }
    


}

