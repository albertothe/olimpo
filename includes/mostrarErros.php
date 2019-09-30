<?php
//error_reporting(0);
//ini_set(�display_errors�, 0 );
error_reporting(E_ALL);
#ini_set(�display_errors�, 1 );


/*


Definimos  de in�cio error_reporting para ser zero, com isso nenhum erro � reportado. Logo em seguida atribuimos ao display_errors 
o valor zero, poderia ser tamb�m true ou false, um e zero, respectivamente. O c�digo acima far� com que o PHP n�o exiba nenhum tipo 
de erro na tela. Para exibir todos os erros novamente utilize o c�digo abaixo:
[ mostra_erros.php ]
<?php
error_reporting(E_ALL);
ini_set(�display_errors�, 1 );
?>
Veremos a seguir, algumas outras combina��es, para ser exibido somente o erro desejado. Primeiro vamos entender o que cada erro mais comum do PHP quer dizer:
( Defini��es completas dispon�veis no manual PHP.net: )
E_ERROR: Estes indicam erros que n�o podem ser recuperados, como problemas de aloca��o de mem�ria. A execu��o do script � interrompida.
E_WARNING: Avisos em tempo de execu��o (erros n�o fatais). A execu��o do script n�o � interrompida.
E_PARSE: Erro em tempo de compila��o. Erros gerados pelo interpretador.
E_NOTICE: Indica que o script encontrou alguma coisa que pode indicar um erro, mas que tamb�m possa acontecer durante a execu��o normal do script.
E_STRICT: Permite ao PHP sugerir mudan�as ao seu c�digo as quais ir�o assegurar melhor interoperabilidade e compatibilidade futura do seu c�digo.
E_ALL: Todos erros e avisos, como suportado, exceto de n�vel E_STRICT
Caso voc� deseje exibir apenas os erros de tipo E_WARNING deve ser usado o seguinte c�digo:
[ mostra_erros.php ]
<?php
error_reporting(E_WARNING);
ini_set(�display_errors�, 1 );
?>
Observe que agora atribuimos ao display_errors o valor 1 ( true ), para reportamos apenas os erros E_WARNING, como definimos na fun��o error_reporting.
Podemos ainda utilizar as seguinte combina��es:
[ mostra_erros.php ]
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set(�display_errors�, 1 );
?>
Desta forma apenas os erros do tipo E_ERROR, E_WARNING e E_PARSE ser�o exibidos na tela. Uma outra forma seria:
[ mostra_erros.php ]
<?php
error_reporting(E_ALL ^ E_WARNING);
ini_set(�display_errors�, 1 );
?>
Com isso, todos os erros ser�o mostrados ( E_ALL ), com exce��o do E_WARNING.
J� temos nosso arquivo de configura��o ( mostra_erros.php ), agora basta chamar o arquivo de configura��o nas p�ginas em que gostaria de alterar a configura��o.
<?php
include �mostra_erros.php�;
?>
Adicione a �include� acima no inicio das p�ginas PHP,  para que seja definido os parametros antes da p�gina ser 
carregada. Quando precisar depurar algum erro nos c�digos, ou acrescentar 
mais linhas ao c�digo, basta alterar o arquivo mostra_erros.php e habilitar a exibi��o dos erros conforme foi apresentado nos exemplos acima.








 * 
 * 
 * 
 * 
 * */


?>