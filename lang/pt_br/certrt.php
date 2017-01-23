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

$string['addlinklabel'] = 'Adicionar outra opÃ§Ã£o de atividade lincada.';
$string['addlinktitle'] = 'Clique para adicionar outra opÃ§Ã£o de atividade lincada';
$string['areaintro'] = 'IntroduÃ§Ã£o do certificado';
$string['awarded'] = 'AtribuÃ­do';
$string['awardedto'] = 'AtribuÃ­do a';
$string['back'] = 'Voltar';
$string['border'] = 'Moldura';
$string['borderblack'] = 'Preto';
$string['borderblue'] = 'Azul';
$string['borderbrown'] = 'Marron';
$string['bordercolor'] = 'Linhas de borda';
$string['bordercolor_help'] = 'Como as imagens podem aumentar substancialmente o tamanho de um arquivo PDF, Ã© possÃ­vel desenhar linhas de borda ao invÃ©s de utilizar uma imagem de borda. (Tenha certeza que a opÃ§Ã£o de imagem de Borda esteja selecionada com a opÃ§Ã£o Nenhuma Borda). A opÃ§Ã£o de Linhas de Borda irÃ¡ imprimir bordas de trÃªs linhas de larguras variadas na cor escolhida.';
$string['bordergreen'] = 'Verde';
$string['borderlines'] = 'Linhas';
$string['borderstyle'] = 'Imagem de Borda';
$string['borderstyle_help'] = 'A opÃ§Ã£o de Imagem de Borda permite que se escolha entre as imagens disponÃ­veis no diretÃ³rio certrt/pix/borders. Selecione a imagem de borda que vocÃª deseja ao redor do seu certificado, ou escolha Nenhuma Borda.';
$string['certrt:view'] = 'Ver certificado';
$string['certrt:manage'] = 'Configurar certificado';
$string['certrt:printteacher'] = 'Imprimir professor';
$string['certrt:student'] = 'Obter certificado';
$string['certrt'] = 'VerificaÃ§Ã£o de cÃ³digo do certificado:';
$string['certrtname'] = 'Nome do certificado';
$string['certrtreport'] = 'RelatÃ³rio de certificados';
$string['certrtsfor'] = 'Certificados de';
$string['certrttype'] = 'Tipo de certificado';
$string['certrttype_help'] = 'Aqui define-se qual o layout desejado para o certificado. A pasta type do mÃ³dulo certificado inclui quatro certificados padrÃ£o:
A4 com fontes incorporadas, que imprime em papel tamanho A4, com as fontes inclusas no arquivo.
A4 sem fontes incorporados, que imprime em papel tamanho A4, sem incluir as fontes ao arquivo.
Carta com fontes incorporadas, que imprime em papel tamanho carta, com as fontes inclusas no arquivo.
Carta sem fontes incorporados, que imprime em papel tamanho carta, sem incluir as fontes ao arquivo.

Os tipos sem fontes incorporadas usam as fontes Helvetica e Times.
Se vocÃª nÃ£o tiver certeza que seus usuÃ¡rios terÃ£o essas fontes nos seus computadores, ou se o seu idioma
utiliza caracteres ou sÃ­mbolos que nÃ£o sÃ£o inclusos nas fontes Helvetica e Times, recomenda-se optar por
um tipo com fontes incorporadas. Os tipos com fontes incorporadas usam as fontes Dejavusans e Dejavuserif.
Esta opÃ§Ã£o criarÃ¡ arquivos pdf significativamente maiores, portanto nÃ£o recomenda-se o uso de um tipo com
fontes incorporadas, a menos que vocÃª julgue necessÃ¡rio.

