<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{Request::is('dashboard') ? 'active' : ''}}d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Request::is('/dashboard/opd') ? 'active' : ''}}d-flex align-items-center gap-2" href="/dashboard/opd">
              <i class="bi bi-people"style="color:black"></i>
                OPD
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Request::is('/dashboard/kategori') ? 'active' : ''}}d-flex align-items-center gap-2" href="/dashboard/kategori">
              <i class="bi bi-ui-checks-grid"style="color:black"></i>
                Kategori
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Request::is('dashboard/subkategori') ? 'active' : ''}}d-flex align-items-center gap-2" href="/dashboard/subkategori">
              <i class="bi bi-ui-radios"style="color:black"></i>
                Sub Kategori
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Request::is('dashboard/artikel') ? 'active' : ''}}d-flex align-items-center gap-2" href="/dashboard/artikel">
              <i class="bi bi-folder2"style="color:black"></i>
                Artikel
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Request::is('dashboard/dokumenartikel') ? 'active' : ''}}d-flex align-items-center gap-2" href="/dashboard/dokumenartikel">
              <i class ="bi bi-file-earmark-text"style="color:black"></i>
                Dokumen Artikel
              </a>
            </li>
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="">
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"> <i class ="bi bi-box-arrow-right"style="color:black"></i>
                     Logout
                    </button>
                </form>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>