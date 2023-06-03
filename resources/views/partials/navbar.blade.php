<div class="site-navbar py-2">

<div class="search-wrap">
  <div class="container">
    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
    <form action="#" method="post">
      <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
    </form>
  </div>
</div>

<div class="container">
  <div class="d-flex align-items-center justify-content-between">
    <div class="logo">
      <div class="site-logo">
        <a href="/" class="js-logo-clone">Pharma</a>
      </div>
    </div>
    <div class="main-nav d-none d-lg-block">
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <ul class="site-menu js-clone-nav d-none d-lg-block">
          <li class="active"><a href="/">Home</a></li>
          <li><a href="shop.html">Produk</a></li>
          <li class="has-children">
            <a href="#">Category</a>
            <ul class="dropdown">
              <li><a href="#">Supplements</a></li>
              <li class="has-children">
                <a href="#">Vitamins</a>
                <ul class="dropdown">
                  <li><a href="#">Supplements</a></li>
                  <li><a href="#">Vitamins</a></li>
                  <li><a href="#">Diet &amp; Nutrition</a></li>
                  <li><a href="#">Tea &amp; Coffee</a></li>
                </ul>
              </li>
              <li><a href="#">Diet &amp; Tentang</a></li>
              <li><a href="#">Tea &amp; Kontak</a></li>
              
            </ul>
          </li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Login
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/login" method="post">
                    @csrf
                    <div class="form-group">
                    <h2 style="color:black;" >Login</h2>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                  <div class="modal-footer mx-auto">
                  <button type="submit" class="btn btn-success">Masuk</button>
                  <a class="btn btn-primary" href="">Registrasi</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </ul>
      </nav>
    </div>
    <div class="icons">
      <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
      <a href="cart.html" class="icons-btn d-inline-block bag">
        <span class="icon-shopping-bag"></span>
        <span class="number">2</span>
      </a>
      <a href="#"  class="5 site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
          class="icon-menu"></span></a>
    </div>
  </div>
</div>
</div>