Pastas como novos tipos de layouts podem ser adicionadas a pasta certrt/type. O nome da pasta e
quaisquer novas palavras traduzidas para estes novos tipos devem ser adicionadas aos arquivos de idiomas
do mÃ³dulo certificado.';
$string['certify'] = 'Esta escola certifica que';
$string['certdateformat'] = '%d de %B de %Y.';
$string['code'] = 'CÃ³digo';
$string['column'] = "Coluna";
$string['columnimage'] = "Imagem de Coluna";
$string['columnimage_help'] = "Imagem de coluna para uso exclusivo do certificado do tipo TRT.";
$string['completiondate'] = 'TÃ©rmino do Curso';
$string['course'] = 'Pelo Curso';
$string['coursegrade'] = 'Nota no curso';
$string['coursename'] = 'Curso';
$string['coursetimereq'] = 'Tempo requerido em minutos';
$string['coursetimereq_help'] = 'Insira a quantidade mÃ­nima de minutos que um aluno deve ter logado no curso antes de estar apto a receber o certificado.';
$string['credithours'] = 'Carga horÃ¡ria';
$string['credithourstype'] = 'horas-aula';
$string['customtext'] = 'Texto padrÃ£o';
$string['customtext_help'] = 'Se vocÃª quiser que o certificado imprima nomes diferentes para o professor do que aqueles que sÃ£o atribuÃ­dos ao curso com o papel de professor, nÃ£o selecione Imprimir Professor ou qualquer imagem de assinatura, exceto para a imagem de linha. Digite os nomes dos professores nesta caixa de texto como vocÃª gostaria que eles aparecessem. Por padrÃ£o, esse texto serÃ¡ colocado no canto inferior esquerdo do certificado. Se esse for um certificado TRT15, este texto serÃ¡ colocado logo abaixo do nome do usuÃ¡rio para o qual foi emitido o certificado. As seguintes tags html estÃ£o disponÃ­veis: &lt;br&gt;, &lt;p&gt;, &lt;b&gt;, &lt;i&gt;, &lt;u&gt;, &lt;img&gt; (src and width (or height) are mandatory), &lt;a&gt; (href is mandatory), &lt;font&gt; (possible attributes are: color, (hex color code), face, (arial, times, courier, helvetica, symbol)).'
        . '             <br/><br/>*Para o tipo de certificado TRT o texto padrÃ£o Ã© o texto do corpo do certificado.';
$string['date'] = 'Em';
$string['datefmt'] = 'Formato da Data';
$string['datefmt_help'] = 'Escolha um formato de data a utilizar na impressÃ£o do certificado. Alternativamente pode-se escolher a Ãºltima opÃ§Ã£o, para ter a data impressa no formato do idioma escolhido pelo usuÃ¡rio.';
$string['datehelp'] = 'Data';
$string['defaultcustomtext'] = 'Texto customizÃ¡vel exemplar';
$string['deletissuedcertrts'] = 'Apagar certificados emitidos';
$string['delivery'] = 'Entrega';
$string['delivery_help'] = 'Escolha aqui como vocÃª gostaria que os certificado sejam entregues ao seus alunos.
Abrir em uma nova janela: Abre o certificado em uma nova janela do navegador.
ForÃ§ar Download: Abre a janela do navegador para o download do arquivo.
Enviar por e-mail : Escolhendo esta opÃ§Ã£o envia o certificado para o aluno como um anexo de e-mail.
ApÃ³s o recebimento do certificado pelo usuÃ¡rio, se ele acessar o link a partir da pÃ¡gina do curso, ele cerÃ¡ a data do recebimento do certificado, bem como serÃ£o capazes de rever o certificado recebido.';
$string['designoptions'] = 'OpÃ§Ãµes de design';
$string['download'] = 'ForÃ§ar download';
$string['emailcertrt'] = 'Enviar por e-mail (requer que a opÃ§Ã£o salvar esteja ativada!)';
$string['emailothers'] = 'Enviar e-mail a outros';
$string['emailothers_help'] = 'Digite aqui os endereÃ§os de e-mail das pessoas que devem ser alertadas com um e-mail, sempre que os alunos recebem um certificado. A Lista de e-mails deve ser separada por vÃ­rgulas.';
$string['emailstudenttext'] = 'Em anexo, estÃ¡ o seu certificado do curso {$a->course}.';
$string['emailteachers'] = 'Enviar e-mail aos professores';
$string['emailteachers_help'] = 'Se habilitado, os professores serÃ£o avisados â€‹â€‹atravÃ©s de um e-mail sempre que os seus alunos receberem um certificado.';
$string['emailteachermail'] = '
O Aluno {$a->student} recebeu o seu certificado: \'{$a->certrt}\'
do curso {$a->course}.

