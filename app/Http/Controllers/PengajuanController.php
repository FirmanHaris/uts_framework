<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kebutuhan;
use App\Models\Pegawai;
use App\Models\penanggungJawab;
use App\Models\Pengajuan;
use App\Models\Progres;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function getView()
    {
        $pegawai = Pegawai::all();
        $kebutuhan = Kebutuhan::all();
        $kategori = Kategori::all();
        $progres = Progres::all();
        $pic = penanggungJawab::all();
        $data = Pengajuan::with('pegawai', 'kebutuhan', 'kategori', 'progres', 'pic')->get();
        $title = "Pengajuan";
        return view('backend.pengajuan.__pengajuan', compact('data', 'title', 'pegawai', 'kebutuhan', 'kategori', 'progres', 'pic'));
    }
    public function insertData(Request $request)
    {
        $this->validate($request, [
            'id_pegawai' => 'required',
            'id_kebutuhan' => 'required',
            'id_kategori' => 'required',
            'id_progres' => 'required',
            'id_pic' => 'required',
            'tgl_pengajuan' => 'required'
        ]);
        $data = new Pengajuan();
        $data->id_pegawai = $request->id_pegawai;
        $data->id_kebutuhan = $request->id_kebutuhan;
        $data->id_kategori = $request->id_kategori;
        $data->id_progres = $request->id_progres;
        $data->id_pic = $request->id_pic;
        $data->tgl_pengajuan = $request->tgl_pengajuan;
        $data->save();
        return redirect('pengajuan');
    }
    public function updateData(Request $request, $id)
    {
        $this->validate($request, [
            'id_pegawai' => 'required',
            'id_kebutuhan' => 'required',
            'id_kategori' => 'required',
            'id_progres' => 'required',
            'id_pic' => 'required',
            'tgl_pengajuan' => 'required'
        ]);
        $data = Pengajuan::findOrFail($id);
        $data->id_pegawai = $request->id_pegawai;
        $data->id_kebutuhan = $request->id_kebutuhan;
        $data->id_kategori = $request->id_kategori;
        $data->id_progres = $request->id_progres;
        $data->id_pic = $request->id_pic;
        $data->tgl_pengajuan = $request->tgl_pengajuan;
        $data->save();
        return redirect('pengajuan');
    }
    public function deleteData($id)
    {
        Pengajuan::destroy($id);
        return redirect('pengajuan');
    }
}
