@extends('template.apps')
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Data Kebutuhan</h1>
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
                            <table class="table text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Jenis Kebutuhan</th>
                                        <th scope="col">Tentang</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Urgensi</th>
                                        <th scope="col">Foto</th>
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
                                            <td>{{ $dt->jenis }}</td>
                                            <td>{{ $dt->tentang }}</td>
                                            <td>{{ $dt->deskripsi }}</td>
                                            <td>{{ getlevel($dt) }}</td>
                                            <td>
                                                <img src="{{ asset('fotoKebutuhan/' . $dt->foto) }}" style="width: 35px;"
                                                    alt="">
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button class="btn btn-icon btn-sm btn-info-transparent rounded-pill"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ModalEdit{{ $dt->id_kebutuhan }}" type="button"><i
                                                            class="ri-edit-line"></i></button>
                                                    <button class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ModalHapus{{ $dt->id_kebutuhan }}"
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
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kebutuhan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('insert_kebutuhan') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="jenis" class="form-label fs-14 text-dark">Jenis
                                                        Kebutuhan</label>
                                                    <select id="jenis" name="jenis"class="form-select">
                                                        <option selected>pilih jenis kebutuhan..</option>
                                                        <option value="SIMRS">SIMRS</option>
                                                        <option value="Non SIMRS">Non SIMRS</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tentang" class="form-label fs-14 text-dark">Tentang</label>
                                                    <textarea name="tentang" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi"
                                                        class="form-label fs-14 text-dark">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="level" class="form-label fs-14 text-dark">
                                                        Urgensi </label>
                                                    <select id="level" name="level"class="form-select">
                                                        <option selected>pilih Level..</option>
                                                        <option value="urgent">Urgent</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="low">Low</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto" class="form-label fs-14 text-dark">Foto</label>
                                                    <input type="file" name="foto" class="form-control">
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
                                <div class="modal fade" id="ModalEdit{{ $dp->id_kebutuhan }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kebutuhan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/kebutuhan/update/{{ $dp->id_kebutuhan }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="jenis" class="form-label fs-14 text-dark">Jenis
                                                            Kebutuhan</label>
                                                        <select id="jenis" name="jenis"class="form-select">
                                                            <option selected>{{ $dp->jenis }}</option>
                                                            <option value="SIMRS">SIMRS</option>
                                                            <option value="Non SIMRS">Non SIMRS</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tentang"
                                                            class="form-label fs-14 text-dark">Tentang</label>
                                                        <textarea name="tentang" class="form-control">{{ $dp->tentang }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsi"
                                                            class="form-label fs-14 text-dark">Deskripsi</label>
                                                        <textarea name="deskripsi" class="form-control">{{ $dp->deskripsi }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="level" class="form-label fs-14 text-dark">
                                                            Urgensi </label>
                                                        <select id="level" name="level"class="form-select">
                                                            <option selected>{{ $dp->level }}</option>
                                                            <option value="urgent">Urgent</option>
                                                            <option value="medium">Medium</option>
                                                            <option value="low">Low</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foto"
                                                            class="form-label fs-14 text-dark">Foto</label>
                                                        <input type="file" name="foto" class="form-control"
                                                            value="{{ $dp->foto }}">
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
                                <div class="modal fade" id="ModalHapus{{ $d->id_kebutuhan }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="fs-14 text-dark">Apakah Anda yakin ingin menghapus Kebutuhan
                                                    {{ $d->tentang }} ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/kebutuhan/delete/{{ $d->id_kebutuhan }}" method="post">
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
