@extends("base.base")
@section("contenido")
<form class="login" action="/auth/login" method="post">
@csrf
    <img src="/images/Spotify_Logo.png" />
    <hr />
    <h3>Para continuar, inicia sesión en Spotify.</h3>
    <div class="container-menu">
    <div id="facebook">
      <img src="/images/perfil.jpg" />
      <h4>CONTINUAR CON FACEBOOK</h4>
    </div>
    <div id="apple">
      <img src="/images/perfil.jpg" />
      <h4>CONTINUAR CON APPLE</h4>
    </div>
    <div id="google">
      <img src="/images/perfil.jpg" />
      <h4>CONTINUAR CON GOOGLE</h4>
    </div>
    <div id="telefono">
      <img src="/images/perfil.jpg" />
      <h4>CONTINUAR CON NÚMERO DE TELÉFONO</h4>
    </div>
  </div>
    <div class="separator">
      <hr />
      O
      <hr />
    </div>
    <div class="correo-login">
    @if($errors)
    <p style="color: red;"> Credenciales Incorrectas</p>
    @endif
      <h3 style="color:black">Dirección de correo o nombre de usuario</h3>
      <input
        required
        name="email"
        type="email"
        id="text-input"
        placeholder="Dirección de correo o nombre de usuario"
      />
      <h3 style="color:black">Contraseña</h3>
      <input 
      required
        name="password"
        type="password" 
        id="text-input" 
        placeholder="Contraseña" />
      <a href="">¿Se te ha olvidado la contraseña?</a>
    </div>
    <div class="log-button">
      <input type="checkbox" name="remember" id="remember" />Recuérdame
      <button type="submit" id="button-submit">INICIAR SESIÓN</button>
      <hr />
      <h3>¿No tienes cuenta?</h3>
      <div id="cent">
        <div id="suscribete">
          <a href="/register">SUSCRÍBETE A SPOTIFY</a>
        </div>
      </div>
    </div>
    
</form>
@endsection