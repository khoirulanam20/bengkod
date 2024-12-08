<?php

namespace App\Http\Controllers;

use App\Models\InputMhs;
use App\Models\JwlMatakuliah;
use Illuminate\Http\Request;

class KRSController extends Controller
{
    public function index($id)
    {
        $mahasiswa = InputMhs::findOrFail($id);
        $matakuliah = JwlMatakuliah::all();
        
        return view('page_admin.krs.index', compact('mahasiswa', 'matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mhs_id' => 'required',
            'matakuliah' => 'required'
        ]);

        $mahasiswa = InputMhs::findOrFail($request->mhs_id);
        $matkul = JwlMatakuliah::where('matakuliah', $request->matakuliah)->first();
        
        // Cek total SKS yang sudah diambil
        $currentMatkul = $mahasiswa->matakuliah ? explode(',', $mahasiswa->matakuliah) : [];
        $totalSKS = 0;
        
        foreach($currentMatkul as $mk) {
            $matakuliah = JwlMatakuliah::where('matakuliah', trim($mk))->first();
            if($matakuliah) {
                $totalSKS += $matakuliah->sks;
            }
        }

        // Cek apakah penambahan SKS melebihi batas
        if(($totalSKS + $matkul->sks) > $mahasiswa->sks) {
            return redirect()->back()->with('error', 'Total SKS melebihi batas maksimal');
        }

        // Update matakuliah di tabel mahasiswa
        $newMatkul = $mahasiswa->matakuliah ? $mahasiswa->matakuliah . ', ' . $request->matakuliah : $request->matakuliah;
        
        $mahasiswa->update([
            'matakuliah' => $newMatkul
        ]);

        return redirect()->back()->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    public function destroy($id, $matakuliah)
    {
        $mahasiswa = InputMhs::findOrFail($id);
        $currentMatkul = explode(',', $mahasiswa->matakuliah);
        
        // Hapus mata kuliah yang dipilih
        $currentMatkul = array_filter($currentMatkul, function($mk) use ($matakuliah) {
            return trim($mk) != $matakuliah;
        });

        $mahasiswa->update([
            'matakuliah' => implode(', ', $currentMatkul)
        ]);

        return redirect()->back()->with('success', 'Mata kuliah berhasil dihapus');
    }
}