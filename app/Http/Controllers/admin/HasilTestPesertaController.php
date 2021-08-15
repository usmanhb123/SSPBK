<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Data_work_section;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
use App\Models\User;
use Illuminate\Http\Request;

class HasilTestPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] =  AUTH::user();
        $data['title'] = 'Hasil Test';
        $data['sub_menu'] = 'Data Hasil Test';
        $data['work_section'] = Data_work_section::where('is_active', 1)->get();


        return view('admin.hasiltest.hasiltest', $data);

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
        //
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
        $data['title'] = 'Hasil Test';
        $data['sub_menu'] = 'Data Hasil Test';
        $data['peserta'] = User::find($id);
      
        
        return view('admin.hasiltest.detailtest', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $role =Data_work_section::find($id);
            $date = date('d-M-Y');
            return Excel::download(new ExportUser($id), 'Work_section _'.$date.'_'.$role->nama_posisi.'.xlsx');
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
