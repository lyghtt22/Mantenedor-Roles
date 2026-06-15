<?php
if (!isset($baseUrl)) {
    $baseUrl = '/Mantenedor-Roles/';
}
?>

<div class="card-main">
    <h3>Menú</h3>

    <p>
        <a class="btn-primary-main" href="<?php echo $baseUrl; ?>backoffice/dashboard.php">
            Dashboard
        </a>
    </p>

    <p>
        <a class="btn-primary-main" href="<?php echo $baseUrl; ?>backoffice/roles/">
            Mantenedor de roles
        </a>
    </p>
</div>