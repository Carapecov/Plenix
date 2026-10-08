<svg style="position:fixed; top:0; left:0; width:100%; height:100%; pointer-events:none; z-index:-1;">
    <defs>
        <filter id="burnFilter" x="-50%" y="-50%" width="200%" height="200%">
            <!-- Menos octaves para melhorar drag de performance em devices -->
            <feTurbulence type="fractalNoise" baseFrequency="0.015" numOctaves="3" result="noise" />
            <!-- Escala menor para não bugar render do GPU -->
            <feDisplacementMap id="burnMap" in="SourceGraphic" in2="noise" scale="150" xChannelSelector="R" yChannelSelector="G" />
        </filter>
        <mask id="burnMask">
            <rect width="100%" height="100%" fill="white" />
            <circle cx="50%" cy="50%" r="0" fill="black" id="burnCircleMask" filter="url(#burnFilter)" />
        </mask>
    </defs>
</svg>

    <div class="splash-screen" id="splashScreen" style="-webkit-mask: url(#burnMask); mask: url(#burnMask);">
    <div class="splash-content" id="splashContent" style="transition: transform 0.6s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.6s;">
        <h1 class="splash-text">Plenix</h1>
        <p class="click-to-enter-text">Bem vindo ao Plenix</p>
    </div>
</div>
<!-- The fire ring needs to be unmasked, so it sits outside the splashScreen -->
<div class="fire-ring" id="fireRing" style="filter: url(#burnFilter) brightness(1.2) contrast(1.5);"></div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const splashScreen = document.getElementById('splashScreen');
    const splashContent = document.getElementById('splashContent');
    const burnCircle = document.getElementById('burnCircleMask');
    const fireRing = document.getElementById('fireRing');
    const epicElements = document.querySelectorAll('.epic-enter');
    let isBurning = false;
    
    // Adjust extreme SVG filter for mobile devices to prevent excessive screen-tearing overlap
    const filterDisp = document.querySelector('#burnFilter feDisplacementMap');
    const filterTurb = document.querySelector('#burnFilter feTurbulence');
    if (window.innerWidth <= 768) {
        if (filterDisp) filterDisp.setAttribute('scale', '40');
        if (filterTurb) filterTurb.setAttribute('numOctaves', '2');
    }
    
    if (splashScreen) {
        if (sessionStorage.getItem('splashPlayed')) {
            splashScreen.style.display = 'none';
            if(fireRing) fireRing.style.display = 'none';
            epicElements.forEach((el) => {
                el.style.animationPlayState = 'running';
            });
        } else {
            // Start animation automatically after a brief moment so the user can read the text
            setTimeout(() => {
                if (isBurning) return;
                isBurning = true;
                sessionStorage.setItem('splashPlayed', 'true');
                splashContent.style.transform = 'scale(1.5)'; // Explosive epic zoom
                splashContent.style.opacity = '0';
                splashContent.style.pointerEvents = 'none';
                fireRing.style.opacity = '1';
                
                let start = null;
                const duration = 2500; 
                const maxRadius = window.innerWidth > window.innerHeight ? window.innerWidth * 1.5 : window.innerHeight * 1.5; 
                
                function animateBurn(timestamp) {
                    if (!start) start = timestamp;
                    const progress = timestamp - start;
                    const percentage = Math.min(progress / duration, 1);
                    
                    
                    const easeIn = percentage * percentage * percentage;
                    const currentRadius = maxRadius * easeIn;
                    
                    burnCircle.setAttribute('r', currentRadius);
                    fireRing.style.width = (currentRadius * 2) + 'px';
                    fireRing.style.height = (currentRadius * 2) + 'px';
                    
                    if (progress < duration) {
                        requestAnimationFrame(animateBurn);
                    } else {
                        splashScreen.style.display = 'none';
                        fireRing.style.display = 'none';
                        epicElements.forEach((el) => {
                            el.style.animationPlayState = 'running';
                        });
                    }
                }
                requestAnimationFrame(animateBurn);
            }, 800);
        }
    }
});
</script>

