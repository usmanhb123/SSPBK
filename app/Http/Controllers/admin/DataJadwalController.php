<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Data_work_section;
use App\Models\Data_ujian;
use App\Models\Master_soal;
use Illuminate\Http\Request;

class DataJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] =  AUTH::user();
        $data['title'] = 'Jadwal Ujian/Test';
        $data['sub_menu'] = 'Settings Ujian/Test';
        $data['work_section'] = Data_work_section::where('is_active', 1)->get();
        $data['data_ujian'] = Data_ujian::orderBy('id', 'desc')->get();
        return view('admin.settingsujian.datajadwal', $data);
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
        $id = time();
        $jadwal = new Data_ujian;
        $jadwal->id = $id;
        $jadwal->data_work_section_id = $request->work_section;
        $jadwal->nama_ujian = $request->nama;
        $jadwal->deskripsi = $request->deskripsi;
        $jadwal->tanggal_mulai = $request->tanggal_mulai;
        $jadwal->tanggal_selesai = $request->tanggal_selesai;
        $jadwal->waktu_ujian = $request->waktu_ujian;
        $jadwal->nilai_minimum = $request->nilai_minimum;
        $jadwal->acak_soal = $request->acak_soal;
        $jadwal->is_active = 1;
        $jadwal->save();

        return redirect('/datajadwal/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] =  AUTH::user();
        $data['title'] = 'Jadwal Ujian/Test';
        $data['sub_menu'] = 'Settings Ujian/Test';
        $data['master'] = Master_soal::all();
        $data['data_ujian'] = Data_ujian::find($id);

       return view('admin.settingsujian.pilihmastersoal', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $data = Data_ujian::where('id', $id)->first();
        
        if($data->is_active == 1){
            $is_active = 0;
        }else{
            $is_active = 1;
        }
        Data_ujian::where('id', $id)
          ->update(['is_active' => $is_active]);
    
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Perubahan Aktivasi Berhasil!');
      
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function pilihmastersoal(Request $request, $master_soal_id, $data_ujian_id)
    {
        Data_ujian::where('id', $data_ujian_id)->update(['master_soal_id' => $master_soal_id]);
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Master soal berhasil dipilih!');
      
        return redirect('/datajadwal');
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
        
        Data_ujian::where('id', $id)->update([
            'data_work_section_id' => $request->work_section,
            'nama_ujian' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'waktu_ujian' => $request->waktu_ujian,
            'nilai_minimum' => $request->nilai_minimum,
            'acak_soal' => $request->acak_soal
    ]);
    $request->session()->flash('warna', 'success');
    $request->session()->flash('status', 'Jadwal berhasil diedit!');
  
    return redirect('/datajadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Data_ujian::where('id', $id)->delete();

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Jadwal berhasil dihapus!');
      
        return redirect('/datajadwal');
    }
}
