<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="hero">
    <p class="eyebrow">IT0049 · Web System Technologies</p>
    <h1>From zero to four pages.</h1>
    <p class="lead">A simple Point-of-Sale foundation built with CodeIgniter 4, MVC routing, controllers, views, and temporary static data.</p>
    <div class="actions">
        <a class="button" href="<?= site_url('customers') ?>">View customer accounts</a>
        <a class="button secondary" href="<?= site_url('users') ?>">View user accounts</a>
    </div>
</section>
<section class="cards">
    <article><h2>Routes</h2><p>Each URL maps to a controller method through the application routes.</p></article>
    <article><h2>Controllers</h2><p>Controllers handle requests and prepare data for the page being displayed.</p></article>
    <article><h2>Views</h2><p>Views render the HTML that the browser receives and displays.</p></article>
</section>
<?= $this->endSection() ?>
