<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Spesialis;
use App\Models\Pasien;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function pasien() {
        $pasien = Pasien::with('spesialis')->get();
        return view('dokter.pasien', compact('pasien'));
    }

    public function index()
    {
        $dokter = Dokter::all();
        return view('admin.dokter.index', compact('dokter'));
    }

    public function create()
    {
        $spesialis = Spesialis::all();
        $dokter = Dokter::all();
        return view('admin.dokter.create', compact('dokter', 'spesialis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'id_spesialis' => 'required',
            'foto' => 'required|image|max:2048',
            'shift' => 'required',
        ]);

        $dokter = new Dokter;
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->id_spesialis = $request->id_spesialis;
        $dokter->shift = $request->shift;
        $dokter->id_user = '1';
        // upload image / foto
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/dokter/', $name);
            $dokter->foto = $name;
        }
        $dokter->save();
        return redirect('administrator/data-dokter');
    }

    public function destroy(Dokter $dokter, $id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();
        return redirect('administrator/data-dokter');
    }
}
