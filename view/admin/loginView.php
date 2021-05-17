<div id="carousel" class="carousel slide" data-ride="carousel">
      <!-- The slideshow -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://picsum.photos/2000/401" alt="Chicago" />
          <div class="carousel-caption">
            <h1>Login</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex flex-column m-4">
    <!-- Formulaire de connexion à la page admin -->
    <form name="login" id="login" method="POST" enctype='multipart/form-data' class="align-self-center m-4 l-80"  action="">
      <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
        <input
          id="name"
          name="name"
          type="text"
          class="form-control"
          aria-describedby="emailHelp"
          placeholder="Enter email"
        />
        <small id="emailHelp" class="form-text text-muted"
          >We'll never share your email with anyone else.</small
        >
      </div>
      <div id="error"></div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input
        name="pass"
          id="pass"
          type="password"
          class="form-control"
          placeholder="Password"
        />
      </div>
      
      <!-- Inclusion de la fonction connexion venant de script.js, déclencheur: sur clique de la souris-->
      <button
        type="submit"
        class="btn btn-primary"
        onclick="connexion('login')"
      >
        Submit
      </button>
    </form>
    </div>