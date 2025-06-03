<?php
session_start();
include '../includes/header.php';
include '../includes/nav.php';

        include '../config/db.php';
      

        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
?>


<div class="container">
    <h1 class="text-center my-5">Our Collection </h1>

    <div class="row">
        <!-- Category Card -->
       
                <div class="col-md-4 mb-4">
                    <div class="card fade-in">
                        <img src="../assets/images/categories/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                            <a href="products.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Items</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="col-12"><p class="text-center">No categories found.</p></div>';
        }
        $conn->close();
        ?>
       
    </div>

        
    </div>
</div>



<?php
include '../includes/footer.php';
?>

