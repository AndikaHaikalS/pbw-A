@extends('layouts.app')

@section('title','Home - LaraPress')

@section('content')
<div class="card">
    <h1>Selamat Datang di LaraPress</h1>
    <p class="lead">Aplikasi blog sederhana berbasis Laravel. Eksplor materi dan praktik membangun aplikasi dengan cepat.</p>

    <div style="display:flex;gap:16px;flex-wrap:wrap;margin-top:18px">
        <a class="btn" href="/tentang-kami">Pelajari Tentang LaraPress</a>
        <a class="btn" href="/kontak" style="background:transparent;color:var(--accent);border:1px solid rgba(212,175,55,0.18)">Hubungi Kami</a>
    </div>
</div>
@endsection
