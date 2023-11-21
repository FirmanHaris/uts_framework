<?php

namespace App\Http\Controllers;

use App\Models\Progres;
use Illuminate\Http\Request;

class ProgresController extends Controller
{
    public function getView()
    {
        $data = Progres::all();
        $title = 'Progres';
        return view('backend.progres.__progres', compact('data', 'title'));
    }
    public function insertData(Request $request)
    {
        $this->validate($request, [
            'progres' => 'required'
        ]);
        $data = new Progres();
        $data->progres = $request->progres;
        $data->save();
        return redirect('progres');
    }
    public function updatedata(Request $request, $id)
    {
        $this->validate($request, [
            'progres' => 'required'
        ]);
        $data = Progres::findOrFail($id);
        $data->progres = $request->progres;
        $data->save();
        return redirect('progres');
    }
    public function deleteData($id)
    {
        Progres::destroy($id);
        return redirect('progres');
    }
}
