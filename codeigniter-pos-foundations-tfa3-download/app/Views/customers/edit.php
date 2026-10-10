<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">CUSTOMER ACCOUNTS</p>
<h1>Edit customer</h1>
<p class="lead">Update the customer's information.</p>
<?php if ($validation): ?><div class="error-summary"><?= $validation->listErrors() ?></div><?php endif; ?>
<form class="form-card" method="post" action="<?= site_url('customers/' . $customer['id'] . '/update') ?>">
    <?= csrf_field() ?>
    <label for="full_name">Full name</label>
    <input id="full_name" name="full_name" value="<?= esc(old('full_name', $customer['full_name'])) ?>" required maxlength="100">
    <label for="email">Email</label>
    <input id="email" name="email" type="email" value="<?= esc(old('email', $customer['email'])) ?>" required maxlength="100">
    <label for="phone">Phone</label>
    <input id="phone" name="phone" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>" maxlength="20">
    <button class="button" type="submit">Update customer</button>
</form>
<?= $this->endSection() ?>
