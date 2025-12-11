<div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-building-house'></i>
        <span class="logo_name">PropertiSmart</span>
    </div>

    <ul class="nav-links">

        {{-- DASHBOARD --}}
        <li>
            <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>

        {{-- KATEGORI PROPERTI --}}
        <li>
            <a href="{{ route('category.index') }}" 
               class="{{ request()->is('admin/category*') ? 'active' : '' }}">
                <i class='bx bx-category'></i>
                <span class="links_name">Kategori Properti</span>
            </a>
        </li>

        {{-- TRANSAKSI --}}
        <li>
            <a href="/admin/transaction" 
               class="{{ request()->is('admin/transaction*') ? 'active' : '' }}">
                <i class='bx bx-list-ul'></i>
                <span class="links_name">Transaksi</span>
            </a>
        </li>

        {{-- LOGOUT --}}
        <li>
            <a href="/logout">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Logout</span>
            </a>
        </li>

    </ul>
</div>

<style>
    .sidebar {
        position: fixed;
        width: 250px;
        height: 100%;
        background: #004080;
        transition: 0.4s;
        padding-top: 20px;
    }

    .sidebar.active {
        width: 60px;
    }

    .sidebar .logo-details {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        margin-bottom: 20px;
        font-size: 20px;
        font-weight: bold;
    }

    .sidebar .logo-details i {
        font-size: 26px;
        margin-right: 10px;
    }

    .sidebar ul li {
        list-style: none;
        margin: 10px 0;
    }

    .sidebar ul li a {
        display: flex;
        align-items: center;
        height: 45px;
        text-decoration: none;
        color: #fff;
        padding-left: 20px;
        transition: 0.3s;
    }

    .sidebar ul li a.active,
    .sidebar ul li a:hover {
        background: #013363;
        border-left: 4px solid #ffb700;
    }

    .sidebar ul li a i {
        min-width: 35px;
        font-size: 20px;
    }
</style>
