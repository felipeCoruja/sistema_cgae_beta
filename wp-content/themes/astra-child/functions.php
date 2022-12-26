<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );


//função que carrega o arquivo css no wordpress
function registerThemeAssets(){
	
	wp_enqueue_style('bootstrap-min', get_template_directory_uri().'/assets/css/bootstrap/bstyle.css');
	
	wp_enqueue_style('my-style', get_template_directory_uri().'/assets/css/mystyle.css');
	
	
	// wp_enqueue_script('my-jquery', get_template_directory_uri().'/assets/js/jquery-mask.js');

	wp_enqueue_script('my-scripts', get_template_directory_uri().'/assets/js/my-scripts.js');
	wp_enqueue_script('js-bootstrap', get_template_directory_uri().'/assets/js/bootstrap.bundle.js');
	wp_enqueue_script('js-bootstrap-map', get_template_directory_uri().'/assets/js/bootstrap.bundle.js.map');

}
add_action('wp_enqueue_scripts', 'registerThemeAssets',99);

//TEMPLATE CAD ALUNO
if(isset($_POST['btnSubmitCadAluno'])){

	//SALVANDO DADOS REFERENTE AO ALUNO
	$dadosEndereco = array(
		'cidade' =>		$_POST['cidadeAluno'],
		'bairro' => 	$_POST['bairroAluno'],
		'logradouro' =>	$_POST['logradouroAluno'],
		'complemento' =>$_POST['complementoAluno'],
		'numero' =>		$_POST['numeroResidenciaAluno'],
	);

	$table_name = 'endereco';
	$wpdb->insert($table_name, $dadosEndereco, $format = NULL);

	//pegando o ultimo endereco cadastrado
	$enderecos = $wpdb->get_results("SELECT * FROM endereco ORDER BY id DESC LIMIT 1");
	$idEndereco = -1;
	foreach($enderecos as $endereco){
		$idEndereco = $endereco->id;
	}

	$dadosAluno = array( // 'nomeDoCampoNoBanco' => $_POST['campo']
		
		'nome' => 			$_POST['nomeDoAluno'],
		'nome_social' => 	$_POST['nomeSocial'],
		'data_nascimento' =>$_POST['dataNascimento'],
		'sexo' => 			$_POST['sexo'],
		'cpf' => 			$_POST['inputCpf'],
		//'foto' => 		$_POST['fotoDoAluno'],
		'turma' => 			$_POST['selectTurma'],
		'telefone' => 		$_POST['numeroDoAluno'],
		'descricao_telefone' => $_POST['inputDescricaoNumeroAluno'],
		'email' => 				$_POST['emailDoAluno'],
		'descricao_email' => 	$_POST['inputDescricaoEmailAluno'],
		'endereco' =>			$idEndereco,
		
	);

	$table_name = 'aluno';
	$wpdb->insert($table_name, $dadosAluno, $format = NULL);


	//SALVANDO DADOS REFERENTE AOS RESPONSAVEIS
	
	//Cadastrando os dados de endereço
	$dadosEnderecoResponsavel = array(
		'cidade' =>		$_POST['cidadeDoResponsavel'],
		'bairro' => 	$_POST['bairroDoResponsavel'],
		'logradouro' =>	$_POST['logradouroDoResponsavel'],
		'complemento' =>$_POST['complementoDoResponsavel'],
		'numero' =>		$_POST['numeroResidenciaResponsavel'],
	);

	$table_name = 'endereco';
	$wpdb->insert($table_name, $dadosEnderecoResponsavel, $format = NULL);


	//PEGANDO OS ENDEREÇOS RELACIONADOS AOS RESPONSAVEIS
	$enderecoResponsavel01 = "";
	$enderecoResponsavel02 = "";
	$referenciaEndereco = $_POST['referenciaEnderecoResponsavel'];//Variavel para saber de qual responsavel pertence o endereço
	$enderecos = $wpdb->get_results("SELECT * FROM endereco ORDER BY id DESC LIMIT 1");

	if( $referenciaEndereco == "responsavel01" || $referenciaEndereco == "ambos"){
		foreach($enderecos as $endereco){
			$enderecoResponsavel01 = $endereco->id;
		}
	}
	
	if($referenciaEndereco == "responsavel02" || $referenciaEndereco == "ambos"){
		foreach($enderecos as $endereco){
			$enderecoResponsavel02 = $endereco->id;
		}
	}

	//INSERT RESPONSAVEIS 01 E 02
	if($_POST['nomeDoResponsavel01'] !=""){//caso exista um nome do responsavel 01
		$dadosResponsavel1 = array(
			'cpf' => 		$_POST['cpfResponsavel01'],
			'nome' => 		$_POST['nomeDoResponsavel01'],
			'parentesco' => $_POST['parentescoResponsavel01'],
			'numero' => 	$_POST['numeroDoResponsavel01'],
			'descricao_numero' => 	$_POST['descricaoNumeroResponsavel01'],
			'email' => 				$_POST['emailDoResponsavel01'],
			'descricao_email' =>	$_POST['descricaoEmailResponsavel01'],
			'endereco' =>			$enderecoResponsavel01,
		);

		$table_name = 'responsavel';
		$wpdb->insert($table_name, $dadosResponsavel1, $format = NULL);
		//Relacionando o responsavel ao aluno
		$table_name = 'aluno_responsavel';
		$wpdb->insert($table_name, array('cpf_aluno'=>$_POST['inputCpf'],'cpf_responsavel'=>$_POST['cpfResponsavel01']), $format = NULL);

	}

	if($_POST['nomeDoResponsavel02']!=""){//caso exista um nome do responsavel 02
		$dadosResponsavel2 = array(
			'cpf' => 		$_POST['cpfResponsavel02'],
			'nome' => 		$_POST['nomeDoResponsavel02'],
			'parentesco' => $_POST['parentescoResponsavel02'],
			'numero' => 	$_POST['numeroDoResponsavel02'],
			'descricao_numero' => 	$_POST['descricaoNumeroResponsavel02'],
			'email' => 				$_POST['emailDoResponsavel02'],
			'descricao_email' =>	$_POST['descricaoEmailResponsavel02'],
			'endereco' =>			$enderecoResponsavel02,
		);

		$table_name = 'responsavel';
		$result = $wpdb->insert($table_name, $dadosResponsavel2, $format = NULL);
		//Relacionando o responsavel ao aluno
		$table_name = 'aluno_responsavel';
		$wpdb->insert($table_name, array('cpf_aluno'=>$_POST['inputCpf'],'cpf_responsavel'=>$_POST['cpfResponsavel02']), $format = NULL);
	}
	
}



