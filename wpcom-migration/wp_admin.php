<?php

if (!defined('ABSPATH')) exit;
if (!class_exists('WPCOMWPAdmin')) :
class WPCOMWPAdmin {
	public $settings;
	public $siteinfo;
	public $bvinfo;
	public $bvapi;

	function __construct($settings, $siteinfo, $bvapi = null) {
		$this->settings = $settings;
		$this->siteinfo = $siteinfo;
		$this->bvapi = $bvapi;
		$this->bvinfo = new WPCOMInfo($this->settings);
	}

	public function mainUrl($_params = '') {
		if (function_exists('network_admin_url')) {
			return network_admin_url('admin.php?page='.$this->bvinfo->plugname.$_params);
		} else {
			return admin_url('admin.php?page='.$this->bvinfo->plugname.$_params);
		}
	}

	function removeAdminNotices() {
		if (array_key_exists('page', $_REQUEST) && $_REQUEST['page'] == $this->bvinfo->plugname) {
			remove_all_actions('admin_notices');
			remove_all_actions('all_admin_notices');
		}
	}

	public function initHandler() {
		if (!current_user_can('activate_plugins'))
			return;

		if ($this->bvinfo->isActivateRedirectSet()) {
			$this->settings->updateOption($this->bvinfo->plug_redirect, 'no');
			if (!wp_doing_ajax()) {
				wp_redirect($this->mainUrl());
			}
		}
	}

	public function menu() {
		$brand = $this->bvinfo->getBrandInfo();
		if (!is_array($brand) || (!array_key_exists('hide', $brand) && !array_key_exists('hide_from_menu', $brand))) {
			$bname = $this->bvinfo->getBrandName();
			add_menu_page($bname, $bname, 'manage_options', $this->bvinfo->plugname,
					array($this, 'adminPage'), 'dashicons-wordpress');
		}
	}

	public function hidePluginDetails($plugin_metas, $slug) {
		$brand = $this->bvinfo->getBrandInfo();
		$bvslug = $this->bvinfo->slug;

		if ($slug === $bvslug && is_array($brand) && array_key_exists('hide_plugin_details', $brand)) {
			foreach ($plugin_metas as $pluginKey => $pluginValue) {
				if (strpos($pluginValue, sprintf('>%s<', translate('View details')))) {
					unset($plugin_metas[$pluginKey]);
					break;
				}
			}
		}
		return $plugin_metas;
	}

	public function settingsLink($links, $file) {
		if ( $file == plugin_basename( dirname(__FILE__).'/wpcom_migration.php' ) ) {
			$links[] = '<a href="'.$this->mainUrl().'">'.__( 'Settings' ).'</a>';
		}
		return $links;
	}

	public function wpcomsecAdminMenu($hook) {
		if ($hook === 'toplevel_page_automattic') {
			wp_enqueue_style('wpcom-variables', plugins_url('assets/css/variables.css', __FILE__));
			wp_enqueue_style('wpcom-styles', plugins_url('assets/css/style.css', __FILE__));
			wp_enqueue_style('wpcom-fonts', plugins_url('assets/css/fonts.css', __FILE__));
			wp_enqueue_script('wpcom-app', plugins_url('assets/js/app.js', __FILE__), array(), false, true);
		}
	}

	public function getPluginLogo() {
		$brand = $this->bvinfo->getBrandInfo();
		if ($brand && array_key_exists('logo', $brand)) {
			return $brand['logo'];
		}
		return $this->bvinfo->logo;
	}

	public function getWebPage() {
		$brand = $this->bvinfo->getBrandInfo();
		if ($brand && array_key_exists('webpage', $brand)) {
			return $brand['webpage'];
		}
		return $this->bvinfo->webpage;
	}

	public function siteInfoTags() {
		require_once dirname( __FILE__ ) . '/recover.php';
		$secret = WPCOMRecover::defaultSecret($this->settings);
		$public = WPCOMAccount::getApiPublicKey($this->settings);
		$tags = "<input type='hidden' name='url' value='".esc_attr($this->siteinfo->wpurl())."'/>\n".
				"<input type='hidden' name='homeurl' value='".esc_attr($this->siteinfo->homeurl())."'/>\n".
				"<input type='hidden' name='siteurl' value='".esc_attr($this->siteinfo->siteurl())."'/>\n".
				"<input type='hidden' name='dbsig' value='".esc_attr($this->siteinfo->dbsig(false))."'/>\n".
				"<input type='hidden' name='plug' value='".esc_attr($this->bvinfo->plugname)."'/>\n".
				"<input type='hidden' name='adminurl' value='".esc_attr($this->mainUrl())."'/>\n".
				"<input type='hidden' name='bvversion' value='".esc_attr($this->bvinfo->version)."'/>\n".
				"<input type='hidden' name='serverip' value='".esc_attr($_SERVER["SERVER_ADDR"])."'/>\n".
				"<input type='hidden' name='abspath' value='".esc_attr(ABSPATH)."'/>\n".
				"<input type='hidden' name='secret' value='".esc_attr($secret)."'/>\n".
				"<input type='hidden' name='public' value='".esc_attr($public)."'/>\n";
		return $tags;
	}

	public function activateWarning() {
		global $hook_suffix;
		if (!WPCOMAccount::isConfigured($this->settings) && $hook_suffix == 'index.php' ) {
?>
			<div id="message" class="updated" style="padding: 8px; font-size: 16px; background-color: #dff0d8">
						<a class="button-primary" href="<?php echo esc_url($this->mainUrl()); ?>">Activate DreamHost Automated Migration</a>
						&nbsp;&nbsp;&nbsp;<b>Almost Done:</b> Activate your DreamHost account to migrate your site.
			</div>
<?php
		}
	}

	public function adminPage() {
		require_once dirname( __FILE__ ) . '/admin/main_page.php';
	}

	public function initWhitelabel($plugins) {
		$slug = $this->bvinfo->slug;

		if (!is_array($plugins) || !isset($slug, $plugins)) {
			return $plugins;
		}

		$brand = $this->bvinfo->getBrandInfo();
		if (is_array($brand)) {
			if (array_key_exists('hide', $brand)) {
				unset($plugins[$slug]);
			} else {
				if (array_key_exists('name', $brand)) {
					$plugins[$slug]['Name'] = $brand['name'];
				}
				if (array_key_exists('title', $brand)) {
					$plugins[$slug]['Title'] = $brand['title'];
				}
				if (array_key_exists('description', $brand)) {
					$plugins[$slug]['Description'] = $brand['description'];
				}
				if (array_key_exists('authoruri', $brand)) {
					$plugins[$slug]['AuthorURI'] = $brand['authoruri'];
				}
				if (array_key_exists('author', $brand)) {
					$plugins[$slug]['Author'] = $brand['author'];
				}
				if (array_key_exists('authorname', $brand)) {
					$plugins[$slug]['AuthorName'] = $brand['authorname'];
				}
				if (array_key_exists('pluginuri', $brand)) {
					$plugins[$slug]['PluginURI'] = $brand['pluginuri'];
				}
			}
		}
		return $plugins;
	}
}
endif;