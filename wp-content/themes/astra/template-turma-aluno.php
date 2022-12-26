<?php
/*
Template Name: Template Turma Aluno
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>


	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

        <!-- Bloco Personalizado -->
		<?php

			$url= $_SERVER["REQUEST_URI"];
			$delimiter = "?";
			$limit = 2;
			$str = explode($delimiter, $url, $limit);

			// echo $str[1] contem o valor 'turma' passado como parâmetro na url, ex: 1B
		?>

		<section id="container">
			
				
			<?php
						
				$result = $wpdb->get_results("SELECT t.id,t.id_curso,ano_de_abertura,al.ano_letivo,etiqueta FROM turma AS t JOIN curso AS c ON t.id_curso = c.id JOIN ano_letivo AS al ON t.id_ano_letivo = al.id");
			?>
				<h2>Alunos da turma <?php echo $str[1]?></h2>
				<div class='row'>
					
					<?php
						foreach($result as $turma){ ?>
						

							<div class='col-md-12'>
								<input type="text" value=<?php echo $turma->id_curso; echo $turma->etiqueta;?> class='btn btn-primary' onclick="redirectAluno('<?php echo $turma->id_curso; echo $turma->etiqueta;?>')">
								
							</div>	

					<?php };?>

				</div>

				<div class='row'>
					<div class='col-md-12'>
						<input type="button" value="Anotações sobre a turma">
					</div>
				</div>

    			
			
        </section>

		<style>
			#container{
				width:60%;
				
				margin-left:20%;
				
			}
			input{
				width:100%;
			}
		</style>
        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


