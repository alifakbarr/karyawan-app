<nav id="sidebar" class="sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
      <span class="align-middle">Karyawan-App</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-header">
        Pages
      </li>
      @if (auth()->user()->hasRole('admin'))
      <li class="sidebar-item {{ request()->is('karyawan')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('karyawan.index') }}">
          <i class="align-middle" data-feather="user"></i> <span class="align-middle">My Profile</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('handleKaryawan')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('handleKaryawan.index') }}">
          <i class="align-middle" data-feather="users"></i> <span class="align-middle">Karyawan</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('job')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('job.index') }}">
          <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Job</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('task')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('task.index') }}">
          <i class="align-middle" data-feather="target"></i> <span class="align-middle">Task</span>
        </a>
      </li>
      @elseif(auth()->user()->hasRole('headOf'))
      <li class="sidebar-item {{ request()->is('karyawan')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('karyawan.index') }}">
          <i class="align-middle" data-feather="user"></i> <span class="align-middle">My Profile</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('task')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('task.index') }}">
          <i class="align-middle" data-feather="target"></i> <span class="align-middle">Task</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('handleKaryawan')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('handleKaryawan.index') }}">
          <i class="align-middle" data-feather="users"></i> <span class="align-middle">Karyawan</span>
        </a>
      </li>
      
      @elseif(auth()->user()->hasRole('user'))
      <li class="sidebar-item {{ request()->is('karyawan')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('karyawan.index') }}">
          <i class="align-middle" data-feather="user"></i> <span class="align-middle">My Profile</span>
        </a>
      </li>
      <li class="sidebar-item {{ request()->is('taskKaryawan')? 'active':'' }}">
        <a class="sidebar-link" href="{{ route('taskKaryawan.index') }}">
          <i class="align-middle" data-feather="target"></i> <span class="align-middle">Tasks</span>
        </a>
      </li>
      @endif

    </ul>

  </div>
</nav>