
<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-between">
        <div class="container-fluid">
            <div class="btn-group">
                <a class="navbar-brand nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    Agent Travel 007
                </a>
                <ul class="dropdown-menu">
                        <li>
                            <div class="btn-group dropend" style="width:100%">
                                <a class="btn dropdown-toggle me-5" data-bs-toggle="dropdown" aria-expanded="false">
                                    Travel Info
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="destinations.php">Destinations</a></li>
                                    <li><a class="dropdown-item" href="about-us.php">About Us</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="dropdown-item" href="products.php">Products</a></li>
                        <li><a class="dropdown-item" href="contact.php">Contact & Support</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="index.php">Home</a></li>
                </ul>
                </div>
                <div class="btn-group">
                <a class="navbar text-white nav-link dropdown-toggle"  href="#" type="button" id="account" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">
                    <?php echo $_SESSION["user_name"]?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="account">
                    <li><a class="dropdown-item" href="account.php">Account</a></li>
                    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>