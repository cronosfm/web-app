@extends("base")
@section("contenido")
  <form class="register" action="/auth/register" method="post">
    @csrf
    <img src="./assets/Spotify_Logo.png" />
    <h3 style="color:black">Regístrate gratis para escuchar.</h3>
    <hr />
    <div class="correo-register">
        @if(isset($email_ocupado))
        <p style="color:red;"> Correo ya Registrado</p>
        @endif
      <h3 style="color:black">¿Cuál es tu correo electrónico?</h3>
      <input
        name="email"
        required
        type="text"
        id="text-input"
        placeholder="Introduce tu correo electrónico."
      />
      <!-- <h3 style="color:black" >Confirma el correo electrónico</h3>
      <input
        required
        type="text"
        id="text-input"
        placeholder="Vuelve a introducir tu correo electrónico."
      /> -->
      <h3 style="color:black">Crea una contraseña</h3>
      <input
        name="password"
        type="password"
        id="text-input"
        placeholder="Crea una contraseña"
      />
      <h3 style="color:black">¿Cómo quieres que te llamemos?</h3>
      <input
        name="name"
        type="text"
        id="text-input"
        placeholder="Introduce un nombre de perfil."
      />
    </div>
    <div class="log-button">
      <button type="submit" id="button-submit">Registrarte</button>
      <hr />
      <div id="login-option">
        <h3 style="color:black">Ya tienes cuenta? </h3>
        <a href="/login">Inicia sesión.</a>
      </div>
    </div>
</form>
@endsection

@section("estilo")
<style>
body {
  display: flex;
  justify-content: center;
  text-align: center;
}
hr {
  width: 60vw;
  height: 1px;
  border-width: 0px;
  border-style: inset;
  background-color: rgba(109, 109, 109, 0.404);
}
h3 {
  font-weight: bold;
}

#button-submit {
  background-color: rgb(58, 204, 89);
  color: black;
  font-weight: bold;
  font-size: 17px;
  padding: 15px 40px;
  border-radius: 50px;
  border: 0px;
  margin-top: 20px;
  margin-bottom: 10px;
}
.correo-register {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.correo-register #text-input {
  width: 450px;
  height: 30px;
}
#register {
  margin: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
}
.register img {
  width: 100px;
  -webkit-filter: invert(100%);
  filter: invert(100%);
  padding: 15px;
}
#login-option{
display: flex;
align-items: center;
justify-content: center;
}
</style>
@endsection