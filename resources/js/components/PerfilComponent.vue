<template>
  <div class="container">
    <img src="/assets/perfil.jpg" class="perfil-image" />
    <h4>{{ name }}</h4>
    <div v-if="logged == 1" class="dropdown">
      <button class="dropbtn">▼</button>
      <div class="dropdown-content">
        <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
        </a>
      </div>
    </div>
    <div v-else class="dropdown">
      <button class="dropbtn">▼</button>
      <div class="dropdown-content">
        <a href="/login" >
        Login
        </a>
      </div>
    </div>

    <form id="logout-form" action="/logout" method="POST" style="display: none;">
      <input type="hidden" name="_token" :value="csrf">
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      logged : document.querySelector('meta[name="logged"]').getAttribute('content'),
    }
  },
  props: ["name" ],
};
</script>

<style>
.container {
  display: flex;
  background-color: rgba(0, 0, 0, 0.918);
  width: 200px;
  height: 30px;
  border-radius: 50px;
  justify-content: space-around;
  align-items: center;
}

.container:hover {
  background-color: rgb(34, 34, 34);
}
.perfil-image {
  vertical-align: middle;
  width: 25px;
  height: 25px;
  border-radius: 50px;
}
.dropdown {
  position: relative;
  display: inline;  
}
.dropdown-content {
  display: none;
  position:absolute;
  background-color: rgb(41, 41, 41);
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  right: 0;
}

.dropdown-content a {
  color: white;
  margin: 4px;
  border-radius: 4px;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: rgb(68, 68, 68);
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
.dropbtn {
background: transparent;
color: white;
border: 0;
}
</style>