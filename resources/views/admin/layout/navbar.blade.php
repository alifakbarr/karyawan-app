<nav id="sidebar" class="sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
      <span class="align-middle">Karyawan-App</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-header">
        Pages
      </li>

      <li class="sidebar-item active">
        <a class="sidebar-link" href="index.html">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Karyawan</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('job')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('job.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Job</span>
        </a>
      </li>

    </ul>

  </div>
</nav>