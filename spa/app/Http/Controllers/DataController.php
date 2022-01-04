<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $data = data::all();
        return response()->json($data);

    }

    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'message' => 'required',
        // ]);
        $data = new data();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->save();

        return redirect('/data')->with('success', 'Data Submitted');
    }

    public function show($id)
    {
        $data = data::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = data::find($id);
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->save();

        return redirect('/data')->with('success', 'Data Updated');
    }

    public function destroy($id)
    {
        $data = data::find($id);
        $data->delete();

        return redirect('/data')->with('success', 'Data Deleted');
    }

    public function showUser($id)
    {
        $data = User::find($id);
        return response()->json($data);
    }
}
