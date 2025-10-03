<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'LaraPress')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        :root{
            --bg:#0b0b0d;
            --card:#0f1113;
            --muted:#9b9b9b;
            --accent:#d4af37; /* gold */
            --glass: rgba(255,255,255,0.04);
        }
        *{box-sizing:border-box}
        body{
            margin:0;
            font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: linear-gradient(180deg,#070708 0%, #0f1113 100%);
            color:#f4f4f4;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            line-height:1.6;
        }

        /* Header / Nav */
        .site-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 28px;
            background: linear-gradient(90deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
            border-bottom:1px solid rgba(255,255,255,0.03);
            position:sticky;
            top:0;
            z-index:10;
            backdrop-filter: blur(6px);
        }
        .brand{
            display:flex;
            gap:12px;
            align-items:center;
            text-decoration:none;
            color:inherit;
        }
        .brand .logo{
            width:46px;height:46px;border-radius:8px;
            background:linear-gradient(135deg, #b3862b, #e7c66a);
            display:flex;align-items:center;justify-content:center;
            box-shadow: 0 4px 18px rgba(0,0,0,0.6), inset 0 -6px 12px rgba(0,0,0,0.15);
            font-family:"Playfair Display", serif;
            color:#092214;font-weight:700;
        }
        .brand .name{font-weight:700; font-family:"Playfair Display", serif; letter-spacing:0.4px;}

        nav ul{
            list-style:none;display:flex;gap:18px;margin:0;padding:0;
        }
        nav a{
            color:var(--muted);
            text-decoration:none;
            padding:8px 12px;border-radius:8px;
            font-weight:600;
            transition: all .18s ease;
        }
        nav a:hover{ color:#fff; background: rgba(255,255,255,0.03); box-shadow: 0 2px 10px rgba(0,0,0,0.6); transform:translateY(-1px)}
        nav a.active{ color:var(--accent); box-shadow: 0 4px 18px rgba(212,175,55,0.08); background: linear-gradient(90deg, rgba(212,175,55,0.06), rgba(212,175,55,0.02)); }

        /* Page container */
        .container{max-width:1100px;margin:46px auto;padding:0 20px;}

        /* Card */
        .card{
            background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
            border:1px solid rgba(255,255,255,0.03);
            padding:30px;
            border-radius:14px;
            box-shadow: 0 10px 30px rgba(2,3,4,0.6);
        }

        h1{
            font-family:"Playfair Display", serif;
            font-weight:700;margin:0 0 12px 0;
            letter-spacing:0.6px;
        }
        p.lead{color:var(--muted); margin:0 0 18px 0;}

        /* Contact layout */
        .contact-grid{
            display:grid;
            grid-template-columns: 1fr 380px;
            gap:28px;
        }
        .contact-info .info-item{
            display:flex;gap:14px;align-items:flex-start;padding:14px 0;border-bottom:1px dashed rgba(255,255,255,0.03);
        }
        .info-icon{
            width:54px;height:54px;border-radius:10px;background:var(--glass);
            display:flex;align-items:center;justify-content:center;font-size:20px;
            border:1px solid rgba(255,255,255,0.03);
        }
        .info-item h4{margin:0 0 4px 0;font-size:16px;color:#fff;}
        .info-item p{margin:0;color:var(--muted);font-size:14px;}

        /* Form */
        .contact-form input,
        .contact-form textarea{
            width:100%;padding:12px 14px;border-radius:10px;border:1px solid rgba(255,255,255,0.04);
            background:transparent;color:inherit;font-size:15px;margin-bottom:12px;outline:none;
        }
        .contact-form textarea{min-height:140px;resize:vertical;}
        .btn{
            display:inline-block;padding:12px 18px;border-radius:10px;font-weight:700;
            background:linear-gradient(90deg,var(--accent), #f4d88a); color:#08100a;border:none;
            cursor:pointer; box-shadow: 0 8px 24px rgba(212,175,55,0.12);
        }

        /* Footer */
        .site-footer{margin-top:50px;text-align:center;color:var(--muted);font-size:14px;padding:28px 0}

        /* Responsive */
        @media (max-width:900px){
            .contact-grid{grid-template-columns:1fr; }
            nav ul{ gap:10px; flex-wrap:wrap; }
        }
        @media (max-width:520px){
            .brand .logo{width:40px;height:40px}
            .brand .name{font-size:14px}
            .container{margin:28px auto;}
        }
    </style>
</head>
<body>
    <header class="site-header">
        <a href="/" class="brand" aria-label="LaraPress">
            <div class="logo">LP</div>
            <div class="name">LaraPress</div>
        </a>

        <nav>
            <ul>
                <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ url('/tentang-kami') }}" class="{{ Request::is('tentang-kami') ? 'active' : '' }}">Tentang</a></li>
                <li><a href="{{ url('/kontak') }}" class="{{ Request::is('kontak') ? 'active' : '' }}">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer class="site-footer">
        &copy; {{ date('Y') }} LaraPress. 
    </footer>
</body>
</html>
