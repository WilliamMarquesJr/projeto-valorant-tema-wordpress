<?php 
// 1. Pega o ID da URL (ex: ?id=1)
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$post_atual = null;

// 2. Busca os dados no JSON
$caminho_json_posts = get_template_directory() . '/posts.json';
if (file_exists($caminho_json_posts)) {
    $json_data_posts = file_get_contents($caminho_json_posts);
    $posts = json_decode($json_data_posts, true);
    
    // Procura qual post tem o ID igual ao da URL
    if ($posts) {
        foreach ($posts as $p) {
            if ($p['id'] == $post_id) {
                $post_atual = $p;
                break;
            }
        }
    }
}

get_header(); 
?>

<main class="single-post-main">
    <div class="container">
        
        <?php if ($post_atual) : 
            // Prepara a imagem e a data originais do JSON
            $nome_imagem = basename($post_atual['imagem']);
            $url_imagem = get_template_directory_uri() . '/img/' . $nome_imagem;
            $data_formatada = date('d/m/Y', strtotime($post_atual['data']));
        ?>
            
            <article class="post-completo">
                
                <!-- Cabeçalho da Notícia -->
                <header class="post-completo__header" data-aos="fade-up">
                    <div style="color: #ff4655; font-weight: bold; margin-bottom: 10px; margin-top: 120px;">
                        <span><?php echo esc_html($post_atual['categoria']); ?></span>
                        <span style="color: white; margin: 0 10px;">|</span>
                        <span style="color: #000000;"><?php echo esc_html($data_formatada); ?></span>
                    </div>
                    
                    <h1 class="post-completo__title">
                        <?php echo esc_html($post_atual['titulo']); ?>
                    </h1>
                </header>

                <!-- Imagem da Notícia -->
                <div class="post-completo__image-container" data-aos="fade-up" data-aos-delay="200" style="margin-bottom: 40px;">
                    <img src="<?php echo esc_url($url_imagem); ?>" alt="<?php echo esc_attr($post_atual['titulo']); ?>" style="width: 100%; max-width: 700px; height: auto; border-radius: 8px;">
                </div>

                <!-- Conteúdo em LOREM IPSUM (Como solicitado) -->
                <div class="post-completo__content" data-aos="fade-up" data-aos-delay="200" style="font-size: 1.2rem; line-height: 1.8; color: #000000;">
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p>
                    <br>
                    <p>Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor.</p>
                    <br>
                    <p>Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit amet leo consequat posuere.</p>
                    
                    <?php 
                    /* 
                    Caso queira exibir o conteúdo real do post, descomente a linha abaixo e comente o conteúdo em Lorem Ipsum acima.
                    */
                    // echo wp_kses_post($post_atual['conteudo']); 
                    ?>
                </div>
                
                <!-- Botão Voltar -->
                <div style="margin-top: 50px; text-align: center;">
                    <a href="<?php echo home_url('/noticias'); ?>" style="display: inline-block; padding: 15px 30px; background-color: #ff4655; color: white; text-decoration: none; font-weight: bold; text-transform: uppercase; transition: 0.3s;">
                        &larr; Voltar para Todas as Notícias
                    </a>
                </div>

            </article>

        <?php else : ?>
            
            <!-- Caso alguém digite um ID que não existe na URL -->
            <div style="text-align: center; padding: 100px 0; color: white;">
                <h2>Notícia não encontrada.</h2>
                <a href="<?php echo home_url('/noticias'); ?>" style="color: #ff4655; text-decoration: underline;">Voltar para Notícias</a>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>