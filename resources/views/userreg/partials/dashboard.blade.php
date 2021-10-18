<nav>
    <div class="sidebar-sticky">
        <ul class="nav flex-column border border-secondary rounded rounded-1 dashboard d-none d-lg-block">
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

        <div class="dropdown d-inline-block d-lg-none">
			<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Menu
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
	
					{{-- Apartments --}}
					<a class="dropdown-item text-secondary" href="{{route('userreg.apartments.index')}}">
							<i class="fas fa-home"></i>
							Apartments
					</a>
	
					{{-- Messages --}}
					<a class="dropdown-item text-secondary" href="{{route('userreg.messages.index')}}">
							<i class="fas fa-envelope-open-text"></i>
							Messages
					</a>
	
					{{-- Statistics --}}
					<a class="dropdown-item text-secondary" href="{{route('userreg.statistics.index')}}">
							<i class="fas fa-signal"></i>
							Statistics
					</a>
			</div>
		</div>
    </div>
  </nav>