<div class="home-hero epic-enter delay-epic-1">
    <h1 style="display: flex; align-items: center; justify-content: center; gap: 10px; font-size: clamp(2rem, 8vw, 4rem); margin-bottom: 20px;">
        <img src="assets/img/Fenix.png" alt="Mascote Plenix" style="height: 2.5em; transform: translateY(-3px); filter: drop-shadow(0 0 10px rgba(74, 222, 128, 0.5));" onerror="this.style.display='none'">
        <span class="fire-title">Plenix</span>
    </h1>
    <h2> 
        A bússola oficial<br>
        <span>do seu negócio</span>
    </h2>
    <p>
        Esqueça a burocracia e a desorganização. Domine seu fluxo de caixa, entenda a legislação de forma simples e proteja seu trabalho. O guia definitivo que todo microempreendedor precisa para operar com organização, crescimento e segurança.
    </p>
    <p>
        Descubra seu perfil de empreendedor e receba uma estratégia personalizada para o seu negócio.
    </p>
    
    <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
        <a href="formulario" class="btn">
            Descobrir meu perfil de empreendedor
        </a>
        <a href="dicas" class="btn btn-secundario">
            Ver Dicas
        </a>
    </div>
</div>

<hr class="home-divider epic-enter delay-epic-2">

<div class="home-grid epic-enter delay-epic-3">

    <section>
        <h2>
            Por que o Plenix é diferente?
        </h2>
        <p>
            O Plenix não é apenas um site, é uma ferramenta desenvolvida para traçar estratégias, entregar dicas e orientações para o seu negócio. Ajudando no crescimento econômico e no trabalho decente para os microempreendedores do Brasil.
        </p>
    </section>

    <section>
        <h2>
            Quem somos?
        </h2>
        <p>
            Somos uma empresa pequena formada originalmente para desenvolver um sistema que estivesse alinhado com a ODS-8 (Trabalho Decente e Crescimento Econômico). Começamos com o nome de "Plenix", que significa "Pleno"(Estabilidade, Organização, Plenitude e Futuro) com a mistura de Fênix(Renascer, Renovar e Crescer).
        </p>
    </section>

    <section>
        <h2>
            Nosso Objetivo
        </h2>
        <p>
            Ajudar os microempreendedores a se desenvolverem economicamente e socialmente, oferecendo estratégias e orientações para que eles possam crescer de forma sustentável e responsável. Mesmo que o seu negócio seja pequeno, ele pode ter um grande impacto na sociedade.
        </p>
    </section>

    <section>
        <h2>
            O futuro do Plenix
        </h2>
        <p>
            O Projeto Plenix está em constante evolução, futuramente será uma plataforma completa para os microempreendedores, oferecendo ferramentas melhores, mais atualizadas, eficientes e podendo fazer com que <em>VOCÊ</em> seja o protagonista.
        </p>
    </section>
</div>

<div class="home-grid epic-enter delay-epic-3">
    
    <section class="card-glass home-section">
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(16, 185, 129, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
            <svg style="width:24px; height:24px; color:var(--cor-primaria);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        </div>
        <h2>Ação Direta ao Ponto</h2>
        <p style="color: var(--cor-texto-mutado); line-height: 1.7;">
            Sabemos que o MEI não tem tempo a perder. Nossas dicas não são teóricas; são estratégias reais (feitas por quem entende da rua) focadas em consertar o seu problema hoje.
        </p>
    </section>

    <section class="card-glass home-section">
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(59, 130, 246, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
            <svg style="width:24px; height:24px; color:var(--cor-secundaria);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        </div>
        <h2>Tranquilidade e Blindagem</h2>
        <p style="color: var(--cor-texto-mutado); line-height: 1.7;">
            Trabalhe em paz sabendo que seu negócio está regulamentado. Auxiliamos você a entender as licenças, alvarás da prefeitura e separar seu dinheiro pessoal da sua empresa.
        </p>
    </section>

    <section class="card-glass home-section">
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(236, 72, 153, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
            <svg style="width:24px; height:24px; color:var(--cor-terciaria);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h2>Crescimento Inteligente</h2>
        <p style="color: var(--cor-texto-mutado); line-height: 1.7;">
            Não queremos que você seja apenas um MEI para sempre. Nossas orientações são desenhadas para tirar você do "pequeno" e te preparar para escalar, seja abrindo um CNPJ maior ou se tornando referência no seu nicho.
        </p>
    </section>

</div>
