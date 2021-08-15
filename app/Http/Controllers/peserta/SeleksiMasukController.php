<?php

namespace App\Http\Controllers\peserta;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Data_ujian;
use App\Models\Data_jawaban_ujian;
use App\Models\Data_token;
use App\Models\Data_nilai_ujian;
use App\Models\Master_soal;
use App\Models\Data_soal;
use Illuminate\Http\Request;

class SeleksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] =  AUTH::user();
         $data['title'] = 'Seleksi Masuk';
         $data['sub_menu'] = '0';
         $data['data_ujian'] = Data_ujian::where('data_work_section_id', AUTH::user()->data_work_section_id)->where('is_active', 1)->get();

        return view('peserta.ujian.pilihjadwal', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengerjaanujian(Request $request, $id)
    {
        $cekselesai = Data_nilai_ujian::where('data_ujian_id', $id)->where('users_id', AUTH::user()->id)->first();
        if($cekselesai){
            if($cekselesai->selesai == 1){
            $request->session()->flash('warna', 'danger');
            $request->session()->flash('status', 'Anda hanya mempunyai satu kesempatan untuk mengerjakan ujian tersebut!');
          
            return redirect()->back();
            }
        }
        $data['user'] =  AUTH::user();
        $user =  AUTH::user();

        $ceksession = $request->session()->get('durasi');
        if($ceksession == NULL){

            $request->session()->flash('warna', 'danger');
            $request->session()->flash('status', 'Masukkan token terlebih dahulu!');
          
            return redirect()->back();
        }
        $data['id'] = $id;
        $data['durasi'] = $ceksession;
        $data_ujian = Data_ujian::find($id);
        $data['data_ujian'] = Data_ujian::find($id);
        $master_soal = Master_soal::find($data_ujian->master_soal_id);
        if($data_ujian->acak_soal == NULL){

            $data['soal'] = Data_soal::where('master_soal_id', $master_soal->id)->paginate(1);
            $data['soalall'] = Data_soal::where('master_soal_id', $master_soal->id)->get();
        }else{
            $cak = $user->id % 1;
            if($cak == 1){

                $data['soal'] = Data_soal::where('master_soal_id', $master_soal->id)->orderBy('id', 'asc')->paginate(1);
                $data['soalall'] = Data_soal::where('master_soal_id', $master_soal->id)->orderBy('id', 'asc')->get();
            }else{

                $data['soal'] = Data_soal::where('master_soal_id', $master_soal->id)->orderBy('id', 'desc')->paginate(1);
                $data['soalall'] = Data_soal::where('master_soal_id', $master_soal->id)->orderBy('id', 'desc')->get();
            }

        }
       
        return view('peserta.ujian.pengerjaan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = Data_token::where('created_at', '!=', NULL)->first();
        $ujian = Data_ujian::find($request->id);
        $waktu = $ujian->waktu_ujian ;
        $time= ($waktu * 60) + time() - 39600;
        $p = date('Y-m-d H:i:s', $time);
        // dd($p);
        if($token->token == $request->token){

            $request->session()->put('durasi', $p);

            return redirect('/ujianberlangsung/'.$request->id);
        }else{
            $request->session()->flash('warna', 'danger');
            $request->session()->flash('status', 'Token Salah!');
          
            return redirect()->back();
        }
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
         $data['title'] = 'Seleksi Masuk';
         $data['sub_menu'] = '0';
         $data['data_ujian'] = Data_ujian::where('id', $id)->first();
         $data['cek_selesai'] = Data_nilai_ujian::where('users_id', AUTH::user()->id)->where('data_ujian_id', $id)->first();

        return view('peserta.ujian.detiljadwal', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selesaiujian(Request $request, $id)
    {

        $data_ujian = Data_ujian::find($id);
        $master_soal = Master_soal::find($data_ujian->master_soal_id);
        $soales = Data_soal::where('master_soal_id', $master_soal->id)->where('type_soal', "Essay")->first();
        $soalpg = Data_soal::where('master_soal_id', $master_soal->id)->where('type_soal', "Pilihan Ganda")->get();
        $soaljs = Data_soal::where('master_soal_id', $master_soal->id)->where('type_soal', "Jawaban Singkat")->get();
        $poinpg = 0;
        $poinjs = 0;
        foreach($soalpg as $as){
            $jawaban = Data_jawaban_ujian::where('data_soal_id', $as->id)->where('users_id', AUTH::user()->id)->where('data_ujian_id', $id)->first(); 
            if($jawaban){

                if($jawaban->data_soal_jawaban->status == $as->kunci_jawaban){
                 $poinpg = $as->bobot_nilai + $poinpg;
                } 
            }
         }
         foreach($soaljs as $js){
            $jawaban = Data_jawaban_ujian::where('data_soal_id', $js->id)->where('users_id', AUTH::user()->id)->where('data_ujian_id', $id)->first(); 
            if($jawaban){

                if($jawaban->jawaban_essay == $js->kunci_jawaban){
                 $poinjs = $js->bobot_nilai + $poinjs;
                } 
            }
         }
         $poinsementara = $poinpg + $poinjs;

         if($soales){
             $selesai = new Data_nilai_ujian;
             $selesai->data_ujian_id = $id;
             $selesai->users_id = AUTH::user()->id;
             $selesai->nilai_sementara = $poinsementara;
             $selesai->save();
            }else{
                $selesai = new Data_nilai_ujian;
                $selesai->data_ujian_id = $id;
                $selesai->users_id = AUTH::user()->id;
                $selesai->nilai_sementara = $poinsementara;
                $selesai->nilai_akhir = $poinsementara;
                $selesai->save();
        }



       $request->session()->forget('durasi');
       $request->session()->flash('warna', 'success');
       $request->session()->flash('status', 'Ujian telah berakhir!');
     
       return redirect('/seleksitestmasuk');
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
    public function savejawaban(Request $request)
    {
        $soal = Data_soal::find($request->data_soal_id);
        if($request->jawaban == NULL){
            $cek_nomor = Master_soal::find($soal->master_soal_id)->count();
            if($request->nomor > $cek_nomor){
                $nomor = 1;
            }else{
                $nomor = $request->nomor;
            }
            return redirect('ujianberlangsung/'.$request->data_ujian_id.'?page='.$nomor);
        }
        $cek = Data_jawaban_ujian::where('data_soal_id', $request->data_soal_id)->where('data_ujian_id', $request->data_ujian_id)->where('users_id', AUTH::user()->id)->first();

        if($cek != NULL){
            Data_jawaban_ujian::where('data_soal_id', $request->data_soal_id)->where('data_ujian_id', $request->data_ujian_id)->where('users_id', AUTH::user()->id)->delete();
        }
        if($soal->type_soal == "Pilihan Ganda"){

            $jwb = new Data_jawaban_ujian;
            $jwb->data_soal_id = $request->data_soal_id;
            $jwb->data_ujian_id = $request->data_ujian_id;
            $jwb->users_id = AUTH::user()->id;
            $jwb->data_soal_jawaban_id = $request->jawaban;
            $jwb->save();
        }else{
            $jwb = new Data_jawaban_ujian;
            $jwb->data_soal_id = $request->data_soal_id;
            $jwb->data_ujian_id = $request->data_ujian_id;
            $jwb->users_id = AUTH::user()->id;
            $jwb->jawaban_essay = $request->jawaban;
            $jwb->save(); 
        }

        $cek_nomor = Master_soal::find($soal->master_soal_id)->count();
        if($request->nomor > $cek_nomor){
            $nomor = 1;
        }else{
            $nomor = $request->nomor;
        }
        return redirect('ujianberlangsung/'.$request->data_ujian_id.'?page='.$nomor);
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
