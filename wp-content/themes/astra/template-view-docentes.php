<?php
/*
Template Name: Template View Docentes
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

        <!-- Bloco Personalizado -->
		<?php
						
            $result = $wpdb->get_results("SELECT * FROM disciplina");
        ?>

        <form action="">
			<div class='row'>
				
                <h2>Docentes</h2>
                <table>
                    <?php 
                        for($i = 0;$i<10;$i++){ ?>
                            <tr>
                                <td>Nome do Docente <?php echo $i+1?></td>
                                <td>Função</td>
                            </tr>
                    <?php }?>
                        
                </table>
            </div>

            <div class='row'>
                <div class='col-md-4'></div>
                <div class='col-md-4'>
                    <a href='http://localhost/modelos/sistema-cgae/cad-funcionario/' class='col-md-12 btn btn-primary'>Cadastrar Funcionário</a>
                </div>
                <div class='col-md-4'></div>
                
            </div>

		</form>

        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


