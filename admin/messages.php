<?php
session_start();
include '../config/db.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../pages/login.php');
    exit();
}

include 'includes/admin_header.php';
include 'includes/admin_nav.php';
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
                                    <h2 class="mt-2 mb-0">125</h2>
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
                                    <h2 class="mt-2 mb-0">18</h2>
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
                                    <h2 class="mt-2 mb-0">89</h2>
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
                                    <h2 class="mt-2 mb-0">18</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages List -->
            <div class="card shadow-sm">
                <div class="card-header py-3 bg-light">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">All Messages</option>
                                <option value="unread">Unread</option>
                                <option value="read">Read</option>
                                <option value="responded">Responded</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">All Subjects</option>
                                <option value="order">Order Inquiry</option>
                                <option value="support">Support</option>
                                <option value="feedback">Feedback</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search messages...">
                                <button class="btn btn-primary-custom" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <!-- Unread Message -->
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div class="flex-grow-1 me-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1 fw-bold">Wedding Flowers Inquiry</h6>
                                        <small class="text-danger">5 mins ago</small>
                                    </div>
                                    <p class="mb-1 text-truncate">From: Sarah Johnson (sarah@example.com)</p>
                                    <small class="text-muted">I'm interested in your wedding flower packages...</small>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary-custom" data-bs-toggle="modal" data-bs-target="#viewMessageModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Read Message -->
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div class="flex-grow-1 me-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Order #1234 Question</h6>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                    <p class="mb-1 text-truncate">From: Mike Smith (mike@example.com)</p>
                                    <small class="text-muted">When can I expect my order to be delivered?</small>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary-custom" data-bs-toggle="modal" data-bs-target="#viewMessageModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <nav aria-label="Messages navigation">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
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
