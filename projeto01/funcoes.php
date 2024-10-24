<?php
    function saudacao():string
    {
        date_default_timezone_set('America/Sao_Paulo');
        $hora = date('H');
        if($hora >= 0 && $hora<=5){
            $saudacao = 'Boa madrugada';
        }
        else if($hora >= 5&& $hora<= 12){
        $saudacao = 'Bom dia';
        }
        else if($hora >= 13 && $hora<= 18){
            $saudacao = 'Boa tarde';
        }
        else{
            $saudacao = 'Boa noite';
        }
        return $saudacao;
 }

 /**
  *  resume um texto
  *
  *@param string $texto texto para resumir
  * @param int $limite quantidade de caracteres
  * @param string $continue opcional - o que deve ser exibido ao final do resumo
  * @return string texto resumido
  */
 function resumirTexto(string $texto, int $limite, string $continue = '...'): string
{ 

    $textoLimpo = trim(strip_tags($texto));
    if(mb_strlen($textoLimpo) <= $limite){
        return $textoLimpo;
    }
    $resumirTexto = mb_substr($textoLimpo,0, mb_strrpos(mb_substr($textoLimpo,0,$limite),''));


    return $resumirTexto.$continue;
}

/**
 * Formata um valor
 * 
 * @param float $valor recebe um valor
 * @return string retorna uma string formatada com ponto(.) e com virgula(,)
 */
function formatarValor(float $valor = null):string{
    
    return number_format(($valor ? $valor : 0),2,',','.');
}

/**
 * Formata um número
 * @param int $numero recebe uma String número
 * @return string retorna uma string da função number_format, formantando o número com ponto(.)
 */
function formatarNumero(int $numero = null): string{
    return number_format($numero ? $numero : 0, 0, '.','.'); 
}

/**
 * Função que calcula o tempo decorrido desde a data fornecida até a data atual
 * 
 * @param string $data recebe uma data padrao americano (Y-m-d H:i:s)
 *                     Exemplo '2023-10-01 14:30:01
 * @return string  Retorna uma string que representa o tempo decorrido, como "há 5 minutos", "agora", etc.
 *               não apresenta mensagem de erro ao colocar uma data invalida, apenas retorna 0
 */
function contarTempo(string $data)
{
    $agora = strtotime(date('Y-m-d H:i:s'));
    $tempo = strtotime($data);
    $diferenca = $agora - $tempo;
    $segundos = $diferenca;
    $minutos = round($diferenca / 60);
    $horas = round($diferenca / 3600);
    $dias = round($diferenca / 86400);
    $semanas = round($diferenca / 604800);
    $meses = round($diferenca / 2419200);
    $anos = round($diferenca / 29030400);
    
    if($segundos <= 60){
        return 'agora';
    }
    else if($minutos <= 60){
        return $minutos == 1 ? 'há um minuto' : 'há '.$minutos.' minutos';
    }
    else if($horas <= 24){
        return $horas == 1 ? 'há uma hora' : 'há '.$horas.' horas';
    }
    else if($dias <= 7){
        return $dias == 1 ? 'há um dia' : 'há '.$dias.' dias';
    }
    else if($semanas <= 4){
        return $semanas == 1 ? 'há uma semana': 'há '.$semanas.' semanas';
    }
    else if($meses <= 12){
        return $meses == 1 ? 'há um mes' : 'há '.$meses.' meses';
    }
    else {
        return $anos == 1? 'há um ano': 'há '.$anos.' anos';
    }

}


/**
 * Função que Valida um Email com filter_validate_email
 * @param string $email recebe um email que precisa ter nome@email_qualquer.com                     
 *                      ex:joao@gmail.com -> true
 *                      ex:carlos@gmail -> false
 * @return bool retorna boolean se tiver no padrão e se nao retorna false
 */
