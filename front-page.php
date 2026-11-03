<?php get_header(); ?>
<main class="site-main">
<section class="hero studio-hero">
 <div class="studio-ambient studio-ambient-a"></div>
 <div class="studio-ambient studio-ambient-b"></div>
 <img class="studio-watermark" src="<?php echo paiband_asset('paiband-flower.png'); ?>" alt="" aria-hidden="true">
 <div class="wrap hero-grid">
  <div>
   <div class="eyebrow">Independent game studio · <?php echo esc_html(paiband_location()); ?></div>
   <h1>Games with a strong hook.</h1>
   <p>PaiBand Studio creates games we genuinely want to play: clear premises, tactile systems and strong visual identities. Our first release turns environmental restoration into a calm first-person journey. Our next game turns a spoon into a prisoner's most important tool.</p>
   <div class="buttons"><a class="btn primary" href="<?php echo esc_url(home_url('/games/')); ?>">Explore our games →</a><a class="btn ghost" href="<?php echo esc_url(home_url('/about/')); ?>">About PaiBand</a></div>
   <div class="hero-mini">
    <div><strong>2 public titles</strong><span>Released + in development</span></div>
    <div><strong>Independent</strong><span>Small multidisciplinary team</span></div>
    <div><strong>Different worlds</strong><span>One studio philosophy</span></div>
   </div>
  </div>
  <div class="hero-art">
   <div class="poster a"><img src="<?php echo paiband_asset('restore-keyart.jpg'); ?>" alt="Restore Your Island key art"><span class="poster-badge">Restore Your Island · Available now</span></div>
   <div class="poster b"><img src="<?php echo paiband_asset('escape-keyart.jpg'); ?>" alt="Mouse Chef: Dig Out key art"><span class="poster-badge">Mouse Chef: Dig Out · 2027</span></div>
   <div class="hero-studio-seal"><img src="<?php echo paiband_asset('paiband-studio-logo.png'); ?>" alt="PaiBand Studio logo"></div>
  </div>
 </div>
</section>

<section class="paper" id="games">
 <div class="wrap">
  <div class="section-head"><div><div class="eyebrow">Our games</div><h2>Two worlds.<br>Two very different ideas.</h2></div><p>Our projects are allowed to look and feel completely different. What connects them is a memorable premise and gameplay built around satisfying, understandable actions.</p></div>
  <div class="games-grid">
   <a class="game-card" href="<?php echo esc_url(home_url('/games/restore-your-island/')); ?>"><div class="media"><img src="<?php echo paiband_asset('restore-keyart.jpg'); ?>" alt="Restore Your Island"></div><div class="game-card-copy"><span class="pill">Available now</span><h3>Restore Your Island</h3><p>A cozy first-person restoration adventure where you clean a polluted island, revive nature, help wildlife return and build a peaceful sanctuary with your loyal dog.</p><div class="tagrow"><span class="tag">Cozy</span><span class="tag">Cleanup</span><span class="tag">Life Sim</span><span class="tag">Relaxing Adventure</span></div></div></a>
   <a class="game-card" href="<?php echo esc_url(paiband_mouse_chef_url()); ?>"><div class="media"><img src="<?php echo paiband_asset('escape-keyart.jpg'); ?>" alt="Mouse Chef: Dig Out"></div><div class="game-card-copy"><span class="pill">Coming 2027</span><h3>Mouse Chef: Dig Out</h3><p>A first-person adventure blending survival, exploration and dark comedy inside a 1930s rubber-hose prison where you cook by day and dig toward freedom by night.</p><div class="tagrow"><span class="tag">First-person</span><span class="tag">Adventure</span><span class="tag">Exploration</span><span class="tag">Dark Comedy</span></div></div></a>
  </div>
 </div>
</section>

<section class="studio-showreel">
 <div class="wrap">
  <div class="section-head"><div><div class="eyebrow">From our games</div><h2>Real worlds.<br>Real gameplay.</h2></div><p>The site stays anchored in current press-kit imagery instead of generic studio decoration.</p></div>
  <div class="mosaic">
   <figure><img src="<?php echo paiband_asset('restore-03.jpg'); ?>" alt="Restore Your Island gameplay"><span class="caption">Restore Your Island</span></figure>
   <figure><img src="<?php echo paiband_asset('escape-02.jpg'); ?>" alt="Mouse Chef: Dig Out gameplay"><span class="caption">Mouse Chef: Dig Out</span></figure>
   <figure><img src="<?php echo paiband_asset('restore-02.jpg'); ?>" alt="Restore Your Island gameplay"><span class="caption">Restore Your Island</span></figure>
   <figure><img src="<?php echo paiband_asset('escape-04.jpg'); ?>" alt="Mouse Chef: Dig Out gameplay"><span class="caption">Mouse Chef: Dig Out</span></figure>
   <figure><img src="<?php echo paiband_asset('restore-04.jpg'); ?>" alt="Restore Your Island gameplay"><span class="caption">Restore Your Island</span></figure>
  </div>
 </div>
</section>

<section class="paper">
 <div class="wrap split studio-profile">
  <div class="studio-logo-panel"><img src="<?php echo paiband_asset('paiband-studio-logo.png'); ?>" alt="PaiBand Studio logo"></div>
  <div class="copy"><div class="eyebrow">PaiBand Studio</div><h2>Small team.<br>Different worlds.</h2><p>After the release of Restore Your Island, the studio is pushing into a very different direction with Mouse Chef: Dig Out while keeping the same focus on understandable gameplay, tactile interactions and a distinct visual identity for every project.</p><div class="buttons"><a class="btn dark" href="<?php echo esc_url(home_url('/about/')); ?>">About the studio →</a><a class="btn" style="border-color:rgba(0,0,0,.15)" href="<?php echo esc_url(home_url('/team/')); ?>">Meet the team</a></div></div>
 </div>
</section>

<section>
 <div class="wrap">
  <div class="section-head"><div><div class="eyebrow">Studio updates</div><h2>What we're working on.</h2></div><a class="btn ghost" href="<?php echo esc_url(home_url('/news/')); ?>">All news →</a></div>
  <div class="update-grid">
   <article class="update"><time>9 April 2026</time><h3>Restore Your Island released.</h3><p>Our cozy restoration adventure became PaiBand Studio's first released project.</p><a href="<?php echo esc_url(home_url('/games/restore-your-island/')); ?>">Explore the game →</a></article>
   <article class="update"><time>2027</time><h3>Mouse Chef: Dig Out comes next.</h3><p>The next PaiBand title combines tunneling, chaotic cooking, survival and dark cartoon comedy.</p><a href="<?php echo esc_url(paiband_mouse_chef_url()); ?>">See Mouse Chef: Dig Out →</a></article>
   <article class="update"><time>Press & creators</time><h3>Updated press resources.</h3><p>Both games now link directly to their current official Drive press-kit folders.</p><a href="<?php echo esc_url(home_url('/press/')); ?>">Open press resources →</a></article>
  </div>
 </div>
</section>

<section class="studio-cta">
 <div class="wrap callout"><div><h2>Press, creators, players or partners?</h2><p>Game pages, press kits, support and studio contact are all one click away.</p></div><div class="buttons"><a class="btn dark" href="<?php echo esc_url(home_url('/press/')); ?>">Press resources</a><a class="btn" style="border-color:rgba(0,0,0,.18)" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact PaiBand</a></div></div>
</section>
</main>
<?php get_footer(); ?>