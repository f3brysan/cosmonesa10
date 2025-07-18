<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span class="text-primary">
                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                            <g id="Icon" transform="translate(27.000000, 15.000000)">
                                <g id="Mask" transform="translate(0.000000, 8.000000)">
                                    <mask id="mask-2" fill="white">
                                        <use xlink:href="#path-1"></use>
                                    </mask>
                                    <use fill="currentColor" xlink:href="#path-1"></use>
                                    <g id="Path-3" mask="url(#mask-2)">
                                        <use fill="currentColor" xlink:href="#path-3"></use>
                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                    </g>
                                    <g id="Path-4" mask="url(#mask-2)">
                                        <use fill="currentColor" xlink:href="#path-4"></use>
                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                    </g>
                                </g>
                                <g id="Triangle"
                                    transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                    <use fill="currentColor" xlink:href="#path-5"></use>
                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                </g>
                            </g>
                        </g>
                    </g>
                    </svg>
                </span>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Cosmonesa</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item active">
            <a href="{{ URL::to('back/dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div class="text-truncate" data-i18n="Basic">Home</div>
            </a>
        </li>

        @role('superadmin|pengelola')
            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Menu</span>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div class="text-truncate" data-i18n="Menu">Menu</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <div class="text-truncate" data-i18n="Master Tools">Product</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ URL::to('back/product-categories') }}" class="menu-link">
                                    <div class="text-truncate" data-i18n="Produk">Product Categories</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ URL::to('back/product') }}" class="menu-link">
                                    <div class="text-truncate" data-i18n="Produk">Product Items</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <div class="text-truncate" data-i18n="Master Tools">Service</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ URL::to('back/service-categories') }}" class="menu-link">
                                    <div class="text-truncate" data-i18n="Produk">Service Categories</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ URL::to('back/event') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Workshop">Event</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-list-ul"></i>
                    <div class="text-truncate" data-i18n="Menu">Penyedia Jasa</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ URL::to('back/service-provider-list') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Workshop">Daftar Penyedia Jasa</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
            <a href="{{ URL::to('back/transaction-history') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div class="text-truncate" data-i18n="Basic">Histori Transaksi</div>
            </a>
        </li>
        @endrole

        @role('seller')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div class="text-truncate" data-i18n="Menu">Kiosku</div>
            </a>            
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ URL::to('back/kiosku/service') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Workshop">Service</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('back/kiosku/service-history') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Workshop">Riwayat Service</div>
                    </a>
                </li>
            </ul>
        </li>
        @endrole

        @role('superadmin')
            <!-- Master Tools -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master</span>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-wrench"></i>
                    <div class="text-truncate" data-i18n="Master Tools">Master Tools</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ URL::to('back/master/pengguna') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Pengguna">Pengguna</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole
    </ul>
</aside>
