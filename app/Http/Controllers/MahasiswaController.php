<?php

namespace App\Http\Controllers;

use App\Models\InputMhs;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = InputMhs::all();
        return view('page_admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaMhs' => 'required',
            'nim' => 'required|unique:inputmhs,nim',
            'ipk' => 'required|numeric|between:0,4',
        ]);

        // Hitung SKS berdasarkan IPK
        $sks = $this->hitungSKS($request->ipk);

        InputMhs::create([
            'namaMhs' => $request->namaMhs,
            'nim' => $request->nim,
            'ipk' => $request->ipk,
            'sks' => $sks,
            'matakuliah' => ''
        ]);

        return redirect()->back()->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    private function hitungSKS($ipk)
    {
        if ($ipk < 3) {
            return 20;
        } else {
            return 24;
        }
    }

    public function destroy($id)
    {
        $mahasiswa = InputMhs::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->back()->with('success', 'Data mahasiswa berhasil dihapus');
    }

    public function edit($id)
    {
        $mahasiswa = InputMhs::findOrFail($id);
        return view('page_admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = InputMhs::findOrFail($id);
        
        $request->validate([
            'namaMhs' => 'required',
            'nim' => 'required|unique:inputmhs,nim,'.$id,
            'ipk' => 'required|numeric|between:0,4',
        ]);

        $sks = $this->hitungSKS($request->ipk);

        $mahasiswa->update([
            'namaMhs' => $request->namaMhs,
            'nim' => $request->nim,
            'ipk' => $request->ipk,
            'sks' => $sks
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate');
    }

    public function generatePDF($id)
    {
        $mahasiswa = InputMhs::findOrFail($id);
        
        $pdf = PDF::loadView('page_admin.mahasiswa.krs-pdf', [
            'mahasiswa' => $mahasiswa
        ]);
        
        return $pdf->stream('KRS-' . $mahasiswa->nim . '.pdf');
    }
}