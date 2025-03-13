<?php $this->load->view('common/header'); ?>

<!-- Image Slider -->
<div id="carouselExampleCaptions" class="carousel slide mt-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url('assets/images/slide1.jpg'); ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to Our Website</h5>
                <p>Explore our services and products.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('assets/images/slide2.jpg'); ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Discover New Opportunities</h5>
                <p>Find profiles, categories, and much more.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Profile List Section -->
<div class="container mt-5">
    <h2>Our Profiles</h2>
    <div class="row">
        <?php foreach ($profiles as $profile): ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/images/' . $profile->profile_photo); ?>" class="card-img-top" style="height:250px;" alt="Profile Photo">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($profile->name); ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>