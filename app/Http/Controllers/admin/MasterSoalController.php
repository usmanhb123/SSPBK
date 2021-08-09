<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master_soal;
use App\Models\Data_soal;
use App\Models\Data_soal_jawaban;
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
    public function editsoal($id)
    {
        echo("berhasil");
    }
    public function hapussoal(Request $request, $id)
    {
        $data = Data_soal::where('id', $id)->first();
        if($data->file){

            unlink(public_path('/img/media_soal/'.$data->file));
        }

        Data_soal::where('id', $id)->delete();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Soal berhasil dihapus!');
      
        return redirect()->back();
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
        $data['datasoal'] = Data_soal::where('master_soal_id', $id)->get();
        $data['datasoalcek'] = Data_soal::where('master_soal_id', $id)->first();

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
    public function pilihanganda(Request $request)
    {
        
        $file = $request->file('file');
        
        $tujuan_upload = 'img/media_soal';
        if($file){  
            $namafile = time().'_'.$file->getClientOriginalName();
            $file->move($tujuan_upload,$namafile);
        }else{
            $namafile = NULL;
        }
        $id = time();
        $data = new Data_soal;
        $data->id = $id;
        $data->master_soal_id = $request->master_soal_id;
        $data->isi_soal = htmlspecialchars($request->isi_soal);
        $data->file = $namafile;
        $data->bobot_nilai = $request->bobot;
        $data->kunci_jawaban = $request->jawaban_benar;
        $data->type_soal = "Pilihan Ganda";
        $data->save();

        if($request->a){
        $a = new Data_soal_jawaban;
        $a->data_soal_id = $id;
        $a->isi_jawaban = htmlspecialchars($request->a);
        $a->status = "A";
        $a->save();
        }
        if($request->b){
        $b = new Data_soal_jawaban;
        $b->data_soal_id = $id;
        $b->isi_jawaban = htmlspecialchars($request->b);
        $b->status = "B";
        $b->save();
        }
        if($request->c){
        $c = new Data_soal_jawaban;
        $c->data_soal_id = $id;
        $c->isi_jawaban = htmlspecialchars($request->c);
        $c->status = "C";
        $c->save();
        }
        if($request->d){
        $d = new Data_soal_jawaban;
        $d->data_soal_id = $id;
        $d->isi_jawaban = htmlspecialchars($request->d);
        $d->status = "D";
        $d->save();
        }if($request->e){
        $e = new Data_soal_jawaban;
        $e->data_soal_id = $id;
        $e->isi_jawaban = htmlspecialchars($request->e);
        $e->status = "E";
        $e->save();
        }

        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Soal berhasil dibuat!');
      
        return redirect()->back();


    }
    public function essay(Request $request)
    {
        
        $file = $request->file('file');
        
        $tujuan_upload = 'img/media_soal';
        if($file){  
            $namafile = time().'_'.$file->getClientOriginalName();
            $file->move($tujuan_upload,$namafile);
        }else{
            $namafile = NULL;
        }
        $id = time();
        $data = new Data_soal;
        $data->id = $id;
        $data->master_soal_id = $request->master_soal_id;
        $data->isi_soal = htmlspecialchars($request->isi_soal);
        $data->file = $namafile;
        $data->bobot_nilai = NULL;
        $data->kunci_jawaban = NULL;
        $data->type_soal = "Essay";
        $data->save();


        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Soal berhasil dibuat!');
      
        return redirect()->back();


    }
    public function jawabansingkat(Request $request)
    {
        
        $file = $request->file('file');
        
        $tujuan_upload = 'img/media_soal';
        if($file){  
            $namafile = time().'_'.$file->getClientOriginalName();
            $file->move($tujuan_upload,$namafile);
        }else{
            $namafile = NULL;
        }
        $id = time();
        $data = new Data_soal;
        $data->id = $id;
        $data->master_soal_id = $request->master_soal_id;
        $data->isi_soal = htmlspecialchars($request->isi_soal);
        $data->file = $namafile;
        $data->bobot_nilai = $request->bobot;
        $data->kunci_jawaban = $request->jawaban_benar;
        $data->type_soal = "Jawaban Singkat";
        $data->save();


        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Soal berhasil dibuat!');
      
        return redirect()->back();


    }
}
