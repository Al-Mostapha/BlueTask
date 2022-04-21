<style scoped>
    #signup-form {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }
</style>
<template>
    <div id="signup-form">
      <form>
        <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57" />
        <h1 class="h3 mb-3 fw-normal">sign Up</h1>
        <div class="form-floating">
          <input type="email" class="form-control" id="UserName" placeholder="user name"  />
          <label for="UserName">User Name</label>
        </div>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"  />
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input  type="password" class="form-control" id="floatingPassword" placeholder="Password" />
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
          <input  type="password" class="form-control" id="ConfirmPass" placeholder="Password" />
          <label for="ConfirmPass">Confirm Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">
         Sign Up
        </button>
        <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
      </form>
    </div>
</template>

<script>
import CHeader from "./CHeader.vue";
export default {
  data() {},
  components: {
    "header-glob": CHeader,
  },
};
</script>

