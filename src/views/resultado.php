<div class="page-resultado" style="max-width: 600px; margin: 0 auto;">
    
    <h2 style="color: var(--cor-secundaria); text-align: center;">Seu Caminho para Crescer</h2>
    <p style="text-align: center; color: #666; margin-bottom: 25px;">
        Entendemos o seu corre. Separamos essa estratégia prática para você focar hoje:
    </p>

    <div style="background: #E6F4EA; border-left: 6px solid var(--cor-primaria); padding: 25px; margin-top: 20px; border-radius: 0 8px 8px 0; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        
        <?php if (!empty($dica_perfeita)): ?>
            <h3 style="color: #0c8c61; margin-bottom: 10px; font-size: 20px;">
                <?php echo htmlspecialchars($dica_perfeita['titulo']); ?>
            </h3>
            
            <p style="color: var(--cor-texto); font-size: 16px; line-height: 1.5;">
                <?php echo htmlspecialchars($dica_perfeita['conteudo']); ?>
            </p>
        <?php else: ?>
            <h3 style="color: #0c8c61;">Continue firme no seu negócio!</h3>
            <p>Não encontramos uma dica específica agora, mas veja todas as nossas orientações clicando abaixo.</p>
        <?php endif; ?>
        
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <a href="dicas" class="btn" style="background-color: var(--cor-secundaria); width: 100%; max-width: 300px;">Ver todas as dicas</a>
    </div>
</div>