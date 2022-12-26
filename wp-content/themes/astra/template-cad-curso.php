<?php
/*
Template Name: Template Cad Curso
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
            $resultCurso = $wpdb->get_results("SELECT * FROM curso");

        ?>

        <section id="sessaoForm-turma">
            
            <h1>Cadastro de Curso</h1>
            <form method="post" onsubmit="validaSubmit(event)">
                <div class='row'>
                    <div class="col-md-8">
                        <label for="nomeCurso">Nome do Curso</label>
                        <input type="text" class="form-control form-control-sm" name="nomeCurso" aria-describedby="basic-addon2" required="">
                        
                    </div>

                    <div class='col-md-4'>
                        <label for="nomeDaTurma">Etiqueta da Turma</label>
                        <select class='col-md-12 form-control form-control'name="nomeDaTurma"id="nomeDaTurma">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div><br>
                <div class='row'>
                    

                <!-- ######################## -->

                    <div class="col-md-8">
                       
                        <select name="disciplinas" id="selectDisciplinas" class='input-group mb-3 form-control'>
                            <option value="" id='primeiraOption'></option>

                            <?php 
                            foreach($result as $disciplina){ ?>
                                <option value="<?php echo $disciplina->nome;?>" id="<?php echo $disciplina->id;?>"><?php echo $disciplina->nome;?></option>

                            <?php }?>
                        </select>
                    </div><br><br><br>
                    
                    <div class="col-md-4">
                        <input type="button" value="Adicionar a Grade" onclick="addDisciplinaGrade()" >
                    </div>
                
                </div>

                
                <div class='row c' id='gradeDisciplinas'>
                                
                </div><br>
                
                
                <div class='row'>
                    <!-- O campo a registerDisciplinas serve apenas para guardar os IDs das diciplinas adicionadas a grade ,formato: id;id;id; -->
                    <input type="text" class='display-none' id="registerDisciplinas" name='registerDisciplinas' >
                    <div class='col-md-2'></div>
                    <div class="col-md-8">
                        <div class="row">
                            <input class='col-md-5' type="submit" name="submitCadCurso" value="Cadastrar Curso">
                            <div class="col-md-2"></div>
                            
                            <a href="http://localhost/modelos/sistema-cgae/view-cursos/" class=' col-md-5 btn btn-primary'>Ver Cursos Cadastrados</a>
                        </div>
                    </div>
                    <div class='col-md-2'></div>

                </div><br><br>

            </form>
                
        </section>

        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


