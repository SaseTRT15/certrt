<?php

// This file is part of the certrt module for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Language strings for the certrt module
 *
 * @package mod
 * @subpackage certrt
 * @copyright 2012 Luis Alcantara <lgmalcantara@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['addlinklabel'] = 'Adicionar outra opção de atividade lincada.';
$string['addlinktitle'] = 'Clique para adicionar outra opção de atividade lincada';
$string['areaintro'] = 'Introdução do certificado';
$string['awarded'] = 'Atribuído';
$string['awardedto'] = 'Atribuído a';
$string['back'] = 'Voltar';
$string['border'] = 'Moldura';
$string['borderblack'] = 'Preto';
$string['borderblue'] = 'Azul';
$string['borderbrown'] = 'Marron';
$string['bordercolor'] = 'Linhas de borda';
$string['bordercolor_help'] = 'Como as imagens podem aumentar substancialmente o tamanho de um arquivo PDF, é possível desenhar linhas de borda ao invés de utilizar uma imagem de borda. (Tenha certeza que a opção de imagem de Borda esteja selecionada com a opção Nenhuma Borda). A opção de Linhas de Borda irá imprimir bordas de três linhas de larguras variadas na cor escolhida.';
$string['bordergreen'] = 'Verde';
$string['borderlines'] = 'Linhas';
$string['borderstyle'] = 'Imagem de Borda';
$string['borderstyle_help'] = 'A opção de Imagem de Borda permite que se escolha entre as imagens disponíveis no diretório certrt/pix/borders. Selecione a imagem de borda que você deseja ao redor do seu certificado, ou escolha Nenhuma Borda.';
$string['certrt:view'] = 'Ver certificado';
$string['certrt:manage'] = 'Configurar certificado';
$string['certrt:printteacher'] = 'Imprimir professor';
$string['certrt:student'] = 'Obter certificado';
$string['certrt'] = 'Verificação de código do certificado:';
$string['certrtname'] = 'Nome do certificado';
$string['certrtreport'] = 'Relatório de certificados';
$string['certrtsfor'] = 'Certificados de';
$string['certrttype'] = 'Tipo de certificado';
$string['certrttype_help'] = 'Aqui define-se qual o layout desejado para o certificado. A pasta type do módulo certificado inclui quatro certificados padrão:
A4 com fontes incorporadas, que imprime em papel tamanho A4, com as fontes inclusas no arquivo.
A4 sem fontes incorporados, que imprime em papel tamanho A4, sem incluir as fontes ao arquivo.
Carta com fontes incorporadas, que imprime em papel tamanho carta, com as fontes inclusas no arquivo.
Carta sem fontes incorporados, que imprime em papel tamanho carta, sem incluir as fontes ao arquivo.

Os tipos sem fontes incorporadas usam as fontes Helvetica e Times.
Se você não tiver certeza que seus usuários terão essas fontes nos seus computadores, ou se o seu idioma
utiliza caracteres ou símbolos que não são inclusos nas fontes Helvetica e Times, recomenda-se optar por
um tipo com fontes incorporadas. Os tipos com fontes incorporadas usam as fontes Dejavusans e Dejavuserif.
Esta opção criará arquivos pdf significativamente maiores, portanto não recomenda-se o uso de um tipo com
fontes incorporadas, a menos que você julgue necessário.

