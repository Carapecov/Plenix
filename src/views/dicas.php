<div class="form-container animate-enter">

    <div class="form-header">
        <h2 class="title-glow">Biblioteca de Estratégias</h2>
        <p class="subtitle">Eixos de conhecimento fundamentados preparados para proteger a lucratividade e operação do seu negócio ativo.</p>
    </div>

    <?php if (!empty($todas_dicas)): ?>
        <?php 
            $categorias = array_unique(array_column($todas_dicas, 'categoria'));
        ?>
        <div class="category-filter animate-enter delay-100" style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 30px; justify-content: center;">
            <button class="btn btn-primario filter-btn active" data-filter="todas" style="padding: 8px 16px;">Todas</button>
            <?php foreach ($categorias as $cat): ?>
                <?php if(!empty($cat)): ?>
                    <button class="btn btn-secundario filter-btn" data-filter="<?php echo htmlspecialchars($cat); ?>" style="padding: 8px 16px;">
                        <?php echo htmlspecialchars($cat); ?>
                    </button>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="dicas-container animate-enter delay-100" style="display: flex; flex-direction: column; gap: 20px; margin-bottom: 40px;">
        
        <?php if (!empty($todas_dicas)): ?>
            
            <?php $i = 0; ?>
            <?php foreach ($todas_dicas as $dica): ?>
                <?php 
                    $delayClass = 'delay-' . (($i % 3 + 1) * 100); 
                    $catAtual = htmlspecialchars($dica['categoria'] ?? '');
                    
                    $fase = $dica['fase_negocio'] ?? '';
                    $cor_fase = '#10b981';
                    $cor_fase_rgb = '16, 185, 129';
                    if ($fase === 'Começando') {
                        $cor_fase = '#06b6d4';
                        $cor_fase_rgb = '6, 182, 212';
                    } elseif ($fase === 'Consolidado') {
                        $cor_fase = '#3b82f6';
                        $cor_fase_rgb = '59, 130, 246';
                    } elseif ($fase === 'Risco') {
                        $cor_fase = '#ef4444';
                        $cor_fase_rgb = '239, 68, 68';
                    }
                ?>
                <div class="card-glass dica-card animate-enter <?php echo $delayClass; ?>" data-categoria="<?php echo $catAtual; ?>" style="--cor-tema-rgb: <?php echo $cor_fase_rgb; ?>; border-left: 6px solid <?php echo htmlspecialchars($cor_fase); ?>; box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
                    <div style="font-size: 12px; font-weight: bold; color: <?php echo htmlspecialchars($cor_fase); ?>; text-transform: uppercase; margin-bottom: 5px;">
                        <?php echo $catAtual; ?> <?php if(!empty($fase)) echo " • <span style='opacity:0.8'>" . htmlspecialchars($fase) . "</span>"; ?>
                    </div>
                    <h3 style="color: var(--cor-branco); margin-bottom: 15px; font-size: 22px;">
                        <?php echo htmlspecialchars($dica['titulo']); ?>
                    </h3>
                    <p style="color: var(--cor-texto-mutado); font-size: 16px; line-height: 1.6; margin-bottom: 15px;">
                        <?php echo htmlspecialchars($dica['introducao']); ?>
                    </p>
                    
                    <ul style="color: var(--cor-branco); font-size: 15px; line-height: 1.6; margin-bottom: 15px; padding-left: 20px;">
                        <?php 
                        $passos = explode("\n", trim($dica['passo_a_passo']));
                        foreach ($passos as $passo): 
                            if (trim($passo) !== ''):
                        ?>
                            <li style="margin-bottom: 8px;"><?php echo htmlspecialchars(trim($passo)); ?></li>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </ul>

                    <?php if (!empty($dica['exemplo_produto']) || !empty($dica['exemplo_servico'])): ?>
                    <div style="background: rgba(<?php echo $cor_fase_rgb; ?>, 0.1); border-left: 3px solid <?php echo htmlspecialchars($cor_fase); ?>; padding: 12px 15px; border-radius: 4px; margin-top: 15px;">
                        <strong style="color: <?php echo htmlspecialchars($cor_fase); ?>; font-size: 14px; display: block; margin-bottom: 5px;">Exemplo Prático:</strong>
                        <p style="color: var(--cor-texto-mutado); font-size: 15px; line-height: 1.5; margin: 0;">
                            <?php 
                            if (!empty($dica['exemplo_produto'])) {
                                echo "<strong>Produto:</strong> " . htmlspecialchars($dica['exemplo_produto']) . "<br>";
                            }
                            if (!empty($dica['exemplo_servico'])) {
                                echo "<strong>Serviço:</strong> " . htmlspecialchars($dica['exemplo_servico']);
                            }
                            ?>
                        </p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>

        <?php else: ?>
            
            <div class="card-glass" style="text-align: center; border-style: dashed; border-color: rgba(255,255,255,0.1);">
                <p style="color: var(--cor-texto-mutado); font-size: 16px;">Os dados não puderam ser carregados da base no momento. Volte mais tarde.</p>
            </div>
            
        <?php endif; ?>

    </div>

    <div class="form-submit animate-enter delay-300" style="margin-top: 50px;">
        <p style="color: var(--cor-texto-mutado); margin-bottom: 20px; font-size: 16px;">Deseja cruzar as estratégias com o momento do seu negócio?</p>
        <a href="formulario" class="btn" style="width: 100%; max-width: 350px;">
            Mapear Diagnóstico Específico
        </a>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const dicasCards = document.querySelectorAll('.dica-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => {
                b.classList.remove('active', 'btn-primario');
                b.classList.add('btn-secundario');
            });
            
            btn.classList.add('active', 'btn-primario');
            btn.classList.remove('btn-secundario');

            const filterValue = btn.getAttribute('data-filter');

            dicasCards.forEach(card => {
                if (filterValue === 'todas' || card.getAttribute('data-categoria') === filterValue) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>