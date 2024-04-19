<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/FutsaLoka-square.png') }}" type="image/x-icon">
    <title>FutsaLoka | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @stack('heads')
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-secondary-subtle">
      <div class="container">
        <a class="navbar-brand">
          <img class="header" style="width: 150px;" src="{{ asset('images/FutsaLoka.png') }}" alt="Logo Quick Goals"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link @yield('active-home')" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('active-book') @guest disabled @endguest" href="{{ route('booking.index') }}">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('active-sche')" href="{{ route('booking.list') }}">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('active-hist')" href="{{ route('riwayat.index') }}">Transaction History</a>
            </li>
          </ul>
          @auth
            <a class="btn px-3 btn-danger" href="#" onclick="return confirmLogout()">Logout</a>
          @endauth
          @guest
            <a class="btn px-3 me-2 btn-outline-primary" href="{{ route('regis.view') }}">Daftar</a>
            <a class="btn px-3 btn-primary" href="{{ route('login.view') }}">Login</a>
          @endguest
        </div>
      </div>
    </nav>
    <div class="container">
      @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      function confirmLogout() {
        Swal.fire({
          title: 'Yakin ingin logout?',
          text: "Anda akan keluar dari akun ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Logout!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "{{ route('logout') }}";
          }
        })
      }
    </script>
    
    @stack('scripts')
  </body>
</html>