Pastas como novos tipos de layouts podem ser adicionadas a pasta certrt/type. O nome da pasta e
quaisquer novas palavras traduzidas para estes novos tipos devem ser adicionadas aos arquivos de idiomas
do módulo certificado.';
$string['certify'] = 'Esta escola certifica que';
$string['certdateformat'] = '%d de %B de %Y.';
$string['code'] = 'Código';
$string['column'] = "Coluna";
$string['columnimage'] = "Imagem de Coluna";
$string['columnimage_help'] = "Imagem de coluna para uso exclusivo do certificado do tipo TRT.";
$string['completiondate'] = 'Término do Curso';
$string['course'] = 'Pelo Curso';
$string['coursegrade'] = 'Nota no curso';
$string['coursename'] = 'Curso';
$string['coursetimereq'] = 'Tempo requerido em minutos';
$string['coursetimereq_help'] = 'Insira a quantidade mínima de minutos que um aluno deve ter logado no curso antes de estar apto a receber o certificado.';
$string['credithours'] = 'Carga horária';
$string['credithourstype'] = 'horas-aula';
$string['customtext'] = 'Texto padrão';
$string['customtext_help'] = 'Se você quiser que o certificado imprima nomes diferentes para o professor do que aqueles que são atribuídos ao curso com o papel de professor, não selecione Imprimir Professor ou qualquer imagem de assinatura, exceto para a imagem de linha. Digite os nomes dos professores nesta caixa de texto como você gostaria que eles aparecessem. Por padrão, esse texto será colocado no canto inferior esquerdo do certificado. Se esse for um certificado TRT15, este texto será colocado logo abaixo do nome do usuário para o qual foi emitido o certificado. As seguintes tags html estão disponíveis: &lt;br&gt;, &lt;p&gt;, &lt;b&gt;, &lt;i&gt;, &lt;u&gt;, &lt;img&gt; (src and width (or height) are mandatory), &lt;a&gt; (href is mandatory), &lt;font&gt; (possible attributes are: color, (hex color code), face, (arial, times, courier, helvetica, symbol)).'
        . '             <br/><br/>*Para o tipo de certificado TRT o texto padrão é o texto do corpo do certificado.';
$string['date'] = 'Em';
$string['datefmt'] = 'Formato da Data';
$string['datefmt_help'] = 'Escolha um formato de data a utilizar na impressão do certificado. Alternativamente pode-se escolher a última opção, para ter a data impressa no formato do idioma escolhido pelo usuário.';
$string['datehelp'] = 'Data';
$string['defaultcustomtext'] = 'Texto customizável exemplar';
$string['deletissuedcertrts'] = 'Apagar certificados emitidos';
$string['delivery'] = 'Entrega';
$string['delivery_help'] = 'Escolha aqui como você gostaria que os certificado sejam entregues ao seus alunos.
Abrir em uma nova janela: Abre o certificado em uma nova janela do navegador.
Forçar Download: Abre a janela do navegador para o download do arquivo.
Enviar por e-mail : Escolhendo esta opção envia o certificado para o aluno como um anexo de e-mail.
Após o recebimento do certificado pelo usuário, se ele acessar o link a partir da página do curso, ele cerá a data do recebimento do certificado, bem como serão capazes de rever o certificado recebido.';
$string['designoptions'] = 'Opções de design';
$string['download'] = 'Forçar download';
$string['emailcertrt'] = 'Enviar por e-mail (requer que a opção salvar esteja ativada!)';
$string['emailothers'] = 'Enviar e-mail a outros';
$string['emailothers_help'] = 'Digite aqui os endereços de e-mail das pessoas que devem ser alertadas com um e-mail, sempre que os alunos recebem um certificado. A Lista de e-mails deve ser separada por vírgulas.';
$string['emailstudenttext'] = 'Em anexo, está o seu certificado do curso {$a->course}.';
$string['emailteachers'] = 'Enviar e-mail aos professores';
$string['emailteachers_help'] = 'Se habilitado, os professores serão avisados ​​através de um e-mail sempre que os seus alunos receberem um certificado.';
$string['emailteachermail'] = '
O Aluno {$a->student} recebeu o seu certificado: \'{$a->certrt}\'
do curso {$a->course}.

Você pode revê-lo aqui:

{$a->url}';
$string['emailteachermailhtml'] = '
O Aluno {$a->student} recebeu o seu certificado: \'<i>{$a->certrt}</i>\'
do curso {$a->course}.

Você pode revê-lo aqui:

<a href="{$a->url}">Relatório de certificado</a>.';
$string['entercode'] = 'Digite o código do certificado para validação:';
$string['getcertrt'] = 'Obter o seu certificado';
$string['grade'] = 'Nota';
$string['gradedate'] = 'Data da nota';
$string['gradefmt'] = 'Formato da nota';
$string['gradefmt_help'] = 'Existem três formas disponíveis para a impressão da nota no certificado:

Porcentagem: imprime a nota como uma porcentagem.
Pontos: imprime o valor dos pontos atingidos no relatório de notas.
Conceito: Imprime o grau conceitual através de uma letra (A+, A, A-, etc..).';
$string['gradeletter'] = 'Conceito';
$string['gradepercent'] = 'Porcentagem';
$string['gradepoints'] = 'Pontos';
$string['imagetype'] = 'Tipo de Imagem';
$string['imagetype_help'] = 'Tamanhos preferenciais para imagens:
       <br><b> * BORDA:</b> Tamanho da P�gina: 1024x831
       <br><b> * COLUNA:</b> 400x2622
       <br><b> * SELO:</b> 80x80
       <br><b> * ASSINATURA:</b> 600x600
       <br><b> * MARCA D\'AGUA:</b> 400x400
       <br>Imagens com tamanhos diferentes podem ficar distorcidas.';
