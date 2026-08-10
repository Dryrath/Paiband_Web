<?php /* Template Name: Team */ get_header();

/*
 * TEAM EDITING
 * ------------
 * The order below is also the order shown on the website.
 *
 * To add someone:
 * 1. Add a new array entry.
 * 2. Add their JPG to /assets/.
 * 3. Use a unique team-XX-name.jpg filename.
 *
 * Each item supports:
 * - name
 * - role
 * - photo
 * - initials (fallback if the photo file is missing)
 */
$paiband_team = [
 [
  'name' => 'Arash Negahban',
  'role' => 'Creative Director and CEO',
  'photo' => 'team-01-arash-negahban.jpg',
  'initials' => 'AN',
 ],
 [
  'name' => 'Mohammadreza Aboutalebi',
  'role' => 'Technical Director and CTO',
  'photo' => 'team-02-mohammadreza-aboutalebi.jpg',
  'initials' => 'MA',
 ],
 [
  'name' => 'Mojataba Zamani',
  'role' => 'Art Director',
  'photo' => 'team-03-mojataba-zamani.jpg',
  'initials' => 'MZ',
 ],
 [
  'name' => 'Saeed Abbasi',
  'role' => 'Senior Programmer',
  'photo' => 'team-04-saeed-abbasi.jpg',
  'initials' => 'SA',
 ],
 [
  'name' => 'Saeed Namdari',
  'role' => 'Senior Programmer',
  'photo' => 'team-05-saeed-namdari.jpg',
  'initials' => 'SN',
 ],
 [
  'name' => 'Siavash Negahban',
  'role' => 'Composer and Sound Designer',
  'photo' => 'team-06-siavash-negahban.jpg',
  'initials' => 'SN',
 ],
 [
  'name' => 'Erfan Jamali',
  'role' => 'Marketing Manager',
  'photo' => 'team-07-erfan-jamali.jpg',
  'initials' => 'EJ',
 ],
 [
  'name' => 'Mojtaba Ataeifar',
  'role' => '3D Artist',
  'photo' => 'team-08-mojtaba-ataeifar.jpg',
  'initials' => 'MA',
 ],
 [
  'name' => 'Mohammad Nikandish',
  'role' => 'Animator',
  'photo' => 'team-09-mohammad-nikandish.jpg',
  'initials' => 'MN',
 ],
];
?>
<main class="site-main">
<section class="page-hero">
 <div class="wrap">
  <div class="eyebrow">Team</div>
  <h1>The people behind PaiBand.</h1>
  <p>A multidisciplinary indie team working across creative direction, engineering, programming, art, animation, audio and marketing.</p>
 </div>
</section>

<section class="paper team-section">
 <div class="wrap">
  <div class="section-head">
   <div>
    <div class="eyebrow">PaiBand Studio</div>
    <h2>Meet the team.</h2>
   </div>
   <p>Nine people building distinct game worlds together — from creative direction and technology to programming, art, animation, sound and communication.</p>
  </div>

  <div class="team-grid team-grid-members">
   <?php foreach($paiband_team as $member): ?>
    <article class="person team-person">
     <div class="team-portrait">
      <?php
       $photo_path = get_template_directory() . '/assets/' . $member['photo'];
       if(file_exists($photo_path)):
      ?>
       <img
        src="<?php echo paiband_asset($member['photo']); ?>"
        alt="<?php echo esc_attr($member['name']); ?>"
       >
      <?php else: ?>
       <div class="portrait team-photo-fallback"><?php echo esc_html($member['initials']); ?></div>
      <?php endif; ?>
     </div>
     <div class="person-copy">
      <h3><?php echo esc_html($member['name']); ?></h3>
      <p><?php echo esc_html($member['role']); ?></p>
     </div>
    </article>
   <?php endforeach; ?>
  </div>

  <div class="team-page-content">
   <?php while(have_posts()): the_post(); the_content(); endwhile; ?>
  </div>
 </div>
</section>

<section>
 <div class="wrap">
  <div class="callout">
   <div>
    <h2>Want to talk to PaiBand?</h2>
    <p>For press, creators, publishing, platforms, business enquiries or player support, use the studio contact page.</p>
   </div>
   <a class="btn dark" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact the studio →</a>
  </div>
 </div>
</section>
</main>
<?php get_footer(); ?>