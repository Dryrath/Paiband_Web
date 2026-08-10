<?php /* Template Name: Support */ get_header(); ?>
<main class="site-main">
<section class="page-hero"><div class="wrap"><div class="eyebrow">Player support</div><h1>How can we help?</h1><p>Technical issues, bug reports, store questions and support for PaiBand games.</p></div></section>
<section><div class="wrap"><div class="support-grid">
<div class="support-card"><div class="eyebrow">Restore Your Island</div><h3>Game support</h3><p>For launch problems, save issues, gameplay bugs or platform-specific problems, include your platform, hardware, what happened and what you were doing immediately before the issue.</p><a class="btn primary" href="mailto:<?php echo antispambot(paiband_email()); ?>?subject=Restore%20Your%20Island%20Support">Email support →</a></div>
<div class="support-card"><div class="eyebrow">Escape By Spoon</div><h3>Demo & development</h3><p>Escape By Spoon is in development for 2027. Use this route for demo feedback, press enquiries or issues with any public test build when available.</p><a class="btn primary" href="mailto:<?php echo antispambot(paiband_email()); ?>?subject=Escape%20By%20Spoon%20Support">Contact us →</a></div>
</div></div></section>
<section class="paper"><div class="wrap"><div class="section-head"><div><div class="eyebrow">FAQ</div><h2>Common questions.</h2></div></div><div class="faq">
<details><summary>Where can I get Restore Your Island?</summary><p>Restore Your Island is available through Steam and the Epic Games Store. The Steam release launched on 9 April 2026; storefront availability can differ by platform.</p></details>
<details><summary>Does Restore Your Island support macOS?</summary><p>The official PaiBand press kit lists Windows and macOS for the Steam version. Check the current Steam store requirements before purchasing for a specific Mac.</p></details>
<details><summary>When is Escape By Spoon releasing?</summary><p>The current official press kit lists 2027 for PC (Steam). Release plans can still change during development, so wishlist the Steam page for current store updates.</p></details>
<details><summary>What should I include in a bug report?</summary><p>Your platform, operating system, CPU/GPU, exact steps to reproduce the issue, screenshots or video if relevant, and any crash/log information you can safely provide.</p></details>
<details><summary>Where is the Privacy Policy?</summary><p>The existing site Privacy Policy is preserved at /privacy-policy/ and uses the same new site design.</p></details>
</div></div></section>
<section><div class="wrap"><div class="callout"><div><h2>Still need help?</h2><p>Send the details to the PaiBand support contact and include the game name in the subject.</p></div><a class="btn primary" href="mailto:<?php echo antispambot(paiband_email()); ?>"><?php echo antispambot(paiband_email()); ?></a></div></div></section>
</main><?php get_footer(); ?>