<header class="header-container">
	<img class="wpcom-logo" src="<?php echo esc_url(plugins_url("/../assets/img/wordpress.com.png", __FILE__)); ?>">
	<img class="blogvault-logo" src="<?php echo esc_url(plugins_url("/../assets/img/blogvault-logo.png", __FILE__)); ?>">
</header>
<main class="text-center">
	<div class="card">
		<form action="<?php echo esc_url($this->bvinfo->appUrl()); ?>/migration/migrate" method="post" name="signup">
			<h1 class="card-title">Migrate your site to WordPress.com</h1>
			<p>The WordPress.com automated migration plugin makes it easy to move your sites to the WordPress.com platform.
				 It doesn't matter if you're a qualified developer or someone teaching yourself for the first time,
				 this plugin does all the hard work for you. Move as many sites as you need quickly, and with minimal interaction with support.
			</p>
			<hr class="my-4">
			<div class="form-content">
				<label class="email-label" required>Email</label>
				<br>
				<input type="email" name="email" placeholder="Email address" class="email-input">
				<div class="tnc-check text-center mt-2">
					<label class="normal-text horizontal">
						<input type="hidden" name="bvsrc" value="wpplugin" />
						<input type="hidden" name="migrate" value="automattic" />
						<input type="checkbox" name="consent" onchange="document.getElementById('migratesubmit').disabled = !this.checked;" value="1">
						<span class="checkmark"></span>&nbsp;
						I agree to BlogVault's <a href="https://blogvault.net/tos/">Terms &amp; Conditions</a> and <a href="https://blogvault.net/privacy/">Privacy&nbsp;Policy</a>
					</label>
				</div>
			</div>
			<?php echo $this->siteInfoTags(); ?>
			<input type="submit" name="submit" id="migratesubmit" class="button button-primary" value="Migrate" disabled>
		</form>
	</div>

	<div class="card migration-key-card">
		<h2>
			<span>Migration Key</span>
			<span id="migration-key-content-dropdown" class="mdil mdil-chevron-down"></span>
		</h2>
		<div id="migration-key-content">
			<div>
				Install WordPress.com migration plugin on the destination and use the key.
			</div><br/>
			<div style="display: flex; gap: 8px; align-items: center;">
				<input type="password" id="destination-migration-key" name="destination_migration_key" value="<?php echo esc_attr( $this->bvinfo->getConnectionKey() ); ?>" class="widefat" style="flex: 1;" readonly>
				<button type="button" id="view-key" class="button">View Key</button>
				<button type="button" id="copy-key" class="button" onclick="copyToClipboard()">Copy Key</button>
			</div>
		</div>
	</div>

	<script>
		function copyToClipboard() {
			var copyText = document.getElementById("destination-migration-key");
			copyText.type = 'text';

			copyText.select();
			document.execCommand("copy");
			copyText.type = 'password'; // Revert back to password type
			var copyButton = document.getElementById("copy-key");
			copyButton.textContent = 'Copied!';
			document.getElementById('view-key').textContent = 'View Key'; // Update the text of the "View Key" button
			var copyButton = document.getElementById("copy-key");
			copyButton.textContent = 'Copied!';
			setTimeout(() => copyButton.textContent = 'Copy Key', 2000);
		}
		document.getElementById('view-key').addEventListener('click', function() {
			var keyField = document.getElementById("destination-migration-key");
			if (keyField.type === "password") {
				keyField.type = "text";
				this.textContent = 'Hide Key';
			} else {
				keyField.type = "password";
				this.textContent = 'View Key';
			}
		});
		document.getElementById('migration-key-content-dropdown').addEventListener('click', function() {
			var migrationKeyContent = document.getElementById("migration-key-content");
			var migrationKeyContentDropdown = document.getElementById("migration-key-content-dropdown");
			if (migrationKeyContent.style.display == 'block') {
				migrationKeyContent.style.display = 'none';
				migrationKeyContentDropdown.className = 'mdil mdil-chevron-down'
			} else {
				migrationKeyContent.style.display = 'block';
				migrationKeyContentDropdown.className = 'mdil mdil-chevron-up'
			}
		});
	</script>
</main>