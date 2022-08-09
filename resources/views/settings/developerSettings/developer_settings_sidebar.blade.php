<div class="sidenavs-10 sidenav sidenav-vertical d-inline-flex bg-white">
	<ul class="sidenav-inner" style="margin-left: 0px !important;">
		
		<!-- <li class="sidenav-divider mt-0"></li> -->
		<li class="sidenav-item {{ (request()->is('settings-roles')) ? 'open' : '' }}">

          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle  {{ (request()->is('settings-roles')) ? 'menu_parent_bg' : '' }}">
            <i class="sidenav-icon ion"><img src="{{asset('images/icon_4.png')}}"></i>
            <div class="menu_li_heading">Basic Settings</div>
          </a>
          <ul class="sidenav-menu sidenav_menu_custom">
            <li class="sidenav-item sidenav_link_li mb-1">
              <a href="{{url('/settings-roles')}}" class="sidenav-link {{ (request()->is('settings-roles')) ? 'actives' : '' }}">
                <div>Roles</div>
              </a>
            </li>
          </ul>
        </li>

		<li class="sidenav-item {{ (request()->is('settings-users')) ? 'open' : '' }}">
			<a href="javascript:void(0)" class="sidenav-link sidenav-toggle  {{ (request()->is('settings-users')) || (request()->is('settings-facility-types')) || (request()->is('settings-template'))  ? 'menu_parent_bg' : '' }} {{ (request()->is('settings-teams')) ? 'menu_parent_bg' : '' }}">
				<i class="sidenav-icon ion"><img src="{{asset('images/icon_2.png')}}"></i>
				<div class="menu_li_heading">User Settings</div>
			</a>

			<ul class="sidenav-menu sidenav_menu_custom">
				<li class="sidenav-item mb-1">
					<a href="{{route('settings-users.index')}}" class="sidenav-link {{ (request()->is('settings-users')) ? 'actives' : ''}}">
						<div>Users</div>
					</a>
				</li>
        {{-- @if(Session::get('role') == '0')
          <li class="sidenav-item mb-1">
            <a href="{{route('settings-facility-types.index')}}" class="sidenav-link {{ (request()->is('settings-facility-types')) ? 'actives' : ''}}">
              <div>Facility Types</div>
            </a>
          </li>
          <li class="sidenav-item mb-1">
            <a href="{{route('settings-template.index')}}" class="sidenav-link {{ (request()->is('settings-template')) ? 'actives' : ''}}">
              <div>Templete</div>
            </a>
          </li>
        @endif --}}
        
			</ul>
		</li>

    </ul>
</div>
