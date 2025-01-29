@extends('layout.head')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Fasilitator</h5>

            <!-- Vertical Form -->
            <div class="row">
                <div class="col-md-6">
                    <form class="g-3" action="{{route('store.fasilitator')}}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama')
                                is-invalid
                                @enderror" placeholder="Masukan Nama">
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">NIM</label>
                                <input type="text" name="nim" class="form-control @error('nim')
                                is-invalid
                                @enderror" placeholder="Masukan NIM">
                                @error('nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Instansi</label>
                                <select name="instansi" class="form-select @error('instansi')
                                is-invalid
                                @enderror" aria-label="Default select example">
                                <option selected disabled>Choose...</option>
                                @foreach($instansi as $s)
                                <option value="{{$s->id}}">{{$s->nama}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email')
                            is-invalid
                            @enderror" placeholder="Masukan Email">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password')
                            is-invalid
                            @enderror" name="password" placeholder="Masukan Password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Kelompok</label>
                            <select name="kelompok" class="form-select @error('kelompok')
                            is-invalid
                            @enderror" aria-label="Default select example">
                            <option selected disabled>Choose...</option>
                            @foreach($kelompok as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">No Handphone</label>
                                <input type="text" class="form-control @error('ho_hp')
                                is-invalid
                                @enderror" name="no_hp" placeholder="Masukan No Handphone">
                                @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control @error('alamat')
                                is-invalid
                                @enderror" placeholder="Masukan Alamat"></textarea>
                                @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>

                        <div class="text-center g-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary">Reset</a>
                        </div>
                    </form>
            </div>

        </div>
    </div>
@endsection
