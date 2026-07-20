<?php get_header(); ?>

<main>
    <section class="hero-plataform">
        <h1 class="hero-plataform__title" data-aos="fade-right" data-aos-delay="200" data-aos-easing="ease-out-cubic">ESCOLHA SUA PLATAFORMA</h1>
        <div class="hero-plataform__buttons">
            <button class="hero-plataform__button--popup popup-pc" data-aos="fade-right" data-aos-delay="300" data-aos-easing="ease-out-cubic"><i class="fa-solid fa-desktop"></i>PC</button>
            <a class="hero-plataform__button" href="https://www.xbox.com/pt-BR/games/store/valorant/9N1NLJK9SKRN" target="_blank" data-aos="fade-right" data-aos-delay="600" data-aos-easing="ease-out-cubic"><i class="fa-brands fa-xbox"></i>Xbox</a>
            <a class="hero-plataform__button" href="https://store.playstation.com/pt-br/concept/10010048/" target="_blank" data-aos="fade-right" data-aos-delay="900" data-aos-easing="ease-out-cubic"><i class="fa-brands fa-playstation"></i>PlayStation</a>       
        </div>
        <div class="hero-plataform__account">
            <span class="hero-plataform__account-text" data-aos="fade-right" data-aos-delay="1200" data-aos-offset="30" data-aos-easing="ease-out-cubic">É necessário ter uma Conta Riot para fazer login e jogar. Ainda não tem uma?</span>
            <a href="/valorant-projeto/criar-conta" class="hero-plataform__account-btn" data-aos="fade-right" data-aos-delay="1200" data-aos-offset="30" data-aos-easing="ease-out-cubic"><span class="btn__text">Criar Conta</span></a>
        </div>
        </section>
        <div class="popup-overlay" id="popup">
            <div class="popup-box">
                <button class="popup-close" id="closePopup">X</button>
                <h2 class="popup-heading">\ Prepare-se para jogar \</h2>
                <div class="popup-buttons">
                    <a href="/valorant-projeto/criar-conta" class="popup-creat-account">Criar conta</a>
                    <a href="/valorant-projeto/login" class="popup-login">Fazer login</a>
                </div>
            </div>
        </div>
    </main>

<?php get_footer(); ?>