<section id="pages" class="page">
    <div class="container">
        <nav class="menu-bottom">
            <a href="home#home" data-menu="home" class="menu-item">
                <i class="fas fa-home"></i>
                <span class="menu-item-label">Home</span>
            </a>
            <a href="cart" data-menu="cart" class="menu-item">
                <i class="fas fa-shopping-cart"></i>
                <span class="menu-item-label">cart</span>
            </a>
            <a href="blog" data-menu="home" class="menu-item">
                <i class="fa fa-blog"></i>
                <span class="menu-item-label">Resources</span>
            </a>

            <?php
				if(!isset($_SESSION['log'])){
					echo '
                 <a href="login" data-menu="home" class="menu-item">
                    <i class="fas fa-user-circle"></i>
                    <span class="menu-item-label" >Profile</span>
                 </a>';
				} else {
					if(isset($_SESSION['log'])){
					echo '  
                 <button onclick="myFunction()" class="fas fa-user-circle dropbtn"><a>Dropdown</a></button>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="#">Setting Account</a>
                  <a href="riwayat">History Shopping</a>
                  <a href="logout">Logout </a>
                  </div>
                    ';
                 } 
			}
			?>
        </nav>
        <script>
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function (event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>
    </div>
</section>