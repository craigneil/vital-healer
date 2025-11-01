</main>

<!-- Footer -->
<footer class="bg-dark py-5 text-white text-center">
    <div class="container-md">
        <h2 class="fs-2 fw-bolder mb-4">Unlock the Future of Research with <?php echo SITE_NAME; ?></h2>
        <div class="d-grid gap-3 d-sm-flex justify-content-center">
            <a href="shop.php" class="btn btn-primary btn-lg text-white fw-semibold px-5 py-3 rounded-pill shadow text-decoration-none">
                Shop Now
            </a>
            <a href="guides.php" class="btn btn-outline-light btn-lg fw-semibold px-5 py-3 rounded-pill text-decoration-none">
                Explore Research Guides
            </a>
        </div>
        <p class="text-white-50 mt-5 mb-0">&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All Rights Reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php if (isset($additional_js)) echo $additional_js; ?>

</body>
</html>
