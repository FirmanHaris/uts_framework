<?php

namespace App\Http\Controllers;

use App\Models\penanggungJawab;
use Illuminate\Http\Request;

class PicController extends Controller
{
    public function getView()
    {
        $data = penanggungJawab::all();
        $title = "Penanggung Jawab";
        return view('backend.pic.__pic', compact('data', 'title'));
    }
    public function insertData(Request $request)
    {
        $this->validate($request, [
            'nama_pic' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor' => 'required',
            'tgl_lahir' => 'required'
        ]);
        $data = new penanggungJawab();
        $data->nama_pic = $request->nama_pic;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->nomor = $request->nomor;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->save();
        return redirect('pic');
    }
    public function updateData(Request $request, $id)
    {
        $this->validate($request, [
            'nama_pic' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor' => 'required',
            'tgl_lahir' => 'required'
        ]);
        $data = penanggungJawab::findOrFail($id);
        $data->nama_pic = $request->nama_pic;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->nomor = $request->nomor;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->save();
        return redirect('pic');
    }
    public function deleteData($id)
    {
        penanggungJawab::destroy($id);
        return redirect('pic');
    }
}
