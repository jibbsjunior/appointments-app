@extends('appointments.layouts')

@section('body')



  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Appointments</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('backend/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>{{ Auth::user()->is_admin == 0 ? 'User' : 'Admin' }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <form action="{{ route('logout') }}" method="post">
                @csrf
            <li>
                  <a class="dropdown-item d-flex align-items-center" href="#" onclick="this.closest('form').submit()">
                    <i class="bi bi-box-arrow-right"></i>
                    
                    Logout
                  </a>
                </li>
              </form>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Book Appointment</span>
        </a>
      </li><!-- End Components Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Book Appointment</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Book Appointment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Book Appointment</h5>
              
              <form action="{{ route('appointments.create') }}" method="POST">
                @csrf
                @error('name')
                    <span class="text-danger font-weight-bold">
                      {{ $message }}
                    </span>
                @enderror
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                  </div>
                </div>
                @error('email')
                    <span class="text-danger font-weight-bold">
                      {{ $message }}
                    </span>
                @enderror
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                  </div>
                </div>
                @error('date')
                    <span class="text-danger font-weight-bold">
                      {{ $message }}
                    </span>
                @enderror
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="date" class="form-control">
                  </div>
                </div>
                @error('time')
                    <span class="text-danger font-weight-bold">
                      {{ $message }}
                    </span>
                @enderror
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                  <div class="col-sm-10">
                    <input type="time" name="time" class="form-control">
                  </div>
                </div>

                @error('notes')
                    <span class="text-danger font-weight-bold">
                      {{ $message }}
                      </span>
                @enderror
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Notes</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="notes" style="height: 100px"></textarea>
                  </div>
                </div>

                <div class="row mb-3 text-center">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Book Appointment</button>
                  </div>
                </div>

              </form>

            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      <script>Document.writeLine(new Date().getFullYear())</script>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


@endsection