<header class="wpcom-migration-header">
	<div class="wpcom-migration-header__wpcom-logo">
		<span class="dashicons dashicons-wordpress-alt"></span>
	</div>

	<div class="wpcom-migration-header__blogvault-logo">
		Powered by <img src="<?php echo esc_url( plugins_url('../assets/img/blogvault-logo.png', __FILE__ ) ); ?>" alt="blogvault-logo">
	</div>
</header>

<main class="wpcom-migration-content-full-width">
	<div class="wpcom-migration-content-header">
		<div class="wpcom-migration-content-header__blogvault_logo">
			<img src="<?php echo esc_url( plugins_url('../static/assets/images/blogvault-logo-large.png', __FILE__ ) ); ?>" alt="blogvault-logo">
		</div>
		<p class="wpcom-migration-content-header-site">We're migrating <strong>websitewithareallylongurl.com</strong> to WordPress.com</p>
	</div>
	<div class="wpcom-migration-container-full-width">
		<p>Your site could take up to 30 minutes to migrate. Watch the progress or take a break — we'll reach out to you at <strong>email@address.com</strong> when it's done!</p>	
		<div class="wpcom-migration-progress">
			<div class="wpcom-migration-progress-row">
				<div class="wpcom-migration-progress-section">
					<div>
						<p class="wpcom-migration-progress-header">50.5 / 250.5 MB synced</p>
					</div>
					<div>
						<div class="wpcom-migration-progress-bar">
							<div role="progressbar" class="wpcom-migration-progress-bar-progress" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
						</div>
					</div>
				</div>
				<div class="wpcom-migration-progress-section">
					<div>
						<p class="wpcom-migration-progress-header">5/15 tables</p>
					</div>
					<div>
						<div class="wpcom-migration-progress-bar">
							<div role="progressbar" class="wpcom-migration-progress-bar-progress" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="wpcom-migration-progress-section">
				<div>
					<p class="wpcom-migration-progress-header">Migrating site (77%)</p>
				</div>
				<div>
					<div class="wpcom-migration-progress-bar">
						<div role="progressbar" class="wpcom-migration-progress-bar-progress" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="wpcom-migration-form">
			<button class="secondary cancel-migration">
				Cancel migration
			</button>
		</div>
	</div>
</main>

<div class="wpcom-migration-modal-container">
	<div class="wpcom-migration-modal">
		<div class="wpcom-migration-modal-content">
			<h1>Cancel migration</h1>
			<p>If you cancel now, your site won't be migrated to WordPress.com. Are you sure you want to cancel?</p>
		</div>
		<div class="wpcom-migration-modal-buttons wpcom-migration-form">
			<button class="secondary">No, continue migrating</button>
			<button>Yes, cancel the migration</button>
		</div>
	</div>
</div>