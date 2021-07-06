<x-guest-layout>
    <section style="height: 100vh">
        <header>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
                <div class="z-20">
                    <x-application-logo></x-application-logo>
                </div>
                @if (Route::has('login'))
                    <div class="z-20">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="text-sm text-white hover:text-theme-salmon animate__animated animate__fadeIn">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                               class="text-white hover:text-theme-salmon animate__animated animate__fadeIn">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="ml-4 hover:text-theme-salmon text-white animate__animated animate__fadeIn">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 z-20 relative pt-24">
                <p class="z-30 font-extrabold text-theme-salmon" style="font-size: 4rem; font-family: 'Montserrat', sans-serif; text-transform: uppercase">
                    You've got questions?
                    <span class="text-white">
                        We've got all the answers<span class="text-theme-salmon">.</span>
                    </span>
                </p>
                <p class="py-6 z-30 text-white font-extralight" style="font-size: 2rem; font-family: 'Nunito', sans-serif">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                <div class="py-6">
                    <a class="z-30 py-3 px-6 text-lg border-theme-salmon border text-theme-salmon hover:bg-theme-salmon hover:text-white rounded" href="#">Discover</a>
                </div>
            </div>
            <video class="absolute left-0 right-0 top-0 bottom-0 z-0 object-cover w-full h-full"
                   src="{{asset('/videos/homepage_banner.mp4')}}" muted loop autoplay></video>
            <div class="overlay absolute top-0 bottom-0 right-0 left-0 z-0" style="background: rgb(69,69,85,0.9)"></div>
        </header>
        <div class="overlay"></div>
    </section>
</x-guest-layout>
