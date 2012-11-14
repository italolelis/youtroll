<?php

return array(
    // Aplicação
    'name' => 'You Troll',
    'slogan' => 'Você, Trollando na Internet!',
    'author' => 'Grupo de Trolls da Faculdade Estácio - Fabiano, Ítalo, João e Rodolfo.',
    'description' => 'You Troll - O melhor site de Tirinhas da Internet!',
    'keywords' => 'imagens, engraçadas, tirinhas, memes, quadrinhos, trollagens, montagens',
    'powered' => '© 2012 You Troll - Todos os Direitos Reservados.',
    
    // Contact
    'contactEmail' => 'contato@youtroll.com.br',
    'jobsEmail' => 'oportunidades@youtroll.com.br',
    
    // Páginas Gerais - Visíveis a todos os usuários
    'home' => 'Início',
    'about' => 'Sobre',
    'terms' => 'Termos',
    'categories' => 'Categorias',
    'privacy' => 'Privacidade',
    
    // Páginas Abertas - Visíveis apenas para os visitantes
    'login' => 'Entrar',
    'signUp' => 'Cadastre-se',
    
    // Páginas Restritas - Vísivéis apenas para os usuários autenticados
    'logout' => 'Sair',
    'channel' => 'Canal',
    'myChannel' => 'Meu Canal',
    'sendPublication' => 'Enviar Imagem',
    'createPublication' => 'Criar Imagem',
    'controlPanel' => 'Painel de Controle',
    
    // Páginas Especiais - Visíveis apenas quando acessadas
    
    
    // Títulos
    'aboutTitle' => 'Diversão em um único lugar!',
    'privacyTitle' => 'Política de Privacidade',
    'termsTitle' => 'Termos e Condições de Uso do Serviço',
    'controlPanelTitle' => 'Painel de Controle do Usuário',
    
    // Linguagens
    'pt_br' => 'Português do Brasil',
    
    // Textos Curtos
    'like' => 'Gostei',
    'remove' => 'Remover',
    'license' => 'Licença',
    'unlike' => 'Não Gostei',
    'share' => 'Compartilhar',
    'top' => 'Voltar ao Topo',
    'myImages' => 'Meus Envios',
    'comments' => 'Comentários',
    'loading' => 'Carregando...',
    'subscribe' => 'Inscrever-se',
    'settings' => 'Configurações',
    'inscriptions' => 'Inscrições',  
    'mySessions' => 'Minhas Sessões',
    'recentPublications' => 'Recentes',
    'popularPublications' => 'Populares',
    'accessAccount' => 'Acesse sua Conta',
    'accountStats' => 'Estatísticas da Conta',
    'publicationDate' => 'Publicado dia {date}.',
    'mostViewedPublications' => 'Mais Visualizadas',
    'lessViewedPublications' => 'Menos Visualizadas',
    'defaultLicense' => 'Licença Padrão do YouTroll.',
    'publicationDateWithName' => 'Publicado dia {date} por {name}.',
    'guest' => '<strong>{login}</strong> ou <strong>{signUp}</strong> agora!',
    'publicationStats' => "{likes} pessoas gostaram e {unlikes} não gostaram.",
    
    // Enums
    'male' => 'Masculino',
    'female' => 'Feminino',
    
    // Formulários
    'loginForm' => 'Acesse sua Conta',
    'signUpForm' => 'Formulário de Cadastro',
    
    // Formulários - Botões
    'signUpButton' => 'Cadastrar',
    'loginButton' => 'Acessar Conta',
    'sendPublicationButton' => 'Publicar Imagem',
    
    // Formulários - Labels
    'email' => 'E-mail',
    'password' => 'Senha',
    'username' => 'Nome de Usuário',
    'rememberMe' => 'Continuar Conectado',
    'title' => 'Título',
    'description' => 'Descrição',
    'image' => 'Imagem',
    'category' => 'Categoria',
    'tags' => 'Tags',
    
    // Formulários - Respostas
    'signUpDone' => 'Cadastro finalizado com sucesso!',
    
    // Formulários - Erros
    'emailInvalid' => 'E-mail inválido.',
    'imageUnselected' => 'Selecione uma imagem.',
    'invalidCharacters' => 'Caracteres inválidos.',
    'requiredField' => 'Este campo é obrigatório.',
    'invalidAccess' => 'Dados de acesso inválidos.',
    'invalidOption' => 'A opção selecionada não existe.',
    'lenght' => 'Este campo, deve ter {lenght} caracteres.',
    'tooLarge' => 'O arquivo deve ter no máximo: {maxSizeFile}.',
    'tooLong' => 'Este campo, deve ter no máximo {max} caracteres.',
    'tooShort' => 'Este campo, deve ter no mínimo {min} caracteres.',
    'tooMany' => 'Você pode enviar no máximo {maxFiles} arquivo(s).',
    'wrongType' => 'O tipo do arquivo enviado não é suportado. Os tipos permitidos são: {types}.',
    'invalidTags' => 'As TAGs devem ser separadas por "," e não devem conter caracteres especiais.',
    'passwordStrength' => 'A senha deve ter 8 caracteres, letras (maiúsculas e minúsculas), números e caracteres especiais.',
    
    // Extensão EAjaxUpload
    'eauEmptyFile' => 'O arquivo está vazio.',
    'eauSizeLimit' => 'O arquivo enviado é muito grande.',
    'eauAnyUploadedFile' => 'Nenhum arquivo foi enviado.',
    'eauMaxFiles' => 'Você pode enviar no máximo 1 arquivo.',
    'eauNotWritable' => 'O diretório não possuí permissão de escrita.',
    'eauTooLarge' => 'O tamanho do arquivo é superior ao máximo suportado.',
    'eauSizeError' => 'O arquivo <strong>{file}</strong> deve ter no máximo: {sizeLimit}.',
    'eauTypeError' => 'O tipo do arquivo é inválido. Os tipos permitidos são: {extensions}.',
    'eauMinSizeError' => 'O arquivo <strong>{file}</strong> deve ter no mínimo: {minSizeLimit}.',
    'eauUnsavedFile' => 'O envio foi cancelado, ou ocorreu algum erro desconhecido no servidor.',
    'eauOnLeave' => 'O envio do(s) arquivo(s) já foi(ram) iniciado(s), se você sair agora, tudo será cancelado.',
    'eauTypeError' => 'O tipo do arquivo <strong>{file}</strong> não é suportado. Os tipos permitidos são: {extensions}.',
    'eauEmptyError' => 'O arquivo <strong>{file}</strong> está vazio. Por favor, selecione outro arquivo ou tente novamente.',
    
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