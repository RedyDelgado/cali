<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Admin One Tailwind CSS Admin Dashboard</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="css/main.css?v=1652870200386">
  <!-- {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}} -->

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">


   <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
   @livewireStyles   
        
   <!-- Scripts -->
   <!-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
   
  
</head>
<body>

<div id="app">

<nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item mobile-aside-button">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
    
  </div>
  <div class="navbar-brand is-right">
    <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-menu" id="navbar-menu">
    <div class="navbar-end">
      
      <div class="navbar-item dropdown has-divider has-user-avatar">
        <a class="navbar-link">
          <div class="user-avatar">
            <img src="https://avatars.dicebear.com/v2/initials/redy-delgado.svg" alt="Redy Delgado<" class="rounded-full">
          </div>
          <div class="is-user-name"><span>Redy Delgado</span></div>
          <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
        </a>
        <div class="navbar-dropdown">
          <hr class="navbar-divider">
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log Out</span>
          </a>
        </div>
      </div>
      
      
      <a title="Log out" class="navbar-item desktop-icon-only">
        <span class="icon"><i class="mdi mdi-logout"></i></span>
        <span>Log out</span>
      </a>
    </div>
  </div>
</nav>


<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Review <b class="font-black">Examen</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li class="active">
        <a href="{{ url('/') }}"   >
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Panel de Control</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Partes</p>
    <ul class="menu-list">
      <li>
        <a href="{{ url('alumno') }}"   >
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Alumnos</span>
        </a>
      </li>
      <li>
        <a href="{{ url('identificacion') }}"   >
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">Fi. Identificación</span>
        </a>
      </li>
      <li>
        <a href="{{ url('respuesta') }}"   >
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">Fi. de Respuestas</span>
        </a>
      </li>
      <li>
        <a>
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          <span class="menu-item-label">Resultados</span>
        </a>
      </li>
    </ul>        
  </div>
</aside>
 
    
     <main>    
      {{ $cabecera }}


          <section class="section main-section">
        {{ $body }}
          </section>
       </main>

    

<footer class="footer">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
    <div class="flex items-center justify-start space-x-3">
      <div>
        De uso exlusivo de Redy Demetrio Delgado Sequeiros
      </div>
    </div>
  </div>
</footer>


</div>


<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<!-- <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css"> -->

    @livewire('livewire-ui-modal')
    @livewireScripts

  <script>
      Livewire.on('alert', function(icono,message){
      Swal.fire({
      icon:  icono,
      title: message,
      showConfirmButton: false,
      timer: 1500
      })
      })
  </script>
</body>
</html>
