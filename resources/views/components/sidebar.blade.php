<aside class="app-sidebar bg-light shadow" data-bs-theme="light" style="display: flex; flex-direction: column; height: 100%; background-color: var(--primary);">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->

        <a href="#" class="brand-link">
            <!--begin::Brand Image-->
            <img
                src="{{ asset('storage/' . (auth()->user()->photo ?? '')) }}"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Sahabat Biofarmaka</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper" style="flex: 1; overflow-y: auto;">
        <nav class="mt-3">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column "
                data-lte-toggle="treeview"
                role="menu"
                data-accordion="false"
            >
<x-nav-item icon="speedometer2" :active="request()->routeIs('dashboard')" :href="route('dashboard')">Dashboard</x-nav-item>

<li class="nav-header">MENU</li>

<x-nav-item icon="flower1" :active="request()->routeIs('tanaman*')" :href="route('tanaman')">Tanaman</x-nav-item>

<x-nav-item icon="bug-fill" :active="request()->routeIs('penyakit')" :href="route('penyakit')">Penyakit</x-nav-item>

<x-nav-item icon="exclamation-triangle-fill" :active="request()->routeIs('gejala*')" :href="route('gejala')">Gejala</x-nav-item>

<x-nav-item icon="book" :active="request()->routeIs('basis-pengetahuan')" :href="route('basis-pengetahuan')">Basis Pengetahuan</x-nav-item>

<x-nav-item icon="journals" :active="request()->routeIs('penyakit-tanaman')" :href="route('penyakit-tanaman')">Penyakit Tanaman</x-nav-item>

<x-nav-item icon="clipboard-check" :active="request()->routeIs('diagnosis*')" :href="route('diagnosis')">Diagnosis</x-nav-item>

<li class="nav-header">PROFILE</li>

<x-nav-item icon="person-circle" :active="request()->routeIs('profile*')" :href="route('profile')" >Profile</x-nav-item>

<x-nav-item icon="box-arrow-right" :href="route('logout')">Logout</x-nav-item>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
