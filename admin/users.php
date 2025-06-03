<?php
session_start();
include '../config/db.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../pages/login.php');
    exit();
}

include 'includes/admin_header.php';
include 'includes/admin_nav.php';

$sql = "SELECT * FROM users ORDER BY created_at DESC";
$result = $conn->query($sql);
if (!$result) {
    die("Database query failed: " . $conn->error);
}   

// Total users
$total_query = "SELECT COUNT(*) AS total FROM users";
$total_result = $conn->query($total_query);
$total_users = $total_result->fetch_assoc()['total'];

// New users this month
$current_month = date('Y-m-01'); // First day of current month
$new_query = "SELECT COUNT(*) AS new_this_month FROM users WHERE created_at >= ?";
$stmt = $conn->prepare($new_query);
$stmt->bind_param("s", $current_month);
$stmt->execute();
$new_result = $stmt->get_result();
$new_users = $new_result->fetch_assoc()['new_this_month'];

?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include 'includes/admin_sidebar.php'; ?>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Users Management</h1>
                <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fas fa-user-plus me-2"></i>Add New User
                </button>
            </div>

            <div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card card-stats shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 bg-primary-custom rounded-circle p-3">
                        <i class="fas fa-users fa-fw text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="card-title mb-0">Total Users</h6>
                        <h2 class="mt-2 mb-0"><?php echo $total_users; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card card-stats shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 bg-warning rounded-circle p-3">
                        <i class="fas fa-user-clock fa-fw text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="card-title mb-0">New This Month</h6>
                        <h2 class="mt-2 mb-0"><?php echo $new_users; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Users Table -->
            <div class="card shadow-sm">
                <div class="card-header py-3 bg-light">
                    <h6 class="m-0 font-weight-bold text-primary-custom">
                        <i class="fas fa-users me-2"></i>Users List
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Joined Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0"><?php echo htmlspecialchars($row['firstname']); ?></h6>
                                    <small class="text-muted"><?php echo ucfirst($row['role']); ?></small>
                                </div>
                            </div>
                        </td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td>
                            <form method="post" action="./includes/change_role.php" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <select name="role" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()" <?php echo ($row['id'] == $_SESSION['user_id']) ? 'disabled' : ''; ?>>
                                    <option value="admin" <?php echo ($row['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                                    <option value="user" <?php echo ($row['role'] === 'user') ? 'selected' : ''; ?>>User</option>
                                </select>
                            </form>
                        </td>
                       
                        <td><?php echo htmlspecialchars(date('Y-m-d', strtotime($row['created_at']))); ?></td>
                        <td>
                            <div class="btn-group">
                                <form method="post" action="edit_user.php" style="display:inline;">
                                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-primary-custom">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </form>
                                <form method="post" action="delete_user.php" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="api/users.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" required>
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-custom">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
