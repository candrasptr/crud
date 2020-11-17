<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    private function _validation(Request $request){
        $validation = $request->validate([
            'kodebarang' => 'required|max:10',
            'namabarang' => 'required|max:10'
        ],
        [
            'kodebarang.required' => 'Harus diisi',
            'kodebarang.max' => 'Jangan lebih dari 10 huruf',
            'namabarang.required' => 'Harus diisi',
            'namabarang.max' => 'Jangan lebih dari 10 huruf'
        ]
    );
    }

    public function index()
    {
    	$data_barang = DB::table('barang')->paginate(2);
    	return view('crud', ['data_barang' => $data_barang]);
    }

    public function tambah()
    {
    	return view('tambah');
    }

    public function simpan(Request $request)
    {
        $this->_validation($request);
    	DB::table('barang')->insert(
    	    ['kode_barang' => $request->kodebarang, 'nama_barang' => $request->namabarang],
    	);

    	return redirect()->route('crud')->with('message','Data berhasil disimpan');
    }

    public function edit($id)
    {
        $barang = DB::table('barang')->where('id', $id)->first();

        return view('edit',['barang'=>$barang]);
    }

    public function delete($id)
    {
        DB::table('barang')->where('id', $id)->delete();

        return redirect()->back()->with('message','Data berhasil dihapus');
    }

    public function update(Request $request,$id)
    {
        $this->_validation($request);
        DB::table('barang')->where('id', $id)->update([
            'kode_barang' => $request->kodebarang,
            'nama_barang' => $request->namabarang
        ]);

        return redirect()->route('crud')->with('message','Data berhasil diedit');
    }
}
