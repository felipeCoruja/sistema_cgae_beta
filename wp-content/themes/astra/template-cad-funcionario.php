<?php
/*
Template Name: Template Cad Funcionario
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
						
            $usuarios = $wpdb->get_results("SELECT * FROM cgae_users");
			$disciplinas = $wpdb->get_results("SELECT * FROM disciplina");
        ?>

        <form action="">
			<div class='row'>

				<div class='col-md-2'></div>

				<div class='col-md-8'>

					<h2>Cadastro de Funcionario</h2><br>


					<div class='row'>
						<div class='col-md-6'>

							<label for="nomeUsuario">User</label>
							<select name="nomeUsuarioFuncionario" id="nomeUsuarioFuncionario" class='col-md-12'>
								<?php
									foreach($usuarios as $user){ ?>

										<option	tion value="<?php echo $user->user_nicename;?>"><?php echo $user->user_nicename;?></option>
								<?php }?>
								
								
							</select>
						</div>

						<div class='col-md-6'>

							<label for="atribuicaoFuncionario">Atribuicão</label>
							<select name="atribuicaoFuncionario" id="atribuicaoFuncionario" class='col-md-12'>
								<option value="Atribuicao">Professor(a)</option>
								<option value="Atribuicao">Coordenador(a) de Curso</option>
								<option value="Atribuicao">Pedagogo(a)</option>
								<option value="Atribuicao">Assistente</option>

							</select>

						</div>
						
						
						
					</div><br>
					
					<div class="row">
						<div class='col-md-6'>
	
							<label for="nivelPermissao">Permissão</label>
							<select name="nivelPermissao" id="nivelPermissao" class='col-md-12'>
								<!-- <option value="Atribuicao"></option> -->
								<option value="Atribuicao">Admin</option>
								<option value="Atribuicao">Professor</option>
								<option value="Atribuicao">Colaborador</option>
								<option value="Atribuicao">NAI</option>
							</select>
	
						</div>
	
						<div class='col-md-6'>
	
							<label for="selectDisciplinas">Atribuir Disciplinas</label>
							<select name="selectDisciplinas" id="selectDisciplinas" class='col-md-12'>
								<!-- <option value="" selected=""></option> -->
								<?php
									foreach($disciplinas as $disciplina){ ?>
	
										<option	tion value="<?php echo $disciplina->nome;?>"><?php echo $disciplina->nome;?></option>
								<?php }?>
	
								
							</select>
	
						</div>
						
					</div>
					<br><br>
					<div class='row'>
						<div class='col-md-4'>
							
							</div>
						<div class='col-md-4'>
							<input class='col-md-12'type="submit" value="Salvar">
						</div>
						<div class='col-md-4'></div>
						
					</div>

				</div>
				

				<div class='col-md-2'></div>

			</div><br><br>
<!-- 
			<h2>Lista de Funcionarios</h2>
			<table>
			<?php 
				for($i = 0;$i<10;$i++){ ?>
					<tr>
						<td>Nome do Funcionario <?php echo $i+1?></td>
						<td>Cargo</td>
						<td>Permissao</td>
						<td><input type="checkbox"></td>
					</tr>
			<?php }?>
					
			</table> -->

			<!-- <div class='row'>
				<div class='col-md-4'>
				</div>

				<div class='col-md-4'>
				</div>
					
				<div class='col-md-4'>
					<input type="submit" value='Exluir Selecionados'>
					<input type="button" value='Selecionar todos'>
				</div>
			</div> -->
		</form>

        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


