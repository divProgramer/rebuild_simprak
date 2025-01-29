@extends('layout.head')
@section('content')

<!-- Recent Sales -->
<div class="col-12">
    <div class="card recent-sales overflow-auto">

      <div class="card-body">
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{ $message }}</p>
          </div>
          @endif
        <h5 class="card-title">Data Fasilitator</h5>
        <a href="{{ route('create.guru') }}" class="btn btn-success">Create</a>


        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Email</th>
              <th scope="col">Nama Sekolah</th>
              <th scope="col">NIP</th>
              <th scope="col">Nama</th>
              <th scope="col">No Handphone</th>
              <th scope="col">Alamat</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <?php $no = 1; ?>
          <tbody>
            @foreach ($data as $row)
            <tr>
              <th>{{ $no++ }}</th>
              <td>{{ $row->users->email }}</td>
              <td>{{ $row->sekolah->nama }}</td>
              <td>{{ $row->nip }}</td>
              <td>{{ $row->nama }}</td>
              <td>{{ $row->no_hp }}</td>
              <td>{{ $row->alamat }}</td>
              <td>
                <a href="" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
            <tr>
          </tbody>
        </table>

      </div>

    </div>
  </div><!-- End Recent Sales -->


@endsection