function ValidarEmail(string $email): bool{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


/**
 * Valida a URL usando uma abordagem simples com str_contains.
 *
 * Verifica se a URL possui um comprimento mínimo, contém um ponto 
 * (.) e começa com http:// ou https://.
 *
 * @param string $url A URL a ser validada.
 * @return bool Retorna true se a URL for válida, e false caso contrário.
 * */
function validarUrl(string $url): bool
{
    if(mb_strlen($url) < 9){
        return false;
}
if(!str_contains($url,'.')){
    return false;
}
if(str_contains($url,'http://') or str_contains($url, 'https://')){
    return true;
}
return false;}

/**
 * Valida a URL usando o filtro FILTER_VALIDATE_URL.
 *
 * Utiliza filter_var para verificar se a URL é válida segundo 
 * os padrões do PHP.
 *
 * @param string $url A URL a ser validada.
 * @return bool Retorna true se a URL for válida, e false caso contrário.
 * */
function validarUrlComFiltro(string $url): bool
{
    return filter_var($url, FILTER_VALIDATE_URL);

}

/**
 * Função de Criação de uma URL localhost
 * @return bool retorna true se for localhost e false se não for
 */
function localhost():bool
{
    $servidor = filter_input(INPUT_SERVER,'SERVER_NAME');

    if($servidor == 'localhost')
    {
        return true;
    }
     return false;
}

/**
 * Função URL
 * @param string $url recebe uma url
 * @return string com o filtro e as configurações do sistema retorna um localhost com url
 */
function url(string $url): string
{
    $servidor = filter_input(INPUT_SERVER,'SERVER_NAME');
    $ambiente = (!$servidor == 'localhost' ? URL_DESENVOLVIMENTO: URL_PRODUCAO);

    if(str_starts_with($url, '/'))
    {
    return $ambiente.$url;
    }
    return $ambiente.'/'.$url;
}

/**
 * Função dataAtual
 * @return string retorna uma string vinda de arrays, que recebem um indice correspondente da data,semana,mes e ano atual.
 */
function dataAtual(): string
{
    $diaMes = date('d');
    $diaSemana = date('w');
    $Mes = date('n') -1;
    $Ano = date('Y');

    $nomesDiasDaSemana = ['domingo', 'segunda-feira','terça-feira', 'quarta-feira','quinta-feira','sexta-feira', 'sábado'];

    $nomesDosMeses = ['Janeiro','fevereiro','Março','Abril','Maio','Junho','Julho', 'Agosto','Setembro','Outubro','Novembro','Dezembro'];

    $dataFormatada = $nomesDiasDaSemana[$diaSemana].', '.$diaMes.' de '.$nomesDosMeses[$Mes].' de '.$Ano;
    
    return $dataFormatada;
}
/** 
* Gera um "slug" a partir de uma string.
*
* O slug é uma versão simplificada da string que remove acentos, caracteres especiais 
* e substitui espaços por sublinhados. A saída é convertida para letras minúsculas.
*
* @param string $string A string de entrada a ser convertida.
* @return string O slug gerado a partir da string de entrada.
*/
function slug(string $string):string
{
    $mapa['a'] = 'ÀÁÂÃÄÅàáâãäåÆæÇçÈÉÊËèéêëÌÍÎÏìíîïÐÑñÒÓÔÕÖØòóôõöøÙÚÛÜùúûüÝýÿßŒœ!@#$%^&*()_+-={}[]|\:;"\'<>,.?/~`´`¨ª¬°§¶•◊™©®¤¢£¥¦≈≠';

$mapa['b'] = 'AAAAAAaaaaaaAaCcEEEEeeeeIIIIiiiiDNnOOOOOOooooooUUUUuuuuYyyBOo                                                             ';

$slug = strtr( utf8_decode($string), utf8_decode($mapa['a']),$mapa['b'] );
$slug = strip_tags(trim($slug));
$slug = str_replace(' ','_', $slug);
$slug = str_replace(['_____','____','___','__','_'],'_', $slug);

    return strtolower(utf8_decode($slug));
}