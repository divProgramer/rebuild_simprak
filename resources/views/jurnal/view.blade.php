@extends('layout.head')
@section('content')
<section class="section profile">
    <div class="row justify-content-center">
        <div class="col-xl-8">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <h2>{{$data->user->name}}</h2>
                    <h3>{{$data->user->role}}</h3>
                </div>
            </div>

        </div>

        <div class="col-xl-6">

            <div class="card">
            <div class="card-body pt-3">
                <div class="tab-content pt-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8">: {{$data->user->name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">NIS</div>
                                    <div class="col-lg-9 col-md-8">: {{$data->user->siswas->nis}}</div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">Jurusan</div>
                                <div class="col-lg-9 col-md-8">: {{$data->user->siswas->jurusan->nama}}</div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">Sekolah</div>
                                <div class="col-lg-9 col-md-8">: {{$data->sekolah->nama}}</div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">Alamat</div>
                                <div class="col-lg-9 col-md-8">: {{$data->user->siswas->alamat}}</div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">Handphone</div>
                                <div class="col-lg-9 col-md-8">: {{$data->user->siswas->no_hp}}</div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">: {{$data->user->email}}</div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Jurnal Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Bukti</div>
                                    <div class="col-lg-9 col-md-8"><img src="{{asset('storage/'.$data->bukti)}}" width="100px"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Pencapaian Akhir</div>
                                    <div class="col-lg-9 col-md-8">: {{$data->catatan}}</div>
                                </div>

                                @if (is_null($data->pencapaian_akhir))
                                    <div class="row" style="display: none">
                                        <div class="col-lg-3 col-md-4 label">Catatan</div>
                                        <div class="col-lg-9 col-md-8">: kosong</div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Catatan</div>
                                        <div class="col-lg-9 col-md-8">: {{$data->pencapaian_akhir}}</div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Waktu Pulang</div>
                                    <div class="col-lg-9 col-md-8">: {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y H:i') }}</div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div><!-- End Bordered Tabs -->

            </div>
            </div>

        </div>

        @if ($data->status == false)
            <div class="col-xl-6">

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">
                            <form action="{{route('update.jurnal', $data->id)}}" method="post" id="formCatatan">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="" class="form-label">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="0" @if($data->status == false) selected @endif>Belum Dikonfirmasi</option>
                                            <option value="1" @if($data->status == true) selected @endif>Sudah Dikonfirmasi</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="" class="form-label">Catatan</label>
                                        <textarea class="form-control" id="catatan" name="catatan" rows="9"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($data->status == true)
                <div class="col-xl-6" style="display: none">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <div class="col-12">
                                    <label for="" class="form-label">Catatan</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="5" readonly></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="false" @if($data->status == false) selected @endif>Belum Dikonfirmasi</option>
                                        <option value="true" @if($data->status == true) selected @endif>Sudah Dikonfirmasi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    </div>
</section>
@endsection
