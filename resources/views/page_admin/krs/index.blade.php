@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Input Mata Kuliah</h2>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                        <i class='bx bx-arrow-back'></i> Kembali
                    </a>
                </div>
                
                <p class="text-muted">Pilih mata kuliah untuk mahasiswa</p>

                <div class="alert alert-info">
                    <strong>Mahasiswa:</strong> {{ $mahasiswa->namaMhs }} | 
                    <strong>NIM:</strong> {{ $mahasiswa->nim }} | 
                    <strong>IPK:</strong> {{ $mahasiswa->ipk }} |
                    <strong>SKS Maksimal:</strong> {{ $mahasiswa->sks }}
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('krs.store') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="mhs_id" value="{{ $mahasiswa->id }}">
                    
                    <div class="row">
                        <div class="col-md-10">
                            <select name="matakuliah" class="form-select @error('matakuliah') is-invalid @enderror">
                                <option value="">Pilih Mata Kuliah</option>
                                @foreach($matakuliah as $mk)
                                    <option value="{{ $mk->matakuliah }}">{{ $mk->matakuliah }} ({{ $mk->sks }} SKS)</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tambah</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Kelompok</th>
                                <th>Ruangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; $totalSKS = 0; @endphp
                            @foreach(explode(',', $mahasiswa->matakuliah) as $mk)
                                @if(trim($mk) != '')
                                    @php 
                                        $matakuliah = \App\Models\JwlMatakuliah::where('matakuliah', trim($mk))->first();
                                        $totalSKS += $matakuliah ? $matakuliah->sks : 0;
                                    @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ trim($mk) }}</td>
                                        <td>{{ $matakuliah ? $matakuliah->sks : '-' }}</td>
                                        <td>{{ $matakuliah ? $matakuliah->kelp : '-' }}</td>
                                        <td>{{ $matakuliah ? $matakuliah->ruangan : '-' }}</td>
                                        <td>
                                            <form action="{{ route('krs.destroy', [$mahasiswa->id, trim($mk)]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                        onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total SKS</th>
                                <th>{{ $totalSKS }}</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection