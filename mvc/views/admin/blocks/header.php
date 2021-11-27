<header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark __header-admin">
  <div class="container-fluid d-flex align-items-center">
    <h1 class="d-flex align-items-center fs-4 text-white mb-0">
      <img src="./public/img/logo_new3.png" width="50" height="50" class="me-3" alt="Bootstrap">
      BKU SHOP
    </h1>
    <div class="ms-auto">
      <span class="link-light">Welcome <?= $_SESSION["name_admin"] ?></span>
      <a href="./AdminController/logout" class=" link-light logout" style="text-decoration: none;">Logout</a>
    </div>
    
  </div>
</header>
<nav class="navbar sticky-top navbar-dark bg-dark __nav-admin">
  <div class="container-fluid __adminnav">
    <a class="navbar-brand none" href="#"></a>
    <a class="navbar-brand" href="./AdminController/viewHome">Dashboard</a>
    <a class="navbar-brand" href="./AdminController/viewHome">User Profie</a>
    <a class="navbar-brand" href="./AdminController/viewHome">Change Pasword</a>
    <a class="navbar-brand" href="./">Visit Website</a>
  </div>
</nav>