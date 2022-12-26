<?php
/*
Template Name: Template Cad Aluno
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

            // Falta adicionar a restrição de busca where turma.status = 'ativa'
            $turmas = $wpdb->get_results("SELECT YEAR(ano_de_abertura) year,t.turma,t.id,c.nome FROM turma as t JOIN curso as c ON c.id = t.id_curso ORDER BY c.nome,year DESC");

			$anoAtual = date("Y");
				
            
        ?>
        <section id="sessaoForm">
            
            <form method="post" onsubmit='validateCamposSubmit(event)'>
                <h2>Formulário Cadastro de Aluno</h2>
                <div class="form-group">
                    <label for="nomeDoAluno">Nome do Aluno</label>
                    <input type="text" class="form-control form-control-sm" id="nomeDoAluno" name="nomeDoAluno" placeholder="Insira o nome" required>
                </div>

                <div class="form-group">
                    <label for="nomeSocial">Nome Social</label>
                    <input type="text" class="form-control form-control-sm" id="nomeSocial" placeholder="Caso tenha" name="nomeSocial">
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="dataNascimento" placeholder="01/01/2022"
                        name="dataNascimento" required >
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="sexo">Sexo</label><br>
                        <input type="radio" id="sexoM" name="sexo" value="M" checked> Masculino
                        <input type="radio" id="sexoF" name="sexo" value="F"> Feminino
                        <input type="radio" id="sexoF" name="sexo" value="NB"> Não Binário

                    </div>
                    
                </div>
                <div class="form-group">
                    
                    <div class="form-row">
                        
                        <div class="col-md-6">
                            <label for="inputCpf">CPF</label>
                            <input type="text" class="form-control form-control-sm" id="inputCpf" name="inputCpf" placeholder="123.456.789-01" required >
                        </div>


                        <div class="col-md-6">
                            <label for="inputFotoDoAluno">Foto do Aluno</label>
                            <input type="file" class="form-control form-control-file" id="inputFotoDoAluno" name="fotoDoAluno">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    
                    <div class="form-row">
                        
                        <div class="col-md-6">
                            <label for="selectTurma">Turma</label>
                            <select name="selectTurma" id="selectTurma" class='form-control'>
                                <?php
									foreach($turmas as $turma){ ?>

										<option value="<?php echo $turma->id?>"><?php echo $anoAtual - $turma->year+1; echo $turma->turma?> - <?php echo $turma->nome;?></option>
								<?php }?>

                            </select>
                        </div>
                    </div>

                </div>
                
                <br><br>
                
                <h2>Contatos</h2>
                <div class="row color-bk-cad-aluno">
                    <div class="col-md-12">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="numeroDoAluno">Número do Aluno</label>
                                <input type="text" class="form-control form-control-sm" id="numeroDoAluno" name="numeroDoAluno" placeholder="(99) 9 9999-9999" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDescricaoNumeroAluno">Descrição</label>
                                <select id="inputDescricaoNumeroAluno" class="form-control" name="inputDescricaoNumeroAluno">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
        
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="emailDoAluno">Email do Aluno</label>
                                <input type="text" class="form-control form-control-sm" id="emailDoAluno" name="emailDoAluno" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDescricaoEmailAluno">Descrição</label>
                                <select id="inputDescricaoEmailAluno" class="form-control" name="inputDescricaoEmailAluno">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                    </div>


                   
                    <div class="col-md-12">
                        <h4>Endereço</h4>
                        
                        <div class='form-row'>
                            
                            <div class='form-group col-md-4'>
                                <label for="cidadeAluno">Cidade:</label>
                                <select name="cidadeAluno" class='form-control' id='cidadeAluno'>
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class='form-group col-md-4'>
                                <label for="bairroAluno">Bairro:</label>
                                <input type="text" name="bairroAluno" id="bairroAluno" class='form-control form-control-sm' required>
                            </div>
                            
                            <div class='form-group col-md-4'>
                                <label for="logradouroAluno">Logradouro:</label>
                                <input type="text" name="logradouroAluno" id="logradouroAluno" class='form-control form-control-sm' required>
                            </div>
                            
                        </div>
                        
                        <div class='form-row'>

                            <div class='form-group col-md-4'>
                                <label for="numeroResidenciaAluno" >Numero:</label>
                                <input type="text" name="numeroResidenciaAluno" id="numeroResidenciaAluno" class='form-control form-control-sm' >
                            </div>
                            <div class='form-group col-md-4'>
                                <label for="complementoAluno">Complemento:</label>
                                <input type="text" name="complementoAluno" id="complementoAluno" class='form-control form-control-sm'>
                            </div>                            
                        </div>
                    </div>
                </div>

                <br>
                <div class="form-group">
                    <div class="form-group">
                        <label for="nomeDoResponsavel01">Nome do Responsavel 1</label>
                        <input type="text" class="form-control form-control-sm" id="nomeDoResponsavel01" placeholder="Insira o nome"
                            name="nomeDoResponsavel01">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="numeroDoResponsavel01">Número do Responsavel 1</label>
                            <input type="text" class="form-control form-control-sm" id="numeroDoResponsavel01" name="numeroDoResponsavel01" placeholder="(99) 9 9999-9999">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descricaoNumeroResponsavel01">Descrição</label>
                            <select id="descricaoNumeroResponsavel01" class="form-control"
                                name="descricaoNumeroResponsavel01">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="emailDoResponsavel01">Email do Responsavel 1</label>
                            <input type="text" class="form-control form-control-sm" id="emailDoResponsavel01" name="emailDoResponsavel01">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descricaoEmailResponsavel01">Descrição</label>
                            <select id="descricaoEmailResponsavel01" class="form-control" name="descricaoEmailResponsavel01">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cpfResponsavel01">CPF</label>
                            <input type="text" class="form-control form-control-sm" id="cpfResponsavel01" name="cpfResponsavel01" placeholder="123.456.789-01" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="parentescoResponsavel01">Parentesco</label>
                            <select name="parentescoResponsavel01" id="parentescoResponsavel01" class='form-control'>
                                <option value=""></option>
                                <option value="pai">Pai</option>
                                <option value="mae">Mãe</option>
                                <option value="tio(a)">Tio(a)</option>
                                <option value="avô">Avô</option>
                                <option value="avó">Avó</option>
                                <option value="outro">outro</option>
                                
                            </select>
                        </div>
                    </div>

                </div>
                
                <br>
                <div class="row color-bk-cad-aluno">
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            <div class="form-group">
                                <label for="nomeDoResponsavel02">Nome do Responsavel 2</label>
                                <input type="text" class="form-control form-control-sm" id="nomeDoResponsavel02" placeholder="Insira o nome"
                                    name="nomeDoResponsavel02">
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="numeroDoResponsavel02">Número do Responsavel 2</label>
                                    <input type="text" class="form-control form-control-sm" id="numeroDoResponsavel02" name="numeroDoResponsavel02" placeholder="(99) 9 9999-9999">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="descricaoNumeroResponsavel02">Descrição</label>
                                    <select id="descricaoNumeroResponsavel02" class="form-control"
                                        name="descricaoNumeroResponsavel02">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
        
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="emailDoResponsavel02">Email do Responsavel 2</label>
                                    <input type="text" class="form-control form-control-sm" id="emailDoResponsavel02" name="emailDoResponsavel02">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="descricaoEmailResponsavel02">Descrição</label>
                                    <select id="descricaoEmailResponsavel02" class="form-control" name="descricaoEmailResponsavel02">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cpfResponsavel02">CPF</label>
                                    <input type="text" class="form-control form-control-sm" id="cpfResponsavel02" name="cpfResponsavel02" placeholder="123.456.789-01" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="parentescoResponsavel02">Parentesco</label>
                                    <select name="parentescoResponsavel02" id="parentescoResponsavel02" class='form-control'>
                                        <option value=""></option>
                                        <option value="pai">Pai</option>
                                        <option value="mae">Mãe</option>
                                        <option value="tio(a)">Tio(a)</option>
                                        <option value="avô">Avô</option>
                                        <option value="avó">Avó</option>
                                        <option value="outro">outro</option>
                                        
                                    </select>
                                </div>
                            </div>
                        
                            
                        </div>
                    </div>
                </div>

                
                
                <br><br>
                <h3>Endereço dos Responsaveis</h3>
                    
                <div class='form-row'>
                    
                    <div class='form-group col-md-4'>
                        <label for="cidadeDoResponsavel">Cidade:</label>
                        <select name="cidadeDoResponsavel" id="cidadeDoResponsavel" class='form-control' >
                            <option value=""></option>
                        </select>
                    </div>

                    <div class='form-group col-md-4'>
                        <label for="bairroDoResponsavel">Bairro:</label>
                        <input type="text" name="bairroDoResponsavel" id="bairroDoResponsavel" class='form-control form-control-sm' required>
                    </div>
                    
                    <div class='form-group col-md-4'>
                        <label for="logradouroDoResponsavel">Logradouro:</label>
                        <input type="text" name="logradouroDoResponsavel" id="logradouroDoResponsavel" class='form-control form-control-sm' required>
                    </div>
                       
                </div>
                
                <div class='form-row'>
                    <div class='form-group col-md-4'>
                        <label for="numeroResidenciaResponsavel">Numero:</label>
                        <input type="text" name="numeroResidenciaResponsavel" id="numeroResidenciaResponsavel" class='form-control form-control-sm'>
                    </div>  

                    <div class='form-group col-md-4'>
                        <label for="complementoDoResponsavel">Complemento:</label>
                        <input type="text" name="complementoDoResponsavel" id="complementoDoResponsavel" class='form-control form-control-sm'>
                    </div>

                    <div class='form-group col-md-4'>
                        <label for="referenciaEnderecoResponsavel">Referente a:</label>
                        <select name="referenciaEnderecoResponsavel" id="referenciaEnderecoResponsavel" class='form-control'>
                            <option value="responsavel01">Responsavel 1</option>
                            <option value="responsavel02">Responsavel 2</option>
                            <option value="ambos">Ambos</option>
                        </select>
                    </div>
                </div>


                <br>

                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <input type="submit" name="btnSubmitCadAluno" value ='Cadastrar'class="btn btn-primary col-md-12">
                        <input type='button' onclick='validateCamposSubmit(event)' value='teste'>
                    </div>
                    <div class="col-md-5"></div>
                </div><br><br>
            </form>

        
        </section>

        
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


