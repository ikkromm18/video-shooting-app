@extends('layouts.auth')
@section('title', 'Login')
@section('content')



    <div class="w-full bg-[#2B5A9E] flex justify-between rounded-xl shadow-sm">

        <div class="py-16">
            <img src="./images/hero-ilustrasi.png" alt="">
        </div>
        <div class="flex flex-col justify-center w-1/3 px-16 py-10 bg-white">
            <div class="">
                @include('components.alert')

                <h1 class="text-3xl font-bold">Login</h1>
                <form action="{{ route('submit-login') }}" method="post" class="mt-8">

                    @csrf

                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">
                            Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                            placeholder="name@flowbite.com" />
                        @error('email')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="password"
                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" name="password"
                            class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                            required />
                        @error('password')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center mb-5">
                        <input id="remember" type="checkbox" value="on" name="remember"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                            Me</label>
                    </div>

                    <div class="flex justify-between mb-5">
                        <p id="helper-text-explanation" class="text-sm text-gray-500  dark:text-gray-400">Belum Punya
                            Akun ? <a href="{{ route('register') }}"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">Daftar</a></p>

                        <p id="helper-text-explanation" class="text-sm text-gray-500  dark:text-gray-400"> <a
                                href="{{ route('register') }}"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">Lupa Password ?</a></p>

                    </div>

                    <div class="mb-5">
                        <button type="submit"
                            class="w-full text-white bg-[#2B5A9E] hover:bg-[#324f79] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Login
                        </button>
                    </div>

                    <div class="mb-5">
                        <a href="#"
                            class="w-full flex justify-center items-center text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-[#4285F4]/55 mb-2">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 18 19">
                                <path fill-rule="evenodd"
                                    d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Sign in with Google
                        </a>
                    </div>


                    <div class="mb-5">
                        <a href="{{ route('home') }}"
                            class="w-full block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            Kembali Ke Beranda
                        </a>
                    </div>



                </form>
            </div>

        </div>
    </div>








@endsection
