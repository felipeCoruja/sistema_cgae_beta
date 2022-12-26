<?php
/*
Template Name: Template View Cursos
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
        ?>

        <section>
            
            <form role="form" method="post">
                
                <div class='row'>
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h1>Cursos Cadastrados</h1>
                        <br><br>
                        <div class="row">

                            <?php
                            foreach($result as $curso){ ?>
                           
                            <div class="input-group mb-3 col-sm-6 ">
                                <input type="text" class="form-control" placeholder="Nome da Disciplina" name="disciplina" value='<?php echo $curso->nome;?>' id='<?php echo $curso->id;?>' disabled>
                                
                                <div class="input-group-append">
                                <a href="http://localhost/modelos/sistema-cgae/view-grade-curso/?<?php echo $curso->id?>" class='btn btn-primary'>Abrir Grade</a>
                                </div>
                            </div>
                            
                            
                            <?php };?> 
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div><br><br>
                
                <input type="text" id='inputGuardaId' name='inputGuardaId' class='display-none'>

                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <a href="http://localhost/modelos/sistema-cgae/cadastro-de-curso/" class='col-md-12 btn btn-primary'>Tela de Cadastro</a>
                    </div>
                    <div class="col-md-5"></div>
                </div>

            </form>
                
        </section>

        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


