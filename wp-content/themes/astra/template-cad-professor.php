<?php
/*
Template Name: Template Cad Professor
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
				
				<div class='col-md-4'></div>
				
				<div class='col-md-4'>
					<h2>Cadastro de Professor</h2><br>


					<div class='row'>
						<label for="nomeProfessor">User</label>
						<select name="disciplinas" id="selectDisciplinas" class='col-md-12'>
							<option value="Usuario">Usuário</option>
						</select>

					</div>
					<br>


					<div class='row'>

						<label for="nomeProfessor">Atribuir Disciplina:</label>
						<select name="disciplinas" id="selectDisciplinas" class='col-md-12'>
							<option value="" id='primeiraOption'></option>
	
							<?php 
							foreach($result as $disciplina){ ?>
								<option value="<?php echo $disciplina->nome;?>" id="<?php echo $disciplina->id;?>"><?php echo $disciplina->nome;?></option>
	
							<?php }?>
						</select>
					</div>
					<br>

					<div class='row'>
						<input type="submit" value="Salvar">
					</div>

				</div>

				<div class='col-md-4'></div>

			</div><br>
			<table>
			<?php 
				for($i = 0;$i<10;$i++){ ?>
					<tr>
						<td>Nome do professor <?php echo $i+1?></td>
						<td>Disciplina</td>
						<td><input type="checkbox"></td>
					</tr>
			<?php }?>
					
			</table>

			<div class='row'>
				<div class='col-md-4'>
				</div>

				<div class='col-md-4'>
				</div>
					
				<div class='col-md-4'>
					<input type="submit" value='Exluir Selecionados'>
					<input type="button" value='Selecionar todos'>
				</div>
			</div>
		</form>

        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


