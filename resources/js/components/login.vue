<template>
  <div class="login">
    <img src="/images/Spotify_Logo.png" />
    <hr />
    <h3>Para continuar, inicia sesión en Spotify.</h3>
    <login-button-component></login-button-component>
    <div class="separator">
      <hr />
      O
      <hr />
    </div>
    <div class="correo-login">
      <h3>Dirección de correo o nombre de usuario</h3>
      <input
        type="text"
        id="text-input"
        placeholder="Dirección de correo o nombre de usuario"
      />
      <h3>Contraseña</h3>
      <input type="text" id="text-input" placeholder="Contraseña" />
      <a href="">¿Se te ha olvidado la contraseña?</a>
    </div>
    <div class="log-button">
      <input type="checkbox" name="remember" id="remember" />Recuérdame
      <button type="submit" id="button-submit">INICIAR SESIÓN</button>
      <hr />
      <h3>¿No tienes cuenta?</h3>
      <div id="cent">
        <div id="suscribete">
            <a href="/register">
            SUSCRÍBETE A SPOTIFY</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoginButtonComponent from "./loginbutton.vue";
export default {
  name: "App",
  data() {
      return 
      {

      }
  },
  components: {
    LoginButtonComponent,
  },
  methods : 
  {
      login()
      {
          
      }
  }
};
</script>

<style>
body {
  display: flex;
  justify-content: center;
  text-align: center;
}
hr {
  width: 100vw;
  height: 1px;
  border-width: 0px;
  border-style: inset;
  background-color: rgba(109, 109, 109, 0.404);
}
h3 {
  font-weight: bold;
}

#suscribete {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: rgb(255, 255, 255);
  border-radius: 50px;
  border: 3px solid rgb(24, 24, 24);
  border-color: gray;
  width: 450px;
  height: 50px;
}
#suscribete h4 {
  color: gray;
}
#button-submit {
  background-color: green;
  color: white;
  padding: 15px 50px;
  border-radius: 50px;
  margin-left: 150px;
  margin-top: 20px;
  margin-bottom: 10px;
}
#cent {  
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;  
}
.correo-login {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.correo-login #text-input {
  width: 450px;
  height: 30px;
}
.log-button hr {
  width: 450px;
}
.separator {
  display: flex;
  justify-content: center;
}
.separator hr {
  width: 30%;
}
#login {
  margin: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
}
.login img {
  width: 200px;
  -webkit-filter: invert(100%);
  filter: invert(100%);
  padding: 15px;
}
</style>
