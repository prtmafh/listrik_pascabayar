<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title>Login Page</title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Login Page" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard..." />
    <meta name="keywords" content="bootstrap 5, dashboard, admin panel, WCAG compliant" />
    <!--end::Primary Meta Tags-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" media="print"
        onload="this.media='all'" crossorigin="anonymous" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugins-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugins-->

    <!--begin::AdminLTE CSS-->
    <link rel="preload" href="{{ asset('assets/css/adminlte.css') }}" as="style" />
    <link href="{{ asset('assets/css/adminlte.css') }}" rel="stylesheet" type="text/css" />
    <!--end::AdminLTE CSS-->
</head>
<!--end::Head-->

<!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="login-logo d-flex align-items-center justify-content-center gap-2">
            <a href="/" class="d-flex align-items-center text-decoration-none">
                {{-- <img src="assets/img/Logo_PLN.png" alt="Logo PLN" class="img-fluid" style="max-width: 80px;"> --}}
                {{-- <p class="ms-2 fs-4 text-dark">Listrik</p> --}}
                <span class="ms-2 fs-4 fw-bold text-dark">Listrik PascaBayar</span>
            </a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">

                <p class="login-box-msg"></p>

                <form action="{{ route('login.form') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-text"><span class="bi bi-person-fill"></span></div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($errors->has('login_error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal Login',
            text: '{{ $errors->first('login_error') }}',
            confirmButtonText: 'Coba Lagi'
        });
    </script>
    @endif
    @if (session('login_error'))
    <script>
        Swal.fire({
        icon: 'warning',
        title: 'Akses Ditolak',
        text: '{{ session('login_error') }}',
        confirmButtonText: 'Login'
    });
    </script>
    @endif
    <!--begin::Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>

    <!--begin::OverlayScrollbars Configuration-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const Default = {
      scrollbarTheme: "os-theme-light",
      scrollbarAutoHide: "leave",
      scrollbarClickScroll: true
    };

    document.addEventListener("DOMContentLoaded", function () {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
      if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll
          }
        });
      }
    });
    </script>
    <!--end::OverlayScrollbars Configuration-->

    <!--begin::Fix Image Path if Needed-->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
      const cssLink = document.querySelector('link[href*="css/adminlte.css"]');
      if (!cssLink) return;

      const cssHref = cssLink.getAttribute('href');
      const deploymentPath = cssHref.slice(0, cssHref.indexOf('css/adminlte.css'));

      document.querySelectorAll('img[src^="/assets/"]').forEach(img => {
        const originalSrc = img.getAttribute('src');
        if (originalSrc) {
          const relativeSrc = originalSrc.slice(1);
          img.src = deploymentPath + relativeSrc;
        }
      });
    });
    </script>
    <!--end::Fix Image Path-->
    <!--end::Scripts-->
</body>
<!--end::Body-->

</html>