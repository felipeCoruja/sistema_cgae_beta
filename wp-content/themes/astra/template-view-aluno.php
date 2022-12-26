<?php
/*
Template Name: Template View Aluno
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
       
        <section>
            <div class='row'>
                <div class='col-md-4 border'>
                    Foto
                </div>
                <div class='col-md-8 border'>
                    Cabeçãlho
                </div>
            </div>

            <div class='row'>
                <div class='col-md-4 border'>

                <?php

                    $url= $_SERVER["REQUEST_URI"];
                    $delimiter = "?";
                    $limit = 2;
                    $str = explode($delimiter, $url, $limit);

                    // echo $str[1] contem o valor 'ID do aluno' passado como parâmetro na url
                ?>

                    <h4>Dados do Aluno <?php echo $str[1]?></h4>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Nome: ----</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Nome Social: ----</label>
                        </div>
                    </div>

                    <div class='row'>

                        <div class='col-md-6'>
                            <label>Telefone: ----</label>
                        
                        </div>

                        <div class='col-md-6'>
                            <label>E-mail:-------</label>
                        </div>
                    </div>
                    

                    <div class='row'>
                        <div class='col-md-6'>

                            <label>Data nasc: --------</label>
                        </div>

                        <div class='col-md-6'>
                            <label>Sexo: X</label>

                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-md-12'>
                            <label>CPF: ----</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Cidade Onde Mora: ----</label>

                        </div>
                    </div>

                    <div class='row'>
                        ---------------------------------------------------------------
                       
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Dados de Contato dos Responsaveis</label>

                        </div>
                    </div>     
                    
                    <div class='row'>
                        ---------------------------------------------------------------
                       
                    </div>

                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Nome da Mãe:--------</label>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <label>Numero:--------</label>

                        </div>

                        <div class='col-md-6'>
                            <label>E-mail:--------</label>
                        </div>
                    </div>
                    
                    <div class='row'>
                        ---------------------------------------------------------------
                       
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Nome do Pai:--------</label>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <label>Numero: (32) 9 9905-9996</label>

                        </div>

                        <div class='col-md-6'>
                            <label>E-mail: felipemdb5@gmail.com</label>

                        </div>
                    </div>
                    

                    <div class='row'>
                        ---------------------------------------------------------------
                       
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Endereços</label>

                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Cidade</label>

                        </div>
                    </div>
                    
                </div>


                <div class='col-md-8 border'>
                    

                    <div class='row border c'>
                        <div class='col-md-12'>
                            <h4>Titulo</h4> 
                        </div>
                        <div class='col-md-12'>
                            <label >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pretium velit. Etiam sit amet pellentesque ligula. Aenean consequat velit ut metus ultrices mollis. Nunc in luctus nulla, quis consequat quam. Cras et purus ultricies, maximus ligula sed, commodo mi. Praesent sapien neque, facilisis quis quam viverra, tempor efficitur tellus. </label>
                        </div><br><br>  
                        
                        <div class='col-md-12'>
                            
                            <label>Escrito por: -----------</label>
                            <label>Função: -----------</label>
                            <label>Data: xx/xx/xxxx</label>
                        </div><br><br>
                        <div class='col-md-12'>

                            <button class="btn-sm btn-light">editar</button>
                            <button class="btn-sm btn-light">excluir</button>
                            <button class="btn-sm btn-light" onclick='toggleCaixaDeComentario(/*passando o id*/)'>comentar</button>
                            <a href='http://localhost/modelos/sistema-cgae/anotacao/?idAluno    ' class="btn-sm btn-light">Visualizar anotação</a>
                            <a href='http://localhost/modelos/sistema-cgae/cad-atendimento/' class="btn-sm btn-light">Atendimento</a>
                            


                        </div><br><br>

                        <div class='row box-comentario display-none' id='box-coment'>
                         
                            
                            <div class='col-md-12 border'>
                                <textarea class='text-area'cols='105' rows='4' name="new-coment" id="new-coment" ></textarea>
                               
                            </div>
                            
                           
                            <div class='col-md-12'>
                                <button class="btn-sm btn-light" onclick='salvarComentario()'>Salvar Comentario</button>
                            </div>
                            
                        </div>
                        
                        <div id='comentarios-salvos' class='col-md-12'>
                            <label > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pretium velit. Etiam sit amet pellentesque ligula. Aenean consequat velit ut metus ultrices mollis.</label>
                        </div>
                        
                        

                    </div>
                 
                </div>
            </div>

            <div class='row'>
                <div class='col-md-4 border'>
                    controles
                    <div class='row'>
                        <div class='col-md-12'>
                            <input type="button" value="Editar">

                            <input type="button" value="Excluir">
                        </div>
                        

                        
                    </div>
                </div>

                <div class='col-md-8 border'>
                    controles de anotações
                    <div class='row'>
                        <div class='col-md-12'>
                            <a href="http://localhost/modelos/sistema-cgae/anotacao/?<?php echo "idAluno";?>"class='btn btn-primary'>Adicionar</a>
                            <a href="#" class='btn btn-primary'>Voltar</a>
                           
                        </div>
                        

                        
                    </div>
                </div>
                
            </div>
        </section>
        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


