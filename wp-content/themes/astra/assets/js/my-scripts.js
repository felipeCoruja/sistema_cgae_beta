
// window.addEventListener("load", setMaskInFields)

// function setMaskInFields(){
//     // não está setando as mascaras
//     $('#inputCpf').mask('000.000.000-00');
//     $('#numeroDoAluno').mask('(00) 0 0000-0000');
//     $('#numeroDoResponsavel01').mask('(00) 0 0000-0000');
//     $('#numeroDoResponsavel02').mask('(00) 0 0000-0000');

// }

function redirectTurma(turma){
    window.location.replace("http://localhost/modelos/sistema-cgae/aluno-turma?"+turma);
    
}
function redirectAluno(aluno){
    window.location.replace("http://localhost/modelos/sistema-cgae/aluno-view?"+aluno);
    
}

function alerta(){
    alert("teste")
}


//TEMPLATE-VIEW-ALUNO
function salvarComentario(){
    toggleCaixaDeComentario();
    //inserir comentario a baixo da caixa de comentarios
}
function toggleCaixaDeComentario(){
    let box = document.getElementById('box-coment')

    box.classList.toggle("display-none")
}

//TEMPLATE-CAD-DISCIPLINA
function clickDisciplina(idDisciplina){
    let btnDisciplina = document.getElementById(idDisciplina)
    let inputDisciplina = document.getElementById("inputDisciplina")
    let inputIdDisciplina = document.getElementById("idDaDisciplina")

    inputIdDisciplina.value = idDisciplina;//input que guarda o id do elemento selecionado
    inputDisciplina.value = btnDisciplina.value;
}

function setInputDelet(id){
    let inputDelet = document.getElementById('inputGuardaId');
    inputDelet.value = id;
}

//VIEW GRADE CURSO

function setInputDeletGrade(id_disciplna,id_curso){
    let inputDelet = document.getElementById('inputGuardaId');
    let inputIdCurso = document.getElementById('inputIdCurso');
    let registerDisciplinasDisplayNone = document.getElementById


    inputDelet.value = id_disciplna;
    inputIdCurso.value = id_curso
    registerDisciplinasDisplayNone.value.replace(id_disciplna+";","")
}

function addIdDisciplinaNoInputRegistrador(id_curso){
    let selectDisciplina = document.getElementById('SelectDisciplinas')
    let inputGuardaDisciplinaSelecionada = document.getElementById('inputGuardaId')
    let inputRegistraIdCurso = document.getElementById('inputIdCurso');

    inputRegistraIdCurso.value = id_curso
    inputGuardaDisciplinaSelecionada.value = selectDisciplina.value;
    
}

//essa função está sendo chamada no final do template-view-grade-curso sempre que a pagina abre
function setDisplayNoneSelectDisciplinas(){
    let select = document.getElementById('SelectDisciplinas')
    let options = select.getElementsByTagName("OPTION")
    let registerDisciplinasDisplayNone = document.getElementById('registerOptionsComDisplayNone')

    let vet = registerDisciplinasDisplayNone.value.split(';')

    //removendo elemento <optio> do select com display-none
    for(let x=0;x<vet.length-1;x++){// o -1 decorre que o ultimo elemento vem como "" devido ao split de um elemento neste modelo de string: "id;id;id;"
        for(let i = 0;i<options.length;i++){
            if(options[i].value == vet[x]){    
                options[i].setAttribute('class','display-none')
            }
        }
    }
    select.selectedIndex = 0
}

//TEMPLATE-CAD-CURSO
function addDisciplinaGrade(){
    let select = document.getElementById("selectDisciplinas")
    let gradeDisciplinas = document.getElementById("gradeDisciplinas")
    let options = select.getElementsByTagName("OPTION")
    //valores da option selecionada
    let opcaoId = select.options[select.selectedIndex].id;
    let registerDisciplinas = document.getElementById('registerDisciplinas')
    

    if(select.value !=""){
        //adicionando disciplina na grade


        gradeDisciplinas.innerHTML += 
        `<div class="input-group mb-3 col-sm-6" id="${opcaoId}Grade">
            <input type='text' class='display-none' ></input>
            <input type="text" class="form-control"  placeholder="${select.value}" disabled="">
            <div class="input-group-append">
                <button class="btn" type='reset' onclick='removerDaGrade(${opcaoId})'>Remover</button>
            </div>
        </div> `

        //registerDisciplinas contem todos os IDs das disciplinas que foram add na grade
        //estão no formato: id1;id2;id3; para serem tratados no PHP no submit do form
        registerDisciplinas.value += `${opcaoId};`

        //removendo elemento <optio> do select
        for(let i = 0;i<options.length;i++){
            if(options[i].innerHTML == select.value){
    
                options[i].setAttribute('class','display-none')
                select.selectedIndex = 0
                break;
            }
        }
    }
}

function removerDaGrade(value){
    let disciplinaGrade= document.getElementById(`${value}Grade`)
    let register = document.getElementById('registerDisciplinas')
    let optionOculta = document.getElementById(value)
    
    optionOculta.classList.remove('display-none')
    register.value = register.value.replace(value+";","")
    disciplinaGrade.parentNode.removeChild(disciplinaGrade);
}

