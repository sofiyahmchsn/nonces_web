<nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid mx-4">
          <a class="navbar-brand text-light fs-3" href="#">nonces</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a
                  class="nav-link active text-light"
                  aria-current="page"
                  href="index.php"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="all_products.php">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="cart.php"
                  ><i class="fa-solid fa-cart-shopping"></i><sup> <?php cartItems(); ?> </sup></a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Total Price: Rp. <?php totalCartPrice(); ?></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>