VocÃª pode revÃª-lo aqui:

{$a->url}';
$string['emailteachermailhtml'] = '
O Aluno {$a->student} recebeu o seu certificado: \'<i>{$a->certrt}</i>\'
do curso {$a->course}.

VocÃª pode revÃª-lo aqui:

<a href="{$a->url}">RelatÃ³rio de certificado</a>.';
$string['entercode'] = 'Digite o cÃ³digo do certificado para validaÃ§Ã£o:';
$string['getcertrt'] = 'Obter o seu certificado';
$string['grade'] = 'Nota';
$string['gradedate'] = 'Data da nota';
$string['gradefmt'] = 'Formato da nota';
$string['gradefmt_help'] = 'Existem trÃªs formas disponÃ­veis para a impressÃ£o da nota no certificado:

Porcentagem: imprime a nota como uma porcentagem.
Pontos: imprime o valor dos pontos atingidos no relatÃ³rio de notas.
Conceito: Imprime o grau conceitual atravÃ©s de uma letra (A+, A, A-, etc..).';
$string['gradeletter'] = 'Conceito';
$string['gradepercent'] = 'Porcentagem';
$string['gradepoints'] = 'Pontos';
$string['imagetype'] = 'Tipo de Imagem';
$string['imagetype_help'] = 'Tamanhos preferenciais para imagens:
       <br><b> * BORDA:</b> Tamanho da Página: 1024x831
       <br><b> * COLUNA:</b> 400x2622
       <br><b> * SELO:</b> 80x80
       <br><b> * ASSINATURA:</b> 600x600
       <br><b> * MARCA D\'AGUA:</b> 400x400
       <br>Imagens com tamanhos diferentes podem ficar distorcidas.';
