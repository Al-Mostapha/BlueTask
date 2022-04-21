<template>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">
            Blue Task
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
              <template v-if="isGuest">
                    <li class="nav-item">
                        <a class="nav-link" :href="Url+'/login'">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :href="Url+'/register'" >Register</a>
                    </li>

              </template>
              <template v-else>
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{User.name}}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" :href="Url+'/logout'"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" :action="Url+'/logout'" method="POST" class="d-none">
                            <input type="hidden" name="_token" :value="csrf"/>
                        </form>
                    </div>
                </li>
              </template>
            </ul>
        </div>
    </div>
  </nav>
</template>
<script>
export default {

  data(){
    return {
      Url: window.window.location.origin,
      isGuest: window.isGuest,
      User: window.User,
      csrf: window.csrf
    }
  }

}
</script>