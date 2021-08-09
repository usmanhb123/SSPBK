<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Data_work_section;
use Illuminate\Http\Request;

class DataWorkSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] =  AUTH::user();
        $data['title'] = 'Data Work Section';
        $data['sub_menu'] = '0';
        $data['table'] = Data_work_section::all();
        return view('admin.datamaster.dataworksection', $data);
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
        $save = new Data_work_section;
        $save->nama_posisi = $request->nama_posisi;
        $save->keterangan = $request->keterangan;
        $save->is_active = $request->is_active;
        $save->save();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Work Section berhasil dibuat!');
      
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Data_work_section::where('id', $id)->delete();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Work Section berhasil dihapus!');
      
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
        $data = Data_work_section::where('id', $id)->first();
        
        if($data->is_active == 1){
            $is_active = 0;
        }else{
            $is_active = 1;
        }
        Data_work_section::where('id', $id)
          ->update(['is_active' => $is_active]);
    
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Perubahan Aktivasi Berhasil!');
      
        return redirect()->back();
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
        Data_work_section::where('id', $id)
          ->update(['nama_posisi' => $request->nama_posisi, 'keterangan' => $request->keterangan, 'is_active' => $request->is_active]);
    
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Work Section berhasil diedit!');
      
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
