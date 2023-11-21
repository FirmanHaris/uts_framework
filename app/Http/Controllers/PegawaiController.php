<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Bagian;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //
    public function getView()
    {
        $bag = Bagian::with('pegawai')->get();
        $data = Pegawai::with('bagian')->get();
        // dd($data);
        $title = "Pegawai";
        return view('backend.pegawai.__pegawai', compact('data', 'title', 'bag'));
    }
    public function insertData(Request $request)
    {
        $this->validate($request, [
            'id_bagian' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor' => 'required',
            'tgl_lahir' => 'required'
        ]);
        // dd($request)->all();
        $data = new Pegawai();
        $data->id_bagian = $request->id_bagian;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->nomor = $request->nomor;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->save();
        return redirect('pegawai');
        // return dd($data);
    }
    public function updateData(Request $request, $id)
    {
        $this->validate($request, [
            'id_bagian' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nomor' => 'required',
            'tgl_lahir' => 'required'
        ]);
        $data = Pegawai::findOrFail($id);
        $data->id_bagian = $request->id_bagian;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->nomor = $request->nomor;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->save();
        return redirect('pegawai');
    }
    public function deleteData($id)
    {
        Pegawai::destroy($id);
        return redirect('pegawai');
    }
}
