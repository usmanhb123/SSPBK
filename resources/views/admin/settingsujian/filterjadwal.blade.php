@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="page-header">
            <h4 class="page-title">Jadwal Ujian/Test</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data Master</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Settings Ujian/Test</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Jadwal Ujian/Test</a>
                </li>
            </ul>
        </div>
           @include('layouts.alert')
         




           <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Jadwal Ujian/Test {{$find->nama_posisi}}</h4>
                        <button class="btn btn-primary btn-round btn-sm ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Data Jadwal
                        </button>
                        <div class="dropdown">
                        <button class="btn btn-sm btn-round btn-secondary ml-2" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-server"></i> Filter</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($work_section as $item)
                            
                            <a class="dropdown-item" href="{{url('/filterjadwal/'.$item->id)}}">{{$item->nama_posisi}}</a>
                            @endforeach
                          </div>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h2 class="modal-title">
                                        <span class="fw-mediumbold">
                                        Tambah</span> 
                                        <span class="fw-light">
                                            Jadwal Ujian/Test
                                        </span>
                                    </h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('/datajadwal')}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="defaultSelect">Work Section</label>
                                                    <select class="form-control form-control" id="defaultSelect" name="work_section" required>
                                                   @foreach ($work_section as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_posisi}}</option>
                                                   @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="nama">Nama Ujian</label>
                                                    <input id="nama" class="form-control" type="text" name="nama" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="mulai">Tanggal Mulai</label>
                                                    <input id="mulai" class="form-control" type="date" name="tanggal_mulai" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="selesai">Tanggal Selesai</label>
                                                    <input id="selesai" class="form-control" type="date" name="tanggal_selesai" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="wkt">Durasi Ujian</label>
                                                    <input id="wkt" class="form-control" type="number" name="waktu_ujian" required>
                                                    <small><i>Waktu ujian dalam satuan menit.</i></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="comment">Deskripsi Ujian</label>
                                                    <textarea class="form-control" id="comment" rows="3" name="deskripsi"></textarea>
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="wkt">Nilai Minimum Untuk Ujian</label>
                                                    <input id="nilai" class="form-control" type="number" name="nilai_minimum" required max="100">
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="1" name="acak">
                                                        <span class="form-check-sign">Acak Soal</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Test</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Durasi Ujian</th>
                                    <th>Nilai Minimum Kelulusan</th>
                                    <th>Master Soal</th>
                                    <th>Status</th>
                                    <th>Deskripsi</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                          
                            <tbody>
                                @foreach ($data_ujian as $no => $item)
                                    
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$item->nama_ujian}}</td>
                                    <td>{{$item->tanggal_mulai}} s/d {{$item->tanggal_selesai}}</td>
                                    <td>{{$item->waktu_ujian}} menit</td>
                                    <td>{{$item->nilai_minimum}} point</td>
                                    <td><a href="{{url('/datajadwal/'.$item->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Klik untuk mengubah">{{$item->master_soal->nama}}</a></td>
                                    <td><a href="{{url('/datajadwal/'.$item->id.'/edit')}}" @if($item->is_active == 1) class="btn btn-sm btn-round btn-success" @else class="btn btn-sm btn-round btn-secondary"@endif data-toggle="tooltip" data-placement="top" title="Klik untuk mengubah"> @if($item->is_active == 1)<i class="fas fa-check-circle" ></i> Active @else <i class="fas fa-times-circle" ></i> Non Active @endif</a></td>
                                    
                                    <td>{{substr($item->deskripsi, 0, -10)}}...</td>
                                    <td style="widtd: 10%"> <div class="form-button-action">
                                        <button type="button" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#addRowModal{{$no+1}}">
                                            <i class="fa fa-edit" data-toggle="tooltip" title="" data-original-title="Edit Task" ></i>
                                        </button>
                                        <a href="{{url('/datajadwal/'.$item->id.'/delete')}}" onclick="return confirm('Data yang di hapus tidak bisa dikembalikan!');" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div> </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>









        </div>

        @foreach ($data_ujian as $no => $item)
        <!-- Modal -->
         <div class="modal fade" id="addRowModal{{$no+1}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h2 class="modal-title">
                            <span class="fw-mediumbold">
                            Edit</span> 
                            <span class="fw-light">
                                Jadwal Ujian/Test
                            </span>
                        </h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/datajadwal/'.$item->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="defaultSelect">Work Section</label>
                                        <select class="form-control form-control" id="defaultSelect" name="work_section" required>
                                        <option value="{{$item->data_work_section_id}}">{{$item->data_work_section->nama_posisi}}</option>
                                       @foreach ($work_section as $wk)
                                       @if ($item->data_work_section_id != $wk->id)
                                          
                                       <option value="{{$wk->id}}">{{$wk->nama_posisi}}</option>
                                       @endif
                                       @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Ujian</label>
                                        <input id="nama" class="form-control" type="text" name="nama" value="{{$item->nama_ujian}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="mulai">Tanggal Mulai</label>
                                        <input id="mulai" class="form-control" type="date" name="tanggal_mulai" required value="{{$item->tanggal_mulai}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="selesai">Tanggal Selesai</label>
                                        <input id="selesai" class="form-control" type="date" name="tanggal_selesai" required value="{{$item->tanggal_selesai}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="wkt">Durasi Ujian</label>
                                        <input id="wkt" class="form-control" type="number" name="waktu_ujian" required value="{{$item->waktu_ujian}}">
                                        <small><i>Waktu ujian dalam satuan menit.</i></small>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Deskripsi Ujian</label>
                                        <textarea class="form-control" id="comment" rows="3" name="deskripsi">{{$item->deskripsi}}</textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="wkt">Nilai Minimum Untuk Ujian</label>
                                        <input id="nilaiall" class="form-control" type="number" name="nilai_minimum" required value="{{$item->nilai_minimum}}" max="100">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1" name="acak" @if ($item->acak_soal != NULL)
                                                checked
                                            @endif >
                                            <span class="form-check-sign">Acak Soal</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endforeach
@endsection
@push('scripts')
<script>
    const wkt = document.querySelector('#nilai');
    wkt.addEventListener('change', function(){
        const valwkt = wkt.value;
        if(valwkt > 100){
            return alert('Max nilai yang diberikan adalah 100 point.');
        }
    }); 


</script>
@endpush