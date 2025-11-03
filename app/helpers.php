<?php

if (!function_exists('diffForHumansPt')) {
    /**
     * Retorna o tempo decorrido em português brasileiro
     * Ex: "x minutos atrás" ao invés de "X minutes ago"
     */
    function diffForHumansPt($date)
    {
        $carbon = \Carbon\Carbon::parse($date)->locale('pt');
        $diff = $carbon->diffForHumans();
        
        // Traduzir para o formato brasileiro se necessário
        $translations = [
            'há ' => '',
            'há um minuto' => '1 minuto atrás',
            'há minutos' => 'minutos atrás',
            'há uma hora' => '1 hora atrás',
            'há horas' => 'horas atrás',
            'há um dia' => '1 dia atrás',
            'há dias' => 'dias atrás',
            'há uma semana' => '1 semana atrás',
            'há semanas' => 'semanas atrás',
            'há um mês' => '1 mês atrás',
            'há meses' => 'meses atrás',
            'há um ano' => '1 ano atrás',
            'há anos' => 'anos atrás',
            'há poucos segundos' => 'poucos segundos atrás',
            'em um minuto' => 'em 1 minuto',
            'em minutos' => 'em minutos',
            'em uma hora' => 'em 1 hora',
            'em horas' => 'em horas',
            'em um dia' => 'em 1 dia',
            'em dias' => 'em dias',
            'em uma semana' => 'em 1 semana',
            'em semanas' => 'em semanas',
            'em um mês' => 'em 1 mês',
            'em meses' => 'em meses',
            'em um ano' => 'em 1 ano',
            'em anos' => 'em anos',
        ];
        
        // Aplicar traduções
        $result = $diff;
        foreach ($translations as $search => $replace) {
            if (str_contains($result, $search)) {
                $result = str_replace($search, $replace, $result);
                break;
            }
        }
        
        // Se ainda não foi traduzido e contém números, adicionar "atrás"
        if (!str_contains($result, 'atrás') && !str_contains($result, 'em ')) {
            // Formato: "há X minutos" -> "X minutos atrás"
            if (preg_match('/há (\d+) (.*)/u', $result, $matches)) {
                $result = $matches[1] . ' ' . $matches[2] . ' atrás';
            } elseif (preg_match('/há um (.*)/u', $result, $matches)) {
                $result = '1 ' . $matches[1] . ' atrás';
            }
        }
        
        return $result;
    }
}

