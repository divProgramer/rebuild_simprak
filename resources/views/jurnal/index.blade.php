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
                @if ($siswa->kelompok_id == null)
                    <a href="{{ route('create.jurnal') }}" class="btn btn-secondary" style="pointer-events: none;">Create</a>
                    <p class="text-warning">Anda belum terdaftar di kelompok harap konfirmasi ke guru pembimbing untuk menentukan kelompok</p>
                @else
                    <a href="{{ route('create.jurnal') }}" class="btn btn-success">Create</a>
                @endif
            @endcan

            <table class="table table-borderless datatable">
                <thead>
                    <tr class="border-2">
                        <th scope="col">No</th>
                        @can('isFasilitator')
                            <th class="">Nama</th>
                        @endcan
                        <th scope="col">Pencapaian Akhir</th>
                        <th scope="col">Bukti</th>
                        <th scope="col">Waktu Pulang</th>
                        <th scope="col">Catatan</th>
                        @can('isSiswa')
                            <th class="text-center">Status</th>
                        @endcan
                        @can('isFasilitator')
                            <th class="text-center">Action</th>
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
                            @can('isFasilitator')
                                <td class="">{{ $row->user->name }}</td>
                            @endcan
                            <td>{{ $row->catatan }}</td>
                            <td>
                                @if (empty($row->bukti))
                                    Gambar tidak terinput
                                @else
                                    <img src="{{ Storage::url($row->bukti) }}" width="50px" alt="Bukti Jurnal">
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y H:i') }}</td>
                            <td>{{ $row->pencapaian_akhir }}</td>
                            @can('isSiswa')
                                @if ($row->status == false)
                                    <td class="text-center">
                                        <button class="btn btn-outline-danger" disabled>Menunggu konfirmasi</button>
                                    </td>
                                @elseif ($row->status == true)
                                    <td class="text-center">
                                        <button class="btn btn-outline-success" disabled>Disetujui</button>
                                    </td>
                                @endif
                            @endcan

                            @can('isFasilitator')
                                @if ($row->status == true)
                                    <td class="text-center">
                                        <a href="" class="btn btn-outline-success" style="pointer-events: none;">Telah Di konfirmasi</a>
                                    </td>
                                @elseif ($row->status == false)
                                    <td class="text-center">
                                        <a href="{{route('view.jurnal', $row->id)}}" class="btn btn-outline-primary">View</a>
                                    </td>
                                @endif
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div><!-- End Recent Sales -->

@endsection
