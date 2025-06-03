<?php
session_start();
include '../config/db.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../pages/login.php');
    exit();
}

include 'includes/admin_header.php';
include 'includes/admin_nav.php';




$query = "SELECT p.*, c.name AS category_name
    FROM products p
    LEFT JOIN categories c ON p.category_id = c.id
    ORDER BY p.id DESC
";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include 'includes/admin_sidebar.php'; ?>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Products Management</h1>
                <a href="./add-product.php" class="btn btn-primary-custom" >
                    <i class="fas fa-plus me-2"></i>Add New Product
                </a>
            </div>

            <!-- Products Table -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
    <td><?= $row['id'] ?></td>
    <td>
        <img src="../assets/images/products/<?= htmlspecialchars($row['main_image']) ?>" 
             alt="<?= htmlspecialchars($row['name']) ?>" 
             class="img-thumbnail" width="50">
    </td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['category_name']) ?></td>
    <td>Rs. <?= number_format($row['sale_price'], 2) ?></td>
    <td><?= $row['stock'] ?></td>
    <td>
        <?php
        $status = $row['status'];
        $badge = 'secondary';
        if ($status === 'active') $badge = 'success';
        elseif ($status === 'inactive') $badge = 'warning';
        elseif ($status === 'out_of_stock') $badge = 'danger';
        ?>
        <span class="badge bg-<?= $badge ?>"><?= ucfirst($status) ?></span>
    </td>
    <td>
        <button class="btn btn-sm btn-primary-custom" data-bs-toggle="modal" data-bs-target="#editProductModal<?= $row['id'] ?>">
            <i class="fas fa-edit"></i>
        </button>
        <form action="api/delete_product.php" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button class="btn btn-sm btn-danger" type="submit">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </td>
</tr>
                                <?php endwhile; ?>
                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>



<?php include 'includes/admin_footer.php'; ?>