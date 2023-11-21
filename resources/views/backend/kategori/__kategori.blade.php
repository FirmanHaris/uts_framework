@extends('template.apps')
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Data Kategori</h1>
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
                                        <th scope="col">Kategori</th>
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
                                            <td>{{ $dt->kategori }}</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button class="btn btn-icon btn-sm btn-info-transparent rounded-pill"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ModalEdit{{ $dt->id_kategori }}" type="button"><i
                                                            class="ri-edit-line"></i></button>
                                                    <button class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ModalHapus{{ $dt->id_kategori }}" type="button"><i
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
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('insert_kategori') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="kategori"
                                                        class="form-label fs-14 text-dark">Kategori</label>
                                                    <input type="text" name="kategori" class="form-control"
                                                        placeholder="masukkan kategori">
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
                                <div class="modal fade" id="ModalEdit{{ $dh->id_kategori }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit kategori</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/kategori/update/{{ $dh->id_kategori }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label for="kategori"
                                                            class="form-label fs-14 text-dark">Kategori</label>
                                                        <input type="text" name="kategori" class="form-control"
                                                            value="{{ $dh->kategori }}">
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
                                <div class="modal fade" id="ModalHapus{{ $d->id_kategori }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="fs-14 text-dark">Apakah Anda yakin ingin menghapus Kategori
                                                    {{ $d->kategori }} ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/kategori/delete/{{ $d->id_kategori }}" method="post">
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
