<?php
$locale = $_GET['LC'] ?? get_user_locale();
$locale = ( isset( $_GET['LC'] ) && empty( $locale ) ) ? 'en_US' : $locale;
?>
<div class="wrap wpse-393178-de">
	<h1><?php echo $this->page_title; ?></h1>

	<div class="wpse-393178-tmp hide-if-js">
		<p>
			<button type="button" class="button"><?php _e( 'AJAX-Text laden', 'wpse-393178-de' ); ?></button>
			<?php _e( '(klicken Sie hier, wenn Sie überprüfen möchten, ob die Lokalisierung dieses Plugins während einer AJAX-Anfrage richtig funktioniert)', 'wpse-393178-de' ); ?>
		</p>
	</div>

	<div class="notice notice-info is-dismissible">
		<p>
			<b>Note:</b>
			The current locale will only be switched if you selected a locale from the dropdown below and that the selected locale is different than the value of <code>determine_locale()</code>.
			<i>** this text was intentionally not localized</i> (i.e. it's always in English)
		</p>
	</div>

	<h2><?php
		/* translators: %s: Locale like en_US */
		printf( __( 'Aktuelles Gebietsschema ist <i>%s</i>', 'wpse-393178-de' ), get_locale() );
	?></h2>

	<?php $this->var_dump_output(); ?>

	<form action="tools.php">
		<input type="hidden" name="page" value="<?php echo esc_attr( $this->menu_slug ); ?>" />

		<label>
			<?php _e( 'Zum Gebietsschema wechseln:', 'wpse-393178-de' ); ?>

			<?php wp_dropdown_languages( [
				'selected'                    => $locale,
				'languages'                   => get_available_languages(),
				'show_available_translations' => false,
				'name'                        => 'LC',
			] ); ?>
		</label>

		<?php submit_button( __( 'einreichen', 'wpse-393178-de' ), 'primary', 'switch', false ); ?>
	</form>

	<?php
		if ( $locale !== determine_locale() && switch_to_locale( $locale ) ) :
			wpse_393178_en_load_textdomain();
	?>
		<hr />

		<?php if ( 'de_' !== strtolower( substr( $locale, 0, 3 ) ) ) : ?>
			<p>(<i>** this text was intentionally not localized</i>) <b>Note:</b> If above you selected a language <b>other than German</b> (<code>de_DE</code>, <code>de_CH</code>, etc.) and yet below you see the text in German or the original text in this plugin, then it's probably because this plugin hasn't yet been translated to the selected language/locale (which is <code><?php echo esc_html( $locale ); ?></code>).</p>
		<?php endif; ?>

		<h2><?php
			/* translators: %s: Locale like en_US */
			printf( __( 'Gebietsschema auf <i>%s</i> umgestellt', 'wpse-393178-de' ), $locale );
		?></h2>

		<?php
			$this->var_dump_output();

			$locale2 = restore_previous_locale();
			wpse_393178_en_load_textdomain();
		?>

		<hr />

		<p>(<i>** this text was intentionally not localized</i>) <b>Note:</b> Now below you should see the text back in the previous locale (<code><?php echo esc_html( $locale2 ); ?></code>).</p>

		<h2><?php
			/* translators: %s: Locale like en_US */
			printf( __( 'Gebietsschema auf <i>%s</i> wiederhergestellt', 'wpse-393178-de' ), get_locale() );
		?></h2>

		<?php $this->var_dump_output(); ?>
	<?php endif; ?>
</div>
