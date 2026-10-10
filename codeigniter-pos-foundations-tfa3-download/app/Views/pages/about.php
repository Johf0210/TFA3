<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">ABOUT THE PROJECT</p>
<h1>Learning the MVC flow</h1>
<p class="lead">This activity demonstrates the routing, controller, and view layers before a database is introduced.</p>
<div class="prose">
    <p>CodeIgniter uses routes to decide which controller method should respond to a URL. The controller handles the request and can pass information to a view. The view presents that information as HTML.</p>
    <p>The customer and user pages use PHP arrays as temporary in-memory data sources. Their views loop through those arrays with <code>foreach</code>.</p>
</div>
<?= $this->endSection() ?>
