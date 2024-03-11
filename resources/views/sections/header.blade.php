<header class="sticky inset-x-0 z-40 {{ is_admin_bar_showing() ? "top-[46px] md:top-[32px]" : "top-0" }}">
    <nav class="bg-white drop-shadow-[0_4px_70px_rgba(30,40,52,0.08)] py-4 md:py-6 px-5 md:px-9">
        <div class="flex justify-between items-center md:mx-auto md:max-w-[670px] xl:max-w-6xl">
            <a class="brand" href="{{ home_url('/') }}">
                @if(has_custom_logo())
                @php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                @endphp
                <img src="{{ esc_url( $logo[0] ) }}" alt="{{ $siteName }}" />
                @else
                {!! $siteName !!}
                @endif
            </a>
            <button id="menu-btn" type="button" class="md:hidden">
                @svg('heroicon-s-bars-3-bottom-right', 'w-8 h-8 text-gray-800')
            </button>

            <ul class="hidden md:flex items-center gap-x-7 text-gray-800 font-medium">
                @if (has_nav_menu('primary_navigation'))
                @foreach(custom_nav_menu('primary_navigation') as $item)
                <li><a @class(['hover:text-gradient', 'my-transition' , 'text-gradient'=> $item['active']]) href="{{ $item['url'] }}">{{ $item['title'] }}</a></li>
                @endforeach
                @endif
                <li class="hidden md:block"><a href="#newsletter" class="py-2 px-3 text-white text-sm bg-gray-800 border border-gray-800 rounded-lg hover:bg-white hover:text-gray-800 my-transition" type="button">Subscribe</a></li>
            </ul>
        </div>
    </nav>
    <div id="menu" class='hidden bg-white fixed inset-x-0 bottom-0 z-50 {{ is_admin_bar_showing() ? "top-[110px]" : "top-[64px]" }}'>
        <div>
            <ul class="flex w-full flex-col">
                @if(has_nav_menu('primary_navigation'))
                @foreach(custom_nav_menu('primary_navigation') as $item)
                <li @class(["px-5", "py-3" , "hover:bg-gray-100" , "flex" , 'bg-gray-100'=> $item['active']])>
                    <a href="{{ $item['url'] }}" class="w-full outline-none">
                        <span class="font-bold text-2xl text-gradient">
                            {{ $item['title'] }}
                        </span>
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</header>
@hasSection('hero')
@yield('hero')
@endif
