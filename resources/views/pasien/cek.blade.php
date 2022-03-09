@extends('layouts.app')

@section('content')
<section id="appointment" class="appointment section-bg">

<br><br><br><br>
<div class="container"">
    <div class="section-title">
        <h2>Cek Token Pasien</h2>
    </div>
<form action="/token" class="card" method="post" enctype="multipart/form-data">
        @csrf
        <br><br>
        <div class="container col-sm-10">
        <h5>Masukan Nomor Token Anda Ketika Melakukan Pendaftaran</h5>
        <div class="form-group">
            <input type="number" placeholder="Masukan Nomor Token" name="no_token" class="form-control @error('no_token') is-invalid @enderror">
                @error('no_token')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br>
        <div class="form-group text-center">
            <button type="submit" style="border: 0;" class="appointment-btn scrollto">Cek Hasil Pemeriksaan</button>
        </div>
    </div>
        <br><br>
    </form>
</div>
<br><br><br><br><br><br><br><br><br>
</section>
@endsection
