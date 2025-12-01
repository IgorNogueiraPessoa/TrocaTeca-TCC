<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logar-se</title>
    <link rel="shortcut icon" href="{{ asset('image/t.png') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!--Modal de logar-se-->
    <div id="notloading" class="w-screen h-screen z-[45] absolute left-0 top-0 bg-backgtt bg-repeat bg-[length:870px_654px] bg-[url('/public/image/bg-icons.png')] bg-auto">
        <div class="fixed z-50 inset-0 flex items-center justify-center p-4 sm:p-8">
            <div class="w-full max-w-lg rounded-3xl bg-bluett py-6 sm:py-8 px-16 shadow-2xl items-center drop-shadow-tt border-2 border-graytt-light">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center text-white font-fredokatt drop-shadow-tt mb-5" style="font-family: 'Fredoka';">Login</h1> <!--Título de aviso-->

                <form method="POST" action="{{ route('login') }}" onsubmit="startLoading();">
                    @csrf

                    <div>
                        <label for="email" class="text-white">E-mail:</label>
                        <input type="email" name="email" id="email" required class="shadow-tt max-w-96 block w-full rounded-xl border border-graytt-light px-3.5 py-2 shadow-sm ring-1 border border-graytt ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 mb-5">
                        @if ($errors->any())
                        <div class="text-redtt mb-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <label for="password" class="text-white">Senha:</label>
                        <input type="password" name="password" id="password" required class="shadow-tt max-w-96 block w-full rounded-xl border border-graytt-light px-3.5 py-2 shadow-sm ring-1 border border-graytt ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 mb-5">
                    </div>


                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-graytt-dark">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex justify-end items-center">
                        @if (Route::has('password.request'))
                        <a class="mr-3 underline-animation text-sm text-graytt hover:text-graytt-dark rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            Esqueceu Sua Senha?
                        </a>
                        @endif
                        <button type="submit" class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-pinktt shadow-tt hover:bg-pinktt-dark text-white text-lg font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('loading')
</body>

</html>