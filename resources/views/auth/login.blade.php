
<!DOCTYPE html>
<html lang="en" data-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <title>Ponto Eletrônico - CONSELT</title>
    <script
      src="https://kit.fontawesome.com/7f335cf7b9.js"
      crossorigin="anonymous"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/css/stylelogin.css" />
    <script src="/js/script.js"></script>
    
    
    
  </head>

  <body class="themed">
    <div class="main">
      <div id="illustration"></div>
      <div class="form-container">

            <!-- botão dos temas  -->
        <div class="theme-selector">
          <input class="input1"
            type="checkbox"
            id="switch"
            onchange="onThemeChange()"
            value="dark"
          />
          <label class="label" for="switch">Toggle</label>
        </div>
        @if (Route::has('register'))
        <!-- header -->
        <div class="form-header">
          <h3>Ponto Eletrônico - CONSELT</h3>
          <p>Não tem uma conta? <a href="{{route('register')}}">Cadastre-se</a></p>
        </div>
        @endif 


        <!-- forms de Email e senha  -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
          
          <input placeholder="Email" id="email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          <input placeholder="Senha" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
            <h5 style="margin-left:135px; margin-top:-4px;">Lembre de mim</h5><input class="form-check-input" style="margin-top:-35px; margin-left:10px;"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            
        
          <button type="submit">{{ __('LOGIN') }}</button>
        </form>





        <div class="form-buttons">
          <button>
            <a href="https://www.instagram.com/conselt/" target="_blank">
                <i class="fa-brands fa-instagram"></i>
            </a>
          </button>

          <button >
            <a href="mailto:contato@conselt.com.br" target="_blank">
                <i class="fa-brands fa-google"></i>
            </a>
          </button>

          <button >
           <a href="https://www.linkedin.com/company/conselt" target="_blank">
              <i class="fa-brands fa-linkedin"></i>
            </a>

          </button>
          <button >
            <a href="https://www.facebook.com/conselt" target="_blank">
              <i class="fa-brands fa-facebook" ></i>
            </a>
          </button>

          <button>
            <a href="https://api.whatsapp.com/send?phone=555537998680398" target="_blank">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
          </button>

        </div>



      </div>
    </div>


  </body>





</html>







