<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('auth/logout'); ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>User Profiles</h2>
        <div class="row">
            <?php foreach ($users as $user): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="<?= base_url('assets/images/' . $user->profile_photo); ?>" class="card-img-top" style="height:250px;" alt="Profile Photo">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($user->name); ?></h5>
                            <a href="<?= site_url('profile/manage_category/' . $user->id); ?>" class="btn btn-primary">Manage</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container mt-5">
        <h2>Manage Categories</h2>
        <a href="<?= site_url('profile/create_category'); ?>" class="btn btn-success mb-3">Add New Category</a>
        <div class="row">
            <?php foreach ($categories as $category): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($category->name); ?></h5>
                            <a href="<?= site_url('profile/manage_category/' . $category->id); ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= site_url('admin/delete_category/' . $category->id); ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>