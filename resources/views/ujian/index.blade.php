@extends('layouts.header')

@section('title-tab')
Ujian
@endsection

@section('ujian-status')
active
@endsection

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <div class="">
                <a href="{{route('ujian.create')}}" class="btn btn-primary btn-md">Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-5">
        <div class="col-12">
            <table class="table table-striped table-bordered table-hover shadow" style="width:100%" id="table_ujian">
                <thead>
                    <tr>
                        <th>No. Id</th>
                        <th>Nama Mata Kuliah</th>
                        <th>Dosen Pengampu</th>
                        <th>Jumlah Soal</th>
                        <th>Keterangan</th>
                        <th>Tanggal Input</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ujians as $ujian)
                    <tr>
                        <td>{{$ujian->id}}</td>
                        <td>{{$ujian->nama_mk}}</td>
                        <td>{{$ujian->dosen}}</td>
                        <td>{{$ujian->jumlah_soal}}</td>
                        <td>{{$ujian->keterangan}}</td>
                        <td>{{substr($ujian->created_at, 0, 11)}}</td>
                        <td>
                            <a href="{{ route('ujian.edit', ['id'=>$ujian->id]) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <button type="button" href="" class="btn btn-danger btn-sm"
                                data-remote="{{ route('ujian.destroy', ['id'=>$ujian->id]) }}"
                                data-mk="{{$ujian->nama_mk}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-body" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                <form action="" id="form-delete" class="form-inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="form-btn_delete">Delete</button>
                </form>`
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#table_ujian').DataTable();

        $('#table_ujian tbody').on('click', '.btn-danger', function () {
            var url = $(this).data('remote');
            $('#form-delete').attr('action', url);

            var mk = $(this).data('mk');
            document.getElementById('modal-body').innerHTML = 'Apakah anda yakin menghapus data ujian <strong>'+ mk +'</strong> ?'
            $('#modalDelete').modal('show');
        });
    });
</script>
@endsection