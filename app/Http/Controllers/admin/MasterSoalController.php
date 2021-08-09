<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master_soal;
use Illuminate\Http\Request;

class MasterSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] =  AUTH::user();
        $data['title'] = 'Master Soal';
        $data['sub_menu'] = 'Settings Ujian/Test';
        $data['master'] = Master_soal::all();

       return view('admin.settingsujian.mastersoal', $data);
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
        $this->validate($request, [
            'file' => 'image|mimes:jpg,jpeg,png,svg'
        ]);
        $file = $request->file('file');
        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'img/master_soal';
        
        $namafile = time().'_'.$file->getClientOriginalName();
        $file->move($tujuan_upload,$namafile);

        $save = new Master_soal;
        $save->nama = $request->nama;
        $save->cover = $namafile;
        $save->keterangan = $request->keterangan;
        $save->save();


        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Master soal berhasil dibuat!');
      
        return redirect()->back();
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = Master_soal::where('id', $id)->first();
        unlink(public_path('/img/master_soal/'.$data->cover));

        Master_soal::where('id', $id)->delete();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Master soal berhasil dihapus!');
      
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] =  AUTH::user();
        $data['title'] = 'Master Soal';
        $data['sub_menu'] = 'Settings Ujian/Test';
        $data['master'] = Master_soal::find($id);

       return view('admin.settingsujian.datasoal', $data);
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
        $this->validate($request, [
            'file' => 'image|mimes:jpg,jpeg,png,svg'
        ]);
        $file = $request->file('file');
        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'img/master_soal';
        if($file){
            
            $namafile = time().'_'.$file->getClientOriginalName();
            $file->move($tujuan_upload,$namafile);
            
            unlink(public_path('/img/master_soal/'.$request->coverlama));
        }else{
            $namafile = $request->coverlama;
        }

        $up = Master_soal::where('id', $id)->update([
            'nama' => $request->nama,
            'cover' => $namafile,
            'keterangan' => $request->keterangan
        ]);
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Master soal berhasil diedit!');
      
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
