<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Lv_Auth</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
       @guest
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
      </ul>
        <div class="d-flex">
          <a href="/login" class="btn btn-outline-success" style="margin-right: 10px;">Login</a>
          <a href="/register" class="btn btn-outline-success">Register</a>
        </div> 
       @endguest
       @auth
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products">Products</a>
          </li>
        </ul>
           <p class="text-dark m-2">{{auth()->user()->name}}</p>
           <a href="/logout" class="btn btn-outline-success">Logout</a>
     
       @endauth
      </div>
    </div>
  </nav>