$string['incompletemessage'] = 'Para baixar o seu certificado, Ã© necessÃ¡rio completar todas as atividades requeridas. Por favor retorne ao curso para completar o curso.';
$string['intro'] = 'IntroduÃ§Ã£o';
$string['issueoptions'] = 'OpÃ§Ãµes de ediÃ§Ã£o';
$string['issued'] = 'Emitido';
$string['issueddate'] = 'Data de emissÃ£o';
$string['landscape'] = 'Paisagem';
$string['lastviewed'] = 'VocÃª recebeu este certificado em:';
$string['letter'] = 'Porta-retrato (carta)';
$string['lockingoptions'] = 'OpÃ§Ãµes de restriÃ§Ã£o';
$string['modulename'] = 'CerTRT';
$string['modulenameplural'] = 'CerTRTs';
$string['mycertrts'] = 'Meus certificados';
$string['nocertrts'] = 'NÃ£o hÃ¡ certificado algum.';
$string['nocertrtsissued'] = 'Nenhum certificado foi emitido atÃ© o momento';
$string['nocertrtsreceived'] = 'nÃ£o recebeu certificado algum.';
$string['nogrades'] = 'Notas nÃ£o disponÃ­veis';
$string['notapplicable'] = 'N/A';
$string['notfound'] = 'O cÃ³digo do certificado nÃ£o pode ser validado.';
$string['notissued'] = 'NÃ£o emitido';
$string['notissuedyet'] = 'NÃ£o emitido ainda';
$string['notreceived'] = 'VocÃª nÃ£o recebeu este certificado ainda';
$string['openbrowser'] = 'Abrir em uma nova janela';
$string['opendownload'] = 'Clique no botÃ£o abaixo para salvar o seu certificado no seu computador.';
$string['openemail'] = 'Clique no botÃ£o abaixo, e o seu certificado serÃ¡ enviado como anexo a vocÃª por e-mail.';
$string['openwindow'] = 'Clique no botÃ£o abaixo para abrir o seu certificado em nova janela do navegador.';
$string['or'] = 'Ou';
$string['orientation'] = 'OrientaÃ§Ã£o';
$string['orientation_help'] = 'Escolher a orientaÃ§Ã£o certificado entre retrato ou paisagem.';
$string['pluginadministration'] = 'AdministraÃ§Ã£o de certificado';
$string['pluginname'] = 'certrt';
$string['portrait'] = 'Porta-retrato';
$string['preview'] = 'PrÃ©-Visualizar';
$string['preview_2nd_page_default'] = 'Conteudo do verso da pagina';
$string['printdate'] = 'Imprimir data';
$string['printdate_help'] = 'Esta Ã© a data que serÃ¡ impressa, se uma data for adicionada Ã  impressÃ£o. Se a data de conclusÃ£o do curso for selecionada, mas o aluno ainda nÃ£o tiver concluÃ­do o curso, a data de recebimento serÃ¡ impressa. VocÃª tambÃ©m pode optar por imprimir a data com base em quando uma atividade recebeu a nota. Se um certificado for emitido antes que a atividade receber uma nota, a data de recebimento serÃ¡ impressa.';
$string['printerfriendly'] = 'PÃ¡gina de impressÃ£o';
$string['printhours'] = 'Imprimir carga horÃ¡ria';
$string['printhours_help'] = 'Digite aqui o nÃºmero de horas de crÃ©dito a ser impresso no certificado, como carga horÃ¡ria.';
$string['printgrade'] = 'Imprimir nota';
$string['printgrade_help'] = 'VocÃª pode escolher qualquer atividade com nota disponÃ­vel no curso, para imprimir como nota do certificado. As atividades disponÃ­veis sÃ£o listadas na ordem em que aparecem no relatÃ³rio de notas. Escolha o formato da nota abaixo.';
$string['printnumber'] = 'Imprimir cÃ³digo';
$string['printnumber_help'] = 'Um cÃ³digo de 10 dÃ­gitos Ãºnico de letras e nÃºmeros aleatÃ³rios pode ser impresso no certificado. Este nÃºmero pode entÃ£o ser verificado comparando-o com o nÃºmero do cÃ³digo exibido no relatÃ³rio certificados.';
$string['printoutcome'] = 'Imprimir resultado';
$string['printoutcome_help'] = 'Pode-se escolher qualquer informaÃ§Ã£o de retorno das atividades do curso que o usuÃ¡rio recebeu, para imprimir no certificado. Um exemplo prÃ¡tico seroa: Resultado no curso: Proficiente.';
$string['printseal'] = 'Imprimir selo ou imagem de logomarca';
$string['printseal_help'] = 'Esta opÃ§Ã£o permite que vocÃª selecione um selo ou logotipo para ser impresso no certificado, dentre os disponÃ­veis na pasta certrt/pix/seals. Por padrÃ£o, essa imagem Ã© colocada no canto inferior direito do certificado.';
$string['printsignature'] = 'Imagem de assinatura';
$string['printsignature_help'] = 'Esta opÃ§Ã£o permite imprimir uma imagem de assinatura no certificado, contida na pasta certrt/pix/signatures. Ã‰ possÃ­vel imprimir uma representaÃ§Ã£o grÃ¡fica de uma assinatura, ou imprimir uma linha para efetuar a assinatura manualmente, apÃ³s sua impressÃ£o. Por padrÃ£o, essa imagem Ã© disposta no canto inferior esquerdo do certificado.';
$string['printteacher'] = 'Imprimir o(s) nome(s) do(s) professor(es)';
$string['printteacher_help'] = 'Para imprimir o nome do professor no certificado, defina o papel de professor no nÃ­vel do mÃ³dulo certificado. Isto possibilita que mesmo havendo mais de um professor para o curso, ou se houver a disponibilizaÃ§Ã£o de mais de um certificado no curso onde pretende-se imprimir nomes de professor diferentes em cada certificado. Para isto, acesse a ediÃ§Ã£o do certificado, e em seguida, clique na guia de papÃ©is atribuÃ­dos localmente. Em seguida, atribua o papel de Professor (professor editor) ao certificado (lembrando que o usuÃ¡rio nÃ£o precisa ser necessariamente um professor no curso - Ã© possÃ­vel atribuir esse papel qualquer pessoa). Esses nomes serÃ£o impressos no certificado para o professor.';
$string['printwmark'] = 'Imagem de marca d\'Ã¡gua';
$string['printwmark_help'] = 'Um arquivo de marca d\'Ã¡gua pode ser colocado no fundo do certificado. Uma marca d\'Ã¡gua Ã© uma imagem com transparÃªncia. Uma marca d\'Ã¡gua pode ser um logotipo, um selo, um texto, ou o que vocÃª desejar usar como um detalhe na imagem de fundo.';
$string['receivedcerts'] = 'Certificados recebidos';
$string['receiveddate'] = 'Data de recebimento';
$string['removecert'] = 'Certificados emitidos removidos';
$string['report'] = 'RelatÃ³rio';
$string['reportcert'] = 'RelatÃ³rio detalhado de certificados';
$string['reportcert_help'] = 'Optando-se pela opÃ§Ã£o sim aqui, a data de recebimento deste certificado, o seu cÃ³digo, e o nome do curso serÃ¡ mostrado nos relatÃ³rios de certificado dos usuÃ¡rios. Se vocÃª optar por imprimir uma nota no certificado, entÃ£o esta nota tambÃ©m aparecerÃ¡ no relatÃ³rio certificado.';
$string['reviewcertrt'] = 'Rever o seu certificado';
$string['savecert'] = 'Salvar certificados';
$string['savecert_help'] = 'Optando-se pela opÃ§Ã£o sim aqui, uma cÃ³pia dos certificados de cada usuÃ¡rio serÃ¡ salva na pasta do curso no formato PDF. Um link para cada certificado do usuÃ¡rio serÃ¡ exibido no relatÃ³rio de certificado.';

