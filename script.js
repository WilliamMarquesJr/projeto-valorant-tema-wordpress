AOS.init({
    duration: 800, /* Velocidade padrão da animação (em ms) */
    once: false,   /* Se true: anima só na primeira vez. Se false: anima toda vez que rolar */
    offset: 105    /* Começa a animar quando o elemento estiver 100px dentro da tela */
});

// ==========================================
// SCROLL E BOTÃO DE VOLTAR AO TOPO
// ==========================================
const scrollBtn = document.getElementById("scrollTopBtn");
const ctaSection = document.getElementById("ctaViper");

// Protege o clique do botão (só adiciona se o botão existir no HTML)
if (scrollBtn) {
    scrollBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
}

// Protege o evento de rolagem da página
window.addEventListener("scroll", () => {
    
    // Só mexe no botão se ele existir
    if (scrollBtn) {
        if (window.scrollY > 300) {
            scrollBtn.classList.add("is-visible");
        } else {
            scrollBtn.classList.remove("is-visible");
        }
    }

    // Só faz o cálculo se a seção da Viper existir nesta página
    if (ctaSection && scrollBtn) {
        const rect = ctaSection.getBoundingClientRect();
        const buttonPosition = window.innerHeight - 80;
        const sectionStart = rect.top <= buttonPosition;
        const sectionEnd = rect.bottom >= buttonPosition;

        if (sectionStart && sectionEnd) {
            scrollBtn.classList.add("is-viper");
        } else {
            scrollBtn.classList.remove("is-viper");
        }
    }
});

// ==========================================
// ARMAS DO ARSENAL
// ==========================================
document.addEventListener("DOMContentLoaded", function() {
    const cardVandal = document.getElementById('card-vandal');
    const cardPhantom = document.getElementById('card-phantom');
    const cardSheriff = document.getElementById('card-sheriff');

    const btnVandal = document.getElementById('buttonVandal');
    const btnPhantom = document.getElementById('buttonPhantom');
    const btnSheriff = document.getElementById('buttonSheriff');

    if (btnVandal && btnPhantom && btnSheriff && cardVandal && cardPhantom && cardSheriff) {

        function hideAllWeapons() {
            cardVandal.style.display = 'none';
            cardPhantom.style.display = 'none';
            cardSheriff.style.display = 'none';
        }

        btnVandal.addEventListener('click', function() {
            hideAllWeapons(); 
            cardVandal.style.display = 'block'; 
        });

        btnPhantom.addEventListener('click', function() {
            hideAllWeapons();
            cardPhantom.style.display = 'block';
        });

        btnSheriff.addEventListener('click', function() {
            hideAllWeapons();
            cardSheriff.style.display = 'block';
        });

        hideAllWeapons(); 
        cardVandal.style.display = 'block'; 
    }
});

// ==========================================
// MENU MOBILE
// ==========================================
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.querySelector('.nav__toggle');
    const navList = document.querySelector('.nav__list');
    
    // Confirma se o botão hambúrguer está na página antes de ativar
    if (toggleBtn && navList) {
        const icon = toggleBtn.querySelector('i'); 

        toggleBtn.addEventListener('click', () => {
            navList.classList.toggle('active');

            if (navList.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
                toggleBtn.style.position = 'fixed'; 
                toggleBtn.style.right = '20px';
                toggleBtn.style.top = '20px';
            } else {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
                toggleBtn.style.position = 'static'; 
            }
        });

        document.querySelectorAll('.nav__link').forEach(link => {
            link.addEventListener('click', () => {
                navList.classList.remove('active');
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
                toggleBtn.style.position = 'static';
            });
        });
    }
});


// ==========================================
// POPUP DE DOWNLOAD
// ==========================================
const popup = document.getElementById("popup");
const openBtn = document.querySelector(".popup-pc");
const closeBtn = document.getElementById("closePopup");

if (popup && openBtn && closeBtn) {
    openBtn.addEventListener("click", () => {
        popup.style.display = "flex";
    });

    closeBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });

    popup.addEventListener("click", (e) => {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    });
}

// ==========================================
// SISTEMA DE BLOG / PÁGINA DE NOTÍCIAS
// ==========================================
document.addEventListener('DOMContentLoaded', () => {
    const gridDePosts = document.getElementById('news-grid-container');

    if (gridDePosts) {
        fetch('posts.json')
            .then(resposta => resposta.json()) 
            .then(posts => {
                
                gridDePosts.innerHTML = '';

                posts.forEach(post => {
                    const dataFormatada = post.data.split('-').reverse().join('/');

                    const cardHTML = `
                        <a href="post.html?id=${post.id}" class="card" style="text-decoration: none; color: inherit;">
                            <div class="card__image-container">
                                <img src="${post.imagem}" alt="${post.titulo}" class="card__image">
                            </div>
                            
                            <div class="card__content">
                                <span class="card__meta">${post.categoria}</span>
                                <span class="card__divider">|</span>
                                <span class="card__date">${dataFormatada}</span> 
                            </div>
                            
                            <h3 class="card__title">${post.titulo}</h3>
                            <p class="card__descritpion">${post.resumo}</p>
                        </a>
                    `;

                    gridDePosts.innerHTML += cardHTML;
                });

                // ==========================================
                // ÂNCORA (Corrige o Layout Shift)
                // ==========================================
                // Verifica se a URL tem um link com hashtag #agents
                if (window.location.hash) {
                    const secaoAlvo = document.querySelector(window.location.hash);
                    if (secaoAlvo) {
                        // Espera meio segundo (500ms) para as imagens renderizarem e empurrarem a página
                        setTimeout(() => {
                            secaoAlvo.scrollIntoView({ behavior: 'smooth' });
                        }, 500); 
                    }
                }

            })
            .catch(erro => console.error('Erro ao carregar as notícias:', erro));
    }
});


