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
		<h1>Start your migration</h1>
		<p>Let's get started. Just drop your migration key below, customize your options in Advanced Settings, and you're all set.</p>

		<form class="wpcom-migration-form">
			<div class="wpcom-migration-section">
				<div class="wpcom-migration-input-group">
					<label for="wpcom-migration-key">Migration Key</label>
					<input type="text" placeholder="Enter your migration key" id="wpcom-migration-key" required>
					<div class="wpcom-migration-input-info">
						Need a migration key? <a href="" target="_blank">Get it on WordPress.com</a>
					</div>
				</div>
			</div>

			<div class="wpcom-migration-section wpcom-migration-foldable">
				<div class="wpcom-migration-foldable__header">
					<div class="wpcom-migration-foldable__header-content">
						<div class="wpcom-migration-foldable__title">Advanced options</div>
						<div class="wpcom-migration-foldable__description">Add additional credentials or customize your migration.</div>
					</div>
				</div>

				<div class="wpcom-migration-foldable__body">
					<div class="wpcom-migration-section">
						<div class="wpcom-migration-section__title">Source site credentials</div>
						<div class="wpcom-migration-section__description">Provide the following credentials if this site is password protected.</div>
						<div class="wpcom-migration-section__inner">
							<div class="wpcom-migration-input-group">
								<label for="wpcom-migration-username">Username</label>
								<input type="text" placeholder="Enter your username" id="wpcom-migration-username">
							</div>

							<div class="wpcom-migration-input-group">
								<label for="wpcom-migration-password">Password</label>
								<input type="text" placeholder="Enter your password" id="wpcom-migration-password">
							</div>
						</div>
					</div>

					<div class="wpcom-migration-section">
						<div class="wpcom-migration-section__title">Customize migration</div>
						<div class="wpcom-migration-section__description">Pick the tables and folders you would like to migrate.</div>

						<div class="wpcom-migration-section__title">Folders</div>
						<div class="wpcom-migration-section__inner">
							<div class="wpcom-migration-input-group wpcom-migration-input-group--checkbox">
								<span class="checkmark"></span>&nbsp;
								<label>
									<input type="checkbox" checked disabled> ./wp-admin/
								</label>
								<label>
									<input type="checkbox" checked disabled> ./wp-content/
								</label>
								<label>
									<input type="checkbox" checked disabled> ./wp-includes/
								</label>
								<label>
									<input type="checkbox"> ./.private/
								</label>
							</div>
						</div>

						<div class="wpcom-migration-section__title">Database tables</div>
						<div class="wpcom-migration-section__inner">
							<div class="wpcom-migration-input-group wpcom-migration-input-group--checkbox">
								<label>
									<input class="wpcom-migration-select-all" type="checkbox"> Select All
								</label>
								<label>
									<input type="checkbox"> wp_bv_activities_store
								</label>
								<label>
									<input type="checkbox" checked> wp_commentmeta
								</label>
								<label>
									<input type="checkbox" checked> wp_comments
								</label>
								<label>
									<input type="checkbox" checked> wp_jetpack_sync_queue
								</label>
								<label>
									<input type="checkbox" checked> wp_links
								</label>
								<label>
									<input type="checkbox" checked> wp_posts
								</label>
								<label>
									<input type="checkbox" checked> wp_postmeta
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="wpcom-migration-section">
				<button type="submit">Start migration</button>
			</div>
		</form>
	</main>

	<aside class="wpcom-migration-sidebar">
		<div class="wpcom-migration-sidebar__inner">
			<h3>What our customers are saying</h3>
			<p>
				“After migrating to WordPress.com our site is faster, easier to use, more secure, and technical support is nearly instant.”
				<br>
				– Michael P.
			</p>

			<div class="wpcom-migration-testimonial">
				<div class="wpcom-migration-testimonial__text">Loved by our customers</div>
				<img class="wpcom-migration-testimonial__image" src="<?php echo esc_url( plugins_url('../static/assets/images/testimonial.png', __FILE__ ) ); ?>" alt="testimonial" />
			</div>
		</div>

		<p>Having trouble? <a href="" target="_blank">Let us take over</a></p>
	</aside>
</div>
