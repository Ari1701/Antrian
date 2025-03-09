<nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex " id="navbarsExample11">
          <a class="navbar-brand col-lg-3 me-0" href="#">Puskesmas Delanggu</a>
          <ul class="navbar-nav col-lg-6 justify-content-lg-center">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/dashboard/utama">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/jadwal">Jadwal Dokter</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/profil">Lihat Profil</a></li>
                <li><a class="dropdown-item" href="#">Edit Profil</a></li>
              </ul>
            </li>
          </ul>
            <div class="d-flex w-100 justify-content-end">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
      </div>
    </nav>