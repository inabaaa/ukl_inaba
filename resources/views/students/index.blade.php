@extends('templates.default')

@php
    $title = 'Data Peminjaman Buku';
    $pretitle = 'Data Siswa';
@endphp

@push('page-action')

<a href="{{ route('students.create') }}" class="btn btn-primary">Tambah Data</a>
    
@endpush

@section('content')
<form action="" method="get">
        <input type="text" name="search" class="border border-gray-300 shadow  rounded p-3" placeholder="Cari data..." value="{{ request('search') }}">
    </form>

<div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Foto</th>
                          <th>Kelas</th>
                          <th>Nama Buku</th>
                          <th>Kondisi Buku</th>
                          <th>Tanggal Peminjaman</th>
                          <th>Tanggal Pengembalian</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($students as $student )
                            
                        <tr>
                          <td>{{ $student->nama }}</td>
                          <td>
                            <img src="{{ asset('storage/' . $student->photo) }}" height="120px" alt="">
                          </td>
                          <td>{{ $student->kelas }}</td>
                          <td>{{ $student->nama_buku }}</td>
                          <td>{{ $student->kondisi_buku }}</td>
                          <td>{{ $student->tanggal_peminjaman }}</td>
                          <td>{{ $student->tanggal_pengembalian }}</td>

                          <td>
                            <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <input type="submit" value="hapus" class="btn btn-danger btn-sm" >
                          </td>
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                    {{ $students->links() }}
                  </div>
                </div>
    
@endsection