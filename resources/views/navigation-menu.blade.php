<div class="navbar bg-base-100 rounded-box">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
                <li><a href="{{ route('booking') }}" class="{{ request()->routeIs('booking') ? 'active' : '' }}">Booking</a></li>
                <li><a href="{{ route('inv') }}" class="{{ request()->routeIs('inv') ? 'active' : '' }}">Inventory</a></li>
            </ul>
        </div>
    </div>
    <div class="navbar-center">
        {{-- <a href="{{ route('dashboard') }}" class="btn btn-ghost normal-case text-xl">AR Admin</a> --}}
        <a href="{{ route('dashboard') }}" class="btn btn-ghost normal-case text-xl">
            <img style="height: 40px;" src="{{ asset('img/AR-logo.jpg') }}"/>
        </a>
    </div>
    <div class="navbar-end">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="w-10 rounded-full">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
            </div>
            @else
            <div class="w-10 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            @endif
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a class="justify-between {{ request()->routeIs('profile.show') ? 'active' : '' }}" href="{{ route('profile.show') }}">Profile</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="{{ route('logout') }}" @click.prevent="$root.submit();">Logout</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>