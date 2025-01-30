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

            <h5 class="card-title">Data Jurnal</h5>

            @can('isSiswa')
                <a href="{{ route('create.jurnal') }}" class="btn btn-success">Create</a>
            @endcan

            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pencapaian Akhir</th>
                        <th scope="col">Bukti</th>
                        <th scope="col">Waktu Pulang</th>
                        <th scope="col">Catatan</th>
                        @can('isSiswa')
                            <th class="text-center">Status</th>
                        @endcan
                        @can('isFasilitator')
                            <th scope="col">Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->catatan }}</td>
                            <td>
                                @if (empty($row->bukti))
                                    Gambar tidak terinput
                                @else
                                    <img src="{{ Storage::url($row->bukti) }}" width="50px" class="" alt="Bukti Jurnal">
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y H:i') }}</td>
                            <td>{{ $row->pencapaian_akhir }}</td>
                            <td>{{ $row->alamat }}</td>
                            @can('isSiswa')
                                <td class="text-danger">
                                    <button class="btn btn-danger" disabled>Menunggu konfirmasi</button>
                                </td>
                            @endcan
                            @can('isFasilitator')
                                <td>
                                    <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div><!-- End Recent Sales -->

@endsection
