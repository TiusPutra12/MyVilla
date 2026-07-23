<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ReforceCode</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --navy:        #0a1f35;
            --navy-light:  #122d4b;
            --navy-mid:    #1a3f5c;
            --sand:        #f6f1e9;
            --warm-gray:   #f9f6f2;
            --accent:      #c8a96e;
            --accent-light:#f5e9d3;
            --accent-glow: rgba(200,169,110,0.35);
            --gold:        #d4a84b;
            --text:        #1a1a2e;
            --text-muted:  #64748b;
            --white:       #ffffff;
            --border:      #e8e2d9;
            --border-light:#f0ece6;
            --shadow-sm:   0 4px 16px rgba(0,0,0,0.08);
            --shadow-md:   0 12px 40px rgba(0,0,0,0.12);
            --shadow-gold: 0 8px 32px rgba(200,169,110,0.28);
            --serif:       'DM Serif Display', serif;
            --sans:        'Inter', sans-serif;
            --sidebar-width: 260px;
        }
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--sans); background: var(--sand); color: var(--text); display: flex; min-height: 100vh; -webkit-font-smoothing: antialiased; }

        /* ====== SIDEBAR ====== */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--navy);
            color: var(--white);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 100;
        }
        .sidebar-brand {
            padding: 2rem 1.8rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .sidebar-brand .label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 0.3rem;
        }
        .sidebar-brand h2 {
            font-family: var(--serif);
            font-size: 1.5rem;
            color: var(--white);
            font-weight: 400;
        }
        .sidebar-menu {
            flex: 1;
            padding: 1.5rem 0;
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }
        .sidebar-label {
            padding: 0.8rem 1.8rem 0.4rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: rgba(255,255,255,0.35);
            font-weight: 600;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            padding: 0.85rem 1.8rem;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }
        .sidebar-link i { font-size: 1rem; width: 18px; text-align: center; }
        .sidebar-link:hover {
            background: rgba(255,255,255,0.05);
            color: var(--white);
        }
        .sidebar-link.active {
            background: rgba(200,169,110,0.12);
            color: var(--accent);
            border-left-color: var(--accent);
        }
        .sidebar-link.active i { color: var(--accent); }
        .sidebar-footer {
            padding: 1.2rem 0;
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        .sidebar-footer .sidebar-link:hover {
            background: rgba(239,68,68,0.08);
            color: #fca5a5;
        }

        /* ====== MAIN CONTENT ====== */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .topbar {
            background: var(--white);
            height: 68px;
            padding: 0 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .topbar-title {
            font-family: var(--serif);
            font-size: 1.1rem;
            color: var(--navy);
        }
        .topbar-right { display: flex; align-items: center; gap: 1rem; }
        .topbar-link {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.1rem;
            border-radius: 50px;
            border: 1.5px solid var(--border);
            transition: all 0.3s;
        }
        .topbar-link:hover { background: var(--navy); color: var(--white); border-color: var(--navy); }

        .content-wrapper { padding: 2.5rem; }

        /* ====== PAGE HEADER ====== */
        .page-header {
            margin-bottom: 2rem;
        }
        .page-header .tag {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--accent);
            margin-bottom: 0.4rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .page-header .tag::before {
            content: '';
            width: 20px;
            height: 1.5px;
            background: var(--accent);
            display: inline-block;
        }
        .page-header h2 {
            font-family: var(--serif);
            font-size: 2rem;
            color: var(--navy);
            font-weight: 400;
        }
        .page-header p { color: var(--text-muted); margin-top: 0.4rem; font-size: 0.95rem; }

        /* ====== TABLE CARD ====== */
        .card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            border: 1px solid var(--border);
        }
        table { width: 100%; border-collapse: collapse; }
        th {
            background: var(--warm-gray);
            text-align: left;
            padding: 1rem 1.5rem;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }
        td {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid var(--border-light);
            font-size: 0.88rem;
            vertical-align: middle;
            color: var(--text);
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr { transition: background 0.2s; }
        tbody tr:hover { background: var(--warm-gray); }

        /* ====== BADGES ====== */
        .badge {
            padding: 0.3rem 0.85rem;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }
        .badge.pending  { background: #fef3c7; color: #b45309; }
        .badge.accepted { background: #dcfce7; color: #15803d; }
        .badge.rejected { background: #fee2e2; color: #b91c1c; }

        /* ====== ACTION BUTTONS ====== */
        .actions { display: flex; gap: 0.5rem; flex-wrap: wrap; }
        .btn {
            padding: 0.45rem 0.9rem;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.25s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            text-decoration: none;
        }
        .btn-accept { background: #ecfdf5; color: #15803d; border: 1.5px solid #86efac; }
        .btn-accept:hover { background: #10b981; color: white; border-color: #10b981; box-shadow: 0 4px 12px rgba(16,185,129,0.3); }
        .btn-reject { background: #fff1f2; color: #b91c1c; border: 1.5px solid #fca5a5; }
        .btn-reject:hover { background: #ef4444; color: white; border-color: #ef4444; box-shadow: 0 4px 12px rgba(239,68,68,0.3); }
        .btn-wa { background: var(--accent-light); color: var(--navy); border: 1.5px solid var(--border); padding: 0.45rem 0.7rem; }
        .btn-wa:hover { background: #25D366; color: white; border-color: #25D366; box-shadow: 0 4px 12px rgba(37,211,102,0.3); }

        /* ====== ALERT ====== */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .alert-success { background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }

        /* ====== EMPTY STATE ====== */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-muted);
        }
        .empty-state i {
            font-size: 3.5rem;
            color: var(--border);
            margin-bottom: 1rem;
            display: block;
        }
        .empty-state p { font-size: 0.95rem; }
    </style>
</head>
<body>

    <!-- ====== SIDEBAR ====== -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="label">Admin Panel</div>
            <h2>ReforceCode</h2>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-label">Manajemen</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link active">
                <i class="fa-solid fa-list-check"></i> Pesanan
            </a>
        </div>

        <div class="sidebar-footer">
            <a href="{{ url('/') }}" class="sidebar-link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
            </a>
        </div>
    </aside>

    <!-- ====== MAIN CONTENT ====== -->
    <main class="main-content">
        <header class="topbar">
            <span class="topbar-title">Dashboard Pemesanan</span>
            <div class="topbar-right">
                <a href="{{ url('/') }}" target="_blank" class="topbar-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Kunjungi Website
                </a>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="page-header">
                <div class="tag">Manajemen Pesanan</div>
                <h2>Daftar Pemesanan Masuk</h2>
                <p>Kelola dan pantau semua permintaan pemesanan vila dari tamu di sini.</p>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
            @endif

            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>Tamu</th>
                            <th>Tanggal Menginap</th>
                            <th>Kapasitas</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $b)
                        <tr>
                            <td>
                                <strong style="color:var(--navy); font-weight:600;">{{ $b->name }}</strong><br>
                                <span style="font-size:0.75rem; color:var(--text-muted);">
                                    <i class="fa-regular fa-clock"></i>
                                    {{ $b->created_at->format('d M Y, H:i') }}
                                </span>
                            </td>
                            <td>
                                <div style="display:flex; flex-direction:column; gap:2px;">
                                    <span><i class="fa-regular fa-calendar-check" style="color:var(--accent); width:16px;"></i> {{ \Carbon\Carbon::parse($b->check_in)->format('d M Y') }}</span>
                                    <span style="color:var(--text-muted); font-size:0.75rem; padding-left:20px;">s/d</span>
                                    <span><i class="fa-regular fa-calendar-xmark" style="color:var(--text-muted); width:16px;"></i> {{ \Carbon\Carbon::parse($b->check_out)->format('d M Y') }}</span>
                                </div>
                            </td>
                            <td>
                                <div style="display:flex; flex-direction:column; gap:3px;">
                                    <span><i class="fa-solid fa-person" style="color:var(--accent); width:16px;"></i> {{ $b->adults }} Dewasa</span>
                                    <span><i class="fa-solid fa-child" style="color:var(--text-muted); width:16px;"></i> {{ $b->children }} Anak</span>
                                </div>
                            </td>
                            <td>
                                <strong style="font-family:var(--serif); font-size:1.1rem; color:var(--navy);">
                                    Rp {{ number_format($b->total_price, 0, ',', '.') }}
                                </strong>
                            </td>
                            <td>
                                <span class="badge {{ $b->status }}">
                                    @if($b->status === 'pending') ⏳ Menunggu
                                    @elseif($b->status === 'accepted') ✅ Diterima
                                    @else ❌ Ditolak
                                    @endif
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    @if($b->status === 'pending')
                                        <form action="{{ route('admin.booking.status', $b->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="accepted">
                                            <button type="submit" class="btn btn-accept" onclick="return confirm('Terima pesanan dari {{ $b->name }}?')">
                                                <i class="fa-solid fa-check"></i> Terima
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.booking.status', $b->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="btn btn-reject" onclick="return confirm('Tolak pesanan dari {{ $b->name }}?')">
                                                <i class="fa-solid fa-xmark"></i> Tolak
                                            </button>
                                        </form>
                                    @endif
                                    <a href="https://wa.me/6282247011652?text=Halo%20{{ urlencode($b->name) }},%20mengenai%20pesanan%20vila%20Anda" target="_blank" class="btn btn-wa" title="Hubungi via WhatsApp">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="fa-regular fa-folder-open"></i>
                                    <p>Belum ada pesanan yang masuk saat ini.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>
