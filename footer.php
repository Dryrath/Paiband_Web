<footer class="footer">
 <div class="wrap">
  <div class="footer-grid">
   <div>
    <a class="footer-logo-lockup" href="<?php echo esc_url(home_url('/')); ?>">
      <img src="<?php echo paiband_asset('paiband-studio-logo.png'); ?>" alt="PaiBand Studio">
    </a>
    <p>Independent games built around memorable ideas, satisfying interactions and strong visual identities.</p>
    <p><?php echo esc_html(paiband_location()); ?><br><a href="mailto:<?php echo antispambot(paiband_email()); ?>"><?php echo antispambot(paiband_email()); ?></a></p>
   </div>
   <div><h4>Studio</h4><a href="<?php echo esc_url(home_url('/about/')); ?>">About</a><a href="<?php echo esc_url(home_url('/team/')); ?>">Team</a><a href="<?php echo esc_url(home_url('/news/')); ?>">News</a><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></div>
   <div><h4>Games</h4><a href="<?php echo esc_url(home_url('/games/restore-your-island/')); ?>">Restore Your Island</a><a href="<?php echo esc_url(home_url('/games/escape-by-spoon/')); ?>">Escape By Spoon</a><a href="<?php echo esc_url(home_url('/games/')); ?>">All games</a><a href="<?php echo esc_url(home_url('/press/')); ?>">Press kits</a></div>
   <div><h4>Help & Legal</h4><a href="<?php echo esc_url(home_url('/support/')); ?>">Support</a><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a><a href="<?php echo esc_url(home_url('/terms-of-use/')); ?>">Terms of Use</a><a href="<?php echo esc_url(home_url('/cookie-policy/')); ?>">Cookie Policy</a><a href="<?php echo esc_url(home_url('/sitemap/')); ?>">Sitemap</a></div>
  </div>

  <?php $social_links = paiband_social_links(); ?>
  <?php if(!empty($social_links)): ?>
   <div class="footer-social-row">
    <span class="footer-social-label">Follow PaiBand</span>
    <div class="footer-social-links">
     <?php foreach($social_links as $social): ?>
      <a
       class="footer-social-icon footer-social-<?php echo esc_attr($social['key']); ?>"
       href="<?php echo esc_url($social['url']); ?>"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="<?php echo esc_attr($social['label']); ?>"
       title="<?php echo esc_attr($social['label']); ?>"
      >
       <?php echo paiband_social_icon($social['key']); ?>
       <span class="screen-reader-text"><?php echo esc_html($social['label']); ?></span>
      </a>
     <?php endforeach; ?>
    </div>
   </div>
  <?php endif; ?>

  <div class="legal-row"><span>© <?php echo date('Y'); ?> PaiBand Studio. All rights reserved.</span><span>Independent game studio.</span></div>
 </div>
</footer>
<?php wp_footer(); ?>
</body></html>