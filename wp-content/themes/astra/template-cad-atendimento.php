<?php
/*
Template Name: Template Cad Atendimento
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

        <section>
            <form>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h2>Atendimento: (N° da Anotação e Titulo)</h2>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label for="autorAtendimento">Autor do Atendimento</label>
                        <input type="text" name="autorAtendimento" id="autorAtendimento" placeholder='Joao da Silva' class='form-control form-control-sm'>
                    </div>
                    <div class="col-md-4">
                        <label for="funcaoDoAutor">Funcao Do Autor</label>
                        <input type="text" name="funcaoDoAutor" id="funcaoDoAutor" placeholder='Professor' class='form-control form-control-sm'>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" class='form-control form-control-sm'><br>
                        <label for="atendimentoTextoLivre">Insira sua mensagem aqui</label>
                        <textarea name="mensagemTextoLivre" id="atendimentoTextoLivre" class='form-control' rows='6' ></textarea>
                    </div>
                    <div class="col-md-2"></div>
                </div>
    
                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row">
    
                        
                            <div class="col-md-6">
                                <label for="statusDaAnotacao">Status da anotação</label>
                                <select name="statusDaAnotacao" id="statusDaAnotacao" class='form-control '>
                                    <option value="EmAberto">Em Aberto</option>
                                    <option value="Resolvido">Resolvido</option>
                                    <option value="EmAndamento">Em Andamento</option>
                                </select>
                            </div>
                        </div>
                    </div>
    
                </div><br><br>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h3>Relacionar outras anotações</h3>
                        <table>
                            <?php 
                                for($i = 0;$i<5;$i++){ ?>
                                    <tr>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam molestie, erat eget aliquet euismod, urna sem hendrerit eros.  <?php echo $i+1?></td>
                                        <td class='cor1'></td>
                                        
                                        <td><input type="checkbox" name="" id=""></td>
                                    </tr>
                            <?php }?>
                        </table>
                        <a href='#'><< Voltar</a>
                        <a href='#'>Avançar >></a>

                    </div>
                    
                </div>
    
               <br><br><br>
            
                
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="row">

                            <input type="submit" value="Cadastrar" class='col-md-6'>
                            <a href="http://localhost/modelos/sistema-cgae/aluno-view/" class='btn btn-primary col-md-6'>Cancelar</a>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
    
    
            </form>
        </section>

        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
