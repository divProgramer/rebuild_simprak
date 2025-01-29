@extends('layout.head')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Jurusan</h5>

            <!-- Vertical Form -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="g-3" action="{{route('update.siswa', $data->id)}}" method="POST">
                        @csrf
                        <div class="row g-3">
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
