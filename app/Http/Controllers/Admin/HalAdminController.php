<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Book;
use Illuminate\Http\Request;

class HalAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
    {
        // Mendapatkan nilai pencarian dari permintaan HTTP
        $search = $request->query('search');

        // Query untuk mengambil data buku sesuai dengan kriteria pencarian
        $books = Book::query();

        // Jika ada pencarian, tambahkan kondisi pencarian ke query
        if ($search) {
            $books->where('nama_buku', 'like', '%' . $search . '%');
        }

        // Ambil data buku
        $books = $books->get();

        // Kirim data books ke tampilan 'Admin.HalamanAdmin' bersama nilai pencarian
        return view('Admin.HalamanAdmin', compact('books', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.AddBookAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
        // Validasi data dari formulir
        $validatedData = $request->validate([
            'id_buku' => 'required',
            'nama_buku' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        // Membuat entri baru di dalam database
        $book = new Book();
        $book->id_buku = $validatedData['id_buku'];
        $book->nama_buku = $validatedData['nama_buku'];
        $book->kategori = $validatedData['kategori'];
        $book->penerbit = $validatedData['penerbit'];
        $book->stok = $validatedData['stok'];
        $book->harga = $validatedData['harga'];
        $book->save();

        // Redirect ke halaman indeks buku
        return redirect()->route('HalAdmin.index')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mengambil data buku dari database berdasarkan ID yang diberikan
        $books = Book::findOrFail($id);
        
        // Memuat view 'Admin.DetailBookAdmin' dan meneruskan data buku ke dalam view
        return view('Admin.DetailBookAdmin', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('Admin.EditBookAdmin', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Validasi data buku yang diupdate
    $request->validate([
        'id_buku' => 'required',
        'nama_buku' => 'required',
        'kategori' => 'required',
        'penerbit' => 'required',
        'stok' => 'required|numeric',
        'harga' => 'required|numeric',
    ]);

    // Ambil data buku yang ingin diupdate
    $book = Book::findOrFail($id);

    // Perbarui nilai-nilai buku
    $book->id_buku = $request->id_buku;
    $book->nama_buku = $request->nama_buku;
    $book->kategori = $request->kategori;
    $book->penerbit = $request->penerbit;
    $book->stok = $request->stok;
    $book->harga = $request->harga;

    // Simpan perubahan
    $book->save();

    return redirect()->route('HalAdmin.index')->with('success', 'Data buku berhasil diperbarui.');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('HalAdmin.index')->with('success', 'Buku berhasil dihapus.');
    }
}
