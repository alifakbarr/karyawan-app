<nav id="sidebar" class="sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
      <span class="align-middle">Karyawan-App</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-header">
        Pages
      </li>

      <li class="sidebar-item {{ request()->is('job')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('job.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Job</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('kusioner')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('kusioner.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Kusioner</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('task')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('task.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Task</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('penilaian')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('penilaian.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Penilaian</span>
        </a>
      </li>

    </ul>

  </div>
</nav>