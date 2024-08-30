<header class="wpcom-migration-header">
  <div class="wpcom-migration-header__wpcom-logo">
    <span class="dashicons dashicons-wordpress-alt"></span>
  </div>

  <div class="wpcom-migration-header__blogvault-logo">
    Powered by <img src="<?php echo esc_url( plugins_url('../assets/img/blogvault-logo.png', __FILE__ ) ); ?>" alt="blogvault-logo">
  </div>
</header>

<div class="wpcom-migration-container">
  <main class="wpcom-migration-content">
    <h1>Migrate your site to WordPress.com</h1>
    <p>Get ready for better speed, security, and support. Just drop your email below to get started and we'll keep you updated throughout the migration process.</p>

    <form class="wpcom-migration-form" action="<?php echo esc_url($this->bvinfo->appUrl()); ?>/migration/migrate" method="post" name="signup">
      <div class="wpcom-migration-section">
        <div class="wpcom-migration-input-group">
          <label for="wpcom-migration-email">Email address</label>
          <input type="email" placeholder="Enter your email address for updates" id="wpcom-migration-email" name="email" required>
        </div>

        <div class="wpcom-migration-input-group wpcom-migration-input-group--checkbox">
          <label>
            <input type="checkbox" id="wpcom-migration-terms" name="consent" required onchange="document.getElementById('migratesubmit').disabled = !this.checked;" value="1">
            <span class="checkmark"></span>
            I agree to BlogVault's&nbsp;
            <a href="https://blogvault.net/tos/">Terms & Conditions</a>
            &nbsp;and&nbsp;
            <a href="https://blogvault.net/privacy/">Privacy Policy</a>
          </label>
        </div>
      </div>

      <div class="wpcom-migration-section">
        <input type="hidden" name="bvsrc" value="wpplugin" />
        <input type="hidden" name="migrate" value="automattic" />
        <?php echo $this->siteInfoTags(); ?>
        <button type="submit" id="migratesubmit" disabled>Continue</button>
      </div>
    </form>
  </main>

  <aside class="wpcom-migration-sidebar">
    <div class="wpcom-migration-sidebar__inner">
      <h3>Let us migrate your site for free</h3>
      <p>Sit back and our experts will migrate your site for you. You'll get 50% off your first year, and you'll be up and running in no more than 2 business days.</p>

      <div class="wpcom-migration-cta">
        <a class="wpcom-migration-cta-link" href="https://wordpress.com/move/" target="_blank">
          Get your Free migration
        </a>
        <span class="dashicons dashicons-external"></span>
      </div>

      <div class="wpcom-migration-testimonial">
        <div class="wpcom-migration-testimonial__text">Loved by our customers</div>
        <img class="wpcom-migration-testimonial__image" src="<?php echo esc_url( plugins_url('../assets/img/testimonial.png', __FILE__ ) ); ?>" alt="testimonial" />
      </div>
    </div>
  </aside>
</div>