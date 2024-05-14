<?php
if (isset($_SESSION["username_kasir"])) {
    header("location: home");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body>
    <section class="relative py-10 bg-gray-900 sm:py-16 lg:py-24">
        <div class="absolute inset-0">
            <img class="object-cover w-full h-full"
                src="https://cdn.rareblocks.xyz/collection/celebration/images/signin/2/man-eating-noodles.jpg" alt="" />
        </div>
        <div class="absolute inset-0 bg-gray-900/20"></div>

        <div class="relative max-w-lg px-4 mx-auto sm:px-0">
            <div class="overflow-hidden bg-white rounded-md shadow-md">
                <div class="px-4 py-6 sm:px-8 sm:py-7">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-gray-900">Login</h2>
                    </div>
                    <form id="form" action="proses/proses-login.php" method="POST" class="mt-8">
                        <div class="space-y-5">
                            <div>
                                <label for="" class="text-base font-medium text-gray-900"> Username </label>
                                <div class="mt-2.5">
                                    <input type="text" name="username" id="username"
                                        placeholder="Masukkan username anda"
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600"
                                        required />
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="" class="text-base font-medium text-gray-900"> Password </label>

                                </div>
                                <div class="mt-2.5">
                                    <input type="password" name="password" id="password"
                                        placeholder="Masukkan password anda"
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600"
                                        required />
                                </div>
                            </div>

                            <div>
                                <button type="submit" id="submit" name="submit"
                                    class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                    Login
                                </button>
                            </div>

                            <div>
                                <a href="halaman"
                                    class=" relative inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-gray-700 transition-all duration-200 bg-white border-2 border-gray-200 rounded-md hover:bg-gray-100 focus:bg-gray-100 hover:text-black focus:text-black focus:outline-none">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>