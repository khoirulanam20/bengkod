@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <h2>Sistem Input Kartu Rencana Studi (KRS)</h2>
                <p class="text-muted">Input data Mahasiswa disini!</p>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('mahasiswa.store') }}" method="POST" class="row g-3 mb-4">
                    @csrf
                    <div class="col-md-4">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" name="namaMhs" class="form-control @error('namaMhs') is-invalid @enderror" 
                               placeholder="Masukkan Nama Mahasiswa" value="{{ old('namaMhs') }}">
                        @error('namaMhs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" 
                               placeholder="Masukkan NIM" value="{{ old('nim') }}">
                        @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">IPK</label>
                        <input type="number" step="0.01" name="ipk" class="form-control @error('ipk') is-invalid @enderror" 
                               placeholder="Masukkan IPK" value="{{ old('ipk') }}">
                        @error('ipk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Input Mahasiswa</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>IPK</th>
                                <th>SKS Maksimal</th>
                                <th>Matkul yang diambil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mahasiswa as $index => $mhs)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $mhs->namaMhs }}</td>
                                <td>{{ $mhs->ipk }}</td>
                                <td>{{ $mhs->sks }}</td>
                                <td>{{ $mhs->matakuliah ?: '-' }}</td>
                                <td>
                                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                    <a href="{{ route('krs.index', $mhs->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('krs.pdf', $mhs->id) }}" class="btn btn-secondary btn-sm" target="_blank">Cetak KRS</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection