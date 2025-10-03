@extends('layouts.app')

@section('title','Kontak - LaraPress')

@section('content')
<div class="card">
    <h1>Hubungi Kami</h1>
    <p class="lead">Punya pertanyaan atau ingin bekerja sama? Isi form atau hubungi lewat detail di samping.</p>

    <div class="contact-grid" style="margin-top:20px">
        <!-- Left: Deskripsi & form -->
        <div>
            <div class="card" style="padding:22px;margin-bottom:18px;">
                <h3 style="margin-top:0">Kirim Pesan</h3>
                <p class="lead" style="margin-bottom:12px">Isi form dibawah ini. Kami akan membalas secepatnya (contoh UI — form tidak mengirim).</p>

                <form class="contact-form" onsubmit="event.preventDefault(); alert('Form ini contoh UI — pada praktikum ini belum terkoneksi ke backend.');">
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="subjek" placeholder="Subjek" required>
                    <textarea name="pesan" placeholder="Pesan Anda..." required></textarea>
                    <button class="btn" type="submit">Kirim Pesan</button>
                </form>
            </div>

            <div style="margin-top:8px;color:var(--muted); font-size:14px;">
                <strong>Alamat:</strong>
                <p style="margin:6px 0 0 0">Jl. Kemang No.88, Jakarta</p>
            </div>
        </div>

        <!-- Right: Contact info -->
        <aside class="card contact-info" style="padding:22px;">
            <div style="margin-bottom:10px">
                <h3 style="margin:0 0 10px 0">Informasi Kontak</h3>
                <p class="lead" style="margin:0">Hubungi kami lewat email atau telepon.</p>
            </div>

            <div class="info-item">
                <div class="info-icon" aria-hidden="true">
                    <!-- mail icon -->
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 8.5L12 13L21 8.5V18C21 19.1046 20.1046 20 19 20H5C3.89543 20 3 19.1046 3 18V8.5Z" stroke="rgba(255,255,255,0.85)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 6H3C1.89543 6 1 6.89543 1 8V8.5L12 13L23 8.5V8C23 6.89543 22.1046 6 21 6Z" stroke="rgba(255,255,255,0.85)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <h4>Email</h4>
                    <p>@andika</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <!-- phone icon -->
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 16.92V20C22 20.5304 21.7893 21.0391 21.4142 21.4142C20.0391 22.7893 17.959 22.7893 16.5858 21.4142L13.7 18.5284C11.7891 19.5727 9.42727 19.1818 7.75736 17.512 L6.48764 16.2423C4.81773 14.5724 4.42678 12.2109 5.47112 10.3L2.58579 7.41421C1.21071 6.03913 1.21071 3.95906 2.58579 2.585 L3.17157 2L6.58579 5.41421C8.04464 6.87307 9.90144 7.74014 11.8787 7.9247C12.5212 7.97958 13.1631 7.85966 13.76 7.568L16.5858 9.41421C17.959 10.7893 20.0391 10.7893 21.4142 9.41421C21.7893 9.03914 22 8.53043 22 8V11.08" stroke="rgba(255,255,255,0.85)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <h4>Telepon</h4>
                    <p>+62 812-8969-8767</p>
                </div>
            </div>

            <div class="info-item" style="border-bottom:none">
                <div class="info-icon">
                    <!-- clock icon -->
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 7V12L15 14" stroke="rgba(255,255,255,0.85)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="rgba(255,255,255,0.85)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <h4>Jam Kerja</h4>
                    <p>Senin - Jumat, 09:00 - 17:00</p>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
