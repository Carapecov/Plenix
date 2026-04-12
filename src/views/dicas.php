<div class="page-dicas" style="max-width: 600px; margin: 0 auto; padding: 0 15px;">

    <div style="text-align: center; margin-bottom: 30px;">
        <h2 style="color: var(--cor-secundaria); font-size: 26px; margin-bottom: 10px;">Dicas de Sobrevivência</h2>
        <p style="color: #666; font-size: 16px;">
            Orientações diretas para proteger seu negócio e o seu bolso no dia a dia na rua. Sem complicação.
        </p>
    </div>

    <div style="display: flex; flex-direction: column; gap: 20px;">
        
        <?php if (!empty($todas_dicas)): ?>
            
            <?php foreach ($todas_dicas as $dica): ?>
                <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 6px solid var(--cor-primaria);">
                    <h3 style="color: #0c8c61; margin-bottom: 12px; font-size: 19px;">
                        <?php echo htmlspecialchars($dica['titulo']); ?>
                    </h3>
                    <p style="color: var(--cor-texto); font-size: 15px; line-height: 1.6; margin-bottom: 0;">
                        <?php echo htmlspecialchars($dica['conteudo']); ?>
                    </p>
                </div>
            <?php endforeach; ?>

        <?php else: ?>
            
            <div style="text-align: center; padding: 40px; background: white; border-radius: 12px; border: 1px solid #eaeaea;">
                <p style="color: #666; font-size: 16px;">Nenhuma dica disponível no momento. Volte mais tarde!</p>
            </div>
            
        <?php endif; ?>

    </div>

    <div style="text-align: center; margin-top: 40px;">
        <p style="color: #555; margin-bottom: 15px; font-size: 15px;">Quer uma dica exata para o seu maior problema de hoje?</p>
        <a href="formulario" class="btn" style="width: 100%; max-width: 350px; padding: 15px; font-size: 16px;">Mapear Meu Perfil</a>
    </div>

</div>