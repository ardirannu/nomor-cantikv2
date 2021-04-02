<?php

namespace App\Http\Controllers\produk;

use App\Http\Controllers\Controller;
use App\Models\Nomor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Imports\NomorImport;
use Illuminate\Support\Facades\Session as FacadesSession;
use Maatwebsite\Excel\Facades\Excel;
use Session;

use function PHPUnit\Framework\returnValue;

class NomorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomor = Nomor::get();
        return view('admin/produk/nomor', ['nomor' => $nomor]);
        
    }

    private function _validation(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'detail_nomor' => 'required|min:10|max:14|unique:nomor',
            'operator' => 'required',
            'harga' => 'required|min:4',
            'jumlah_digit' => 'required',
        ],

        [
            'detail_nomor.required' => 'Form ini harus diisi !',
            'detail_nomor.min' => 'Minimal 10 Digit !',
            'detail_nomor.max' => 'Maksimal 12 Digit !',
            'detail_nomor.unique' => 'Data sudah ada !',
            'operator.required' => 'Form ini harus diisi !',
            'harga.required' => 'Form ini harus diisi !',
            'harga.min' => 'Minimal 4 Digit !',
            'jumlah_digit.required' => 'Form ini harus diisi !',
        ]);
    }

    private function _validation_update(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'detail_nomor' => 'required|min:10|max:14',
            'operator' => 'required',
            'harga' => 'required|min:4',
            'jumlah_digit' => 'required',
        ],

        [
            'detail_nomor.required' => 'Form ini harus diisi !',
            'detail_nomor.min' => 'Minimal 10 Digit !',
            'detail_nomor.max' => 'Maksimal 12 Digit !',
            'operator.required' => 'Form ini harus diisi !',
            'harga.required' => 'Form ini harus diisi !',
            'harga.min' => 'Minimal 4 Digit !',
            'jumlah_digit.required' => 'Form ini harus diisi !',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        if(count($request->detail_nomor) > 0){
            foreach($request->detail_nomor as $item=>$v){
                $data=array(
                    'detail_nomor'=>$request->detail_nomor[$item],
                    'operator'=>$request->operator[$item],
                    'harga'=>$request->harga[$item],
                    'jumlah_digit'=>$request->jumlah_digit[$item],
                    'created_at' => $current_date_time,
                    'updated_at' => $current_date_time,
                );
            Nomor::insert($data);
            }
        }
        return redirect()->route('nomor.index')->with('input_success','Berhasil Menambah Data !');
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
        $nomor = Nomor::find($id);
        return view('admin.produk.nomor-edit', ['nomor' => $nomor]);
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
        
        Nomor::where('id', $id)->update(['detail_nomor' => $request->detail_nomor, 'harga' => $request->harga, 'jumlah_digit' => $request->jumlah_digit,]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nomor::destroy($id);
        return redirect()->route('nomor.index');
    }

    public function updatestatus($id)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        Nomor::where('id', $id)->update(['status' => 'Terjual', 'tgl_jual' => $current_date_time]);
        return redirect()->route('nomor.index');
    }

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_export',$nama_file);
 
		// import data
		Excel::import(new NomorImport, public_path('/file_export/'.$nama_file));
 
        return redirect()->route('nomor.index')->with('input_success','Berhasil Menambah Data !');
	}

}
