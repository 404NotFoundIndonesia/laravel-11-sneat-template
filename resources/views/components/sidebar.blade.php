
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
        @foreach ($menus as $menu)
            @continue(!$menu['available'])

            @if (isset($menu['header']))
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">{{ __($menu['header']) }}</span>
                </li>
            @else
                <li class="menu-item {{ $menu['active'] ? 'active open' : '' }}">
                    <a href="{{ $menu['url'] ?? 'javascript:void(0);' }}" class="{{ isset($menu['submenu']) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu['target']) and !empty($menu['target'])) target="_blank" @endif>
                        @isset($menu['icon'])
                            <i class="menu-icon tf-icons bx {{ $menu['icon'] }}"></i>
                        @endisset

                        <div>{{ $menu['name'] ?? '' }}</div>

                        @isset($menu['badge'])
                            <div class="badge bg-{{ $menu['badge'][0] }} rounded-pill ms-auto">{{ $menu['badge'][1] }}</div>
                        @endisset
                    </a>
                    @isset($menu['submenu'])
                        <ul class="menu-sub">
                            @foreach ($menu['submenu'] as $submenu)
                                @continue(!$submenu['available'])
                                <li class="menu-item {{ $submenu['active'] ? 'active open' : '' }}">
                                    <a href="{{ $submenu['url'] ?? 'javascript:void(0)' }}" class="{{ isset($submenu['submenu']) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($submenu['target']) and !empty($submenu['target'])) target="_blank" @endif>
                                        @if (isset($submenu['icon']))
                                        <i class="menu-icon tf-icons bx {{ $submenu['icon'] }}"></i>
                                        @endif
                                        <div>{{ $submenu['name'] ?? '' }}</div>
                                        @isset($submenu['badge'])
                                        <div class="badge bg-{{ $submenu['badge'][0] }} rounded-pill ms-auto">{{ $submenu['badge'][1] }}</div>
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
