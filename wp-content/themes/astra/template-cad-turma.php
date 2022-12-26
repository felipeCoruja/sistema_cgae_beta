<?php
/*
Template Name: Template Cad Turma
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
						
            $result = $wpdb->get_results("SELECT * FROM curso");
            $etiquetas = $wpdb->get_results("SELECT etiqueta,COUNT(etiqueta) as quant FROM  turma GROUP BY etiqueta");

            $anoAtual = date("Y");
        
        ?>

        
        <section id="sessaoForm-turma">
            
            <form method="post" onsubmit="validaSubmit(event)">
                <h1>Cadastro de Turma</h1>
                <div class='row'>
                    
                    <div class='col-md-4'>
                        
                        <label for="anoDeAbertura">Ano de Abertura</label>
                        <input type="number" class='col-md-12 form-control form-control-sm ' name="anoDeAbertura" min='1990' value='2022' max='<?php echo $anoAtual;?>' id="anoDeAbertura" >
                    </div>

                    <div class='col-md-4'>
                        <label for="selectCurso">Curso</label>
                        <select name="selectCurso" class='col-md-12 form-control' id="selectCurso" class='col-md-10' onchange="cursoSelect()">
                            <option value="" id='primeiraOption'></option>

                            <?php 
                            foreach($result as $curso){ ?>
                                <option value="<?php echo $curso->nome?>-<?php echo $curso->etiqueta_padrao?>" id="<?php echo $curso->id;?>"><?php echo $curso->nome;?></option>

                            <?php }?>
                        </select>

                    </div>

                    <script>
                        function alerta2(){
                            alert("teste alerta")
                        }
                    </script>
                    <div class="col-md-4">
                        <label for="selectEtiquetas">Etiquetas</label>
                        <select name="selectEtiquetas" class='col-md-12 form-control' id="selectEtiquetas" class='col-md-10'>
                                <option value="" id='primeiraOption'></option>

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
                                
                        </select>
                    </div>
                </div><br><br>

                <div class='row'>
                    <div class='col-md-4'></div>
                    <input type="submit" name='cadastrarTurma' class='col-md-4'value="Cadastrar">
                    <div class='col-md-4'></div>

                </div>
            </form>
                
        </section>

        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


