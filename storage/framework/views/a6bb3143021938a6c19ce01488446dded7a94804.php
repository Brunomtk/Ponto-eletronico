<!DOCTYPE html>
<html lang="en">

<style>
  .iconmenu {
    color: #fff !important;
  }
  .iconmenu:hover {
    color: #02acee !important;
  }
  .half-rule { 
    margin-left: 0;
    text-align: left;
    width: 100%;
 }

</style>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
  
  <title>Ponto Eletrônico - CONSELT</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top" >

  <!-- Page Wrapper -->
  <div id="wrapper" class="">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" style= "background-image: linear-gradient(180deg, #003780, #162436 ,#00C1A4 )" id="accordionSidebar">



      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home" style=" height:10%">
        <div class="sidebar-brand-icon">
          <img style="height:150px; margin-top:30px" src="images/logos.png"/>
        </div>
      </a>

      <br>

      <!-- Divider -->
      <hr class="half-rule"/>

      <!-- Heading -->
      <div class="sidebar-heading" style="font-size: 12.5px; color: #FFF">
        Páginas:
      </div> 

      <!-- Nav Item - Página de usuários -->
      <li class="nav-item">
        <a class="nav-link" href="home">
          <i class="fa fa-home iconmenu" aria-hidden="true"></i>
          <span style="font-size: 14.5px; color: #fff">Home</span></a>
      </li>
 <?php if(auth()->check() && auth()->user()->admin): ?> 
       <!-- Divider -->
       <hr class="half-rule"/>
      <!-- Heading ADMIN -->
      <div class="sidebar-heading" style="font-size: 12.5 rem; color: #fff">
        ADMIN
      </div> 
      <!-- Nav Item - Página de funcionários -->
      <li class="nav-item">
        <a class="nav-link" href="accounting">
          <i class="fa fa-check-square iconmenu" aria-hidden="true"></i>
          <span style="font-size: 14.5px; color: #fff">Contabilização</span></a>
      </li>

      <!-- Nav Item - Página do Controle de Membros -->
      <li class="nav-item">
        <a class="nav-link" href="membros">
        <i class="fa fa-id-badge iconmenu" aria-hidden="true"></i>
          <span style="font-size: 14.5px; color: #fff">Controle de Membros</span></a>
      </li>
       <!-- Nav Item - Página do Controle de Usuarios -->
       <li class="nav-item">
        <a class="nav-link" href="usuario">
        <i class="fa fa-address-card iconmenu" aria-hidden="true"></i>
          <span style="font-size: 14.5px; color: #fff">Controle de Usuarios</span></a>
      </li>
<?php endif; ?>
      <!-- Divider -->
      <hr class="half-rule"/>

      <!-- Nav Item - Logout -->
      <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
               <i class="fas fa-sign-out-alt iconmenu" style="margin-left: 1%"></i>
               <span style="font-size: 14.5px; margin-left: 1%; color: #fff">Logout</span></a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
      </li>

       <!-- Divider -->
       <hr class="half-rule"/>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" style= "background-image: linear-gradient(180deg,#000 , #000)">
      
      <?php echo $__env->yieldContent('content'); ?>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer" style="background-color: #fff">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; CONSELT 2022</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <script defer src="js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script defer src="js/sb-admin-2.js"></script>


  
</body>
<style>
  .animated-background{
    font-family: Verdana;
    background: linear-gradient( 
    to right, #1D50A7,
    #162436,#00C1A4);
    background-size: 400% 400%;
    animation: animate-background 10s infinite ease-in-out;
  }
  @keyframes  animate-background{
    0%{
        background-position: 0 50%;
    }
    50%{
        background-position: 100% 50%;
    }
    100%{
        background-position: 0 50%;
    }
  }
</style>

</html>
<?php /**PATH C:\laragon\www\pontoeletronico-conselt\resources\views/layouts/template_base.blade.php ENDPATH**/ ?>