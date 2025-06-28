<section id="hero" class="bg-[#F4FAFF] dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 pt-8 mx-auto text-center lg:py-20">
        <h1
            class="hidden mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white md:block">
            Jasa <span class="text-[#2B5A9E]">Video Shooting</span> Dan</h1>
        <h1
            class="hidden mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white md:block">
            <span class="text-[#2B5A9E]">Live Streaming</span> Profesional
        </h1>

        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white md:hidden">
            Jasa Video Shooting Dan Live Streaming Profesional</h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Untuk Event
            Pernikahan, Seminar, Konser, Pengajian, dan Lainnya</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            @auth
                <a href="#kontak"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-[#2B5A9E] rounded-lg hover:bg-[#335077] focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Pesan Sekarang
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            @endauth

            @guest
                <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-[#2B5A9E] rounded-lg hover:bg-[#335077] focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Pesan Sekarang
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            @endguest

            <a href="#portofolio"
                class="px-5 py-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:ms-4 focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                Lihat Portofolio
            </a>
        </div>

        <div class="flex justify-center w-full mt-4">
            <img src="./images/hero-ilustrasi.png" alt="">
        </div>
    </div>
</section>
