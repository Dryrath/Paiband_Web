<?php /* Template Name: Support */ get_header(); ?>
<main class="site-main">
<section class="page-hero"><div class="wrap"><div class="eyebrow">Player support</div><h1>How can we help?</h1><p>Technical issues, bug reports, store questions and support for PaiBand games.</p></div></section>
<section><div class="wrap"><div class="support-grid">
<div class="support-card"><div class="eyebrow">Restore Your Island</div><h3>Game support</h3><p>For launch problems, save issues, gameplay bugs or platform-specific problems, include your platform, hardware, what happened and what you were doing immediately before the issue.</p><a class="btn primary" href="mailto:<?php echo antispambot(paiband_email()); ?>?subject=Restore%20Your%20Island%20Support">Email support →</a></div>
<div class="support-card"><div class="eyebrow">Escape By Spoon</div><h3>Demo & development</h3><p>Escape By Spoon is in development for 2027. Use this route for demo feedback, press enquiries or issues with any public test build when available.</p><a class="btn primary" href="mailto:<?php echo antispambot(paiband_email()); ?>?subject=Escape%20By%20Spoon%20Support">Contact us →</a></div>
</div></div></section>
<section><div class="wrap"><div class="callout"><div><h2>Still need help?</h2><p>Send the details to the PaiBand support contact and include the game name in the subject.</p></div><a class="btn primary" href="mailto:<?php echo antispambot(paiband_email()); ?>"><?php echo antispambot(paiband_email()); ?></a></div></div></section>
</main><?php get_footer(); ?>