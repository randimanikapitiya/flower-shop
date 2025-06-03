<?php
session_start();
include '../includes/header.php';
include '../includes/nav.php';

        include '../config/db.php';
      


?>


<div class="container">
    <h1 class="text-center my-5">Our Collection </h1>

    <div class="row">
        <!-- Category Card -->
       
           <div class="col-md-4 mb-4">
            <div class="card fade-in">
                <img src="../assets/images/products/lilies.jpg" class="card-img-top" alt="White Lilies Bouquet">
                <div class="card-body">
                    <h5 class="card-title">Pure Elegance</h5>
                    <p class="card-text">Stunning white lilies and delicate greenery.</p>
                    <div class="price mb-3">$44.99</div>
                    <div class="d-grid gap-2">
                        <a href=""></a>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

        
    </div>
</div>



<?php
include '../includes/footer.php';
?>

