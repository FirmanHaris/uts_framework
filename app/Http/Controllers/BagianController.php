<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    public function getview()
    {
        $data = Bagian::all();
        $title = 'Bagian';
        return view('backend.bagian.__bagian', compact('data', 'title'));
    }
    public function insertData(Request $request)
    {
        $this->validate($request, [
            'bagian' => 'required'
        ]);
        $addData = new Bagian();
        $addData->bagian = $request->bagian;
        $addData->save();
        // return dd($addData);
        return redirect('bagian')->with('success', 'Data Berhasil Di tambahkan');
    }
    public function updateData(Request $request, $id)
    {
        $this->validate($request, [
            'bagian' => 'required'
        ]);
        $data = Bagian::findOrFail($id);
        $data->bagian = $request->bagian;
        $data->save();
        // return dd($data);
        return redirect('bagian');
    }
    public function deleteData($id)
    {
        Bagian::destroy($id);
        return redirect('bagian');
    }
}