$string['incompletemessage'] = 'Para baixar o seu certificado, é necessário completar todas as atividades requeridas. Por favor retorne ao curso para completar o curso.';
$string['intro'] = 'Introdução';
$string['issueoptions'] = 'Opções de edição';
$string['issued'] = 'Emitido';
$string['issueddate'] = 'Data de emissão';
$string['landscape'] = 'Paisagem';
$string['lastviewed'] = 'Você recebeu este certificado em:';
$string['letter'] = 'Porta-retrato (carta)';
$string['lockingoptions'] = 'Opções de restrição';
$string['modulename'] = 'CerTRT';
$string['modulenameplural'] = 'CerTRTs';
$string['mycertrts'] = 'Meus certificados';
$string['nocertrts'] = 'Não há certificado algum.';
$string['nocertrtsissued'] = 'Nenhum certificado foi emitido até o momento';
$string['nocertrtsreceived'] = 'não recebeu certificado algum.';
$string['nogrades'] = 'Notas não disponíveis';
$string['notapplicable'] = 'N/A';
$string['notfound'] = 'O código do certificado não pode ser validado.';
$string['notissued'] = 'Não emitido';
$string['notissuedyet'] = 'Não emitido ainda';
$string['notreceived'] = 'Você não recebeu este certificado ainda';
$string['openbrowser'] = 'Abrir em uma nova janela';
$string['opendownload'] = 'Clique no botão abaixo para salvar o seu certificado no seu computador.';
$string['openemail'] = 'Clique no botão abaixo, e o seu certificado será enviado como anexo a você por e-mail.';
$string['openwindow'] = 'Clique no botão abaixo para abrir o seu certificado em nova janela do navegador.';
$string['or'] = 'Ou';
$string['orientation'] = 'Orientação';
$string['orientation_help'] = 'Escolher a orientação certificado entre retrato ou paisagem.';
$string['pluginadministration'] = 'Administração de certificado';
$string['pluginname'] = 'certrt';
$string['portrait'] = 'Porta-retrato';
$string['preview'] = 'Pré-Visualizar';
$string['printdate'] = 'Imprimir data';
$string['printdate_help'] = 'Esta é a data que será impressa, se uma data for adicionada à impressão. Se a data de conclusão do curso for selecionada, mas o aluno ainda não tiver concluído o curso, a data de recebimento será impressa. Você também pode optar por imprimir a data com base em quando uma atividade recebeu a nota. Se um certificado for emitido antes que a atividade receber uma nota, a data de recebimento será impressa.';
$string['printerfriendly'] = 'Página de impressão';
$string['printhours'] = 'Imprimir carga horária';
$string['printhours_help'] = 'Digite aqui o número de horas de crédito a ser impresso no certificado, como carga horária.';
$string['printgrade'] = 'Imprimir nota';
$string['printgrade_help'] = 'Você pode escolher qualquer atividade com nota disponível no curso, para imprimir como nota do certificado. As atividades disponíveis são listadas na ordem em que aparecem no relatório de notas. Escolha o formato da nota abaixo.';
$string['printnumber'] = 'Imprimir código';
$string['printnumber_help'] = 'Um código de 10 dígitos único de letras e números aleatórios pode ser impresso no certificado. Este número pode então ser verificado comparando-o com o número do código exibido no relatório certificados.';
$string['printoutcome'] = 'Imprimir resultado';
$string['printoutcome_help'] = 'Pode-se escolher qualquer informação de retorno das atividades do curso que o usuário recebeu, para imprimir no certificado. Um exemplo prático seroa: Resultado no curso: Proficiente.';
$string['printseal'] = 'Imprimir selo ou imagem de logomarca';
$string['printseal_help'] = 'Esta opção permite que você selecione um selo ou logotipo para ser impresso no certificado, dentre os disponíveis na pasta certrt/pix/seals. Por padrão, essa imagem é colocada no canto inferior direito do certificado.';
$string['printsignature'] = 'Imagem de assinatura';
$string['printsignature_help'] = 'Esta opção permite imprimir uma imagem de assinatura no certificado, contida na pasta certrt/pix/signatures. É possível imprimir uma representação gráfica de uma assinatura, ou imprimir uma linha para efetuar a assinatura manualmente, após sua impressão. Por padrão, essa imagem é disposta no canto inferior esquerdo do certificado.';
$string['printteacher'] = 'Imprimir o(s) nome(s) do(s) professor(es)';
$string['printteacher_help'] = 'Para imprimir o nome do professor no certificado, defina o papel de professor no nível do módulo certificado. Isto possibilita que mesmo havendo mais de um professor para o curso, ou se houver a disponibilização de mais de um certificado no curso onde pretende-se imprimir nomes de professor diferentes em cada certificado. Para isto, acesse a edição do certificado, e em seguida, clique na guia de papéis atribuídos localmente. Em seguida, atribua o papel de Professor (professor editor) ao certificado (lembrando que o usuário não precisa ser necessariamente um professor no curso - é possível atribuir esse papel qualquer pessoa). Esses nomes serão impressos no certificado para o professor.';
$string['printwmark'] = 'Imagem de marca d\'água';
$string['printwmark_help'] = 'Um arquivo de marca d\'água pode ser colocado no fundo do certificado. Uma marca d\'água é uma imagem com transparência. Uma marca d\'água pode ser um logotipo, um selo, um texto, ou o que você desejar usar como um detalhe na imagem de fundo.';
$string['receivedcerts'] = 'Certificados recebidos';
$string['receiveddate'] = 'Data de recebimento';
$string['removecert'] = 'Certificados emitidos removidos';
$string['report'] = 'Relatório';
$string['reportcert'] = 'Relatório detalhado de certificados';
$string['reportcert_help'] = 'Optando-se pela opção sim aqui, a data de recebimento deste certificado, o seu código, e o nome do curso será mostrado nos relatórios de certificado dos usuários. Se você optar por imprimir uma nota no certificado, então esta nota também aparecerá no relatório certificado.';
$string['reviewcertrt'] = 'Rever o seu certificado';
$string['savecert'] = 'Salvar certificados';
$string['savecert_help'] = 'Optando-se pela opção sim aqui, uma cópia dos certificados de cada usuário será salva na pasta do curso no formato PDF. Um link para cada certificado do usuário será exibido no relatório de certificado.';

