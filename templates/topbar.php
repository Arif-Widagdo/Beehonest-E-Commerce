
  <header class="header ">
    <div class="container">
      <div class="row justyfy-content-between">
        <div class="logo"><img src="assets/img/svg/logo.png" alt="ImageLogo">
          <a href="home">Bee<span>Honest</span></a></div>
        <div class="list-menu">
          <div class="menu-1">
            <ul class="menu">
              <li><a href="home#home" class="home  ">Home</a></li>
              <li><a href="home#about" class="about   ">About</a></li>
              <li><a href="home#products" class="products   ">Product</a></li>
              <li><a href="blog" class="resources  ">Resources</a></li>
            </ul>
          </div>
        </div>
        <div class="menu-2">
          <ul class="menu">

            <?php
				if(!isset($_SESSION['log'])){
					echo '
          <li><a href="cart" class="nav-link menu-1 outer-shadow hover-inner hover-in-shadow"><i class="fas fa-shopping-cart"></i>Cart</a></li>;
          <li><a href="login" class=" nav-link menu-1 outer-shadow hover-inner hover-in-shadow">Login</a></li>';
				} else {
					if(isset($_SESSION['log'])){
					echo '
          <li><a href="cart" class="nav-link menu-1 outer-shadow hover-inner hover-in-shadow"><i class="fas fa-shopping-cart"></i> Cart</a></li>
					<li class="dropdown"><a class=" nav-link menu-1 outer-shadow hover-inner hover-in-shadow">Account <i class="fas fa-user-circle"></i></a></a>
		        <ul class="isi-dropdown">
              <li><a href="riwayat">History Shopping</a></li>
		        	<li><a href="profile">Setting Acounts</a></li>
			        <li><a href="logout">Logout</a></li>
		        </ul>
      	</li>';
        
        } 
				}
				?>
          </ul>
        </div>
      </div>
    </div>
  </header>


