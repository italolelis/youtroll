<?php

return array(
    // Aplicação
    'name' => 'You Troll',

    // Textos Curtos
    'welcome' => 'Bem-Vindo a API REST do You Troll!',

    // Formulários - Erros
//    'requiredField' => "O atributo '{attribute}' é obrigatório.",
//    'passwordStrength' => "O atributo '{attribute}' está com uma força baixa.",
//    'unique' => "O valor '{value}' do atributo '{attribute}', já está cadastrado.",
//    'invalidCharacters' => "O atributo '{attribute}' contém caracteres inválidos.",
//    'urlInvalid' => "O valor '{value}' do atributo '{attribute}', não é uma URL válida.",
//    'emailInvalid' => "O valor '{value}' do atributo '{attribute}', não é um e-mail válido.",
//    'tooLong' => "O valor '{value}' do atributo '{attribute}', deve ter no máximo {max} caracteres.",
//    'tooShort' => "O valor '{value}' do atributo '{attribute}', deve ter no mínimo {min} caracteres.",
//    'lenght' => "O valor '{value}' do atributo '{attribute}', deve ter exatamente {length} caracteres.",
    
    'emailInvalid' => 'E-mail inválido.',
    'unique' => "'{value}' já está cadastrado.",
    'invalidCharacters' => 'Caracteres inválidos.',
    'passwordStrength' => 'Força da senha baixa.',
    'requiredField' => 'Este campo é obrigatório.',
    'invalidAccess' => 'Dados de acesso inválidos.',
    'lenght' => 'Este campo, deve ter {lenght} caracteres.',
    'tooShort' => 'Este campo, deve ter no mínimo {min} caracteres.',
    'tooLong' => 'Este campo, deve ter no máximo {max} caracteres.',
    
    // Mensagens de Retorno
    'idUnknown' => 'A identificação fornecida não existe.',
    
    // Formatos
    'dateTimeFormat' => 'd/m/Y à\s H:i:s',
    
    // Erros HTTP
    200 => 'OK!',
    400 => 'Solicitação mal Feita.',
    401 => 'Acesso não Autorizado.',
    402 => 'Pagamento Obrigatório.',
    403 => 'Acesso Proibido.',
    404 => 'Página não Encontrada.',
    500 => 'Erro Interno do Servidor.',
    501 => 'Ação não Implementada.',
    503 => 'Serviço Indisponível.',
);