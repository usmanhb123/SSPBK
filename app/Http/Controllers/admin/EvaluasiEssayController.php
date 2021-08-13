<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\Data_work_section;
use App\Models\Data_ujian;
use App\Models\Data_nilai_ujian;
use App\Models\Master_soal;
use App\Models\Data_soal;
use App\Models\User;
use Illuminate\Http\Request;

class EvaluasiEssayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] =  AUTH::user();
         $data['title'] = 'Evaluasi Essay';
         $data['sub_menu'] = 'Data Hasil Test';
         $data['work_section'] = Data_work_section::where('is_active', 1)->get();


        return view('admin.hasiltest.evaluasiessay', $data);
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
        Data_nilai_ujian::where('users_id', $request->users_id)->where('data_ujian_id', $request->data_ujian_id)->update(['nilai_akhir' => $request->point]);
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Nilai berhasil disimpan!');
       
        return redirect('/evaluasiessay/'.$request->data_ujian_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data_jadwal'] = Data_ujian::find($id);
        $data['user'] =  AUTH::user();
        $data['title'] = 'Evaluasi Essay';
        $data['sub_menu'] = 'Data Hasil Test';
        $data['nilai_ujian'] = Data_nilai_ujian::where('data_ujian_id', $id)->where('nilai_akhir', NULL)->get();
        $data['nilai_ujian_selesai'] = Data_nilai_ujian::where('data_ujian_id', $id)->where('nilai_akhir', '!=', NULL)->get();
        $data['no'] = 0;

       return view('admin.hasiltest.pilihpeserta', $data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function koreksi($id, $id_ujian)
    {
        $data['data_jadwal'] = Data_ujian::find($id_ujian);
        $data['user'] =  AUTH::user();
        $data['title'] = 'Evaluasi Essay';
        $data['sub_menu'] = 'Data Hasil Test';
        $data['nilai_ujian'] = Data_nilai_ujian::where('data_ujian_id', $id_ujian)->where('users_id', $id)->first();
        $data['master_soal'] = Master_soal::find($data['data_jadwal']->master_soal_id);
        $data['data_soal'] = Data_soal::where('master_soal_id',  $data['master_soal']->id)->where('type_soal', 'Essay')->get();
        $data['peserta'] = User::find($id);
        // dd($data['nilai_ujian']);
       return view('admin.hasiltest.koreksi', $data); 
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
        //
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
