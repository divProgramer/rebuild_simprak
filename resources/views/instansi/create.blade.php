@extends('layout.head')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Instansi</h5>

            <!-- Vertical Form -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="g-3" action="{{route('store.instansi')}}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nama Instansi</label>
                                <input type="text" name="nama" class="form-control @error('nama')
                                is-invalid
                                @enderror" placeholder="Masukan Nama">
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
                                <label for="inputAddress" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control @error('alamat')
                                is-invalid
                                @enderror" placeholder="Masukan Alamat"></textarea>
                                @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
