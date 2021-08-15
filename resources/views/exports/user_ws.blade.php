@php
use App\Models\User;
use App\Models\Data_ujian;
use App\Models\Data_nilai_ujian;




$user = User::where('data_work_section_id', $data_ws->id)->get();
$data_ujian = Data_ujian::where('data_work_section_id', $data_ws->id)->get();
@endphp

<h3>Data Peserta {{$data_ws->nama_posisi}}</h3>
                                        
<table>
    <thead>
        <tr>
            <th rowspan="2">NIK</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">Telepon</th>
            <th rowspan="2">Email</th>
            <th rowspan="2">Alamat</th>

            @foreach ($data_ujian as $du)
                <th colspan="2">{{$du->nama_ujian}}</th>
            @endforeach

        </tr>
        <tr> 
            @foreach ($data_ujian as $dj)
                <th>Minimum</th>
                <th>Hasil Test</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            
        <tr>
            <td>{{$item->nik}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->telepon}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->alamat}}</td>

            @foreach ($data_ujian as $duj)
                @php
                     $nilai = Data_nilai_ujian::where('users_id', $item->id)->where('data_ujian_id', $duj->id)->first();
                @endphp
                <td>{{$duj->nilai_minimum}}</td>
                @if($nilai)
                <td>{{$nilai->nilai_akhir}}</td>
                @else
                <td>-</td>
                @endif
            @endforeach

            
        </tr>
        @endforeach
    
    </tbody>
</table>