<nav class="navbar navbar-expand-lg bg-success-subtle  bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Mobify</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./user_login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><i
                            class="fa-solid fa-cart-shopping"></i><span><sup>1</sup></span></a>

                </li>
            </ul>
            <form class="d-flex" role="search" action="search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword"
                    required>
                <button class="btn btn-success" type="submit" value="search" name="search_product">Search</button>
            </form>
        </div>
    </div>
</nav>