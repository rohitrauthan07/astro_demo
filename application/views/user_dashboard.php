<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Dashboard Container -->
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Welcome, <?= htmlspecialchars($user->name); ?>!</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <img src="<?= base_url('assets/images/' . $user->profile_photo); ?>" alt="Profile Photo" class="img-fluid rounded-circle shadow" style="max-width: 200px;">
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4>User Information</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($user->email); ?></li>
                            <li class="list-group-item"><strong>Role:</strong> <?= htmlspecialchars($user->role); ?></li>
                            <li class="list-group-item"><strong>Created At:</strong> <?= htmlspecialchars($user->created_at); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="text-center mt-4">
            <a href="<?= site_url('Profile'); ?>" class="btn btn-primary">Update Profile</a>
            <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger" style="float:right;">Logout</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>