<?php
/*
Template Name: Template View Turma
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
        <section id="sessaoForm-turma">
			<?php
						
				$result = $wpdb->get_results("SELECT t.id,ano_de_abertura,id_ano_letivo,al.ano_letivo,etiqueta, c.nome,c.etiqueta_padrao FROM turma AS t JOIN curso AS c ON t.id_curso = c.id JOIN ano_letivo as al ON id_ano_letivo = al.id ORDER BY c.nome,t.ano_de_abertura");
				
			?>

			<h2>Turmas cadastradas no Banco de dados</h2>
			<form method="post" class='row justify-content'>


			 <?php
				foreach($result as $turma){ ?>

					<div class="col-sm-4">
						<input type="button" name="btnTurma" value="<?php echo $turma->ano_letivo - $turma->ano_de_abertura +1;echo $turma->etiqueta;?> - <?php echo $turma->nome?>"  onclick="redirectTurma('<?php echo $turma->ano_letivo - $turma->ano_letivo +1;echo $turma->etiqueta;?>')">
					</div >

				
				<?php };?> 
				
				<div class="col-sm-4">
					<input type="button" name='turmas-arquivadas' value="Turmas-Arquivadas">

				</div>
			</form>

        </section>

        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