//TEMPLATE CAD DISCIPLINA	
if(isset($_POST['submitDisciplina'])){
		
	if(validateDisciplina()){

		$data = array(
			'nome' => $_POST['disciplina']
		);
 
		$table_name = 'disciplina';
		$result = $wpdb->insert($table_name, $data, $format = NULL);

		if($result!=1){
			echo "<script>alert('Erro ao salvar a disciplina')</script>";
		}
	}
	

}

function validateDisciplina(){
	return true;
}

if(isset($_POST['btnAtualizarDisciplina'])){
	$disciplinaSelecionada = $_POST['disciplinaSelecionada'];
	$id = $_POST['idDaDisciplina'];

	if($disciplinaSelecionada!= ""){
		
		$table_name = "disciplina";

		$wpdb->update($table_name, array(
			'nome' => $disciplinaSelecionada
			), array(
				'id' => $id
			)
		);
	}

}

//VIEW GRADE DE CURSO

if(isset($_POST['addGradeCurso'])){
	//pega o id de um imput register e add em curso_disciplina
	$id_disciplina = $_POST['inputGuardaId'];
	$id_curso = $_POST['inputIdCurso'];
	
	
	
	if($id_disciplina!= ""){
		
		$table_name = "curso_disciplina";
		$data = array(
			"id_curso" => $id_curso,
			"id_disciplina" => $id_disciplina,
		);
		
		$result = $wpdb->insert($table_name, $data, $format = NULL);

		if($result==false){
			echo "<script>alert('Erro ao salvar a disciplina')</script>";
		}
	}
}
//CAD CURSO
if(isset($_POST['submitCadCurso'])){
	
	$registerIds = $_POST['registerDisciplinas'];
	$arr = explode(";", $registerIds);
	
	$table_name = "curso";
	$data = array(
		"nome" => $_POST["nomeCurso"],
	);
	
	$wpdb->insert($table_name, $data, $format = NULL);
	
	echo "<script>alert('deu certo')</script>";

	$result = $wpdb->get_results("SELECT * FROM curso ORDER BY id DESC LIMIT 1");
	foreach($result as $element){
		$idCurso = $element->id;
	}

	$table_name = "curso_disciplina";
	for($i = 0; $i<sizeof($arr)-1;$i++){
		
		$data = array(
			"id_curso" => $idCurso,
			"id_disciplina" => $arr[$i],
		);
		
		$wpdb->insert($table_name, $data, $format = NULL);
		$data = null;
	}
	
}


