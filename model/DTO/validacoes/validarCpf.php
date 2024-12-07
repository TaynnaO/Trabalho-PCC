<?php
class ValidadorCPF
{
    public static function validar($cpf)
    {
        //Remove todos os caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        //Verifica se o número contém 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        //Verifica se todos os dígitos são iguais, o que não é um CPF válido
        if (preg_match('/^(\d)\1*$/', $cpf)) {
            return false;
        }

        //Calcula os dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $p = 0; $p < $t; $p++) {
                $d += $cpf[$p] * (($t + 1) - $p);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$t] != $d) {
                return false;
            }
        }
        return true;
    }

    public static function cpfJaCadastradoAdmin($cpf, $dbh)
    {
        //Remove todos os carateres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        //Prepara a consulta para verificar se o CPF já está cadastrado
        $query = "SELECT COUNT(*) FROM usuario_sistema WHERE CPF = ?";
        $stmt = $dbh->prepare($query);
        $stmt->execute([$cpf]);
        return $stmt->fetchColumn() > 0; //Retorna true se CPF já estiver cadastrado
    }

    public static function cpfJaCadastradoAluno($cpf, $dbh)
    {
        //Remove todos os carateres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        //Prepara a consulta para verificar se o CPF já está cadastrado
        $query = "SELECT COUNT(*) FROM aluno WHERE CPF = ?";
        $stmt = $dbh->prepare($query);
        $stmt->execute([$cpf]);
        return $stmt->fetchColumn() > 0; //Retorna true se CPF já estiver cadastrado
    }
}
?>