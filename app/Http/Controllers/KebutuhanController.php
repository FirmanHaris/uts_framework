<?php

namespace App\Http\Controllers;

use App\Models\Kebutuhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KebutuhanController extends Controller
{
    public function getView()
    {
        $data = Kebutuhan::all();
        $title = 'Kebutuhan';
        return view('backend.kebutuhan.__kebutuhan', compact('data', 'title'));
    }
    public function insertData(Request $request)
    {
        $this->validate($request, [
            'jenis' => 'required',
            'tentang' => 'required',
            'deskripsi' => 'required',
            'level' => 'required',
            'foto' => 'required'
        ]);
        $data = Kebutuhan::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoKebutuhan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('kebutuhan');
    }
    public function updateData(Request $request, $id)
    {

        $this->validate($request, [
            'jenis' => 'required',
            'tentang' => 'required',
            'deskripsi' => 'required',
            'level' => 'required',
            'foto' => 'required'
        ]);
        $data = Kebutuhan::find($id);
        $data->jenis = $request->jenis;
        $data->tentang = $request->tentang;
        $data->deskripsi = $request->deskripsi;
        $data->level = $request->level;
        $data->foto = $request->foto;
        if ($request->file('foto')) {
            $request->file('foto')->move('fotoKebutuhan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            // hapus foto lama
            Storage::delete('fotoKebutuhan/', $data->foto);
        }
        $data->save();
        return redirect('kebutuhan');
    }
    public function deleteData($id)
    {
        $id_data = Kebutuhan::findOrFail($id);
        $file = public_path('/fotoKebutuhan/') . $id_data->foto;
        if (file_exists($file)) {
            @unlink($file);
        }
        $id_data->delete();
        return redirect('kebutuhan');
    }
}
