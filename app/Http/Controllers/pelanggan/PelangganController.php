<?php

namespace App\Http\Controllers\pelanggan;
 
use App\Http\Controllers\Controller;
use App\Models\Nomor;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomor = Nomor::where('status', 'Terjual')->get();
        $pelanggan = Pelanggan::get(); //send data nomor to nomor.index for input form
        return view('admin.pelanggan', ['pelanggan' => $pelanggan, 'nomor' => $nomor,]);
    }

    private function _validation(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required', 
            'nomor_id' => 'unique:pelanggan', 
        ],

        [
            'nama.required' => 'Form ini harus diisi !',
            'alamat.required' => 'Form ini harus diisi !',
            'jenis_kelamin.required' => 'Form ini harus diisi !',
            'no_hp.required' => 'Form ini harus diisi !',
            'nomor_id.unique' => 'Produk ini sudah dibeli pelanggan lain !',
        ]);
    }

    private function _validation_update(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required', 
            'nomor_id' => 'required', 
        ],

        [
            'nama.required' => 'Form ini harus diisi !',
            'alamat.required' => 'Form ini harus diisi !',
            'jenis_kelamin.required' => 'Form ini harus diisi !',
            'no_hp.required' => 'Form ini harus diisi !',
            'nomor_id.required' => 'Form ini harus diisi !',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);

        Pelanggan::create($request->all());  
        return redirect()->route('pelanggan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::find($id);
        $nomor = Nomor::where('status', 'Terjual')->get(); //send data nomor to nomor.index for input form
        return view('admin.pelanggan-edit', ['pelanggan' => $pelanggan, 'nomor' => $nomor,]);
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
        $this->_validation_update($request);
        
        Pelanggan::where('id', $id)->update(['nama' => $request->nama, 'alamat' => $request->alamat, 'jenis_kelamin' => $request->jenis_kelamin, 'no_hp' => $request->no_hp, 'nomor_id' => $request->nomor_id,]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return redirect()->route('pelanggan.index');
    }
}
