<header class="w-full h-20 bg-teal-400 flex items-center justify-between">
    <button id="menuAbrir" class="text-white sm:hidden absolute cel:left-0 top-5 left-5 lg:hidden xl:hidden 2xl:hidden">
        <svg class="h-10 w-10 cel:ml-5"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="6" x2="20" y2="6" />  <line x1="4" y1="12" x2="20" y2="12" />  <line x1="4" y1="18" x2="20" y2="18" /></svg>
    </button>
    <nav id="navbar" class="hidden flex cel:flex-col sm:flex-col md:flex-col items-center justify-center w-full h-full gap-12 cel:gap-8 lg:flex xl:flex 2xl:flex">
        <button id="menuCerrar" class="text-white hidden sm:block absolute top-5 left-5 cel:text-4xl lg:hidden xl:hidden 2xl:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>  
        </button>     

        <a href="/inicio" class="lg:ml-5 lg:mr-5 xl:ml-5 xl:mr-5 2xl:mr-5 2xl:ml-5 text-white cel:text-lg lg:font-thin xl:font-thin 2xl:font-thin decoration-transparent">Inicio</a>
        <a href="/inicio/cliente-listar" class="lg:ml-5 lg:mr-5 xl:ml-5 xl:mr-5 2xl:mr-5 2xl:ml-5 text-white cel:text-lg lg:font-thin xl:font-thin 2xl:font-thin decoration-transparent">Cliente</a>
        <a href="/inicio/notas-listar" class="lg:ml-5 lg:mr-5 xl:ml-5 xl:mr-5 2xl:mr-5 2xl:ml-5 text-white cel:text-lg lg:font-thin xl:font-thin 2xl:font-thin decoration-transparent">Notas</a>
        <a href="/inicio/imagenes-listar" class="lg:ml-5 lg:mr-5 xl:ml-5 xl:mr-5 2xl:mr-5 2xl:ml-5 text-white cel:text-lg lg:font-thin xl:font-thin 2xl:font-thin decoration-transparent">Imagenes</a>
        <a href="/inicio/cita-listar" class="lg:ml-5 lg:mr-5 xl:ml-5 xl:mr-5 2xl:mr-5 2xl:ml-5 text-white cel:text-lg lg:font-thin xl:font-thin 2xl:font-thin decoration-transparent">Citas</a>
        <a href="/inicio/odontograma-listar" class="lg:ml-5 lg:mr-5 xl:ml-5 xl:mr-5 2xl:mr-5 2xl:ml-5 text-white cel:text-lg lg:font-thin xl:font-thin 2xl:font-thin decoration-transparent">Odontograma</a>
        <a href="/inicio/informe-listar" class="lg:ml-5 lg:mr-5 xl:ml-5 xl:mr-5 2xl:mr-5 2xl:ml-5 text-white cel:text-lg lg:font-thin xl:font-thin 2xl:font-thin decoration-transparent">Informe</a>
        {{-- @if(auth()->check())
        <li class="mr-10 ml-6 overflow-auto text-sm list-none text-white font-bold">Hola {{ auth()->user()->name }}</li>
        @endif --}}
        @if(auth()->check())
        <form action="{{ route('login.destroy') }}" method="POST">
            @csrf
            <button type="submit" class="list-none text-white mt-2 ml-6 cel:ml-0 cel:absolute cel:top-5 cel:right-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                  </svg>
                  
            </button>
        </form>
        @endif
    </nav>
</header>
<script>
const menuAbrir = document.getElementById('menuAbrir');
const menuCerrar = document.getElementById('menuCerrar');
const navbar = document.getElementById('navbar');
const header = document.querySelector('header');

const toggleMenu = () => {
    menuCerrar.classList.toggle('hidden');
    navbar.classList.toggle('hidden');
    menuAbrir.classList.toggle('hidden');
    header.classList.toggle('h-screen');
};

menuAbrir.addEventListener('click', toggleMenu);
menuCerrar.addEventListener('click', toggleMenu);

const polygonsArray = document.querySelectorAll('polygon');
for (const polygon of polygonsArray) {
  polygon.onclick = event => {
    event.currentTarget.classList.toggle('unmarked');
    event.currentTarget.classList.toggle('marked');
  };
}
</script>