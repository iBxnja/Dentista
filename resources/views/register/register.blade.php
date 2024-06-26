<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="shortcut icon" href="{{ asset('imagenes/diente.png') }}" type="image/x-icon">

    @vite('resources/css/app.css')
</head>
<body id="register"> 
    <main class="w-full h-full flex items-center justify-center">
        <section class="w-full h-screen grid place-items-center">
            <div class="
            cel:w-5/6
            md:h-11/12
            w-4/6 h-5/6 flex flex-col items-center justify-center ">
                <form action="{{ route('register.store') }}" method="POST" class="
                cel:w-11/12
                w-2/4 h-4/5 flex items-center justify-center flex-col">
                    @csrf
                    <h2 class="text-5xl font-bold text-teal-500 mb-5
                    cel:text-3xl
                    md:text-4xl
                    ">Register</h2>
                    <div class="
                    cel:m-0
                    md:m-1
                    m-3 flex flex-col items-center justify-center w-5/6">
                        <label for="name" class="text-xl cel:text-base text-teal-500">Nombre completo</label>
                        <input type="text" class="
                        cel:h-8
                        text-center border-2 border-gray-200 rounded-md bg-white w-full
                         placeholder-gray-900 p-2 my-2 focus:bg-white text-xs" placeholder="Nombre completo"
                        id="name" name="name" required>
                    </div>
                    <div class="
                    cel:m-0
                    md:m-1
                    m-3 flex flex-col items-center justify-center w-5/6">
                        <label for="email" class="text-xl cel:text-base text-teal-500">Email</label>
                        <input type="email" class="
                        cel:h-8
                        text-center border-2 border-gray-200 rounded-md bg-white w-full
                         placeholder-gray-900 p-2 my-2 focus:bg-white text-xs" placeholder="Email"
                        id="email" name="email" required>
                    </div>
                    <div class="
                    cel:m-0
                    md:m-1
                    m-3 flex flex-col items-center justify-center w-5/6">
                        <label for="password" class="text-xl cel:text-base text-teal-500">Contraseña</label>
                        <input type="password" class="
                        cel:h-8
                        text-center border-2 border-gray-200 rounded-md bg-white w-full
                         placeholder-gray-900 p-2 my-2 focus:bg-white text-xs" placeholder="Contraseña"
                        id="password" name="password" required>
                    </div>
                    <div class="
                    cel:m-0
                    md:m-1
                    m-3 flex flex-col items-center justify-center w-5/6">
                        <label for="passwordConfirmed" class="text-xl cel:text-base text-teal-500">Confirmar contraseña</label>
                        <input type="password" class="
                        cel:h-8
                        text-center border-2 border-gray-200 rounded-md bg-white w-full
                         placeholder-gray-900 p-2 my-2 focus:bg-white text-xs" placeholder="Confirmar contraseña"
                        id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="
                    cel:m-0 text-center
                    md:mb-2
                    mb-5">
                        <span class="text-sm">Ya tienes cuenta? </span><a href="/login/login" class="text-teal-500 cel:text-sm">Ingresa acá.</a>
                    </div>
                    @error('message')
                    <p>* Error</p>
                    @enderror
                    <button type="submit" class="
                    cel:w-32 cel:text-sm
                    md:w-28 md:py-1
                    rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 border-2 border-teal-700 w-40 text-lg
                    text-white font-semibold p-2 my-3">Registrar</button>
                </form>
            </div>
        </section>
    </main>
    
</body>
</html>