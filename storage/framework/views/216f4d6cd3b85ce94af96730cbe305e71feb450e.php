
<?php $__env->startSection('content'); ?>
<?php
    use App\Models\Membro;
    $membros = Membro::all();
    $contador = Membro::count();
?>

<style>
.table thead th{
    background-color: #000;
    color: #fff;
}

.table tr:nth-child(odd) {
    background-color: #fff;
    color: #000;
}

.table tr:nth-child(even) {
    background-color: #d3d3d3;
    color: #000;
}

.membro-img{
    border-radius: 50%;
    border: 3px solid #1D50A7;
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

.mb-0, .display-4{
  color: #fff!important;
}

td{
    vertical-align: middle!important;
}

.dataTables_wrapper .dataTables_filter input, .dataTables_wrapper .dataTables_length select{
   background-color: #fff !important;
   color: #2d1738 !important;
}

.btn-secondary{
    background-color: #1D50A7 !important;

}

            .barradepesquisa{
                padding-bottom: 3%;
                margin-left:10px;


            }


            .animated-background{
    font-family: Verdana;
    background: linear-gradient( 
    to right, #1D50A7,
    #162436,#00C1A4);
    background-size: 400% 400%;
    animation: animate-background 10s infinite ease-in-out;
  }


</style>

    <!-- TEXTO titulo-->
<div class="container py-5">
  <header class="text-center text-white">
    <h1 class="display-4">Controle de Membros</h1>
</div>

    <!-- Modal de Cadastro -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " >
            <div class="modal-content animated-background">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:#fff">Adicionar Novo Membro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#f00">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?php echo e(action([App\Http\Controllers\MembrosController::class, 'store'])); ?>" method="POST"  enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="nome" style="color:#fff">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cargo" style="color:#fff">Cargo</label>
                        <select name="cargo" class="form-control" required>
                                <option label=" "></option>
                                <option value="Assessor">Assessor</option>
                                <option value="Assessora">Assessora</option>
                                <option value="Coordenador">Coordenador</option>
                                <option value="Coordenadora">Coordenadora</option>
                                <option value="Diretor">Diretor</option>
                                <option value="Diretora">Diretora</option>
                                <option value="Trainee">Trainee</option> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto" style="color:#fff">Foto de Perfil</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="inputGroupFile02" required>
                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Escolher imagem</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                            </div>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="coordenadoria" style="color:#fff">Coordenadoria/Diretoria</label>
                        <select name="coordenadoria" class="form-control" required>
                                <option label=" "></option>
                                <option value="Presidência">Presidência</option>
                                <option value="Projetos">Projetos</option>
                                <option value="Negócios">Negócios</option>
                                <option value="Comercial">Comercial</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Vice-Presidência">Vice-Presidência</option>
                                <option value="Gestão de Pessoas">Gestão de Pessoas</option>
                                <option value="Qualidade">Qualidade</option>
                                <option value="Parcerias">Parcerias</option>
                                <option value="Jurídico-Financeiro">Jurídico-Financeiro</option>
                                <option value="Trainee">Trainee</option>                                
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="horario" style="color:#fff">Horário de Sede</label>
                        <div class="row">

                            <div class="col-md-6" style="color:#fff">
                                Dia:
                            </div>
                            <div class="col-md-4" style="color:#fff">
                                Horário de Entrada:
                            </div>
                        </div>
                        <?php for($i=1; $i <= 4; $i++): ?>
                        <div class="row">
                            <div class="col-md-6" style="padding-bottom:5px">
                            <select name="horario[<?php echo e($i); ?>][key]" class="form-control" required>
                                <option label=" "></option>
                                <option value="Segunda-Feira">Segunda-Feira</option>
                                <option value="Terça-Feira">Terça-Feira</option>
                                <option value="Quarta-Feira">Quarta-Feira</option>
                                <option value="Quinta-Feira">Quinta-Feira</option>
                                <option value="Sexta-Feira">Sexta-Feira</option>
                            </select>
                            </div>
                            <div class="col-md-4" style="padding-bottom:5px">
                                <select name="horario[<?php echo e($i); ?>][value]" class="form-control" required>
                                    <option label=" "></option>
                                    <option value="8:00">8:00</option>
                                    <option value="8:50">8:50</option>
                                    <option value="9:40">9:40</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:20">11:20</option>
                                    <option value="13:10">13:10</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:50">14:50</option>
                                    <option value="15:40">15:40</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:20">17:20</option>
                                    <option value="18:10">18:10</option>
                                </select>                           
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                    <div>
                        <input class=" btn btn-outline-success" type="submit" >
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
<div class="col-lg-10 mx-auto">
    <div class="card rounded shadow border-0">
    <div class="card-body p-5 bg-white rounded">
        <div style="width:50%; margin-left:auto; margin-right:auto;margin:15px">
            <button type="button" style="background-color: #1D50A7; margin-left: -15px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Adicionar Novo Membro
            </button>
        </div>
        <div class="table-responsive">
        <table id="dtBasicExample" class="table table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Cargo</th>
            <th scope="col">Coordenadoria</th>
            <th scope="col">Horário de Sede</th>
            <th scope="col">Alterações</th>
            </tr>
        </thead>
        <tbody>
            <?php if($contador == 0): ?>
                <td>
                    Nenhum membro cadastrado. Clique em "Criar Novo Membro" para adicionar um novo!
                </td>
            <?php else: ?>
                <?php $__currentLoopData = $membros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img height="100px" width="100px" class="membro-img" src="data:image/png;base64, <?php echo e($membro->foto ?? ''); ?>">
                        </td>
                        <td>
                            <b><?php echo e($membro->nome ?? ''); ?></b>
                        </td>
                        <td>
                            <?php echo e($membro->cargo ?? ''); ?>

                        </td>
                        <td>
                            <?php echo e($membro->coordenadoria ?? ''); ?>

                        </td>
                        <td>
                            <a href="#" role="button" data-toggle="popover" class="btn btn-card btn-secondary popover-test example" data-html="true" title="Horários" data-placement="right" data-content="
                            <?php $__currentLoopData = $membro->horario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($horario['key'] != null and $horario['value'] != null): ?>
                                    <b><?php echo e($horario['key']); ?></b>: <?php echo e($horario['value']); ?><br/>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">Ver Horários</a>
                        </td> 
                        <td>
                            <div style="display:flex; justify-content: space-around;">
                                <button class="btn" style="background-color: #02b04d; color: white" title="Editar" data-toggle="modal" data-target="#editarModal<?php echo e($membro->id); ?>" style="margin-right:5px">
                                        <i class="fa fa-pencil-alt icone"></i>
                                </button>

                                <form action="<?php echo e(action([App\Http\Controllers\MembrosController::class, 'destroy'], $membro->id)); ?>" method="POST"  enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>  
                                    <button class="btn" style="background-color: #CA0B00; color: white" title="Excluir">
                                            <i class="fa fa-times " aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <!-- Modal de Edição -->
                            <div class="modal fade " id="editarModal<?php echo e($membro->id); ?>" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                                    <div class="modal-content animated-background" >
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarModalLabel" style="color:#fff">Editar Membro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="<?php echo e(action([App\Http\Controllers\MembrosController::class, 'update'], $membro->id)); ?>" method="POST"  enctype="multipart/form-data">
                                                                <?php echo e(csrf_field()); ?>

                                                                <?php echo e(method_field('PUT')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <div class="form-group">
                                                <label for="nome" style="color:#fff">Nome</label>
                                                <input type="text"  value="<?php echo e($membro->nome); ?>" name="nome" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cargo" style="color:#fff">Cargo</label>
                                                <input type="text" value="<?php echo e($membro->cargo); ?>" name="cargo" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <label for="cargo" style="color:#fff">Foto</label>
                                                        <img src="image/backgroundHome.jpg" alt="Selecione uma Imagem" id="imgPhoto">
                                                        <input type="file" name="foto" id="foto" value="<?php echo e($membro->foto); ?>" onchange="previewFile()" accept="image/*" required>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="coordenadoria" style="color:#fff">Coordenadoria/Diretoria</label>
                                                <input type="text" value="<?php echo e($membro->coordenadoria); ?>" name="coordenadoria" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="horario" style="color:#fff" >Horário de Sede</label>
                                                <div class="row">
                                                    <div class="col-md-6" style="color:#fff">
                                                        Dia:
                                                    </div>
                                                    <div class="col-md-4" style="color:#fff">
                                                        Horário de Entrada:
                                                    </div>
                                                </div>
                                                <?php for($i=1; $i <= 4; $i++): ?>
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-bottom:5px">
                                                    <select name="horario[<?php echo e($i); ?>][key]" class="form-control">
                                                        <option label=" "></option>
                                                        <option value="Segunda-Feira">Segunda-Feira</option>
                                                        <option value="Terça-Feira">Terça-Feira</option>
                                                        <option value="Quarta-Feira">Quarta-Feira</option>
                                                        <option value="Quinta-Feira">Quinta-Feira</option>
                                                        <option value="Sexta-Feira">Sexta-Feira</option>
                                                    </select>
                                                    </div>
                                                    <div class="col-md-4" style="padding-bottom:5px">
                                                        <select name="horario[<?php echo e($i); ?>][value]" class="form-control">
                                                            <option label=" "></option>
                                                            <option value="8:00">8:00</option>
                                                            <option value="8:50">8:50</option>
                                                            <option value="9:40">9:40</option>
                                                            <option value="10:30">10:30</option>
                                                            <option value="11:20">11:20</option>
                                                            <option value="13:10">13:10</option>
                                                            <option value="14:00">14:00</option>
                                                            <option value="14:50">14:50</option>
                                                            <option value="15:40">15:40</option>
                                                            <option value="16:30">16:30</option>
                                                            <option value="17:20">17:20</option>
                                                            <option value="18:10">18:10</option>
                                                        </select>                           
                                                    </div>
                                                </div>
                                                <?php endfor; ?>
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
<?php echo $__env->make('layouts.template_base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pontoeletronico-conselt\resources\views/membros.blade.php ENDPATH**/ ?>