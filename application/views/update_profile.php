<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Main container for the profile update page -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Update Your Profile</h2>

        <!-- Displaying success and error messages -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Profile Update Form -->
        <form method="post" action="<?= site_url('profile/update'); ?>" enctype="multipart/form-data">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row mb-4">
                        <!-- Name Field -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user->name); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="profile_photo" class="form-label">Profile Photo</label>
                            <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*">
                        </div>
                    </div>
                    <div class="text-center mb-4">
                        <label class="form-label">Current Profile Photo</label><br>
                        <img src="<?= base_url('assets/images/' . $user->profile_photo); ?>" alt="Profile Photo" class="img-fluid rounded-circle" style="max-width: 150px;">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Update Profile</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <!-- Bootstrap 5 JS (Popper.js and Bootstrap Bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>