if(isset($_POST['removerDisciplina'])){

	$id = $_POST['inputGuardaId'];

	if($id!= ""){
		
		$table_name = "disciplina";

		$wpdb->query( "DELETE FROM {$table_name} WHERE id = $id" );
	}
}

if(isset($_POST['removerDisciplinaGrade'])){
	
	$id_disciplina = $_POST['inputGuardaId'];
	$id_curso = $_POST['inputIdCurso'];
	
	if($id_disciplina!= ""){
		
		$table_name = "curso_disciplina";
		$result = $wpdb->query( "DELETE  FROM {$table_name} WHERE id_disciplina = '{$id_disciplina}' AND id_curso = {$id_curso}" );

		if($result == true){
			echo "<script>alert('deu certo')</script>";
		}else{
			echo "<script>alert('deu errado')</script>";
		}
	}
}

// CAD TURMA

if(isset($_POST['cadastrarTurma'])){
	$anoDeAbertura = $_POST['anoDeAbertura'];
	$curso = $_POST['selectCurso'];
	$etiqueta = $_POST['selectEtiquetas'];
	$idCurso = "";
	$idAnoLetivo = "";

	$arg = array('-',$etiqueta);
	$curso = str_replace($arg,"",$curso);// $curso está vindo no modelo "nomeCurso-etiqueta", iremos deixar somente o nome do curso na variavel
	
	echo $curso;
	echo "<<";

	$result = $wpdb->get_results("SELECT * FROM turma WHERE ano_de_abertura = $anoDeAbertura AND etiqueta = '$etiqueta'");

	$res = $wpdb->get_results("SELECT * FROM curso WHERE nome = '$curso' ");

	foreach($res as $element){
		$idCurso = $element->id;
	}
	$res = $wpdb->get_results("SELECT * FROM ano_letivo ORDER BY id DESC LIMIT 1");

	foreach($res as $element){
		$idAnoLetivo = $element->id;
	}
	

	if($result == true){
		echo "<script>alert('ERRO - Já existe uma turma aberta em $anoDeAbertura com a etiqueta $etiqueta , tente novamente com outra etiqueta')</script>";
	}else{
		$table_name = "turma";
		$data = array(
			"ano_de_abertura" => $anoDeAbertura,
			"id_curso" => $idCurso,
			"etiqueta" => $etiqueta,
			"id_ano_letivo" => $idAnoLetivo,
		);
		
		$resultInsert = $wpdb->insert($table_name, $data, $format = NULL);
		$data = null;

		if($resultInsert == true){
			echo "<script>alert('Turma Cadastrada com sucesso')</script>";
		}
	}
}