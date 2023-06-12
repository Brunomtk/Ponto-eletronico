
<?php $__env->startSection('content'); ?>
<?php
    use App\Models\Registro;
    $registros = Registro::all();
    $contador = Registro::count();
?>
<style>
.table thead th{
    background-color: #fff;
    color: #000;
}

.table tr:nth-child(odd) {
    background-color: #000;
    color: #fff;
}

.table tr:nth-child(even) {
    background-color: #d3d3d3;
    color: #000;
}

#dtBasicExample_filter, .dt-button, #dtBasicExample_info, .paginate_button, #dtBasicExample_next, #dtBasicExample_previous, #dtBasicExample_length{
    color: #000!important;
}

.dt-button{
    background-color: #000;
}

.dataTables_wrapper .dataTables_filter input, .dataTables_wrapper .dataTables_length select{
   background-color: #fff !important;
   color: #000 !important;
}

#dtBasicExample_length{
  width: 100%;
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

div.dt-datetime {
  width: auto!important;
}

.mb-0, .display-4{
  color: #fff!important;
}

</style>
<div class="container py-5">
  <header class="text-center text-white">
    <h1 class="display-4">Contabilização</h1>
    <p class="lead mb-0">Aqui você pode contabilizar a presença dos seus membros!</p>
        <tr>
            <label>De:</label>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <label>Até:</label>
            <td><input type="text" id="max" name="max"></td>
        </tr>
  </header>
  <div class="row py-5">
    <div class="col-lg-10 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
            <table id="dtBasicExample" class="table table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Membro</th>
                  <th>Operação</th>
                  <th>Data</th>
                  <th>Horário</th>
                </tr>
              </thead>
              <tbody>
                <?php if($contador == 0): ?>
                    <td>
                        Nenhum registro cadastrado.
                    </td>
                <?php else: ?>
                    <?php $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <b><?php echo e($registro->nome ?? ''); ?></b>
                            </td>
                            <td>
                                <?php echo e($registro->operacao ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e(\Carbon\Carbon::parse($registro->created_at)->format('d/m/y')); ?>

                            </td>
                            <td>
                                <?php echo e(\Carbon\Carbon::parse($registro->created_at)->timezone('America/Sao_Paulo')->format('H:i')); ?>

                            </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/date-1.1.2/r-2.3.0/sb-1.3.4/sp-2.0.2/sl-1.4.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" crossorigin="anonymous" defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" defer></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/date-1.1.2/r-2.3.0/sb-1.3.4/sp-2.0.2/sl-1.4.0/datatables.min.js" defer></script>


<script>
$(document).ready(function () {
    var table = $('#dtBasicExample').DataTable( {
        language: {
            url: '/js/pt-BR.json'
        },
        dom: 'lBfrtip',
        buttons: [
            'pdf', 'excel'
        ],
    } );
    $('.dataTables_length').addClass('bs-select');
  var minDate, maxDate;
 
  // Custom filtering function which will search data in column four between two values
  $.fn.dataTable.ext.search.push(
      function( settings, data, dataIndex ) {
          var min = minDate.val();
          var max = maxDate.val();
          var date = moment( data[2], 'DD/MM/YY').toDate();
          console.log(min, max, date);
          if (
              ( min === null && max === null ) ||
              ( min === null && date <= max ) ||
              ( min <= date   && max === null ) ||
              ( min <= date   && date <= max )
          ) {
              return true;
          }
          return false;
      }
  );

  

    // Create date inputs
  minDate = new DateTime($('#min'), {
      format: 'DD/MM/YY',
      firstDay: 0
  });
  maxDate = new DateTime($('#max'), {
      format: 'DD/MM/YY',
      firstDay: 0
  });

  // Refilter the table
  $('#min, #max').on('change', function () {
      table.draw();
  });  

  

});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template_base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pontoeletronico-conselt\resources\views/accounting.blade.php ENDPATH**/ ?>