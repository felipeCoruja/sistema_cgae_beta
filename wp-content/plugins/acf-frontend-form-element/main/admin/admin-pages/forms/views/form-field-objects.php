<?php
	global $fea_instance;
?>
<div class="acf-field-list-wrap">
	
	<ul class="acf-hl acf-thead">
		<li class="li-field-order"><?php _e( 'Order', 'acf' ); ?></li>
		<li class="li-field-label"><?php _e( 'Label', 'acf' ); ?></li>
		<li class="li-field-name"><?php _e( 'Name', 'acf' ); ?></li>
		<li class="li-field-key"><?php _e( 'Key', 'acf' ); ?></li>
		<li class="li-field-type"><?php _e( 'Type', 'acf' ); ?></li>
	</ul>
	
	<div class="acf-field-list
	<?php
	if ( ! $fields ) {
		echo ' -empty'; }
	?>
	">
		
		<div class="no-fields-message">
			<?php _e( 'No fields. Click the <strong>+ Add Field</strong> button to create your first field.', 'acf' ); ?>
		</div>
		
		<?php
		if ( $fields ) :
			$step = 0;
			foreach ( $fields as $i => $field ) :
				if( $field['type'] == 'form_step' ){
					$step++;
				}
				if( $field['type'] == 'repeater' ){
					$field['type'] = 'list_items';
				}
				if( $field['type'] == 'flexible_content' ){
					$field['type'] = 'frontend_blocks';
				}
				$fea_instance->form_builder->get_view('form-field-object',
					array(
						'field' => $field,
						'i'     => $i,
						'parent' => $parent,
					)
				);

			endforeach;

		endif;
		?>
		
	</div>

	<?php
if ( ! $parent ) :
	$clone_args = array(
		'ID'    => 'acfcloneindex',
		'key'   => 'acfcloneindex',
		'label' => '',
		'name'  => '',
		'type'  => 'text',
	);
	$types = array(
		'field' => __( 'Field', FEA_NS ),
		'step' => __( 'Step', FEA_NS ),
		'acf' => 'ACF',
	);
	// get clone
	$field = acf_get_valid_field( $clone_args );
	?>
	<script type="text/html" id="tmpl-new-field">
	<?php
		$fea_instance->form_builder->get_view('form-field-object',
			array(
				'field' => $field,
				'i'     => 0,
				'parent' => $parent,
			)
		);
	?>
	</script>
	<script type="text-html" id="tmpl-field-popup"><ul>
			<?php
			foreach ( $types as $type => $label ) :

					$atts = array(
						'href'        => '#',
						'data-type' => $type,
					);

					?>
			<li><a <?php acf_esc_attr_e( $atts ); ?>><?php echo acf_esc_html( $label ); ?></a></li>
				<?php

		endforeach;
			?>
	</ul>
	</script>
<?php endif; ?>
	
	<ul class="acf-hl acf-tfoot">
		<li class="acf-fr">
			<a href="#" data-type="field" class="button button-primary button-large add-field"><?php _e( '+ Add Item', FEA_NS ); ?></a>
		</li>
	</ul>
	
</div>
