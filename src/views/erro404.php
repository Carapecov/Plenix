<?php require_once 'views/layouts/header.php'; ?>

<div class="form-container animate-enter" style="min-height: 70vh; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; padding-top: 40px;">
    
    <div style="max-width: 400px; margin-bottom: 30px;" class="animate-enter delay-100">
        <img src="assets/css/img/erro404.png" alt="Erro 404 - Página não encontrada" style="width: 100%; filter: drop-shadow(0 0 20px rgba(16, 185, 129, 0.4)); animation: float 6s ease-in-out infinite;">
    </div>
    
    <div class="form-header animate-enter delay-200">
        <h2 class="title-glow" style="font-size: 3.5rem; margin-bottom: 15px; color: var(--cor-branco);">Rota não mapeada!</h2>
        <p class="subtitle" style="font-size: 1.2rem; max-width: 600px; margin: 0 auto; margin-bottom: 40px; color: var(--cor-texto-mutado); line-height: 1.6;">
            Ops! Aparentemente o link que você acessou não existe no nosso mapa estratégico ou nossa Fênix voou longe demais em busca de conhecimento.<br><br>Não se preocupe, vamos redirecionar sua operação para um território seguro.
        </p>
    </div>

    <div class="form-submit animate-enter delay-300" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
        <a href="home" class="btn btn-primario" style="padding: 16px 40px; font-size: 1.1rem; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);">
            Voltar para a Base
        </a>
        <a href="dicas" class="btn btn-secundario" style="padding: 16px 40px; font-size: 1.1rem;">
            Acessar Biblioteca
        </a>
    </div>

</div>

<style>
@keyframes float {
    0% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(2deg); }
    100% { transform: translateY(0px) rotate(0deg); }
}
</style>

<?php require_once 'views/layouts/footer.php'; ?>
