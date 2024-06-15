<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Lv Auth</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/posts">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products">Product</a>
          </li>
          
        </ul>
        
        @guest
          <div class="d-flex">
            <a class="btn btn-outline-success" href="/login" >Login</a>
            <a class="btn btn-outline-secondary" href="/register" >Register</a>
          </div>  
        @endguest
        
        @auth
          <div class="d-flex">
            <p class="pt-2">{{auth()->user()->name}}</p>
            <a href="/logout" class="btn btn-outline-success">Log out</a>
          </div> 
        @endauth
      </div>
    </div>
  </nav>