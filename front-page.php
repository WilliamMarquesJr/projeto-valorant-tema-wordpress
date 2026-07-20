<?php get_header(); ?>
<main>
        <section class="hero">
            <h1 class="hero__title">DESAFIE OS LIMITES</h1>
            <div class="hero__scroll-indicator">
                <span class="hero__scroll-text">Role para continuar</span>
                <i class="fa-solid fa-angles-down hero__icon" style="color: #ffffff;"></i>
            </div>
        </section>

        <section id="new" class="section-news">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2 class="section-title" data-aos="fade-right" data-aos-delay="500" data-aos-easing="ease-out-cubic">ÚLTIMAS NOTÍCIAS</h2>
                    <a href="<?php echo home_url('/noticias'); ?>" class="section-link" data-aos="fade-left" data-aos-delay="500" data-aos-easing="ease-out-cubic">
                        Ir para todas as notícias
                        <i class="fa-solid fa-arrow-up-right-from-square section-link__icon"></i>
                    </a>
                </div>

                <div class="news-grid">
                    <div class="news-grid-container">
                        <div class="news-grid-cards">
                            <?php
    $caminho_json_posts = get_template_directory() . '/posts.json';
    
    if (file_exists($caminho_json_posts)) {
        $json_data_posts = file_get_contents($caminho_json_posts);
        $posts = json_decode($json_data_posts, true);

        if ($posts) {
            // Pega apenas as 3 primeiras notícias para a Home
            $ultimos_posts = array_slice($posts, 0, 3);

            foreach ($ultimos_posts as $post) : 
                $nome_imagem = basename($post['imagem']);
                $url_imagem = get_template_directory_uri() . '/img/' . $nome_imagem;
                // Formata a data de YYYY-MM-DD para DD/MM/YYYY igual seu JS fazia
                $data_formatada = date('d/m/Y', strtotime($post['data']));
                $link_post = home_url('/post/?id=' . $post['id']);
                ?>
                
                <!-- O CARD EXATAMENTE IGUAL AO SEU ORIGINAL -->
                <a href="<?php echo esc_url($link_post); ?>" class="card" style="text-decoration: none; color: inherit;" data-aos="fade-up">
                    <div class="card__image-container">
                        <img src="<?php echo esc_url($url_imagem); ?>" alt="<?php echo esc_attr($post['titulo']); ?>" class="card__image">
                    </div>
                    
                    <div class="card__content">
                        <span class="card__meta"><?php echo esc_html($post['categoria']); ?></span>
                        <span class="card__divider">|</span>
                        <span class="card__date"><?php echo esc_html($data_formatada); ?></span> 
                    </div>
                    
                    <h3 class="card__title"><?php echo esc_html($post['titulo']); ?></h3>
                    <p class="card__descritpion"><?php echo esc_html($post['resumo']); ?></p>
                </a>

            <?php endforeach;
        }
    }
    ?>
                        </div>     
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="ctaViper" class="container cta-1" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-delay="0">
            <div class="cta-1-container">
                <div class="cta-1-texto" data-aos="fade-left" data-aos-delay="0" data-aos-easing="ease-out-cubic">
                    <h2 data-aos="fade-left" data-aos-delay="0" data-aos-easing="ease-out-cubic">TEMPORADA 26, ATO I COMEÇA AGORA</h2>
                    <p data-aos="fade-left" data-aos-delay="200" data-aos-easing="ease-out-cubic">Descubra uma nova arma, um novo modo de jogo, skins, atualizações de mapa e muito mais. Cai dentro.</p>
                    <a target="_blank" href="https://www.youtube.com/watch?v=rffyZXX-A8k" class="btn btn--section"><span>Assista agora</span></a>
                </div>
            </div>
        </section>

        <section id="agents" class="agents">

            <span class="agents__bg-text">AGENTS</span>
            <span class="agents__float-arrow agents__float-arrow--right">></span>
            <span class="agents__float-arrow agents__float-arrow--left"><</span>

            <div class="container">
                <h2 class="agents__section-title section-title--dark" data-aos="fade-up" data-aos-delay="200" data-aos-easing="ease-in-sine">AGENTES VALORANT</h2>

                <div class="agents__grid">
                    <div class="agents__content" data-aos="fade-right" data-aos-delay="0" data-aos-easing="ease-in-sine">
                        <h3 class="agents__subtitle scroll-left">A CRIATIVIDADE É SUA MELHOR ARMA.</h3>
                        <p class="agents__description scroll-left">Mais do que armas e munição, VALORANT inclui agentes com habilidades adaptativas, rápidas e letais, que criam oportunidades para você exibir sua 
                        mecânica de tiro. Cada Agente é único, 
                        assim como os momentos de destaque de cada partida!</p>
                        <a class="btn btn--section" href="<?php echo home_url('/agentes'); ?>"><span>Ver todos os agentes</span></a>
                        <p class="agents__quote scroll-left">
                        “Quem está pronto para morrer por esta missão? Eu estou! Mas vocês sabem, estou trapaceando.”
                        <span class="agents__quote-author scroll-left">— Clove</span>
                        </p>
                    </div>
                    <div class="agents__image-wrapper" class="agents__content" data-aos="fade-left" data-aos-delay="0" data-aos-easing="ease-out-cubic"> <div class="agents__image-bg"></div></div>
                </div>
            </div>
        </section>

        <section id="maps">
            <span class="maps__bg-text">- - - -</span>
            <div class="container">
                <h2 class="maps__title" data-aos="fade-up" data-aos-delay="0" data-aos-easing="ease-out-cubic">SOBRE OS MAPAS</h2>
                <div class="maps__grid">
                    <div class="maps__box">
                        <div class="maps__text-glass" data-aos="fade-up" data-aos-delay="0" data-aos-easing="ease-out-cubic">
                            <h3 class="maps__box--subtitle" data-aos="fade-right" data-aos-delay="200" data-aos-easing="ease-out-cubic">BATALHE AO REDOR DO MUNDO</h3>
                            <p class="maps__box--description" data-aos="fade-left" data-aos-delay="400" data-aos-easing="ease-out-cubic">Cada mapa serve como um palco para mostrar sua criatividade. Os mapas são feitos sob medida para estratégias de equipe, jogadas espetaculares e 
                            momentos eletrizantes. Faça as jogadas que todo mundo vai tentar imitar no futuro!</p>
                            <a href="<?php echo home_url('/mapas'); ?>" class="btn btn--primary"><span>Ver todos os mapas</span></a>
                        </div>
                    </div>
                </div>
                <span class="maps__bg-text-2">- - - -</span>
            </div>
        </section>

        <section id="arsenal" class="arsenal">
            <div class="container">
            <div class="arsenal-heading-container">
                <h2 class="arsenal-heading" data-aos="fade-up" data-aos-delay="0" data-aos-easing="ease-out-cubic">Suas Armas</h2>
                <p class="arsenal-heading__description" data-aos="fade-up" data-aos-delay="200" data-aos-easing="ease-out-cubic">No Valorant, cada bala conta. Encontre a arma que se adapta ao seu estilo de jogo, 
                    desde pistolas táticas até fuzis de precisão devastadores. 
                    Personalize seu loadout com skins que deixam sua marca.</p>
            </div>
            <div class="section-button" data-aos="fade-left" data-aos-delay="400" data-aos-easing="ease-out-cubic">
                <button id="buttonVandal" class="vandal">Vandal</button>
                <button id="buttonPhantom" class="phantom">Phantom</button>
                <button id="buttonSheriff" class="sheriff">Sheriff</button>
            </div>
            <div class="section-cards" data-aos="fade-right" data-aos-delay="600" data-aos-easing="ease-out-cubic">
                <div id="card-vandal" class="card-1">
                    <img  src="<?php echo get_template_directory_uri(); ?>/img/vandal-default.png" alt="" class="weapon-card__img weapon-default">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/Valorant-Prime-Vandal-hd.png" alt="" class="weapon-card__img weapon-skin">
                </div>
                <div id="card-phantom" class="card-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/phantom-default.png" alt="" class="weapon-card__img weapon-default">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/Valorant-Spectrum-Collection-Phantom-HD.png" alt="" class="weapon-card__img weapon-skin">
                </div>
                <div id="card-sheriff" class="card-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/sheriff-default.png" alt="" id="sheriff-default" class="weapon-card__img weapon-default">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/Valorant-Protocol-Collection-Sheriff-HD.png" alt="" id="sheriff-skin" class="weapon-card__img weapon-skin">
                </div>
            </div>
            <div class="arsenal-card__disclaimer">
                <span class="arsenal-card__desktop-information">>> Passe o mouse sobre o card</span>
                <span class="arsenal-card__mobile-information">>> Clique no card para ver mais detalhes</span>
            </div>
            </div>
        </section>
</main>
<?php get_footer(); ?>