<?php /* Template Name: Contact */ get_header(); ?>
<main class="site-main">
<section class="page-hero"><div class="wrap"><div class="eyebrow">Contact PaiBand</div><h1>Talk to the studio.</h1><p>Press, creators, publishing, platforms, business, TGS meetings and player support all have a clear route here.</p></div></section>
<section><div class="wrap"><div class="path-grid">
<div class="path-card"><div class="eyebrow">General</div><h3>Studio enquiries</h3><p>For general questions and professional introductions.</p><a class="btn primary" href="mailto:<?php echo antispambot(paiband_email()); ?>"><?php echo antispambot(paiband_email()); ?></a></div>
<div class="path-card"><div class="eyebrow">Tokyo Game Show</div><h3>TGS 2026 meetings</h3><p>For press, publishers, platform teams, creators and other developers who want to schedule time during TGS.</p><a class="btn primary" href="<?php echo esc_url(paiband_meeting()); ?>">Request a meeting →</a></div>
<div class="path-card"><div class="eyebrow">Press & creators</div><h3>Media requests</h3><p>Press kits, interviews, review coverage, content creator enquiries and event assets.</p><a class="btn ghost" href="<?php echo esc_url(home_url('/press/')); ?>">Press hub →</a></div>
<div class="path-card"><div class="eyebrow">Players</div><h3>Game support</h3><p>Bug reports, technical issues and product support.</p><a class="btn ghost" href="<?php echo esc_url(home_url('/support/')); ?>">Support →</a></div>
</div></div></section>
</main><?php get_footer(); ?>