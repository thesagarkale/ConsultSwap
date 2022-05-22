<x-guest-layout>
    <section class="flex flex-col relative hero-banner">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between w-full items-center"
             style="height: 10%">
            <div class="z-20">
                <x-application-logo></x-application-logo>
            </div>
            @if (Route::has('login'))
                <div class="z-20">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="text-sm text-white hover:text-theme-salmon">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-white hover:text-theme-salmon">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 hover:text-theme-salmon text-white">Register</a>
                        @endif
                    @endauth
                </div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-20 relative h-full flex flex-col justify-center"
             style="height: 90%">
            <p class="z-30 font-extrabold text-theme-salmon lg:text-6xl text-5xl"
               style="font-family: 'Montserrat', sans-serif; text-transform: uppercase">
                You've got questions?
                <span class="text-white">
                        We've got the answers<span class="text-theme-salmon">.</span>
                </span>
            </p>
            <p class="py-6 z-30 text-white font-extralight lg:text-3xl text-2xl"
               style="font-family: 'Nunito', sans-serif">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.
            </p>
            <div class="py-6">
                <a class="z-30 py-3 px-6 text-lg border-theme-salmon border text-theme-salmon hover:bg-theme-salmon hover:text-white rounded"
                   href="#">Discover</a>
            </div>
        </div>
        <video class="absolute left-0 right-0 top-0 bottom-0 z-0 object-cover w-full h-full"
               src="{{asset('/videos/homepage_banner.mp4')}}" muted loop autoplay></video>
        <div class="overlay absolute top-0 bottom-0 right-0 left-0 z-0" style="background: rgb(69,69,85,0.9)"></div>
        <div class="text-white z-10 font-thin absolute bottom-4" style="font-size:40px; right: 50%">
            <i class=" fa fa-solid fa-angle-down"></i>
        </div>
        <div class="overlay"></div>
    </section>
    <section class="bg-gray-100 relative hero-second">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 md:flex md:justify-between w-full items-center">
            <div class="pb-4 md:p-0">
                <svg class="what-we-do-svg" viewBox="0 0 1440 980">
                    <defs>
                        <style>.cls-1 {
                                fill: #ffb387;
                            }

                            .cls-2 {
                                fill: #262626;
                            }

                            .cls-3 {
                                fill: #1d90dd;
                            }

                            .cls-4 {
                                fill: #f15a24;
                            }</style>
                    </defs>
                    <path class="cls-1"
                          d="M408.76,269s11.68,6.49,13.64,18.71l18.93,19.26-22.2,16.74s-13.69-17.4-15.44-19.36.06-6.71-2.61-8.35S408.76,269,408.76,269Z"/>
                    <path class="cls-1"
                          d="M319.25,269s-11.68,6.49-13.64,18.71l-18.93,19.26,22.2,16.74s13.69-17.4,15.44-19.36-.06-6.71,2.61-8.35S319.25,269,319.25,269Z"/>
                    <polygon class="cls-1"
                             points="458.08 860.27 461.51 889.51 417.22 889.51 414.72 866.35 458.08 860.27"/>
                    <path class="cls-2"
                          d="M463,925.4h8.42a372.31,372.31,0,0,1-9.11-39.78s-26.06-1.6-46.91,0c0,0-.25,3.15,0,21.47Z"/>
                    <path class="cls-3"
                          d="M471,925.4h-65s-2.54-17.13,9.09-26.07,34.21-7.07,44.64-.8S471,925.4,471,925.4Z"/>
                    <polygon class="cls-1"
                             points="284.63 870.96 281.57 889.51 325.86 889.51 327.77 871.83 284.63 870.96"/>
                    <path class="cls-2"
                          d="M280.07,925.4h-8.42a373.79,373.79,0,0,0,9.1-39.78s26.07-1.6,46.92,0c0,0,.25,3.15,0,21.47Z"/>
                    <path class="cls-3"
                          d="M304.75,603.91s-7.47,92.51-11.4,126.11C289.59,762.25,281.8,833,275,864.56a5.44,5.44,0,0,0,2.82,6c7.65,4,27,11.46,55.15,4.06a5.44,5.44,0,0,0,4-4.63c2.22-19,12.47-106.88,14.41-129,2.18-24.88,12.22-91.64,12.22-91.64l5.67-.44S378,704.27,385,744.42c6.17,35.48,18.14,106.44,20.84,122.42a5.43,5.43,0,0,0,4,4.35c7.91,2.13,28.55,5.34,52.35-9.52a5.42,5.42,0,0,0,2.42-5.65c-3.3-16.79-17.37-88.42-25-129.06-8.73-46.25-11.84-123.05-11.84-123.05Z"/>
                    <path class="cls-4"
                          d="M341.17,436.2s-9.16,2.23-11.78,2-46-50.84-47.34-57.17,20.83-39.92,31.63-54.76c0,0-13.31-19-30.33-23.78,0,0-52.8,54.32-55,66.11s26.54,58.3,76.15,111.16c0,0-.33,82.62-7.2,128.44,0,0,73,21.6,136.47,0,0,0-8.18-118-4.91-132.69,0,0,56.95-85.64,56.62-97.1s-38.95-75.92-38.95-75.92-24.21,5.56-34.69,20.94c0,0,22.91,44.84,21.28,55s-36.5,56.95-36.5,56.95a53.15,53.15,0,0,0-12.6-.32C377.17,435.71,341.17,436.2,341.17,436.2Z"/>
                    <path class="cls-1"
                          d="M384,435.06s-9.49,13.58-20.78,13.58-22.09-12.44-22.09-12.44a39.94,39.94,0,0,0,5-9.34,59.93,59.93,0,0,0,3.65-15.2h24.39a46.27,46.27,0,0,0,1,6.42C378,429.57,384,435.06,384,435.06Z"/>
                    <path class="cls-2"
                          d="M375.28,418.08c-3.93,3.84-12.6,9.54-29.09,8.78a59.93,59.93,0,0,0,3.65-15.2h24.39A46.27,46.27,0,0,0,375.28,418.08Z"/>
                    <path class="cls-1"
                          d="M395.09,382a6.34,6.34,0,0,0-4.4-.91c.94-3.16,1.54-5.3,1.54-5.3s4.36-36.88-29.24-36.88c-39.93,0-32.51,36.88-32.51,36.88s.71,2.22,1.81,5.51c-.94-.41-2.58-.62-5,.7-4.26,2.3,1.31,11.62,4.42,12.77,2,.73,3.81-.39,4.89-1.31,2.08,5.58,4.28,10.95,5.91,13.53,4.15,6.54,14.62,10.91,20.07,10.91s15.28-6.33,19.2-12.44c1.41-2.19,3.16-6.62,4.81-11.41a4.55,4.55,0,0,0,4.11.72C393.78,393.65,399.35,384.33,395.09,382Z"/>
                    <path class="cls-2"
                          d="M392.49,349c-3.42-11.13-10.9-11.45-10.9-11.45-5.07-8.68-23.4-11.95-36-5.73-11.83,5.84-18.82,16.85-18.65,28.47a50,50,0,0,0,5.35,21.06,2.66,2.66,0,0,1,2.89-3.47,58.65,58.65,0,0,0,10.74.57c8.83-.32,32.4-12.27,32.4-12.27a42.74,42.74,0,0,0,7.38,4.19c2.15,8,1.13,17.41,1.13,17.41,1.47-4.74,3.86-6.64,3.86-6.64,2.39-3.13,1.71-8.41,1.71-8.41S395.92,360.11,392.49,349Z"/>
                    <path class="cls-3"
                          d="M272.08,925.4h65s2.54-17.13-9.09-26.07-34.22-7.07-44.65-.8S272.08,925.4,272.08,925.4Z"/>
                    <path class="cls-2"
                          d="M580.06,168.31a65.44,65.44,0,0,0,2.5-31.1,81.11,81.11,0,0,0-11.49-29.55,129.82,129.82,0,0,0-22.56-26.84c-13.3-12.21-28.57-19.4-44.69-25.09C450.86,37,428,80.49,428,80.49l38.33,35.2c3.56-5,8-6.13,14.45-5.13s12.53,4.15,18.3,9.44a30.48,30.48,0,0,1,9.62,15.89q2,8.87-6.26,17.84A25.14,25.14,0,0,1,489.3,161a146,146,0,0,1-18.4,3q-10.18,1.08-21.8,2.05a114.63,114.63,0,0,0-23,4.34,84.21,84.21,0,0,0-21.93,10.2,65.11,65.11,0,0,0-18.68,19l49.89,45.8a42.85,42.85,0,0,1,17.12-14.31A82.41,82.41,0,0,1,473.18,225a171.23,171.23,0,0,1,22.44-2.08,164,164,0,0,0,22.92-2.25,103.89,103.89,0,0,0,22.09-6.38,56.3,56.3,0,0,0,20-14.44Q575,184.19,580.06,168.31Z"/>
                    <path class="cls-2"
                          d="M395.45,238.2q-14.64-13.44-33.11-12t-31.91,16.06Q317,256.89,317.15,275.42t14.79,32q14.63,13.44,33.11,12T397,303.33q13.43-14.64,13.28-33.17T395.45,238.2Z"/>
                    <path class="cls-1" d="M321.62,298s7.46-9.69,4.1-12.31-9.26,5.08-9.26,5.08Z"/>
                    <path class="cls-1" d="M405.6,296.32s-7.46-9.7-4.09-12.32,9.25,5.08,9.25,5.08Z"/>
                    <polygon class="cls-1"
                             points="569.83 856.89 565.57 887.15 530.88 882.11 534.81 848.73 569.83 856.89"/>
                    <path class="cls-1"
                          d="M655.82,853.31a336.46,336.46,0,0,1,1.64,33.84c1.7,0,35-4.39,35-4.39l-2-28.14Z"/>
                    <path class="cls-3"
                          d="M560.45,573.74s-10.57,82.52-15,111.49c-1.58,10.45-14.34,133.26-19.1,162.66a4.45,4.45,0,0,0,1.73,4.3c5.58,4.19,21.93,13.68,48.23,6.46a4.49,4.49,0,0,0,3.25-3.7c2.84-20.31,19.94-142.24,23.06-157.72,4.56-22.6,11.88-53.12,11.88-53.12h5.24s17.46,72.32,21,93.71c3.12,19.16,4.85,100.92,5.18,117.81A4.48,4.48,0,0,0,649,859.8c7.82,2.61,29.47,8.22,48.66-1.91a4.47,4.47,0,0,0,2.37-4.08c-.42-16.68-2.79-106.14-5.16-135.08-2.62-32-13.53-145-13.53-145Z"/>
                    <path class="cls-2"
                          d="M616.44,378.33c-8.11,0-39.73,7.82-67,30.1-7.75,6.33-19.09,37.64-17.68,63.73l29.46,9.26s-3.27,57.27-3.93,93.27c0,0,51.06,33.38,131.89,0,0,0-6.87-73.64-5.89-105.71,0,0,7.86,16.69,15.38,28.47,0,0,22.91-1,40.34-15.71,0,0-25.61-61.52-42-74.61S639.27,378.33,616.44,378.33Z"/>
                    <path class="cls-1"
                          d="M630.76,366.73a80.1,80.1,0,0,0-.06,14.95s-5.46,7-14.4,7.41-15.93-7-15.93-7,.45-3.22.94-7.5a144.85,144.85,0,0,0,1.22-17.18l29,2.21S631.11,362.61,630.76,366.73Z"/>
                    <path class="cls-2"
                          d="M631.57,359.64s-.46,3-.81,7.09c-3.87,2.55-11.64,7.34-16.7,8.29-3.53.67-8.61.2-12.75-.41a144.85,144.85,0,0,0,1.22-17.18Z"/>
                    <path class="cls-4"
                          d="M637.15,411.37a65.3,65.3,0,0,0-30.61-6.11,81.06,81.06,0,0,0-30.68,8,129.66,129.66,0,0,0-29.29,19.28C532.89,444.3,524,458.63,516.45,474c-24.74,50.43,15.76,78.22,15.76,78.22l39.42-34c-4.52-4.11-5.16-8.67-3.41-14.94s5.58-12,11.51-17.08a30.39,30.39,0,0,1,16.9-7.71q9-.93,17,8.3a25.11,25.11,0,0,1,5.7,13.87,147.42,147.42,0,0,1,.86,18.63q-.12,10.25-.5,21.9a113.86,113.86,0,0,0,1.63,23.33,83.82,83.82,0,0,0,7.58,23,65.15,65.15,0,0,0,16.71,20.77L696.9,564a42.92,42.92,0,0,1-12.22-18.67A82.8,82.8,0,0,1,681,524.11a173.2,173.2,0,0,1,.55-22.53,165.71,165.71,0,0,0,.43-23,104.73,104.73,0,0,0-3.76-22.69,56.49,56.49,0,0,0-12-21.54Q652.32,418.27,637.15,411.37Z"/>
                    <path class="cls-4"
                          d="M685.06,602.85q-15.06,13-15.79,31.49t12.24,33.56Q694.48,683,712.9,685t33.47-11q15-13,15.78-31.48t-12.23-33.57q-13-15-31.4-17.05T685.06,602.85Z"/>
                    <path class="cls-1"
                          d="M649.7,327.82c.66-8.88-.64-27.75-22.87-31.35-25.89-4.19-35.92,14-37.23,29.21-1.75.62-3.62,2.15-4.54,5.71-1.55,6,2.18,12.72,7.66,13.93a73.23,73.23,0,0,0,3.34,10.39c3,6.38,14.09,12.84,17.35,13.42,6.23,1.09,20.62-5.57,25.2-10,2.14-2.06,4.56-8,6.53-13.75a11.42,11.42,0,0,0,9.48-9.38C655.57,330.26,652,328.42,649.7,327.82Z"/>
                    <path class="cls-1"
                          d="M732,502.37c-3.43,7.69-34.36,46-36,49.09s-9.16,14.23-18,15.54-12.43-6.22-11.78-7.85,5.73-2.46,9.49-3.77,6.77-10,5-9.49-7.09,4.26-7.53,2.08,2.62-7.42,4.8-9.82,4.55-.87,5.46-2.51,12.24-18.44,16.75-25.2A20.32,20.32,0,0,0,703.34,497a84.62,84.62,0,0,0,30.87-11.57C734.46,489,734.61,496.63,732,502.37Z"/>
                    <path class="cls-1"
                          d="M513.75,513.65c1.53,1,4.91,9.66,6.71,11.46s9.17,7.69,7.53,12.27-3.44,9.49-8.51,8.67S504.1,532.63,502,524.45,509.34,510.87,513.75,513.65Z"/>
                    <path class="cls-2"
                          d="M571.3,901.41s-43,20-51.49,22.79-19.11,2.16-26.08-3.41-6.27-14.55,2.22-24.22,36.39-20.72,36.39-20.72,12.43-2.41,20.31,5.18c0,0,8.76,1.5,15.06-2.31a2.35,2.35,0,0,1,3.59,2Z"/>
                    <path class="cls-2"
                          d="M655.17,881v20.94s28.28,24.76,36.86,26.36,24.46,1.24,27.64-10.33-27.32-39.85-27.32-39.85-9.11-3-18,0c0,0-5.68,5.49-16.61,1.15A1.87,1.87,0,0,0,655.17,881Z"/>
                    <path class="cls-2"
                          d="M649.7,327.82s-1.65,5.79-3.73,13.41c0,0-1.14-10.36-.9-12.49a21.53,21.53,0,0,0-.62-5.72s-2.84,3.16-10.37,3.38a11.76,11.76,0,0,0,2.73-5.67,88.22,88.22,0,0,1-23.07,9.16c-12.44,2.78-20.46-.49-20.46-.49s8.67-2.29,12.11-10.31a16.82,16.82,0,0,1-15.79,6.59s0-9.32,1.17-15.1,3.92-17.78,17.08-23.89,34.85-.87,40.63,7.85c0,0,3.71-.32,4.91,4.8,0,0,6,15.93-.93,29.78Z"/>
                    <path class="cls-2" d="M594.59,324.33s-4.42,5.94-3.87,12.38l-1.12-11,4.45-5.72Z"/>
                    <path class="cls-3"
                          d="M763.56,210.3a32.91,32.91,0,0,0-14.87-5.1,40.9,40.9,0,0,0-15.85,1.92,65.69,65.69,0,0,0-15.9,7.66c-7.62,5-13,11.53-17.82,18.68-15.72,23.51,2.63,40.09,2.63,40.09l22-14.31c-2-2.36-2-4.68-.7-7.69a17.63,17.63,0,0,1,6.89-7.75,15.29,15.29,0,0,1,9-2.72q4.57.15,7.92,5.28a12.65,12.65,0,0,1,1.92,7.31,73.58,73.58,0,0,1-.82,9.36q-.75,5.1-1.72,10.89a57.52,57.52,0,0,0-.75,11.75,42.4,42.4,0,0,0,2.25,12,32.58,32.58,0,0,0,7,11.48l28.56-18.63a21.75,21.75,0,0,1-4.85-10.14,41.9,41.9,0,0,1-.42-10.85,86.51,86.51,0,0,1,1.78-11.21,83.81,83.81,0,0,0,1.76-11.46,52.36,52.36,0,0,0-.36-11.58,28.45,28.45,0,0,0-4.55-11.55Q770.68,214.76,763.56,210.3Z"/>
                    <path class="cls-3"
                          d="M774.64,309.08q-8.39,5.48-10,14.66A25.43,25.43,0,0,0,783,351.93q9.06,2.24,17.44-3.23a21.46,21.46,0,0,0,10-14.66,25.42,25.42,0,0,0-18.39-28.19Q783,303.62,774.64,309.08Z"/>
                    <path class="cls-2"
                          d="M912.7,448.89s26.18-13.74,11.78-33.71S901.9,399.8,898,378.2s-.16-45.16-19.64-57.27c-24.4-15.18-60.32.65-63.92,31.42s3.21,29.78-3.58,43.85-29,45.82,2.38,57.93S912.7,448.89,912.7,448.89Z"/>
                    <polygon class="cls-1"
                             points="903.79 870.78 903.63 887.41 936.9 887.73 934.64 867.76 903.79 870.78"/>
                    <path class="cls-2"
                          d="M933.27,882.19c-4.06,1.23-15.66,2.83-29.35,1.39a3.29,3.29,0,0,0-3.35,1.95c-.87,2-3.27,4.68-9.81,6.17-11,2.51-22.89,3.34-29.21,9.53-3.68,3.6-5.65,11.08-6.65,16.69a5.62,5.62,0,0,0,5.94,6.6l74.8-5.19a5.62,5.62,0,0,0,5.22-6.16c-.7-7.11-2-19.34-3.41-28.34A3.28,3.28,0,0,0,933.27,882.19Z"/>
                    <polygon class="cls-1"
                             points="801.91 865.55 800.6 882.13 833.77 884.75 832.89 864.67 801.91 865.55"/>
                    <path class="cls-2"
                          d="M809.61,603s-11.35,87.71-14.84,131.46c-2.46,30.85-3.37,107.37-3.56,128.22a5.66,5.66,0,0,0,4.64,5.63c7.16,1.32,22.2,3,42.82-.21a5.68,5.68,0,0,0,4.83-5.64c-.11-18.79-.28-77.79,2.76-105.64,5.4-49.42,19.09-112.59,19.09-112.59h3.49s4,72.44,6.22,102.11c1.89,25.76,14.55,103.44,17.86,123.52a6.52,6.52,0,0,0,5.85,5.42c8.39.74,25.94,1,42.81-7.12a6.52,6.52,0,0,0,3.62-7c-3.13-18.08-14.39-84.23-17-115.7-3.06-36.65-12.06-143.78-12.06-143.78Z"/>
                    <path class="cls-1"
                          d="M919.51,617a35.82,35.82,0,0,1-2.18,6.38c-1,1.8-5.78,3.6-7.25,6.11a2.47,2.47,0,0,0,2.29,3.92,10.67,10.67,0,0,0,3.27-1.8,8.12,8.12,0,0,1-3.71,5.3c-3.27,2.07-8.07,2.72-9,4.36s3.82,9.38,10,10.25,14.08-5.67,17.24-9.38S937.46,629,937.46,629Z"/>
                    <path class="cls-1"
                          d="M811.69,418.42s3.56-7.75,5.47-9.41,6.51-7.36,7-9c.84-2.93-.95-3.37-2.68-2.64-.7.29-3.53,1.62-3.53,1.62s1.38-7.37,3.41-9.53,6.48-2.93,7.12-3.56-4.32-3.18-8.39-1.53S814.61,387,814,387s-5.85-1.9-9.92-.51-6.86,7.76-8,10.81-.51,8-2.93,12.07Z"/>
                    <path class="cls-4"
                          d="M833,430.78s-11.05,4.65-14.29,7.31a126.44,126.44,0,0,0-17.13,17.46s7.86-27.28,13.75-39.28a43.84,43.84,0,0,0-27.49-13.52s-24.66,62.18-26.4,75.71,8.29,31.63,20.94,34,30.11-7.85,30.11-7.85.52,32.51-.87,57.82c-1.28,23.34-4.38,44.77-4.38,44.77s63.94,12.61,110.52-3.54c0,0,1.2-48.76,1.2-80.18,0,0,3.22,15.38,4.75,18s4,47.35-8.67,71.78c0,0,9.82,18.33,29.67,18.33,0,0,20.45-70.26,13-102.55s-28.48-75.7-42.55-85.74S880.73,429,880.73,429Z"/>
                    <path class="cls-1"
                          d="M880.73,429S868.41,443,852,441.47,833,430.78,833,430.78s8.07-3.16,10-8.51a22.1,22.1,0,0,0,1-5.29,94.29,94.29,0,0,0,.08-12.93l21.6-2.94s.31,3.1.8,6.94A97.63,97.63,0,0,0,868.73,421C870.26,425.76,880.73,429,880.73,429Z"/>
                    <path class="cls-2"
                          d="M866.48,408.05c-4,3.59-9.84,8.39-12.86,9.09-2,.47-5.82.26-9.62-.16a94.29,94.29,0,0,0,.08-12.93l21.6-2.94S866,404.21,866.48,408.05Z"/>
                    <path class="cls-1"
                          d="M824.22,370.89s4.37,18.55,7.42,23.57,14.18,14,20.07,14.18,18.33-8.29,22.48-14S879.64,377,879.64,377s1.68,1.91,3.93-.6c2.78-3.11,7-13.91,5.56-16.53s-7.36,0-7.36,0-5.73-4.09-4.09-16.36c0,0-23.07,19.64-46.47,19.47C831.21,363,828.53,368.66,824.22,370.89Z"/>
                    <path class="cls-2"
                          d="M830.79,879.17c-3.93.89-15,1.65-27.92-.62a3.1,3.1,0,0,0-3.3,1.63c-1,1.79-3.41,4.22-9.71,5.21-10.54,1.66-21.92,1.66-28.32,7.11-3.73,3.17-6.09,10.14-7.41,15.39a5.35,5.35,0,0,0,5.2,6.65h71.26A5.36,5.36,0,0,0,836,909c-.2-6.78-.62-18.46-1.37-27.09A3.1,3.1,0,0,0,830.79,879.17Z"/>
                    <polygon class="cls-1"
                             points="1106.19 872.3 1104.79 891.48 1140.25 894.5 1139.32 871.29 1106.19 872.3"/>
                    <path class="cls-2"
                          d="M1138.43,888.05c-4.55,1-17.39,1.91-32.29-.72a3.62,3.62,0,0,0-3.82,1.89c-1.1,2.07-3.94,4.88-11.22,6-12.19,1.92-25.34,1.92-32.74,8.22-4.31,3.68-7,11.72-8.57,17.8a6.19,6.19,0,0,0,6,7.68h82.38a6.18,6.18,0,0,0,6.19-6.36c-.22-7.84-.71-21.34-1.58-31.33A3.59,3.59,0,0,0,1138.43,888.05Z"/>
                    <polygon class="cls-1"
                             points="1166.1 872.3 1164.7 891.48 1200.16 894.5 1199.22 871.29 1166.1 872.3"/>
                    <path class="cls-2"
                          d="M1198.33,888.05c-4.55,1-17.38,1.91-32.28-.72a3.62,3.62,0,0,0-3.82,1.89c-1.11,2.07-3.94,4.88-11.22,6-12.19,1.92-25.34,1.92-32.74,8.22-4.31,3.68-7,11.72-8.57,17.8a6.19,6.19,0,0,0,6,7.68h82.39a6.18,6.18,0,0,0,6.19-6.36c-.23-7.84-.72-21.34-1.58-31.33A3.6,3.6,0,0,0,1198.33,888.05Z"/>
                    <path class="cls-3"
                          d="M1204.29,874.53a199.49,199.49,0,0,1-40.77,4.69c-11.2.2-18.65-.49-18.65-.49v-4.2c-16.38,4.62-47.88,0-47.88,0,0-20.58-12.81-113.61-12.5-146.36s7-125.78,7-125.78l105.73-2.11s-4.84,96.39-3.26,129.78S1204.29,874.53,1204.29,874.53Z"/>
                    <path class="cls-2"
                          d="M1163.52,879.22c-11.2.2-18.65-.49-18.65-.49v-4.2S1131,764.08,1129.33,729.22s.33-101.53.33-101.53l4,2.94s2.81,71.29,6.17,105.31C1142.92,767.19,1153.09,845.25,1163.52,879.22Z"/>
                    <path class="cls-3"
                          d="M1040.44,443q-15.35-11.42-32.89-8.22t-29,18.53q-11.42,15.35-9.43,33.07t17.32,29.14q15.33,11.4,32.88,8.22t29-18.54q11.42-15.33,9.44-33.06T1040.44,443Z"/>
                    <path class="cls-1"
                          d="M1045.44,536.5s-9-2.83-14.49-2.36-10.08.83-25.52-2.26-19.11-12.53-18.58-14.12,3.46-3.78,10.71-1.73,14.33,5.39,23.31,3.64-4.88-3.17-3-7.11,8-4.25,12.59-2,23,2.83,23,2.83Z"/>
                    <path class="cls-4"
                          d="M1205.76,519.67c-.94,38.13,0,84,0,84-66.71,23.42-123.79,0-123.79,0s1.73-14,2.52-38.63c.14-4.54.26-9.45.32-14.7.08-5.91,0-12.6,0-19.62-.39-32.93-2.18-57-2.18-57-1.81-1.81-9-17.37-13.22-23.32-6-8.54-9.14-23.93-9.14-23.93s17.64-2.53,32.75-11.4,38.42,0,38.42,0l26.64,10s25.66-.16,39.21,16.54a38,38,0,0,1,6.21,11c2.1,5.7,3.08,12.1,3.44,19.39C1207.53,484.71,1206.25,500.27,1205.76,519.67Z"/>
                    <path class="cls-3"
                          d="M1210.26,357.84a63,63,0,0,0-.68-30,78.33,78.33,0,0,0-13.92-27.15,125,125,0,0,0-24.26-23.47c-13.94-10.37-29.27-15.75-45.27-19.6-52.55-12.66-70.16,31.21-70.16,31.21l40.19,29.9c2.91-5.1,7.06-6.66,13.32-6.33s12.41,2.73,18.45,7.23a29.24,29.24,0,0,1,10.79,14.25q2.77,8.29-4.23,17.71a24.24,24.24,0,0,1-11.84,8.26,139.59,139.59,0,0,1-17.32,4.71q-9.64,2-20.67,4.12a109.85,109.85,0,0,0-21.57,6.43,80.69,80.69,0,0,0-20,11.94,62.63,62.63,0,0,0-16,20.05l52.3,38.91a41.32,41.32,0,0,1,15-15.4,79.68,79.68,0,0,1,19.18-7.93,165.39,165.39,0,0,1,21.27-4.21,159.49,159.49,0,0,0,21.72-4.43,100.37,100.37,0,0,0,20.52-8.29,54.18,54.18,0,0,0,17.71-15.8Q1207,373.55,1210.26,357.84Z"/>
                    <path class="cls-1"
                          d="M1158.05,425c-21.43,11.49-32.45,0-32.45,0,.38-3.69.55-7.31.61-10.63a143.25,143.25,0,0,0-.61-16.31l32.45-3.46a85,85,0,0,0-.82,9.19A147.11,147.11,0,0,0,1158.05,425Z"/>
                    <path class="cls-2"
                          d="M1158.05,394.6a85,85,0,0,0-.82,9.19c-5,4.57-12.16,10.43-16.27,11.29-3.27.67-9.32.09-14.75-.71a143.25,143.25,0,0,0-.61-16.31Z"/>
                    <path class="cls-1"
                          d="M1175.63,360.58c-2.58-2.36-5.37-1.27-7-.26.07-1.89.09-3,.09-3s-2.83-27.09-29.13-27.41-33.37,21.75-31.08,33.76c0,0,.22,1.31.6,3.36a4.27,4.27,0,0,0-3.33,2c-2.52,3.35,2.31,11.66,4.2,12.71a12,12,0,0,0,2.35,1,62.63,62.63,0,0,0,3,8.27c2.52,6.61,17,16.15,24.26,16.15s16.9-7.86,22.88-14.16c2.33-2.44,3.61-8.27,4.56-14.61a3.8,3.8,0,0,0,3,.33C1173,378,1179.51,364.15,1175.63,360.58Z"/>
                    <path class="cls-2"
                          d="M1168.66,360.32l-2.74,9.08s-7.33-7-7.41-19.84c0,0-19.21,24.46-49.37,17.43l-2.06.72s-1.68-14.19-.06-24.48c2.52-16,14.92-24.12,27.08-26.16,17.49-2.95,25.52.83,35.44,10.13,0,0,8.35,13.86,1.92,32Z"/>
                    <path class="cls-2"
                          d="M1206.91,471.9c-2.37,6.32-30.42,78.79-71.39,89.33-17.07,4.39-35.3,4.84-51,3.78.14-4.54.26-9.45.32-14.7.08-5.91,0-12.6,0-19.62a59.44,59.44,0,0,0,47.91-6.25c28.88-17.27,54.88-62.59,70.78-71.93C1205.57,458.21,1206.55,464.61,1206.91,471.9Z"/>
                    <path class="cls-4"
                          d="M1050.48,507.68s59.84,8.51,66.14,8.51,41.27-66.47,49.45-74.34,18.27-11.65,31.19-.32,12.91,27.41-6.3,60.8-46,49.45-57.33,52.6-68.35-5-90.71-12.92C1042.92,542,1040.4,529.73,1050.48,507.68Z"/>
                    <path class="cls-1"
                          d="M1065.49,371c-2.57,1.12-14.39,5.46-13.86,7.56s4.69,9.13,8.77,8.5,21.78-6.56,22-10.71S1076.75,366.08,1065.49,371Z"/>
                </svg>
            </div>
            <div>
                <p class="z-30 font-extrabold text-theme-salmon lg:text-4xl text-2xl uppercase hero-title">
                    What do we do?
                </p>
                <div class="my-4 border-b-4 border-theme-salmon text-right" style="width: 10%;"></div>
                <p class="py-6 z-30 text-gray-800 font-extralight lg:text-2xl text-xl"
                   style="font-family: 'Nunito', sans-serif">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
            </div>
        </div>
    </section>
    <section class="relative">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 w-full">
            <div class="font-extrabold text-theme-salmon md:text-4xl text-2xl hero-title uppercase">
                Why consultpeer?
            </div>
            <div class="my-4 border-b-4 border-theme-salmon" style="width: 10%;"></div>
            <div class="md:flex md:justify-between pt-4">
                <div class="border-gray-200 shadow p-4
                    rounded why-consultpeer-items mt-4 md:mt-0 text-theme-dark
                    hover:bg-theme-salmon hover:text-white text-theme-dark cursor-pointer">
                    <div class="hero-second-title flex items-center">
                        <i class="fa fa-solid fa-question" style="font-size: 35px;"></i>
                        <div class="text-xl pl-4 font-bold">Ask a Question</div>
                    </div>
                    <div class="pt-4 font-light">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </div>
                </div>
                <div class="border-gray-200 shadow p-4
                    rounded why-consultpeer-items mt-4 md:mt-0 text-theme-dark
                    hover:bg-theme-salmon hover:text-white text-theme-dark cursor-pointer">
                    <div class="hero-second-title flex items-center">
                        <i class="fa fa-solid fa-comment" style="font-size: 35px;"></i>
                        <div class="text-xl pl-4 font-bold">Get the Answers</div>
                    </div>
                    <div class="pt-4 font-light">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </div>
                </div>
                <div class="border-gray-200 shadow p-4
                    rounded why-consultpeer-items mt-4 md:mt-0 text-theme-dark
                    hover:bg-theme-salmon hover:text-white text-theme-dark cursor-pointer">
                    <div class="hero-second-title flex items-center">
                        <svg class="message-icon" xmlns="http://www.w3.org/2000/svg" style="height: 35px"
                             viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M511.1 63.1v287.1c0 35.25-28.75 63.1-64 63.1h-144l-124.9 93.68c-7.875 5.75-19.12 .0497-19.12-9.7v-83.98h-96c-35.25 0-64-28.75-64-63.1V63.1c0-35.25 28.75-63.1 64-63.1h384C483.2 0 511.1 28.75 511.1 63.1z"/>
                        </svg>
                        <div class="text-xl pl-4 font-bold">Message the Answerer</div>
                    </div>
                    <div class="pt-4 font-light">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </div>
                </div>
            </div>
            <a href="/login" class="mt-4 flex justify-end items-center hover:text-theme-salmon">
                <div class="pr-4">
                    Get started
                </div>
                <i class="fa fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </section>
    <section class="relative bg-gray-100">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 w-full items-center">
            <div class="font-extrabold text-theme-salmon lg:text-4xl text-2xl hero-title uppercase">
                Current hot topics
            </div>
            <div class="my-4 border-b-4 border-theme-salmon" style="width: 10%;"></div>
            <div class="flex flex-wrap">
                @foreach($categories as $category)
                    <div class="capitalize mt-4 mr-4 pl-5 text-xl
                                pr-5 pt-2 pb-2 border rounded-full break-words border-theme-salmon text-theme-salmon
                                hover:text-white hover:bg-red-400 hover:border-red-400 cursor-pointer">
                        {{ $category->label }}
                    </div>
                @endforeach
            </div>
            <a href="/login" class="mt-4 text-theme-salmon flex justify-end items-center hover:text-theme-salmon">
                <div class="pr-4">
                    Click here for more topics
                </div>
                <i class="fa fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </section>
    <section class="bg-theme-salmon">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 w-full items-center flex justify-center items-center text-white">
            <div class="hero-title md:text-4xl text-2xl font-bold flex items-center">
                Get started
                <a class="z-30 py-3 px-6 text-lg border-white border text-white hover:bg-white hover:text-theme-salmon rounded ml-4"
                   href="/signup">
                    Sign up
                </a>
            </div>
        </div>
    </section>
    <section class="relative bg-theme-blue">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 w-full text-white">
            <div class="md:flex items-start w-full">
                <div>
                    <div class="text-theme-salmon text-xl font-bold">
                        Useful links
                    </div>
                    <div class="border-b-4 border-theme-salmon mb-2" style="width: 25%;"></div>
                    <div class="text-white flex flex-col">
                        <a href="/about" class="hover:text-theme-salmon my-1">About us</a>
                        <a href="/careers" class="hover:text-theme-salmon mb-1">Careers</a>
                        <a href="/terms" class="hover:text-theme-salmon mb-1">Terms of use</a>
                        <a href="/privacy-policy" class="hover:text-theme-salmon mb-1">Privacy policy</a>
                        <a href="/blog" class="hover:text-theme-salmon">Blog</a>
                    </div>
                </div>
                <div class="md:ml-32 mt-4">
                    <div class="text-theme-salmon text-xl font-bold">
                        Follow us
                    </div>
                    <div class="border-b-4 border-theme-salmon mb-2" style="width: 25%;"></div>
                    <div class="text-2xl">
                        <i class="fab fa-brands fa-facebook-square mr-1 hover:text-theme-salmon cursor-pointer"></i>
                        <i class="fab fa-brands fa-twitter mr-1 hover:text-theme-salmon cursor-pointer"></i>
                        <i class="fab fa-brands fa-instagram mr-1 hover:text-theme-salmon cursor-pointer"></i>
                        <i class="fab fa-brands fa-youtube mr-1 hover:text-theme-salmon cursor-pointer"></i>
                        <i class="fab fa-brands fa-linkedin hover:text-theme-salmon cursor-pointer"></i>
                    </div>
                </div>
                <div class="md:ml-32 mt-4">
                    <div class="text-theme-salmon text-xl font-bold">
                        Subscribe
                    </div>
                    <div class="border-b-4 border-theme-salmon mb-2" style="width: 25%;"></div>
                    <div class="text-2xl">
                        <form>
                            <x-input id="email" class="block text-theme-blue rounded" placeholder="john.doe@example.com" type="email" name="email" />
                          <!--<input class="text-theme-blue rounded" type="email" placeholder="john.doe@example.com"><br>-->
                            <button class="py-1 px-3 text-sm border-white border text-theme-salmon
                            border-theme-salmon hover:bg-theme-salmon hover:text-white rounded mt-4">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="md:ml-32 mt-4">
                    <div class="text-theme-salmon text-xl font-bold">
                        Contact us
                    </div>
                    <div class="border-b-4 border-theme-salmon mb-2" style="width: 25%;"></div>
                    <div class="">
                        5 St. Albans Crescent, <br>
                        Newcastle upon Tyne,<br>
                        NE65UQ.
                        <div class="mt-2">
                            <a href="mailto:info@consultpeer.com" class="hover:text-theme-salmon">
                                info@consultpeer.com
                            </a>
                        </div>

                        <div class="mt-2">
                            +44 077777777777
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end items-center mt-8">
                <x-application-logo :width="130"></x-application-logo>
                <div class="ml-4 text-xs">
                    &#169; 2022 Consultpeer Ltd.
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
