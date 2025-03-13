<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
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
        <h2>Manage Categories</h2>
        <a href="<?= site_url('profile/create_category'); ?>" class="btn btn-success mb-3">Add New Category</a>

        <div class="row">
            <?php foreach ($categories as $category): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($category->name); ?></h5>
                            <a href="<?= site_url('profile/manage_category/' . $category->id); ?>" class="btn btn-warning mb-2">Edit</a>
                            <a href="<?= site_url('profile/delete_category/' . $category->id); ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h3 class="mt-4">Subcategories</h3>
        <a href="<?= site_url('profile/create_subcategory'); ?>" class="btn btn-primary mb-3">Add New Subcategory</a>

        <div class="row">
            <?php foreach ($subcategories as $subcategory): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($subcategory->name); ?></h5>
                            <p class="card-text">Category: <?= htmlspecialchars($subcategory->category_name); ?></p>
                            <a href="<?= site_url('profile/manage_subcategory/' . $subcategory->id); ?>" class="btn btn-warning mb-2">Edit</a>
                            <a href="<?= site_url('profile/delete_subcategory/' . $subcategory->id); ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>