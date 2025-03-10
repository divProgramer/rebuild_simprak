@extends('layout.head')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Sekolah</h5>

            <!-- Vertical Form -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="g-3" action="{{route('store.sekolah')}}" method="POST">
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
                                <label for="inputAddress" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control @error('alamat')
                                is-invalid
                                @enderror" placeholder="Masukan Alamat"></textarea>
                                @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center g-3">
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
