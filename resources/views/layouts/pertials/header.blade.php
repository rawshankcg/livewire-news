<header class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
    <div id="header-left" class="flex items-center">
        <x-authentication-card-logo />
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                

                <x-nav-link wire:navigate href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>

                <x-nav-link wire:navigate href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('Blog') }}
                </x-nav-link>

            </div>
        </div>
    </div>
    <div id="header-right" class="flex items-center md:space-x-6">
        <div class="flex space-x-5">
            @guest
                @include('layouts.pertials.header-right-guest')
            @endguest

            @auth
                @include('layouts.pertials.header-right-auth')
            @endauth
            
        </div>
    </div>
</header>