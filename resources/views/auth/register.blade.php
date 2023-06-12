@extends('layouts.app')

@section('content')
<body class="animated-background" >
    <!--  Area de registre  -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header  d-flex justify-content-center" >
                    <img src="images/logos.png" class="card-img-top" style= "width: 18rem;">
                </div>  
                <div class="card-body" style= "background-color:#162436;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end" style="color:#fff;">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="color:#fff;">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="color:#fff;">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end" style="color:#fff;">{{ __('Confirmar senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="color:#fff; background-color:#1D50A7;" >
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>


<style>

.alin{
    
}

.container1 { 
    
    margin-left: auto;
    margin-right: auto; 
}

.background{
                background: url("images/fundoroxo.png");
                background-attachment: fixed;
                background-size:100%;
                background-color:#000;
                background-repeat:no-repeat;
            }
            .alin-esquesrda{
             
            }
            .alin-direita{
                float:left;
                margin-left:6rem;
                margin-top:2rem;
            }
            .fixarRodape {
                bottom: 0;
                position: fixed;
                width: 100%;
                text-align: center;
    }
    .container_home{
        float:right;
        margin-right:7rem;
        margin-top:5rem;
      background-color: #120718;
      
      
  }
  .animated-background{
    font-family: Verdana;
    background: linear-gradient( 
    to right, #1D50A7,
    #162436,#00C1A4);
    background-size: 400% 400%;
    animation: animate-background 10s infinite ease-in-out;
  }
  @keyframes animate-background{
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

@endsection
