<?php get_header(); ?>

<main>
    <section class="create-account-valorant-page" data-aos="fade-in" data-aos-delay="200" data-aos-easing="ease-out-cubic">
        <div class="create-account-valorant-section">
            <h1 class="create-account-valorant-heading">Criar uma conta</h1>
                <div class="create-account-valorant--input-section">
                    <input type="text" id="nome" name="nome" placeholder="E-mail ou usuário" autocomplete="off" required>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                    <label class="checkbox-container" for="manter_login">
                        <input type="checkbox" name="manter_login" id="manter_login">
                        <span class="checkmark"><div class="icon-checkbox">✓</div></span>
                        Manter login
                    </label>
                </div>
                <div class="create-account-valorant--icon-section">
                    <a href="#"><i class="google-box fab fa-google"></i></a>
                    <a href="#"><i class="facebook-box fab fa-facebook"></i></a>
                    <a href="#"><i class="apple-box fab fa-apple"></i></a>
                    <a href="#"><i class="xbox-box fab fa-xbox"></i></a>
                    <a href="#"><i class="playstation-box fab fa-playstation"></i></a>
                </div>
                <button type="submit" class="submit-button"><span class="submit-icon">→</span></button>
                <div class="create-account-valorant--links">
                    <a href="/valorant-projeto/login">Já tem uma conta? Fazer Login</a>
                </div>
            </div>
            <div class="create-account--btn-back">
                <a class="btn--creat-acount" href="/valorant-projeto/escolher-plataforma">Voltar >></a>
            </div>
        </section>
    </main>

<?php get_footer(); ?>