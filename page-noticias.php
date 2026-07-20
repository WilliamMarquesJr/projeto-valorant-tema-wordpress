<?php get_header(); ?>

<main class="news-page-main">
    <section id="news-page" class="new-page-section">
        <div class="news-page-section-container">
            <div class="news-page-heading_container">
                <h1 class="news-page-heading">Últimas Notícias</h1>
                <p class="news-page-description">Fique por dentro de todas as atualizações, notas de patch e novidades do universo de Valorant.</p>
            </div>
            <div class="news-page-container">
                <div id="news-grid-container" class="news-grid">
                <?php
    $caminho_json_posts = get_template_directory() . '/posts.json';
    
    if (file_exists($caminho_json_posts)) {
        $json_data_posts = file_get_contents($caminho_json_posts);
        $posts = json_decode($json_data_posts, true);

        if ($posts) {
            foreach ($posts as $post) : 
                $nome_imagem = basename($post['imagem']);
                $url_imagem = get_template_directory_uri() . '/img/' . $nome_imagem;
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
        } else {
            echo '<p style="color: white; text-align: center;">Nenhuma notícia encontrada.</p>';
        }
    } else {
        echo '<p style="color: white; text-align: center;">Erro: Arquivo posts.json não encontrado.</p>';
    }
    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>