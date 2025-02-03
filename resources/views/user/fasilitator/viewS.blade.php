@extends('layout.head')
@section('content')
<section class="section profile">
    <div class="row justify-content-center">
        <div class="col-xl-8">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <h2>{{$data->nama}}</h2>
                    <h3>{{$data->users->role}}</h3>
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
            <div class="card-body pt-3">
                <div class="tab-content pt-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8">: {{$data->nama}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">NIS</div>
                                    <div class="col-lg-9 col-md-8">: {{$data->nis}}</div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">Jurusan</div>
                                <div class="col-lg-9 col-md-8">: {{$data->jurusan->nama}}</div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">Sekolah</div>
                                <div class="col-lg-9 col-md-8">: {{$data->sekolah->nama}}</div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">Alamat</div>
                                <div class="col-lg-9 col-md-8">: {{$data->alamat}}</div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">Handphone</div>
                                <div class="col-lg-9 col-md-8">: {{$data->no_hp}}</div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">: {{$data->users->email}}</div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Prakerin Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Instansi</div>
                                    <div class="col-lg-9 col-md-8">: {{$data->instansi->nama}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">: {{$data->instansi->alamat}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">: {{$data->instansi->email}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Fasilitator</div>
                                    <div class="col-lg-9 col-md-8">: {{Auth::user()->name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kelompok</div>
                                    <div class="col-lg-9 col-md-8">: {{$data->kelompok->nama}}</div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div><!-- End Bordered Tabs -->

            </div>
            </div>

        </div>
    </div>
</section>
@endsection
