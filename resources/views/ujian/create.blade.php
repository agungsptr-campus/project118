@extends('layouts.header')

@section('title-tab')
Ujian
@endsection

@section('ujian-status')
active
@endsection

@section('content')
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-8">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow mt-2 mb-5">
                <div class="card-header">
                    <strong>Input Data Ujian</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('ujian.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Mata Kuliah</label>
                            <input name="nama_mk" type="text" class="form-control" required maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="">Dosen Pengampu</label>
                            <input name="dosen" type="text" class="form-control" required maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Soal</label>
                            <input name="jumlah_soal" type="text" onkeypress="isInputNumber(event)" class="form-control"
                                required maxlength="11">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" cols="30" rows="4" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function isInputNumber(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
            }
        }   
</script>
@endsection