<?php
/*
Template Name: Template Disciplina
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

        <section id="sessaoForm-turma">
            
            <h1>Cadastro de Disciplina</h1>
            <form role="form" method="post">
                <div class='row'>
                

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nome da Disciplina" name="disciplina" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn" name="submitDisciplina"type="submit">Cadastrar</button>
                        </div>
                    </div>
                </div>

            
                <div class='row'>
                    <?php
				    foreach($result as $disciplina){ ?>
                   
                   
                        

                    <div class="input-group mb-3 col-sm-6 ">
                        <input type="button" class="form-control" placeholder="Nome da Disciplina" name="disciplina" value='<?php echo $disciplina->nome;?>' id='<?php echo $disciplina->id;?>' onclick="clickDisciplina('<?php echo $disciplina->id;?>')" >
                        
                        <div class="input-group-append">
                            <input name="removerDisciplina" onclick="setInputDelet(<?php echo $disciplina->id?>)" type='submit' value="Remover">
                        </div>
                    </div>
                    
                    
                    <?php };?> 
                    
                </div><br><br>
                
                <input type="text" id='inputGuardaId' name='inputGuardaId' class='display-none'>

                <div class='row '>
                    
                    <div class="input-group mb-3">
                        <input type='text' class='display-none'name="idDaDisciplina" id="idDaDisciplina"></input>
                        <input type="text" class="form-control" placeholder="Nome da Disciplina" aria-describedby="basic-addon2" id="inputDisciplina" name="disciplinaSelecionada">
                        <div class="input-group-append">
                            <button class="btn" name="btnAtualizarDisciplina" type="submit">Atualizar</button>
                        </div>
                    </div>
                </div>

            </form>
                
        </section>

        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


