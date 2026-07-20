<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?> <!-- Garante que o style.css continue carregando -->
</head>
<body <?php body_class(); ?>>

<main>
    <section class="login-valorant-page" data-aos="fade-in" data-aos-delay="200" data-aos-easing="ease-out-cubic">
        <div class="login-valorant-section">
            <h1 class="login-valorant-heading">Fazer login</h1>
            <div class="login-valorant--input-section">
                <input type="text" id="nome" name="nome" placeholder="Nome de usuário" autocomplete="off" required>
                <input type="password" id="senha" name="senha" placeholder="Senha" required>
                    <label class="checkbox-container" for="manter_login">
                    <input type="checkbox" name="manter_login" id="manter_login">
                    <span class="checkmark"><div class="icon-checkbox">✓</div></span>
                    Manter login
                </label>
            </div>
            <div class="login-valorant--icon-section">
                <a href="#"><i class="google-box fab fa-google"></i></a>
                <a href="#"><i class="facebook-box fab fa-facebook"></i></a>
                <a href="#"><i class="apple-box fab fa-apple"></i></a>
                <a href="#"><i class="xbox-box fab fa-xbox"></i></a>
                <a href="#"><i class="playstation-box fab fa-playstation"></i></a>
            </div>
            <button type="submit" class="submit-button"><span class="submit-icon">→</span></button>
            <div class="login-valorant--links">
                    <a href="<?php echo home_url('/criar-conta'); ?>">Criar uma conta</a>
            </div>
        </div>
            <div class="create-account--btn-back">
                <a class="btn--creat-acount" href="<?php echo home_url('/escolher-plataforma'); ?>">Voltar >></a>
            </div>
        </section>
    </main>

<?php wp_footer(); ?> <!-- Carrega os scripts do WordPress no final -->
</body>
</html>
