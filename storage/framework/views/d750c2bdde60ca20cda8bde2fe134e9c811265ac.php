
<?php $__env->startSection('content'); ?>
<?php
    use App\Models\User;
    $users = User::all();
    $contador = User::count();
?>

<style>
.table thead th{
    background-color: #000;
    color: #fff;
}

.table tr:nth-child(odd) {
    background-color: #b3b3b3;
    color: #000;
}

.table tr:nth-child(even) {
    background-color: #fff;
    color: #000;
}

.membro-img{
    border-radius: 50%;
    border: 3px solid #ffd93d;
}
#dtBasicExample_filter, .dataTables_wrapper .dataTables_length, .dt-button, #dtBasicExample_info, .paginate_button, #dtBasicExample_next, #dtBasicExample_previous{
    color: #000!important;
}

.card-body{
    background-color: #5554!important;
    background-image: 
          url("images/logos.png");
        -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover; 
    background-blend-mode: saturation;
    background-position: center top;
}

td{
    vertical-align: middle!important;
}

.dataTables_wrapper .dataTables_filter input, .dataTables_wrapper .dataTables_length select{
   background-color: #fff !important;
   color: #000 !important;
}

.btn-secondary{
    background-color: #000 !important;

}

            .barradepesquisa{
                padding-bottom: 3%;
                margin-left:10px;


            }

/*-------------------------------------------------------------------------------*/
/*Button login*/


.cta{
    display: flex;
    align-items: center;
    color: #fff;
    background:none;
    border:none;
    padding: 12px 18px;
    position: relative;
}
.cta:before{
    content: "";
    position: absolute;
    top: 50%;
    transform: translateY(-50%) 
    translateX(calc(100% + 4px));
    width: 45px;
    height: 45px;
    background: #dc143c;
    border-radius: 50px;
    transition:transform .25s .25s 
    cubic-bezier(0,0,.5,2), width
    .25s cubic-bezier(0,0,.5,2);
    z-index: -1;

}

.cta:hover::before {
    width:100%;
    transform: translateY(-50%)
    translateX(-18px);
    transition: transform .25s
    cubic-bezier(0,0, .5,2),width 
    .25s .25s cubic-bezier(0,0,-5,2);
}

.cta i {
    margin-left:5px;
    transition:transform .25s .4s
    cubic-bezier(0,0,.5,2);
}
.cta:hover i {
    transform: translateX(3px);
}

.animated-background{
    background: linear-gradient( 
    to right, #290A39,
    #000,#ffd93d);
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
/*-------------------------------------------------------------------------------*/


</style>

    <!-- TEXTO titulo-->
<div class="container py-5">
  <header class="text-center text-white">
    <h1 class="display-4">Controle de Usuarios</h1>
</div>


    
<div class="col-lg-10 mx-auto">
    <div class="card rounded shadow border-0">
    <div class="card-body p-5 bg-white rounded">
        <div style="width:50%; margin-left:auto; margin-right:auto;margin:15px">
        </div>
        <div class="table-responsive">
        <table id="dtBasicExample" class="table table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Alterações</th>
            
            </tr>
        </thead>
        <tbody>
            <?php if($contador == 0): ?>
                <td>
                    Nenhum membro cadastrado. Clique em "Criar Novo Membro" para adicionar um novo!
                </td>
            <?php else: ?>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <b><?php echo e($user->name ?? ''); ?></b>
                        </td>
                        <td>
                            <?php echo e($user->email ?? ''); ?>

                        </td>                      
                        <td>
                            <div style="display:flex; justify-content: space-around;">
                                <button class="btn" style="background-color: #003780; color: white" title="Editar" data-toggle="modal" data-target="#editarModal<?php echo e($user->id); ?>" style="margin-right:5px">
                                        <i class="fa fa-pencil-alt icone"></i>
                                </button>

                                <form action="<?php echo e(action([App\Http\Controllers\UsuarioController::class, 'destroy'], $user->id)); ?>" method="POST"  enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>  
                                    <button class="btn" style="background-color: #CA0B00; color: white" title="Excluir">
                                            <i class="fa fa-times " aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>  
                            </div>
                        </td>

                         <!-- Modal de Edição -->
                         <div class="modal fade" id="editarModal<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                                    <div class="modal-content animated-background">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarModalLabel" style="color:#fff">Editar Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#CA0B00">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="<?php echo e(action([App\Http\Controllers\UsuarioController::class, 'update'], $user->id)); ?>" method="POST"  enctype="multipart/form-data">
                                                                <?php echo e(csrf_field()); ?>

                                                                <?php echo e(method_field('PUT')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <div class="form-group">
                                                <label for="Nome" style="color:#fff" >Nome</label>
                                                <input type="text"  value="<?php echo e($user->name); ?>" name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" style="color:#fff">Email</label>
                                                <input type="text" value="<?php echo e($user->email); ?>" name="email" class="form-control">
                                            </div> 
                                            <div class="form-group">
                                                <label for="admin" style="color:#fff">ADMIN</label>
                                                <input type="admin" value="<?php echo e($user->admin); ?>" name="admin" class="form-control">
                                            </div>
                                                                                     
                                            <div>
                                                <input class=" btn btn-info" type="submit">
                                            </div>
                                        </form>
                                        </div>
                                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
    </table>  
    </div>  
    </div> 
    </div> 
    </div>        

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-html5-2.2.3/date-1.1.2/r-2.3.0/sl-1.4.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" defer></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-html5-2.2.3/date-1.1.2/r-2.3.0/sl-1.4.0/datatables.min.js" defer></script>

<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>

<script>
$(document).ready(function () {
    $('#dtBasicExample').DataTable( {
        language: {
            url: '/js/pt-BR.json'
        }
    } );
  $('.dataTables_length').addClass('bs-select');
});
</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pontoeletronico-conselt\resources\views/usuario.blade.php ENDPATH**/ ?>