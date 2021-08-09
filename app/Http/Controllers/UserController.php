<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Users;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] =  AUTH::user();
        $id = AUTH::user()->id;
        $data['role'] = Users::find($id);
        $data['title'] = 'User Profile';
        $data['sub_menu'] = '0';
        return view('user.profile', $data);
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
            'file' => 'image|mimes:jpg,jpeg,png'
        ]);
        $file = $request->file('file');
        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'img/profile_user';
 
        // upload file
        
        $id = AUTH::User()->id;
        $gambarlama = AUTH::User()->image;
        if($file){
        $namafile = time().'-'.$file->getClientOriginalName();
        $file->move($tujuan_upload,$namafile);
        if($gambarlama != "user.webp"){
        unlink(public_path('img/profile_user/'.$gambarlama));
        }
        Users::where('id', $id)
        ->update(['name' => $request->name, 'telepon' => $request->telepon, 'alamat' => $request->alamat, 'maps' => $request->maps, 'image' => $namafile]);    
        }else{
        Users::where('id', $id)
        ->update(['name' => $request->name, 'telepon' => $request->telepon, 'alamat' => $request->alamat, 'maps' => $request->maps]);
        }
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Your profile has been successfully edited!');
      
        return redirect('/user');
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
        $data['user'] =  AUTH::user();
        $id = AUTH::user()->id;
        $data['role'] = Users::find($id);
        $data['title'] = 'User Profile';
        $data['sub_menu'] = '0';
        return view('user.editprofile', $data);
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
        Users::where('id', $id)
        ->update(['mode_gelap' => $request->mode]);
    
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
