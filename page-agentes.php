<?php get_header(); ?>

<main class="main-agents">
    <section id="hero-agents" class="hero-agents">
        <div class="hero-agents__container">
            <h1 class="hero-agents__title" data-aos="fade-up" data-aos-delay="500" data-aos-easing="ease-out-cubic">Agentes</h1>
            <h2 class="hero-agents__subtitle" data-aos="fade-up" data-aos-delay="700" data-aos-easing="ease-out-cubic">Conheça os agentes de VALORANT</h2>
        </div>
    </section>
    <section class="agents-section">
        <div class="agents-section__container">
            <div id="agents-grid" class="agents-grid">
            <?php
                // Define onde está o arquivo JSON - na pasta do tema
                $caminho_json = get_template_directory() . '/agentes.json';
                
                // Verifica se o arquivo JSON existe para não dar erro fatal
                if (file_exists($caminho_json)) {
                    
                    // Verifica o conteúdo do arquivo e transforma em um Array do PHP
                    $json_data = file_get_contents($caminho_json);
                    $agentes = json_decode($json_data, true);

                    // Se conseguiu ler os agentes, inicia o Loop
                    if ($agentes) {
                        foreach ($agentes as $agente) : 
                            // Pega só o nome do arquivo ex: astra.avif
                            $nome_imagem = basename($agente['image_card']);
                            $url_imagem = get_template_directory_uri() . '/img/' . $nome_imagem;
                            ?>
                            <div class="agents-card" data-aos="fade-up">
                                <img src="<?php echo esc_url($url_imagem); ?>" 
                                     alt="<?php echo esc_attr($agente['name']); ?>" 
                                     class="agents-card__image">
                                <div class="agents-card__content">
                                    <h3 class="agents-card__name"><?php echo esc_html($agente['name']); ?></h3>
                                </div>
                            </div>
                        <?php endforeach;
                    } else {
                        // Caso o JSON esteja vazio ou com erro de formatação
                        echo '<p style="color: white; text-align: center;">Erro: O arquivo JSON está inválido.</p>';
                    }
                } else {
                    // Caso não tenha o arquivo na pasta do tema
                    echo '<p style="color: white; text-align: center;">Erro: Arquivo agentes.json não encontrado.</p>';
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>