function validaSubmit(event){
    let register = document.getElementById('registerDisciplinas')
    
    if(register.value ==""){
        alert("Insira pelo menos uma disciplina a grade do curso")
        event.preventDefault()//faz com que o form não seja submetido 
    }else{
        return true;
    }
}

//TEMPLATE CAD ALUNO

function validateCamposSubmit(event){
    
    if(validaDadosDosResponsaveis()==true){
        alert("tudo certo")
        return true;
    }else{
        alert("Flag false")
        event.preventDefault()
        return false
    }
    
}

function validaDadosDoAluno(){
    // let flag = true;
    // let strCampoInvalido = ""

    // let nomeDoAluno = document.getElementById('nomeDoAluno')
    // let nomeSocial = document.getElementById('nomeSocial')
    // let dataNascimento = document.getElementById('dataNascimento')
    // //let sexo = document.getElementById('')
    // let cpf = document.getElementById('inputCpf')
    // let fotoDoAluno = document.getElementById('inputFotoDoAluno')
    // let turma = document.getElementById('selectTurma')
    // let numeroAluno = document.getElementById('numeroDoAluno')
    // let descNumeroAluno = document.getElementById('inputDescricaoNumeroAluno')
    // let emailAluno = document.getElementById('emailDoAluno')
    // let descEmailAluno = document.getElementById('inputDescricaoEmailAluno')

    // //Endereço
    // let cidadeAluno = document.getElementById('cidadeAluno')
    // let bairroAluno = document.getElementById('bairroAluno')
    // let logradouroAluno = document.getElementById('logradouroAluno')
    // let complementoAluno = document.getElementById('complementoAluno')
    // let numeroResidenciaAluno = document.getElementById('numeroResidenciaAluno')

}




function validaDadosDosResponsaveis(){
    let flag = true

    let nomeResponsavel1 = document.getElementById('nomeDoResponsavel01')
    let nomeResponsavel2 = document.getElementById('nomeDoResponsavel02') 

    if(nomeResponsavel1.value =="" && nomeResponsavel2.value==""){
        alert("Campos de nome de ambos responsáveis está vazio")
        return false;
    }
        flag = isCadastroResponsaveisEstaCompleto()//verifica se os campos dos responsaveis foram preenchidos pela metade
    
    return flag;
}

function isCadastroResponsaveisEstaCompleto(){
    
    let quantCamposObrigatoriosResponsavel1 = 5;
    let quantCamposObrigatoriosResponsavel2 = 5;

    let nomeResponsavel1 = document.getElementById('nomeDoResponsavel01')
    let numeroDoResponsavel1 = document.getElementById('numeroDoResponsavel01')
    let emailResponsavel1 = document.getElementById('emailDoResponsavel01')
    let parentescoResponsavel1 = document.getElementById('parentescoResponsavel01')
    let cpfResponsavel1 = document.getElementById('cpfResponsavel01')

    let nomeResponsavel2 = document.getElementById('nomeDoResponsavel02')
    let numeroDoResponsavel2 = document.getElementById('numeroDoResponsavel02')
    let emailResponsavel2 = document.getElementById('emailDoResponsavel02')
    let parentescoResponsavel2 = document.getElementById('parentescoResponsavel02')
    let cpfResponsavel2 = document.getElementById('cpfResponsavel02')

    //Verificando se o cadastro do responsavel está incompleto, ou seja, se o usuário começou a preencher os campos e deixou algum de fora

    //RESPONSAVEL 01
    let contResponsavel01 = 0;
    if(nomeResponsavel1.value==""){
        contResponsavel01++;
    }
    if(numeroDoResponsavel1.value==""){
        contResponsavel01++;
    }
    if(emailResponsavel1.value==""){
        contResponsavel01++;
    }
    if(cpfResponsavel1.value==""){
        contResponsavel01++;
    }
    if(parentescoResponsavel1.value==""){
        contResponsavel01++
    }

    if(contResponsavel01>0 && contResponsavel01<quantCamposObrigatoriosResponsavel1){
        alert("Complete os dados inseridos para Responsavel 1 ou então deixe seus campos vazios")
        return false;
    }

    //RESPONSAVEL 02
    let contResponsavel02 = 0;
    if(nomeResponsavel2.value==""){
        contResponsavel02++;
    }
    if(numeroDoResponsavel2.value==""){
        contResponsavel02++;
    }
    if(emailResponsavel2.value==""){
        contResponsavel02++;
    }
    if(cpfResponsavel2.value==""){
        contResponsavel02++;
    }
    if(parentescoResponsavel2.value==""){
        contResponsavel02++
    }

    if(contResponsavel02>0 && contResponsavel02<quantCamposObrigatoriosResponsavel2){
        alert("Complete os dados inseridos para Responsavel 2 ou então deixe seus campos vazios")
        return false;
    }

    return true;
}

// CAD CURSO
function cursoSelect(){
    let selectEtiquetas = document.getElementById('selectEtiquetas')
    let optionsEtiquetas = selectEtiquetas.getElementsByTagName("OPTION")

    let selectCurso = document.getElementById('selectCurso')
    let vet = selectCurso.value.split('-')//selectCurso.value vem no formato "nomeCurso-etiqueta"
    const etiqueta = vet[1];
    optionsEtiquetas[0].innerHTML = `Padrão (${etiqueta})`
    optionsEtiquetas[0].setAttribute("value",`${etiqueta}`)


}