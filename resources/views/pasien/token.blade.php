@extends('layouts.app')

<br><br><br><br><br><br><br><br>
@if (!$token)
   <script> alert('No Token Salah Atau Tidak Ada!'); window.location = "/cek";</script>
@else
   No token anda {{ $token->no_token }} <br>
   @if ($token->status == 'sudah di proses')
   Sudah di proses
   @else
   Belum di proses
   @endif
@endif
