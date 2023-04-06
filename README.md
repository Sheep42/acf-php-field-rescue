### ACF PHP Field Rescue

Need to sync ACF fields from a php export, and don't have access to the original field definitions? This plugin will package them up into a json import for you.

Install and activate the plugin - If you have any fields created by acf_add_local_field_group, they will automatically be exported into wp-content/uploads/acf.json

Go to ACF > Tools > Import, and import acf.json to get all of your fields back.

This plugin runs on `admin_init` and will update acf.json in real time. It is recommended that you disable and remove the plugin once you have generated the json output.

---

#### Change output path

You can change the output directory by adding the following to your functions.php before activating the plugin

```php
function my_theme_acf_path( $relative_path ) {
	return '/wp-content/themes/my-theme/fields.json';
}
add_filter( 'acf_field_sync_output', 'my_theme_acf_path' );
```