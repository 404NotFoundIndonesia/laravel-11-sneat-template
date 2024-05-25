
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route('welcome') }}" class="app-brand-link">
        <span class="app-brand-logo demo"><img src="{{ asset('404_Black.jpg') }}" alt="404 Not Found Indonesia" width="30" style="border-radius: 150px" srcset=""></span>
        <span class="app-brand-text menu-text fw-bold ms-2 fs-5">{{ config('app.name') }}</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @foreach ($menuData->menu as $menu)
            @if (isset($menu->menuHeader))
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">{{ __($menu->menuHeader) }}</span>
                </li>
            @else
                <li class="menu-item {{ Route::is($menu->slug) ? 'active open' : '' }}">
                    <a href="{{ isset($menu->url) ? route($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                        @isset($menu->icon)
                            <i class="{{ $menu->icon }}"></i>
                        @endisset

                        <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>

                        @isset($menu->badge)
                            <div class="badge bg-{{ $menu->badge[0] }} rounded-pill ms-auto">{{ $menu->badge[1] }}</div>
                        @endisset
                    </a>
                    @isset($menu->submenu)
                        <ul class="menu-sub">
                            @foreach ($menu->submenu as $submenu)
                                <li class="menu-item {{ Route::is($submenu->slug) ? 'active open' : '' }}">
                                    <a href="{{ isset($submenu->url) ? route($submenu->url) : 'javascript:void(0)' }}" class="{{ isset($submenu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($submenu->target) and !empty($submenu->target)) target="_blank" @endif>
                                        @if (isset($submenu->icon))
                                        <i class="{{ $submenu->icon }}"></i>
                                        @endif
                                        <div>{{ isset($submenu->name) ? __($submenu->name) : '' }}</div>
                                        @isset($submenu->badge)
                                        <div class="badge bg-{{ $submenu->badge[0] }} rounded-pill ms-auto">{{ $submenu->badge[1] }}</div>
                                        @endisset
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endisset
                </li>
            @endif
        @endforeach
    </ul>
  </aside>
