<?php
require('../Assets/FPDF/fpdf.php');

//Conectar ao banco de dados
include_once('conexao.php');

//Consulta SQL para combinar dados das tabelas usuarios e extras
$query = "SELECT 
            usuarios.IDUser AS idUser, 
            usuarios.Cargo AS cargo, 
            usuarios.Login AS login, 
            usuarios.Senha AS senha, 
            extras.Cep AS cep, 
            extras.NomeMãe AS nomeMae, 
            extras.DTnascimento AS DTnascimento 
          FROM usuarios
          LEFT JOIN extras ON usuarios.IDUser = extras.IDUser";

$result = mysqli_query($conexao, $query);

//Criar instância do FPDF
$pdf = new FPDF();

//Definir margens
$pdf->SetMargins(10, 10, 10, 10);

//Adicionar página ao PDF
$pdf->AddPage('L');

//Definir fonte
$pdf->SetFont('Arial', 'B', 12);

//Adicionar cabeçalhos da tabela
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(30, 10, 'Cargo', 1);
$pdf->Cell(30, 10, 'Login', 1);
$pdf->Cell(30, 10, 'Senha', 1);
$pdf->Cell(30, 10, 'CEP', 1);
$pdf->Cell(80, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', 'Nome da Mãe'), 1);
$pdf->Cell(50, 10, 'Data de Nascimento', 1);
$pdf->Ln(); //Nova linha

//Loop pelos resultados da consulta e adicionar informações ao PDF
while ($row = mysqli_fetch_assoc($result)) {
    //Adicionar dados à tabela
    $pdf->Cell(20, 10, $row['idUser'], 1);
    $pdf->Cell(30, 10, $row['cargo'], 1);
    $pdf->Cell(30, 10, $row['login'], 1);
    $pdf->Cell(30, 10, $row['senha'], 1);
    $pdf->Cell(30, 10, $row['cep'] ?? 'N/A', 1); // Exibe 'N/A' caso o campo seja nulo
    $pdf->Cell(80, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $row['nomeMae'] ?? 'N/A'), 1);
    $pdf->Cell(50, 10, $row['DTnascimento'] ?? 'N/A', 1); // Exibe 'N/A' caso o campo seja nulo
    $pdf->Ln(); //Nova linha
}

//Saída do PDF
$pdf->Output('usuarios.pdf', 'D');
exit;
?>
