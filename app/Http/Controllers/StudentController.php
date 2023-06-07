<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::query();

        if($request->has('search') && $request->search != '') {
            $students = $students->where('nama', 'like', "%{$request->search}%");
        }
       return view('students.index' , [
        'students' => $students->simplePaginate(3),
       ]);
    }

    public function create()
    {
        return view('students.create', [
            'students' => Student::get(),
        ]);
        
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'nama'=> ['required', 'min:3'],
            'kelas'=> ['required', 'min:3'],
            'nama_buku'=> ['required', 'min:3'],
            'kondisi_buku'=> ['required', 'min:3'],
            'tanggal_peminjaman'=> ['required', 'min:3'],
            'tanggal_pengembalian'=> ['required', 'min:3'],
            'photo' => ['image'],
        
        ]);

        $photo = '';

        if($request->hasfile('photo')) {

            $photo = $request->file('photo')->store('photos');
        }
        $student = new Student();

        $student->nama = $request->nama;
        $student->kelas = $request->kelas;
        $student->nama_buku = $request->nama_buku;
        $student->kondisi_buku = $request->kondisi_buku;
        $student->tanggal_peminjaman = $request->tanggal_peminjaman;
        $student->tanggal_pengembalian = $request->tanggal_pengembalian;
        $student->photo = $photo;

        $student->save();

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('students.index');
      
    }

    public function edit($id)
    {
       $student = Student::find($id);

       return view ('students.edit',[

       'student' => $student,
       ]);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[

            'nama'=> ['required', 'min:3'],
            'kelas'=> ['required', 'min:3'],
            'nama_buku'=> ['required', 'min:3'],
            'kondisi_buku'=> ['required', 'min:3'],
            'tanggal_peminjaman'=> ['required', 'min:3'],
            'tanggal_pengembalian'=> ['required', 'min:3'],
        
        ]);
        $student = Student::find($id);

        $student->nama = $request->nama;
        $student->kelas = $request->kelas;
        $student->nama_buku = $request->nama_buku;
        $student->kondisi_buku = $request->kondisi_buku;
        $student->tanggal_peminjaman = $request->tanggal_peminjaman;
        $student->tanggal_pengembalian = $request->tanggal_pengembalian;

        $student->save();

        session()->flash('info', 'Data Berhasil Diubah');

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        session()->flash('danger', 'Data Berhasil Dihapus');

        return redirect()->route('students.index');
    }
}