// mhz - these strings belong to certrt backpage
$string['secondpage'] = 'Verso do certificado';
$string['secondpage_help'] = 'Insira neste espaÃ§o todo o texto que deve ser impresso no verso do certificado. Use a formataÃ§Ã£o do editor HTML para adequar a aparÃªncia do seu texto no verso do certificado. No momento da impressÃ£o, lembre-se de que a impressora deve estar configurada para impressÃ£o frente-e-verso, pois o certificado gerado Ã© construÃ­do em duas (02) pÃ¡ginas.';

$string['sigline'] = 'Linha para assinatura manual';
$string['statement'] = 'completou o curso';
$string['summaryofattempts'] = 'Resumo dos certificados recebidos anteriormente';
$string['textoptions'] = 'OpÃ§Ãµes de texto';
$string['title'] = 'CERTIFICADO';
$string['to'] = 'AtribuÃ­do a';
$string['typeA4_embedded'] = 'A4 com fontes incorporadas';
$string['typeA4_non_embedded'] = 'A4 sem fontes incorporadas';
$string['typeletter_embedded'] = 'Carta com fontes incorporadas';
$string['typeletter_non_embedded'] = 'Carta sem fontes incorporadas';
$string['userdateformat'] = 'Formato de data da linguagem do usuÃ¡rio';
$string['validate'] = 'Validar';
$string['validationcode'] = 'CÃ³digo de validaÃ§Ã£o: {$a}';
$string['verifycertrt'] = 'Verificar Certificado';
$string['versedefaulthtml'] = "<br/><br/><p> </p><h2 style=\"text-align:center;\">CONTEUDISTAS</h2> <p style=\"text-align:center;\">...</p>" 
                . "<p> </p><h2 style=\"text-align:center;\">TUTORES</h2><p style=\"text-align:center;\">...</p>"
                . "<p> </p><h2 style=\"text-align:center;\">M&Oacute;DULOS</h2><div style=\"text-align:center;\">";
$string['viewcertrtviews'] = 'Ver {$a} certificados emitidos';
$string['viewed'] = 'VocÃª recebeu este certificado em:';
$string['viewtranscript'] = 'Ver certificados';
$string['watermark'] = 'Marca dÃ¡gua';
