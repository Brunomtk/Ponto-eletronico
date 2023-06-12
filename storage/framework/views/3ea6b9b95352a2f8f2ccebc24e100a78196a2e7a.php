

<?php
    use App\Models\Membro;
    $membros = Membro::all();
    $contador = Membro::count();
    $presentes = Membro::where('presente', true)->get();
?>
<?php $__env->startSection('content'); ?>


<style>
  .membro-img{
      border-radius: 50%;
      border: 3px solid #1D50A7;
  }

  .membrocards {
      display: flex;
      flex-direction: column;
      align-content: space-between;
      justify-content: center;
      align-items: center;
  }

  .card{
    width: 220px;
    height: 300px;
    border: none;
    border-radius: 10px;
    margin: 15px; 
    background-color: #fff;
    box-shadow: 2px 5px 15px 1px #1D50A7;
    position: relative;
  }

  .membro-img{
      border-radius: 50%;
      border: 4px solid #1D50A7;
  }
  .articles{
    font-size:10px;
    color: #a1aab9;
  }
  .centerized{
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr;
      justify-content: space-between;
      align-items: center;
      justify-items: center;
  }
  .dismay{
      text-align:center;
      flex-direction:column;
  }
  .image img{
      width: 125px; height: 125px;
      margin-bottom: 10px;
  }
  .image{
      padding-top: 30px;
  }
  .sheesh{
      color: #000;
      text-shadow: 1px 1px #1D50A7;
  }

  .btn-card{
      background-color: #1D50A7;
      color: #fff;
  }

  .ribbon {
    width: 150px;
    height: 150px;
    overflow: hidden;
    position: absolute;
  }
  .ribbon::before,
  .ribbon::after {
    position: absolute;
    z-index: -1;
    content: '';
    display: block;
    border: 5px solid #2980b9;
  }
  .ribbon span {
    position: absolute;
    display: block;
    width: 225px;
    padding: 10px 0;
    background-color: #00C1A4;
    box-shadow: 0 5px 10px rgba(0,0,0,.1);
    color: #fff;
    text-shadow: 0 1px 1px rgba(0,0,0,.2);
    text-transform: uppercase;
    text-align: center;
  }

  /* top left*/
  .ribbon-top-left {
    top: -10px;
    left: -10px;
  }
  .ribbon-top-left::before,
  .ribbon-top-left::after {
    border-top-color: transparent;
    border-left-color: transparent;
  }
  .ribbon-top-left::before {
    top: 0;
    right: 0;
  }
  .ribbon-top-left::after {
    bottom: 0;
    left: 0;
  }
  .ribbon-top-left span {
    right: -25px;
    top: 30px;
    transform: rotate(-45deg);
  }

  .container_home{
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      margin-top: 20px;
      margin-left: auto;
      margin-right: auto;
      width: 97%;
      height: 300px;
      border-radius: 15px;
      background-image: 
          url("images/Brancof.png");
        -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover; 
      background-blend-mode: saturation;
      background-position: center top;
      
  }
  .banner_btn {
    box-sizing: border-box;
    appearance: none;
    background-color: transparent;
    border: 2px solid #fff;
    border-radius: 0.6em;
    color: #fff;
    cursor: pointer;
    display: flex;
    align-self: center;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1;
    margin: 20px;
    padding: 1.2em 2.8em;
    text-decoration: none;
    text-align: center;
    text-transform: uppercase;
    font-family: &#39;
    Montserrat&#39;
    , sans-serif;
    font-weight: 700;
  }
  .banner_btn:hover, .btn:focus {
    color: #000;
    outline: 0;
  }

  .fourth {
    border-color: #1D50A7;
    color: #000;
    background-image: linear-gradient(45deg, #1D50A7 50%, transparent 50%);
    background-position: 100%;
    background-size: 400%;
    transition: background 500ms ease-in-out;
  }
  .fourth:hover {
    background-position: 0;
    color: #120718;
  }

  .banner{
    display:flex;
    justify-content: center;
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

<div class="container_home">
        <h2 style="font-family: Nunito; color: #000; padding-top: 20px"><b>Ponto Eletrônico</b></h2>
        <form action="<?php echo e(action('RegistrosController@store')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>    
          <input type="text" name="nome" autocomplete="off" style="width: 100%; background-color: #2b2e2e !important;" class="form-control" placeholder="Qual seu nome?" aria-label="Nome" aria-describedby="basic-addon1" list="membros" required>
          <datalist id="membros">
          <?php $__currentLoopData = $membros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option><?php echo e($membro->nome ?? ''); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </datalist>
        
          <div class="banner">
              <button class="banner_btn animated-background" type="submit" name="operacao" value="Entrada">Registrar Entrada</button>
              <button class="banner_btn animated-background" type="submit" name="operacao" value="Saída">Registrar Saída</button>
          </div>
        </form>
</div>
<?php if($contador>0): ?>
    
    <div class="centerized">
    <?php $__currentLoopData = $presentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="card p-2">
                <div class="ribbon ribbon-top-left"><span><?php echo e($membro->cargo ?? ''); ?></span></div>
                <div class="d-flex align-items-center dismay">

                    <div class="image">
                        <img width="155" class="membro-img" src="data:image/png;base64, <?php echo e($membro->foto ?? ''); ?>">
                    </div>

                <div w-100 class="sheesh" style="height:60px">
                        
                    <p class="mb-0 mt-0" style="font-size: 20px"><b><?php echo e($membro->nome ?? ''); ?></b></p>
                    <p class="mb-0 mt-0"><?php echo e($membro->coordenadoria ?? ''); ?></p><br>
            

                </div>
                    <a href="#" role="button" data-toggle="popover" class="btn btn-card btn-secondary popover-test example" data-html="true" title="Horários" data-placement="right" data-content="
                    <?php $__currentLoopData = $membro->horario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($horario['key'] != null and $horario['value'] != null): ?>
                            <b><?php echo e($horario['key']); ?></b>: <?php echo e($horario['value']); ?><br/>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">Ver Horários</a>

                </div>

                        
            </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link href="<?php echo e(asset('css/noty.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('js/noty.js')); ?>" type="text/javascript"></script>
<script>


$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
<?php if(Session::has('message')): ?>
<script>
window.onload = function(){
    var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
    var message = "<?php echo e(Session::get('message')); ?>";
    new Noty({
        text: message,
        type: type
    }).show();
};
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template_base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pontoeletronico-conselt\resources\views/home.blade.php ENDPATH**/ ?>