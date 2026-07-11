<!doctype html>
<html lang="ar" dir="rtl" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Astro v5.13.2" />
    <title>قالب لوحة القيادة · Bootstrap v5.3</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard-rtl/" />
    <script src="../assets/js/color-modes.js"></script>
    <link href="{{ asset('assets/dist/css/bootstrap.rtl.min.css') }}" rel="stylesheet" />
    <meta name="theme-color" content="#712cf9" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('assets/dist/css/dashboard.rtl.css') }}" rel="stylesheet" />
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: #0000001a;
            border: solid rgba(0, 0, 0, 0.15);
            border-width: 1px 0;
            box-shadow:
                inset 0 0.5em 1.5em #0000001a,
                inset 0 0.125em 0.5em #00000026;
        }

        .bi {
            vertical-align: -0.125em;
            fill: currentColor;
        }

        /* تحسين مظهر قفل القائمة في الهواتف */
        @media (max-width: 767.98px) {
            .sidebar {
                top: 5rem;
            }
        }

        .sidebar .nav-link {
            font-size: 1rem;
            transition: all 0.2s ease;
        }
    </style>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="list" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
            </path>
        </symbol>
        <symbol id="search" viewBox="0 0 16 16">
            <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
            </path>
        </symbol>
    </svg>

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white text-center fw-bold" href="#">اسم
            الشركة</a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                    aria-label="تبديل البحث">
                    <svg class="bi" width="18" height="18" aria-hidden="true">
                        <use xlink:href="#search"></use>
                    </svg>
                </button>
            </li>
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="تبديل التنقل">
                    <svg class="bi" width="18" height="18" aria-hidden="true">
                        <use xlink:href="#list"></use>
                    </svg>
                </button>
            </li>
        </ul>
        <div id="navbarSearch" class="navbar-search w-100 collapse">
            <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="بحث" aria-label="بحث" />
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav class="sidebar border-end col-md-3 col-lg-2 p-0 bg-dark text-white shadow-sm">
                <div class="offcanvas-md offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header border-bottom border-secondary">
                        <h5 class="offcanvas-title text-white" id="sidebarMenuLabel">لوحة التحكم</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu" aria-label="إغلاق"></button>
                    </div>

                    <div class="d-flex flex-column p-3" style="min-height: calc(100vh - 48px);">
                        <a href="{{ url('/') }}"
                            class="d-flex align-items-center mb-3 text-white text-decoration-none justify-content-center">
                            <i class="fa-solid fa-gauge-high fs-4 me-2"></i>
                            <span class="fs-5 fw-bold">لوحة التحكم</span>
                        </a>

                        <hr class="text-secondary">

                        <ul class="nav nav-pills flex-column mb-auto p-0">
                            <li class="nav-item mb-2">
                                <a href="{{ url('categories') }}"
                                    class="nav-link text-white d-flex align-items-center gap-2 py-2 px-3 {{ Request::is('categories*') ? 'active bg-info text-dark fw-bold' : '' }}">
                                    <i class="fa-solid fa-folder-open fs-5"></i>
                                    <span>إدارة الأصناف</span>
                                </a>
                            </li>

                            <li class="nav-item mb-2">
                                <a href="{{ url('products') }}"
                                    class="nav-link text-white d-flex align-items-center gap-2 py-2 px-3 {{ Request::is('products*') ? 'active bg-info text-dark fw-bold' : '' }}">
                                    <i class="fa-solid fa-cubes fs-5"></i>
                                    <span>إدارة المنتجات</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ url('orders') }}"
                                    class="nav-link text-white d-flex align-items-center gap-2 py-2 px-3 {{ Request::is('orders*') ? 'active bg-info text-dark fw-bold' : '' }}">
                                    <i class="fa-solid fa-shopping-cart fs-5"></i>
                                    <span>إدارة الطلبات</span>
                                </a>
                            </li>
                        </ul>

                        <hr class="text-secondary">

                        <div class="text-center small text-white pt-2 border-top border-secondary">
                            المتجر الإلكتروني &copy; 2026
                        </div>
                    </div>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>
