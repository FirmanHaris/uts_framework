@extends('template.apps')
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Data Penanggung Jawab</h1>
        <div class="ms-md-1 ms-0">
        </div>
    </div>
    <div class="container justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#ModalTambah">
                            Tambah data
                        </button>
                        <div class="table-responsive">
                            <table class="table text-nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Kontak/WA</th>
                                        <th scope="col">Tanggal Lahir</th>
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
                                            <td>{{ $dt->nama_pic }}</td>
                                            <td>{{ $dt->alamat }}</td>
                                            <td>{{ jnskel($dt->jenis_kelamin) }}</td>
                                            <td>{{ $dt->nomor }}</td>
                                            <td>{{ $dt->tgl_lahir }}</td>
                                            <td>
                                                <div
                                                    class="hstack
                                                    gap-2 fs-15">
                                                    <button class="btn btn-icon btn-sm btn-info-transparent rounded-pill"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ModalEdit{{ $dt->id_pic }}" type="button"><i
                                                            class="ri-edit-line"></i></button>
                                                    <button class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ModalHapus{{ $dt->id_pic }}" type="button"><i
                                                            class="ri-delete-bin-line"></i></button>
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
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pic</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('insert_pic') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="nama_pic" class="form-label fs-14 text-dark">Nama</label>
                                                    <input type="text" class="form-control" name="nama_pic"
                                                        placeholder="Masukkan nama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat" class="form-label fs-14 text-dark">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat"
                                                        placeholder="Masukkan alamat">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_kelamin" class="form-label fs-14 text-dark">Jenis
                                                        Kelamin</label>
                                                    <div class="form-group">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="jenis_kelamin" id="inlineRadio1" value="l">
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">Laki-Laki</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="jenis_kelamin" id="inlineRadio2" value="p">
                                                            <label class="form-check-label"
                                                                for="inlineRadio2">Perempuan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomor"
                                                        class="form-label fs-14 text-dark">Kontak/WA</label>
                                                    <input type="text" name="nomor" class="form-control"
                                                        placeholder="08x xxx xxx xxx">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomor" class="form-label fs-14 text-dark">Tanggal
                                                        Lahir</label>
                                                    <input type="date" name="tgl_lahir" class="form-control">
                                                </div>
                                                <button class="btn btn-primary mt-2" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /modal tambah data -->
                            <!-- modal edit data -->
                            @foreach ($data as $dp)
                                <div class="modal fade" id="ModalEdit{{ $dp->id_pic }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pic</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/pic/update/{{ $dp->id_pic }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label for="nama"
                                                            class="form-label fs-14 text-dark">Nama</label>
                                                        <input type="text" class="form-control" name="nama_pic"
                                                            value="{{ $dp->nama_pic }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat"
                                                            class="form-label fs-14 text-dark">Alamat</label>
                                                        <input type="text" class="form-control" name="alamat"
                                                            value="{{ $dp->alamat }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin"
                                                            class="form-label fs-14 text-dark">Jenis
                                                            Kelamin</label>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jenis_kelamin" id="inlineRadio1" value="l"
                                                                    {{ $dp->jenis_kelamin == 'l' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="inlineRadio1">Laki-Laki</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jenis_kelamin" id="inlineRadio2" value="p"
                                                                    {{ $dp->jenis_kelamin == 'p' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="inlineRadio2">Perempuan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nomor"
                                                            class="form-label fs-14 text-dark">Kontak/WA</label>
                                                        <input type="text" name="nomor" class="form-control"
                                                            value="{{ $dp->nomor }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tgl_lahir" class="form-label fs-14 text-dark">Tanggal
                                                            Lahir</label>
                                                        <input type="date" name="tgl_lahir" class="form-control"
                                                            value="{{ $dp->tgl_lahir }}">
                                                    </div>
                                                    <button class="btn btn-primary mt-2" type="submit">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /modal edit data -->
                            <!-- modal hapus data -->
                            @foreach ($data as $d)
                                <div class="modal fade" id="ModalHapus{{ $d->id_pic }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="fs-14 text-dark">Apakah Anda yakin ingin menghapus data Pic
                                                    {{ $d->nama_pic }} ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/pic/delete/{{ $d->id_pic }}" method="post">
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
@endsection
