<?php get_header(); ?>

<main class="main-agents">
    <section id="hero-agents" class="hero-agents">
        <div class="hero-maps__container">
            <h1 class="hero-agents__title" data-aos="fade-up" data-aos-delay="500" data-aos-easing="ease-out-cubic">Mapas</h1>
            <h2 class="hero-agents__subtitle" data-aos="fade-up" data-aos-delay="700" data-aos-easing="ease-out-cubic">Conheça os mapas de VALORANT</h2>
        </div>
    </section>
    <section class="agents-section">
        <div class="agents-section__container">
            <div id="maps-grid" class="agents-grid">
           <?php
// Lê o JSON
$caminho_json_mapas = get_template_directory() . '/mapas.json';

if (file_exists($caminho_json_mapas)) {
    $json_data_mapas = file_get_contents($caminho_json_mapas);
    $mapas = json_decode($json_data_mapas, true);

    if ($mapas) {
        foreach ($mapas as $mapa) {
            // Limpa o caminho da imagem como vínhamos fazendo
            $nome_imagem = basename($mapa['image_card']);
            $url_imagem = get_template_directory_uri() . '/img/' . $nome_imagem;

            // Renderiza o HTML exatamente como estava no seu JS
            echo '
            <div class="agents-card" data-aos="fade-up" data-aos-delay="100" data-aos-easing="ease-out-cubic">
                <img src="' . esc_url($url_imagem) . '" alt="Mapa ' . esc_attr($mapa['name']) . '" class="agents-card__image">
                <div class="agents-card__content">
                    <h3 class="agents-card__name">' . esc_html($mapa['name']) . '</h3>
                </div>
            </div>';
        }
    }
}
?>
            </div>
        </div>
    </section>

    <button id="scrollTopBtn" class="scroll-top" aria-label="Voltar ao topo">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
</main>

<?php get_footer(); ?>