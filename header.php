<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <nav class="nav">
            <a href="<?php echo home_url(); ?>" class="logo-link">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo-site-valorant.png" alt="Logo do site que fica no menu principal" class="nav__logo">
            </a>
            <button class="nav__toggle" aria-label="Abrir menu de navegação">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="nav__list">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-site-valorant.png" alt="Logo do site que fica no menu principal" class="nav__logo--desktop">
                </a>
                <li class="nav__item"><a href="<?php echo home_url(); ?>" class="nav__link"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-site-valorant.png" alt="Logo do site que fica no menu principal" class="nav__logo"></a></li>
                <li class="nav__item"><a href="<?php echo home_url(); ?>/#new" class="nav__link">Notícias</a></li>
                <li class="nav__item"><a href="<?php echo home_url(); ?>/#agents" class="nav__link">Agentes</a></li>
                <li class="nav__item"><a href="<?php echo home_url(); ?>/#maps" class="nav__link">Mapas</a></li>
                <li class="nav__item"><a href="<?php echo home_url(); ?>/#arsenal" class="nav__link">Arsenal</a></li>
                <a href="<?php echo home_url('/escolher-plataforma'); ?>" class="btn btn--primary"><span class="btn__text">Jogue Agora</span></a>
            </ul>
            <a href="<?php echo home_url('/escolher-plataforma'); ?>" class="btn btn--primary__query"><span class="btn__text">Jogue Agora</span></a>
        </nav>
    </header>