<?php
session_start();
include '../config/db.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../pages/login.php');
    exit();
}

include 'includes/admin_header.php';
include 'includes/admin_nav.php';



$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Total messages
$total_result = $conn->query("SELECT COUNT(*) AS total FROM messages");
$total = $total_result->fetch_assoc()['total'];

// Unread messages
$unread_result = $conn->query("SELECT COUNT(*) AS unread FROM messages WHERE status = 'unread'");
$unread = $unread_result->fetch_assoc()['unread'];

// Responded messages
$responded_result = $conn->query("SELECT COUNT(*) AS responded FROM messages WHERE status = 'responded'");
$responded = $responded_result->fetch_assoc()['responded'];

// Pending messages
$pending_result = $conn->query("SELECT COUNT(*) AS pending FROM messages WHERE status = 'pending'");
$pending = $pending_result->fetch_assoc()['pending'];
?>

?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include 'includes/admin_sidebar.php'; ?>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Messages</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-envelope-open me-2"></i>Mark All Read
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                    </div>
                </div>
            </div>

            <!-- Message Stats -->
            <div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card card-stats shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 bg-primary-custom rounded-circle p-3">
                        <i class="fas fa-envelope fa-fw text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="card-title mb-0">Total Messages</h6>
                        <h2 class="mt-2 mb-0"><?php echo $total; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 bg-danger rounded-circle p-3">
                        <i class="fas fa-envelope-open fa-fw text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="card-title mb-0">Unread</h6>
                        <h2 class="mt-2 mb-0"><?php echo $unread; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 bg-success rounded-circle p-3">
                        <i class="fas fa-reply fa-fw text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="card-title mb-0">Responded</h6>
                        <h2 class="mt-2 mb-0"><?php echo $responded; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 bg-info rounded-circle p-3">
                        <i class="fas fa-clock fa-fw text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="card-title mb-0">Pending</h6>
                        <h2 class="mt-2 mb-0"><?php echo $pending; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            
            <div class="row">
                        <!-- Read Message -->
                         <div class="list-group shadow p-3 mb-5 bg-white rounded">
<?php if ($result && $result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <div class="flex-grow-1 me-3">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1"><?php echo htmlspecialchars($row['subject']); ?></h6>
                        <small class="text-muted"><?php echo date("M d, Y", strtotime($row['created_at'])); ?></small>
                    </div>
                    <p class="mb-1 text-truncate">From: <?php echo htmlspecialchars($row['name']); ?> (<?php echo htmlspecialchars($row['email']); ?>)</p>
                    <small class="text-muted"><?php echo htmlspecialchars($row['message']); ?></small>
                </div>
                <div class="btn-group">
                    <!-- Delete Message -->
                    <form method="post" action="../handlers/delete_message.php" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <div class="alert alert-info text-center">No messages found.</div>
<?php endif; ?>
</div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- View Message Modal -->
<div class="modal fade" id="viewMessageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="fw-bold mb-0">Wedding Flowers Inquiry</h6>
                        <span class="badge bg-danger">Unread</span>
                    </div>
                    <p class="mb-1"><strong>From:</strong> Sarah Johnson (sarah@example.com)</p>
                    <p class="mb-1"><strong>Date:</strong> June 3, 2025 10:30 AM</p>
                    <p class="mb-1"><strong>Subject:</strong> Wedding Flowers Inquiry</p>
                </div>
                <div class="mb-4">
                    <h6 class="fw-bold">Message:</h6>
                    <p>Hello,</p>
                    <p>I'm interested in your wedding flower packages. I'm getting married on August 15th and would like to discuss options for bridal bouquets, centerpieces, and ceremony decorations. Could you please provide information about your wedding packages and pricing?</p>
                    <p>Best regards,<br>Sarah</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Quick Reply:</label>
                    <textarea class="form-control" rows="4" placeholder="Type your response..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary-custom">Send Reply</button>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
