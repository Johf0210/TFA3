<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">CUSTOMER ACCOUNTS</p>
<h1>Customer Accounts</h1>
<p class="lead">Customer records retrieved from the database.</p>
<p><a class="button" href="<?= site_url('customers/new') ?>">Add customer</a></p>
<?php if (session('success')): ?><p class="success-message"><?= esc(session('success')) ?></p><?php endif; ?>
<div class="table-wrap">
    <table>
        <thead><tr><th>Full name</th><th>Email</th><th>Phone</th><th>Action</th></tr></thead>
        <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone'] ?? '') ?></td>
                <td><a href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
