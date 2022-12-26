<?php
/*
Template Name: Template View Grade Curso
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
			$url= $_SERVER["REQUEST_URI"];
			$delimiter = "?";
			$limit = 2;
			$str = explode($delimiter, $url, $limit);
            $id_curso = $str[1];
            $result = $wpdb->get_results("SELECT cd.id_curso, d.id, d.nome FROM curso_disciplina as cd JOIN disciplina as d ON cd.id_disciplina = d.id WHERE cd.id_curso = $id_curso
            ");

            $ResultDisciplinas = $wpdb->get_results("SELECT * FROM disciplina");
        ?>

        <section id="sessaoForm-turma">
            
            <h1>Grade Do Curso: Nome do Curso</h1>
            <br><br>
            <form role="form" method="post">
                <div class="row">
                    <div class="col-md-12">

                        <div class="input-group mb-3">
                            <select name="SelectDisciplinas" id="SelectDisciplinas" class='form-control'>
                                <option value=""></option>
                                <?php 
                                    foreach($ResultDisciplinas as $disciplina){ ?>
                                        <option value="<?php echo $disciplina->id;?>" id="<?php echo $disciplina->id;?>"><?php echo $disciplina->nome;?></option>

                                <?php }?>
                                
                            </select>
                        <div class="input-group-append">
                            <button class="btn" name="addGradeCurso" type="submit" onclick="addIdDisciplinaNoInputRegistrador('<?php echo $id_curso?>')">Cadastrar</button>
                        </div>
                    </div>
                    </div>
                </div>
                <br><br>
                <div class='row'>
                    <?php
				    foreach($result as $disciplina){ ?>
                   
                   
                        

                    <div class="input-group mb-3 col-sm-6 ">
                        <input type="button" class="form-control" placeholder="Nome da Disciplina" name="disciplina" value='<?php echo $disciplina->nome;?>' id='<?php echo $disciplina->id;?>' onclick="clickDisciplina('<?php echo $disciplina->id;?>')" >
                        
                        <div class="input-group-append">
                            <input name="removerDisciplinaGrade" onclick="setInputDeletGrade('<?php echo $disciplina->id;?>','<?php echo $id_curso?>')" type='submit' value="Remover">
                        </div>
                    </div>
                    
                    
                    <?php };?> 
                    
                </div><br><br>

                <!-- ################### INPUTS REGISTRADORES ############## -->
                <!-- esses campos estão aqui com o intuito de guardar alguma informação para ser tratada no arquivos javaScript ou pelo PHP -->

                <input type="text" id='inputGuardaId' name='inputGuardaId' class='display-none'> <!-- Input que guarda o id da disciplina a ser adicionada a grade, ou seja, inserida na tabela curso_disciplina-->
                <input type="text" id='inputIdCurso' name='inputIdCurso' class='display-none'>
                
                <?php 
                    $optionsDisplayNone = "";
                    foreach($result as $disciplina){
                        $optionsDisplayNone .= $disciplina->id . ";"; // (.=) é um operador para somatorio semelhante a (+=) 

                    } 
                ?>
                <input type="text" id='registerOptionsComDisplayNone' value="<?php echo $optionsDisplayNone;?>" class='display-none'>
                <!-- ####################################################### -->

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="http://localhost/modelos/sistema-cgae/view-cursos/" class='col-md-12 btn btn-primary'>Voltar</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
                
        </section>
        
        <script>
            setDisplayNoneSelectDisciplinas()
        </script>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


