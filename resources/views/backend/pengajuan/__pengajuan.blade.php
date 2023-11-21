@extends('template.apps')
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Data Pengajuan Kebutuhan</h1>
        <div class="ms-md-1 ms-0">
        </div>
    </div>
    <div class="container justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-bordered" id="table_pengajuan">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kontak / WA</th>
                                        <th scope="col">Bagian</th>
                                        <th scope="col">Jenis Kebutuhan Teknis</th>
                                        <th scope="col">Kebutuhan Tentang</th>
                                        <th scope="col">Deskripsi Kebutuhan</th>
                                        <th scope="col">Deskripsi Foto</th>
                                        <th scope="col">Urgensi</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Progres</th>
                                        <th scope="col">PIC</th>
                                        <th scope="col">#Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $dt)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $dt->pegawai->nama }}</td>
                                            <td>{{ $dt->pegawai->nomor }}</td>
                                            <td>{{ $dt->pegawai->bagian->bagian }}</td>
                                            <td>{{ $dt->kebutuhan->jenis }}</td>
                                            <td>{{ $dt->kebutuhan->tentang }}</td>
                                            <td>{{ $dt->kebutuhan->deskripsi }}</td>
                                            <td>{{ $dt->kebutuhan->foto }}</td>
                                            <td>{{ getlevel($dt->kebutuhan) }}</td>
                                            <td>{{ $dt->kategori->kategori }}</td>
                                            <td>{{ $dt->progres->progres }}</td>
                                            <td>{{ $dt->pic->nama_pic }}</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button class="btn btn-icon btn-sm btn-info-transparent rounded-pill"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ModalEdit{{ $dt->id_pengajuan }}"
                                                        type="button"><i class="ri-edit-line"></i></button>
                                                    <button class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ModalHapus{{ $dt->id_pengajuan }}"
                                                        type="button"><i class="ri-delete-bin-line"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Modal Tambah Data -->
                            <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengajuan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('insert_pengajuan') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="pegawai" class="form-label fs-14 text-dark">Pegawai</label>
                                                    <select id="inputState" name="id_pegawai"class="form-select">
                                                        <option selected>Pilih..</option>
                                                        @foreach ($pegawai as $pg)
                                                            <option value="{{ $pg->id_pegawai }}">
                                                                {{ $pg->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kebutuhan"
                                                        class="form-label fs-14 text-dark">Kebutuhan</label>
                                                    <select id="inputState" name="id_kebutuhan"class="form-select">
                                                        <option selected>Pilih..</option>
                                                        @foreach ($kebutuhan as $kb)
                                                            <option value="{{ $kb->id_kebutuhan }}">
                                                                {{ $kb->tentang }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kategori"
                                                        class="form-label fs-14 text-dark">Kategori</label>
                                                    <select id="inputState" name="id_kategori"class="form-select">
                                                        <option selected>Pilih..</option>
                                                        @foreach ($kategori as $kt)
                                                            <option value="{{ $kt->id_kategori }}">
                                                                {{ $kt->kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="progres" class="form-label fs-14 text-dark">Progres</label>
                                                    <select id="inputState" name="id_progres"class="form-select">
                                                        <option selected>Pilih..</option>
                                                        @foreach ($progres as $ps)
                                                            <option value="{{ $ps->id_progres }}">
                                                                {{ $ps->progres }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pic" class="form-label fs-14 text-dark">PIC</label>
                                                    <select id="inputState" name="id_pic"class="form-select">
                                                        <option selected>Pilih..</option>
                                                        @foreach ($pic as $pc)
                                                            <option value="{{ $pc->id_pic }}">
                                                                {{ $pc->nama_pic }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_pengajuan" class="form-label fs-14 text-dark">Tanggal
                                                        Pengajuan</label>
                                                    <input type="date" name="tgl_pengajuan" class="form-control">
                                                </div>
                                                <button class="btn btn-primary mt-2" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /modal tambah data -->
                            <!-- modal edit data -->
                            @foreach ($data as $dh)
                                <div class="modal fade" id="ModalEdit{{ $dh->id_pengajuan }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengajuan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/pengajuan/update/{{ $dh->id_pengajuan }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label for="pegawai"
                                                            class="form-label fs-14 text-dark">Pegawai</label>
                                                        <select id="inputState" name="id_pegawai"class="form-select">
                                                            <option selected value="{{ $dh->id_pegawai }}">
                                                                {{ $dh->pegawai->nama }}</option>
                                                            @foreach ($pegawai as $pg)
                                                                <option value="{{ $pg->id_pegawai }}">
                                                                    {{ $pg->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kebutuhan"
                                                            class="form-label fs-14 text-dark">Kebutuhan</label>
                                                        <select id="inputState" name="id_kebutuhan"class="form-select">
                                                            <option selected value="{{ $dh->id_kebutuhan }}">
                                                                {{ $dh->kebutuhan->tentang }}}</option>
                                                            @foreach ($kebutuhan as $kb)
                                                                <option value="{{ $kb->id_kebutuhan }}">
                                                                    {{ $kb->tentang }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kategori"
                                                            class="form-label fs-14 text-dark">Kategori</label>
                                                        <select id="inputState" name="id_kategori"class="form-select">
                                                            <option selected value="{{ $dh->id_kategori }}">
                                                                {{ $dh->kategori->kategori }}</option>
                                                            @foreach ($kategori as $kt)
                                                                <option value="{{ $kt->id_kategori }}">
                                                                    {{ $kt->kategori }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="progres"
                                                            class="form-label fs-14 text-dark">Progres</label>
                                                        <select id="inputState" name="id_progres"class="form-select">
                                                            <option selected value="{{ $dh->id_progres }}">
                                                                {{ $dh->progres->progres }}</option>
                                                            @foreach ($progres as $ps)
                                                                <option value="{{ $ps->id_progres }}">
                                                                    {{ $ps->progres }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pic"
                                                            class="form-label fs-14 text-dark">PIC</label>
                                                        <select id="inputState" name="id_pic"class="form-select">
                                                            <option selected value="{{ $dh->id_pic }}">
                                                                {{ $dh->pic->nama_pic }}</option>
                                                            @foreach ($pic as $pc)
                                                                <option value="{{ $pc->id_pic }}">
                                                                    {{ $pc->nama_pic }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tgl_pengajuan"
                                                            class="form-label fs-14 text-dark">Tanggal
                                                            Pengajuan</label>
                                                        <input type="date" name="tgl_pengajuan"
                                                            value="{{ $dh->tgl_pengajuan }}" class="form-control">
                                                    </div>
                                                    <button class="btn btn-primary mt-2" type="submit">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /modal edit data -->
                            <!-- modal hapus data -->
                            @foreach ($data as $d)
                                <div class="modal fade" id="ModalHapus{{ $d->id_pengajuan }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="fs-14 text-dark">Apakah Anda yakin ingin menghapus pengajuan
                                                    tentang
                                                    {{ $d->kebutuhan->tentang }} ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/pengajuan/delete/{{ $d->id_pengajuan }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-primary" type="submit">Hapus</button>
                                                </form>
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /modal hapus data -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#table_pengajuan').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [{
                    text: 'Tambah Data',
                    className: 'btn btn-info',
                    action: function(e, dt, node, config) {
                        $('#ModalTambah').modal('show');
                    }
                }, {
                    extend: 'print',
                    className: 'btn btn-danger border-0',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    },
                }, {
                    extend: 'pdf',
                    className: 'btn btn-warning border-0',

                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    },

                },
                {
                    extend: 'excel',
                    className: 'btn btn-success border-0',
                    orientation: 'landscape',

                }

            ]
        });
    </script>
@endsection
