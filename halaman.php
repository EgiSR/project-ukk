<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Kasir restoran</title>
</head>

<body>
    <!-- Hero start -->
    <div class="bg-white">
        <header class="bg-[#FCF8F1] bg-opacity-30">
            <div class="px-4 mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16 lg:h-20">
                    <nav class="flex justify-between fixed w-full">
                        <div class="flex items-center">
                            <a href="#" title="" class="flex">
                                <!-- <img class="w-auto h-8" src="https://cdn.rareblocks.xyz/collection/celebration/images/logo.svg" alt="" /> -->
                                <h1 class="font-bold text-2xl">KASIR RESTORAN</h1>
                            </a>
                        </div>

                        <button type="button"
                            class="inline-flex p-2 text-black transition-all duration-200 rounded-md lg:hidden focus:bg-gray-100 hover:bg-gray-100">
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 8h16M4 16h16">
                                </path>
                            </svg>

                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>
                        </button>

                        <div class="hidden lg:flex lg:items-center lg:justify-center lg:space-x-10">
                            <a href="#" title=""
                                class="text-base text-black transition-all duration-200 hover:text-opacity-80">
                                Home </a>

                            <a href="#" title=""
                                class="text-base text-black transition-all duration-200 hover:text-opacity-80">
                                Menu makanan </a>
                        </div>

                        <div
                            class="hidden lg:inline-flex items-center justify-center px-5 mr-20 py-2.5 text-base transition-all duration-200 hover:bg-yellow-300 hover:text-black focus:text-black focus:bg-yellow-300 font-semibold text-white bg-black rounded-full">
                            <a href="login" title="" role="button"> Masuk </a>
                        </div>
                    </nav>

                </div>
            </div>
        </header>

        <section class="bg-[#FCF8F1] bg-opacity-30 py-10 sm:py-16 lg:py-24">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
                    <div>
                        <p class="text-base font-semibold tracking-wider text-blue-600 uppercase">
                            Restoran yang berada di Malang
                        </p>
                        <h1 class="mt-4 text-4xl font-bold text-black lg:mt-8 sm:text-6xl xl:text-8xl">
                            Dengan menu makanan terbaik se Malang raya
                        </h1>
                        <p class="mt-4 text-base text-black lg:mt-8 sm:text-xl">
                            Dapatkan makanannya
                        </p>

                        <a href="login" title=""
                            class="inline-flex items-center px-6 py-4 mt-8 font-semibold text-black transition-all duration-200 bg-yellow-300 rounded-full lg:mt-16 hover:bg-yellow-400 focus:bg-yellow-400"
                            role="button">
                            Sign Up
                        </a>

                        <p class="mt-5 text-gray-600">Sudah punya akun? <a href="login" title=""
                                class="text-black transition-all duration-200 hover:underline">Log in</a></p>
                    </div>

                    <div>
                        <img class="w-full" src="assets/img/hero-img.jpg" alt="" />
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Hero end -->

    <!-- Card start -->
    <div class="flex justify-center mb-14">
        <h1 class="text-2xl font-bold">Menu Makanan</h1>
    </div>

    <div class="container px-6 mx-auto mb-10 sm:flex sm:flex-wrap sm:gap-6 sm:justify-center">
        <div class="shadow-lg  overflow-hidden rounded-lg mb-10 sm:mb-0 sm:w-64 md:w-80 lg:w-72">
            <img src="https://source.unsplash.com/600x400?food" alt="" class="w-full">
            <div class="px-6 py-4">
                <h1 class="font-bold text-xl mb-2">Makanan</h1>
                <p class="text-sm">Top Menu Makanan</p>
            </div>
        </div>
        <div class="shadow-lg  overflow-hidden rounded-lg mb-10 sm:mb-0 sm:w-64 md:w-80 lg:w-72">
            <img src="https://source.unsplash.com/600x400?drink" alt="" class="w-full">
            <div class="px-6 py-4">
                <h1 class="font-bold text-xl mb-2">Minuman</h1>
                <p class="text-sm">Top Menu Minuman</p>
            </div>
        </div>
        <div class="shadow-lg  overflow-hidden rounded-lg mb-10 sm:mb-0 sm:w-64 md:w-80 lg:w-72">
            <img src="https://source.unsplash.com/600x400?pasta" alt="" class="w-full">
            <div class="px-6 py-4">
                <h1 class="font-bold text-xl mb-2">Pasta</h1>
                <p class="text-sm">Top Menu Pasta</p>
            </div>
        </div>
    </div>
    <!-- Card end -->

    <!-- footer start -->
    <section class="py-12 mt-10 bg-gray-900">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="text-center xl:flex xl:items-center xl:justify-between xl:text-left">
                <div class="xl:flex xl:items-center xl:justify-start">

                    <h1 class="mt-5 text-lg text-white xl:ml-6 xl:mt-0">Kasir restoran</h1>
                </div>

                <div class="items-center mt-8 xl:mt-0 xl:flex xl:justify-end xl:space-x-8">
                    <ul class="flex flex-wrap items-center justify-center gap-x-8 gap-y-3 xl:justify-end">
                        <li>
                            <a href="#" title=""
                                class="text-sm text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80">
                                Home </a>
                        </li>

                        <li>
                            <a href="#" title=""
                                class="text-sm text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80">
                                Menu Makanan </a>
                        </li>

                    </ul>

                    <div class="w-full h-px mt-8 mb-5 xl:w-px xl:m-0 xl:h-6 bg-gray-50/20"></div>

                    <ul class="flex items-center justify-center space-x-8 xl:justify-end">
                        <li>
                            <a href="#" title=""
                                class="block text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z">
                                    </path>
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="#" title=""
                                class="block text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z">
                                    </path>
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="#" title=""
                                class="block text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z">
                                    </path>
                                    <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                    <path
                                        d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- footer end -->
</body>

</html>