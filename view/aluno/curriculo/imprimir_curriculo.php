<?php

/* Preparação do conteúdo
 * (costumo ter uma função a realizar esta tarefa)
 */
session_start();
$html = '<p> Nome: '. $_SESSION['aluno']['Nome'].'</p>';
$html .= '
<p>O meu HTML como quero ver no navegador!</p>
<p>Já formatado e com CSS.</p>';



/* Preparação do documento final
 */
$documentTemplate = '
<!doctype html> 
<html> 
    <head>
        <link rel="stylesheet" media="screen" href="http://www.site.com/css/style.css" type="text/css">
    </head> 
    <body>
        <div id="wrapper">
            '.$html.'
        </div>
    </body> 
</html>';


// inclusão da biblioteca
require_once("../../../assets/dompdf/autoload.inc.php");
require("../../../assets/dompdf/vendor/autoload.php");

// reference the Dompdf namespace
use Dompdf\Dompdf;


// abertura de novo documento
$dompdf = new DOMPDF();

// carregar o HTML
$dompdf->load_html($documentTemplate);

// dados do documento destino
$dompdf->set_paper("A4", "portrail");

// gerar documento destino
$dompdf->render();

// enviar documento destino para download
$dompdf->stream("dompdf_out.pdf");

exit(0);
?>