// mhz - these strings belong to certrt backpage
$string['secondpage'] = 'Verso do certificado';
$string['secondpage_help'] = 'Insira neste espaço todo o texto que deve ser impresso no verso do certificado. Use a formatação do editor HTML para adequar a aparência do seu texto no verso do certificado. No momento da impressão, lembre-se de que a impressora deve estar configurada para impressão frente-e-verso, pois o certificado gerado é construído em duas (02) páginas.';

$string['sigline'] = 'Linha para assinatura manual';
$string['statement'] = 'completou o curso';
$string['summaryofattempts'] = 'Resumo dos certificados recebidos anteriormente';
$string['textoptions'] = 'Opções de texto';
$string['title'] = 'CERTIFICADO';
$string['to'] = 'Atribuído a';
$string['typeA4_embedded'] = 'A4 com fontes incorporadas';
$string['typeA4_non_embedded'] = 'A4 sem fontes incorporadas';
$string['typeletter_embedded'] = 'Carta com fontes incorporadas';
$string['typeletter_non_embedded'] = 'Carta sem fontes incorporadas';
$string['userdateformat'] = 'Formato de data da linguagem do usuário';
$string['validate'] = 'Validar';
$string['validationcode'] = 'Código de validação: {$a}';
$string['verifycertrt'] = 'Verificar Certificado';
$string['versedefaulthtml'] = "<br/><br/><p> </p><h2 style=\"text-align:center;\">CONTEUDISTAS</h2> <p style=\"text-align:center;\">...</p>" 
                . "<p> </p><h2 style=\"text-align:center;\">TUTORES</h2><p style=\"text-align:center;\">...</p>"
                . "<p> </p><h2 style=\"text-align:center;\">M&Oacute;DULOS</h2><div style=\"text-align:center;\">";
$string['viewcertrtviews'] = 'Ver {$a} certificados emitidos';
$string['viewed'] = 'Você recebeu este certificado em:';
$string['viewtranscript'] = 'Ver certificados';
$string['watermark'] = 'Marca dágua';