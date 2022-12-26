<?php
/*
Template Name: Template Cad Anotação
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
                <br><br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <h2>Anotação referente a: Nome do Aluno e turma</h2>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label for="autorAnotacao">Autor da Anotação</label>
                        <input type="text" name="autorAnotacao" id="autorAnotacao" placeholder='Joao da Silva' class='form-control form-control-sm' disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="funcaoDoAutor">Funcao Do Autor</label>
                        <input type="text" name="funcaoDoAutor" id="funcaoDoAutor" placeholder='Professor' class='form-control form-control-sm' disabled>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" class='form-control form-control-sm'><br>
                        <label for="anotacaoTextoLivre">Insira sua anotação aqui</label>
                        <textarea name="anotacaoTextoLivre" id="anotacaoTextoLivre" class='form-control' rows='6' ></textarea>
                    </div>
                    <div class="col-md-2"></div>
    
                </div>
    
                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row">
    
                            <div class="col-md-6">
    
                                <label for="selectDisciplinas">Relacionar Uma Disciplina a anotação</label>
                                <select name="disciplinas" id="selectDisciplinas" class='form-control '>
                                        <option value="" id='primeiraOption'></option>
            
                                        <?php 
                                        foreach($result as $disciplina){ ?>
                                            <option value="<?php echo $disciplina->nome;?>" id="<?php echo $disciplina->id;?>"><?php echo $disciplina->nome;?></option>
            
                                        <?php }?>
                                </select>
                            </div>
                        
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
    
                </div>
                <br><br>
    
                <!-- Aqui entra as modais/popups e os botões que as chamam  -->
                <!-- Button trigger modal -->

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 ">

                        <h3 class='d-flex justify-content-center'>Check Box</h3>
                        <div class="row ">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 ">
        
                                <br>
                            </div>
                        </div>
                        
                        <div class="row flex-row ">
                            <div class="col-md-2"></div>
                            <div class="col-md-8  d-flex justify-content-around">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Desempenho Escolar
                                </button> 
        
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Aspecto Cognitivo
                                </button> 
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Postura em Sala
                                </button>          
                                
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Desempenho do aluno</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                               
                                
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
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- ###################### -->
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


