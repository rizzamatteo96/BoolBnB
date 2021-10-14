<nav>
    <div class="sidebar-sticky">
        <ul class="nav flex-column border border-secondary rounded rounded-1 dashboard">
            <li class="nav-item">
                <a class="nav-link text-secondary" href="{{route('userreg.apartments.index')}}">
                    <i class="fas fa-home"></i>
                    Apartments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary" href="{{route('userreg.messages.index')}}">
                    <i class="fas fa-envelope-open-text"></i>
                    Messages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary" href="{{route('userreg.statistics.index')}}">
                    <i class="fas fa-signal"></i>
                    Statistics
                </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link text-secondary" href="{{route('userreg.apartment-sponsorship.index')}}">
                  <i class="fas fa-credit-card"></i>
                  Sponsorships
              </a>
            </li> --}}
        </ul>
    </div>
  </nav>