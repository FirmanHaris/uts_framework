<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function getView()
    {
        $data = Kategori::all();
        $title = 'Kategori';
        return view('backend.kategori.__kategori', compact('data', 'title'));
    }
    public function insertData(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required'
        ]);
        $data = new Kategori();
        $data->kategori = $request->kategori;
        $data->save();
        return redirect('kategori');
    }
    public function updateData(Request $request, $id)
    {
        $this->validate($request, [
            'kategori' => 'required'
        ]);
        $data = Kategori::findOrFail($id);
        $data->kategori = $request->kategori;
        $data->save();
        return redirect('kategori');
    }
    public function deleteData($id)
    {
        Kategori::destroy($id);
        return redirect('kategori');
    }
}
