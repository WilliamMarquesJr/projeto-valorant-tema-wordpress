<?php
function valorant_carregar_scripts() {
    // Carrega o CSS do FontAwesome
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');

    // Carrega o CSS do AOS
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');

    // Carrega o style.css
    wp_enqueue_style('valorant-style', get_stylesheet_uri());

    // Carrega o JS do AOS
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);

    // Carrega o script.js
    wp_enqueue_script('valorant-script', get_template_directory_uri() . '/script.js', array('aos-js'), null, true);
}

// Dá o gatilho para o WordPress executar a função
add_action('wp_enqueue_scripts', 'valorant_carregar_scripts');

// Funções básicas do tema
function valorant_configuracoes_tema() {
    // Habilita suporte a imagens destacadas
    add_theme_support('post-thumbnails');

    // Título dinâmico na aba do navegador (SEO)
    add_theme_support('title-tag');

    // Suporte para trocar a logo pelo painel do WordPress
    add_theme_support('custom-logo');

    // Suporte para o HTML 5
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Suporte para habilitar a criação de Menus pelo painel do WordPress
    register_nav_menus(array(
        'menu_principal' => 'Menu Principal do Topo',
        'menu_rodape' => 'Menu do Rodapé',
    ));
}

// pop up específico para a página de escolher plataforma
function carregar_popup_script() {
    // Verifica se estamos na página de slug 'escolher-plataforma'
    if (is_page('escolher-plataforma')) {
        wp_enqueue_script(
            'popup-especifico', 
            get_template_directory_uri() . '/popup-script.js', 
            array(), 
            '1.0', 
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'carregar_popup_script');

// Dá o gatilho para o WordPress executar a função de configurações
add_action('after_setup_theme', 'valorant_configuracoes_tema');

// Customização da tela de login do WordPress
// Injeta o CSS personalizado na tela de login
function valorant_login_style() {
    // Definindo caminhos dinâmicos
    $caminho_fundo = get_template_directory_uri() . '/img/valorant-banner-hero.png';
    $caminho_logo = get_template_directory_uri() . '/img/V_Lockup_Horizontal_Pos_Red.png';
    
echo '<style type="text/css">
    /* Fundo */
    body.login {
        background-image: url("' . $caminho_fundo . '") !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-color: #03030ca1 !important;
        background-blend-mode: multiply !important;
    }
    
    /* Logo */
    body.login h1 a {
        background-image: url("' . $caminho_logo . '") !important;
        background-size: contain !important;
        width: 320px !important;
        height: 80px !important;
    }

    /* Caixa de Login */
    body.login #loginform {
        background-color: rgba(15, 25, 35, 0.9) !important;
        border: 2px solid #ff4655 !important;
        box-shadow: 0 0 20px rgba(0,0,0,0.5) !important;
        padding: 24px !important;
    }

    /* Textos e Labels */
    body.login label {
        color: #ffffff !important;
        text-transform: uppercase !important;
    }

    /* Links abaixo do formulário */
    #nav a, #backtoblog a {
        color: #ffffff !important;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.8) !important;
    }

    /* Seletor de Idioma e Botão Change */
    /* Container do seletor */
    .login-language, .login-language label {
        color: #ffffff !important;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.8) !important;
    }

    #language-switcher .button {
        background-color: #ff4655 !important;
        border: 2px solid #ff4655 !important;
        color: #ffffff !important;
        text-transform: uppercase !important;
        font-weight: bold !important;
        text-shadow: none !important;
        border-radius: 0 !important;
        padding: 0 15px !important;
        height: 32px !important;
        cursor: pointer !important;
    }

    #language-switcher .button:hover {
        background-color: #ffffff !important;
        color: #ff4655 !important;
        border-color: #ffffff !important;
    }
</style>';
}
add_action('login_head', 'valorant_login_style');


// Função para criar páginas automaticamente ao ativar o tema
function valorant_instalar_paginas() {
    $paginas = array('Home', 'Agentes', 'Mapas', 'Notícias', 'Post', 'Escolher Plataforma', 'Criar Conta', 'Login');
    
    // Variável para guardar o ID da Home de forma segura
    $home_id = 0; 

    foreach ($paginas as $titulo) {
        // Verifica se a página já existe - na lixeira ou publicada
        $pagina_existe = get_page_by_title($titulo, OBJECT, 'page'); 
        
        if (!$pagina_existe) {
            // Se não existe, cria a página e já pega o ID dela instantaneamente
            $novo_id = wp_insert_post(array(
                'post_title'  => $titulo,
                'post_status' => 'publish',
                'post_type'   => 'page',
            ));
            
            // Se já existir uma home ou ela for criada agora, guardamos o ID dela para configurar como página inicial
            if ($titulo === 'Home' && !is_wp_error($novo_id)) {
                $home_id = $novo_id;
            }
        } else {
            // Se a página já existe e for a Home, pegamos o ID da existente
            if ($titulo === 'Home') {
                $home_id = $pagina_existe->ID;
            }
        }
    }
 
    // Se encontramos ou criamos a página "Home", configuramos ela como a página inicial do site
    if ($home_id > 0) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_id);
    }
}

// Dá o gatilho para o WordPress executar a função de instalação das páginas
add_action('after_switch_theme', 'valorant_instalar_paginas');