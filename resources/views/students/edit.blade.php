@extends('templates.default')

@php
    $title = 'Edit Data';
    $pretitle = "Data Siswa";
@endphp

@section('content')

<div class="card">
    <div class="card-body">
    <form action="{{ route('students.update', $student->id) }}" class="" method="post">

    @csrf
    @method("PUT")

     <div class="mb-3">
                              <label class="form-label">nama</label>
                              <input type="text" name="nama" class="form-control @error('nama')
                                is-invalid
                              @enderror" name="example-text-input" placeholder="masukkan nama" value="{{ old('nama') ?? $student->nama }}">
                              @error('nama')
                              <div class="invalid-feedback">
                                {{ $message }}
                              @enderror
                            </div>
     <div class="mb-3">
                              <label class="form-label">kelas</label>
                              <input type="text" name="kelas" class="form-control @error('kelas')
                                is-invalid
                              @enderror" name="example-text-input" placeholder="masukkan kelas" value="{{  old('kelas') ?? $student->kelas }}">
                              @error('kelas')
                              <div class="invalid-feedback">
                                {{ $message }}
                              @enderror
                            </div>
     <div class="mb-3">
                              <label class="form-label">nama buku</label>
                              <input type="text" name="nama_buku" class="form-control @error('nama_buku')
                                is-invalid
                              @enderror" name="example-text-input" placeholder="tuliskan nama buku" value="{{ old('nama_buku') ?? $student->nama_buku }}">
                              @error('nama_buku')
                              <div class="invalid-feedback">
                                {{ $message }}
                              @enderror
                            </div>
     <div class="mb-3">
                              <label class="form-label">kondisi buku</label>
                              <input type="text" name="kondisi_buku" class="form-control @error('kondisi_buku')
                                is-invalid
                              @enderror" name="example-text-input" placeholder="tuliskan kondisi buku" value="{{ old('kondisi_buku') ?? $student->kondisi_buku }}">
                              @error('kondisi_buku')
                              <div class="invalid-feedback">
                                {{ $message }}
                              @enderror
                            </div>
     <div class="mb-3">
                              <label class="form-label">tanggal peminjaman</label>
                              <input type="text" name="tanggal_peminjaman" class="form-control @error('tanggal_peminjaman')
                                is-invalid
                              @enderror" name="example-text-input" placeholder="isi tanggal peminjaman buku" value="{{  old('tanggal_peminjaman') ?? $student->tanggal_peminjaman }}">
                              @error('tanggal_peminjaman')
                              <div class="invalid-feedback">
                                {{ $message }}
                              @enderror
                            </div>
     <div class="mb-3">
                              <label class="form-label">tanggal pengembalian</label>
                              <input type="text" name="tanggal_pengembalian" class="form-control @error('tanggal_pengembalian')
                                is-invalid
                              @enderror" name="example-text-input" placeholder="isi tanggal pengembalian buku" value="{{  old('tanggal_pengembalian') ?? $student->tanggal_pengembalian }}">
                              @error('tanggal_pengembalian')
                              <div class="invalid-feedback">
                                {{ $message }}
                              @enderror
                            </div>
     <div class="mb-3">

     <input type="submit" value="simpan" class="btn btn-primary">
     
     </div>
    
    
    </form>
    </div>
</div>

@endsection
