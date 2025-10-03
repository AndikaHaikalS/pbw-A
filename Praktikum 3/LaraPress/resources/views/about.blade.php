@extends('layouts.app')

@section('title','tentang-kami - LaraPress')

@section('content')
<div class="card">
    <h1>Tentang LaraPress</h1>
    <p class="lead">LaraPress adalah proyek praktikum untuk mempelajari dasar-dasar Laravel: routing, views (Blade), dan alur Request → Route → View → Response.</p>

    <p style="margin-top:18px;color:var(--muted)">
        Versi: Laravel 12 • Tujuan: praktikum pengenalan framework • Output: aplikasi blog sederhana.
    </p>

    <div style="margin-top:20px">
        <a class="btn" href="/">Kembali ke Home</a>
        <a class="btn" href="/kontak" style="background:transparent;color:var(--accent);border:1px solid rgba(212,175,55,0.18)">Kontak</a>
    </div>
</div>
@endsection
