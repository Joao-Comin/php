<?php

namespace sistema\Nucleo;

use Exception;
class Funcoes {

    public static function saudacao(): string {
        date_default_timezone_set('America/Sao_Paulo');
        $hora = date('H');

        $saudacao = match (true) {
            $hora >= 0 && $hora <= 5 => 'boa madrugada',
            $hora >= 6 && $hora <= 12 => 'bom dia',
            $hora >= 13 && $hora <= 18 => 'boa tarde',
            default => 'boa noite'
        };
        return $saudacao;
    }

    /**
     * Resume um texto
     *
     * @param string $texto texto para resumir
     * @param int $limite quantidade de caracteres
     * @param string $continue opcional - o que deve ser exibido ao final do resumo
     * @return string texto resumido
     */
    public static function resumirTexto(string $texto, int $limite, string $continue = '...'): string {
        $textoLimpo = trim(strip_tags($texto));
        if (mb_strlen($textoLimpo) <= $limite) {
            return $textoLimpo;
        }
        $resumirTexto = mb_substr($textoLimpo, 0, mb_strrpos(mb_substr($textoLimpo, 0, $limite), ' '));

        return $resumirTexto . $continue;
    }

    /**
     * Formata um valor
     * 
     * @param float $valor recebe um valor
     * @return string retorna uma string formatada com ponto(.) e com virgula(,)
     */
    public static function formatarValor(float $valor = null): string {
        return number_format(($valor ? $valor : 0), 2, ',', '.');
    }

    /**
     * Formata um número
     * 
     * @param int $numero recebe uma String número
     * @return string retorna uma string da função number_format, formatando o número com ponto(.)
     */
    public static function formatarNumero(int $numero = null): string {
        return number_format($numero ? $numero : 0, 0, '.', '.'); 
    }

    /**
     * Função que calcula o tempo decorrido desde a data fornecida até a data atual
     * 
     * @param string $data recebe uma data padrao americano (Y-m-d H:i:s)
     * @return string Retorna uma string que representa o tempo decorrido
     */
    public static function contarTempo(string $data): string {
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
        
        if ($segundos <= 60) {
            return 'agora';
        } else if ($minutos <= 60) {
            return $minutos == 1 ? 'há um minuto' : 'há ' . $minutos . ' minutos';
        } else if ($horas <= 24) {
            return $horas == 1 ? 'há uma hora' : 'há ' . $horas . ' horas';
        } else if ($dias <= 7) {
            return $dias == 1 ? 'há um dia' : 'há ' . $dias . ' dias';
        } else if ($semanas <= 4) {
            return $semanas == 1 ? 'há uma semana' : 'há ' . $semanas . ' semanas';
        } else if ($meses <= 12) {
            return $meses == 1 ? 'há um mês' : 'há ' . $meses . ' meses';
        } else {
            return $anos == 1 ? 'há um ano' : 'há ' . $anos . ' anos';
        }
    }

    /**
     * Função que Valida um Email com filter_validate_email
     * @param string $email recebe um email válido
     * @return bool retorna true se for válido, false caso contrário
     */
    public static function validarEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Valida a URL usando uma abordagem simples com str_contains.
     * 
     * @param string $url A URL a ser validada.
     * @return bool Retorna true se a URL for válida, e false caso contrário.
     */
    public static function validarUrl(string $url): bool {
        if (mb_strlen($url) < 9) {
            return false;
        }
        if (!str_contains($url, '.')) {
            return false;
        }
        return str_contains($url, 'http://') || str_contains($url, 'https://');
    }

    /**
     * Valida a URL usando o filtro FILTER_VALIDATE_URL.
     *
     * @param string $url A URL a ser validada.
     * @return bool Retorna true se a URL for válida, e false caso contrário.
     */
    public static function validarUrlComFiltro(string $url): bool {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * Função de Criação de uma URL localhost
     * 
     * @return bool retorna true se for localhost e false se não for
     */
    public static function localhost(): bool {
        $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
        return $servidor === 'localhost';
    }

    /**
     * Função URL
     * 
     * @param string $url recebe uma URL
     * @return string com o filtro e as configurações do sistema retorna um localhost com url
     */
    public static function url(?string $url = null): string {
        $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
        $ambiente = ($servidor === 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO);
    
        // Se $url é nulo ou vazio, pode retornar a URL base
        if (is_null($url) || $url === '') {
            return $ambiente . '/'; // Retorna o ambiente base
        }
    
        return str_starts_with($url, '/') ? $ambiente . $url : $ambiente . '/' . $url;
    }
    
    

    /**
     * Função dataAtual
     * 
     * @return string retorna uma string com a data atual formatada
     */
    public static function dataAtual(): string {
        $diaMes = date('d');
        $diaSemana = date('w');
        $Mes = date('n') - 1;
        $Ano = date('Y');

        $nomesDiasDaSemana = ['domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado'];
        $nomesDosMeses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

        return $nomesDiasDaSemana[$diaSemana] . ', ' . $diaMes . ' de ' . $nomesDosMeses[$Mes] . ' de ' . $Ano;
    }

    /**
     * Gera um "slug" a partir de uma string.
     *
     * @param string $string A string de entrada a ser convertida.
     * @return string O slug gerado a partir da string de entrada.
     */
    public static function slug(string $string): string {
        $mapa['a'] = 'ÀÁÂÃÄÅàáâãäåÆæÇçÈÉÊËèéêëÌÍÎÏìíîïÐÑñÒÓÔÕÖØòóôõöøÙÚÛÜùúûüÝýÿßŒœ!@#$%^&*()_+-={}[]|\:;"\'<>,.?/~`´`¨ª¬°§¶•◊™©®¤¢£¥¦≈≠';
        $mapa['b'] = 'AAAAAAaaaaaaAaCcEEEEeeeeIIIIiiiiDNnOOOOOOooooooUUUUuuuuYyyBOo';

        $slug = strtr(utf8_decode($string), utf8_decode($mapa['a']), $mapa['b']);
        $slug = strip_tags(trim($slug));
        $slug = str_replace(' ', '_', $slug);
        $slug = str_replace(['_____', '____', '___', '__', '_'], '_', $slug);

        return strtolower(utf8_decode($slug));
    }

    public static function limparNumero(string $numero): string {
        return preg_replace('/[^0-9]/', '', $numero);
    }

    public static function validarCpf(string $cpf): bool {
        $cpf = self::limparNumero($cpf);
        if (mb_strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
                
            throw new Exception('CPF precisa de 11 digitos');
        }
        for ($i = 9; $i < 11; $i++) {
            for ($j = 0, $c = 0; $c < $i; $c++) {
                $j += $cpf[$c] * (($i + 1) - $c);
            }
            $j = ((10 * $j) % 11) % 10;
            if ($cpf[$c] != $j) {
                throw new Exception('CPF Invalido');
            }
        }
        return true;
    }
    
    public static function redirecionar(string $url = null): void
    {
        header('HTTP/1.1 302 Found');

        $local = ($url ? self::url($url) : self::url());

        header("Location: {$local} ");

        exit;
    }
}
