<div class="form-container animate-enter" style="max-width: 900px; margin: 0 auto; padding-top: 40px;">
    
    <div class="form-header" style="text-align: center; margin-bottom: 40px;">
        <h2 class="title-glow" style="font-size: 2.5rem; text-shadow: 0 0 20px <?php echo htmlspecialchars($cor_fase); ?>; color: var(--cor-branco);">Seu Mapa de Crescimento</h2>
        <p class="subtitle" style="font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Baseado no seu perfil, nossa inteligência separou a estratégia cirúrgica para quebrar esse seu bloqueio:</p>
    </div>

    <?php if (!empty($dicas_perfeitas)): ?>
        <?php foreach ($dicas_perfeitas as $index => $dica_perfeita): ?>
            <div class="card-glass animate-enter delay-100" style="--cor-tema-rgb: <?php echo $cor_fase_rgb; ?>; border-left: 6px solid <?php echo htmlspecialchars($cor_fase); ?>; margin-bottom: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
                <h3 style="color: var(--cor-branco); margin-bottom: 20px; font-size: 24px;">
                    Dica <?php echo $index + 1; ?>: <?php echo htmlspecialchars($dica_perfeita['titulo']); ?>
                </h3>
                
                <p style="color: var(--cor-texto-mutado); font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                    <?php echo htmlspecialchars($dica_perfeita['introducao'] ?? ''); ?>
                </p>
                
                <ul style="color: var(--cor-branco); font-size: 16px; line-height: 1.6; margin-bottom: 20px; padding-left: 20px;">
                    <?php 
                    $passos = explode("\n", trim($dica_perfeita['passo_a_passo'] ?? ''));
                    foreach ($passos as $passo): 
                        if (trim($passo) !== ''):
                    ?>
                        <li style="margin-bottom: 10px;"><?php echo htmlspecialchars(trim($passo)); ?></li>
                    <?php 
                        endif;
                    endforeach; 
                    ?>
                </ul>

                <?php if (!empty($dica_perfeita['exemplo_produto']) || !empty($dica_perfeita['exemplo_servico'])): ?>
                <div style="background: rgba(<?php echo $cor_fase_rgb; ?>, 0.1); border-left: 3px solid <?php echo htmlspecialchars($cor_fase); ?>; padding: 15px; border-radius: 4px; margin-top: 20px;">
                    <strong style="color: <?php echo htmlspecialchars($cor_fase); ?>; font-size: 15px; display: block; margin-bottom: 5px;">Exemplo Prático:</strong>
                    <p style="color: var(--cor-texto-mutado); font-size: 15px; line-height: 1.6; margin: 0;">
                        <?php 
                        if (!empty($dica_perfeita['exemplo_produto'])) {
                            echo "<strong>Produto:</strong> " . htmlspecialchars($dica_perfeita['exemplo_produto']) . "<br>";
                        }
                        if (!empty($dica_perfeita['exemplo_servico'])) {
                            echo "<strong>Serviço:</strong> " . htmlspecialchars($dica_perfeita['exemplo_servico']);
                        }
                        ?>
                    </p>
                </div>
                <?php endif; ?>

                <div class="avaliacao-container" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: space-between;">
                    <span style="color: var(--cor-branco); font-size: 15px; font-weight: 500;">Você gostou dessa dica?</span>
                    <div style="display: flex; gap: 10px;">
                        <button class="btn-avaliar btn-like" data-id="<?php echo $dica_perfeita['id']; ?>" data-tipo="like" style="background: rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.3); color: #10b981; padding: 8px 15px; border-radius: 8px; cursor: pointer; transition: all 0.3s; display: flex; align-items: center; gap: 6px;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.514"></path></svg>
                            <span>Sim</span>
                        </button>
                        <button class="btn-avaliar btn-dislike" data-id="<?php echo $dica_perfeita['id']; ?>" data-tipo="dislike" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #ef4444; padding: 8px 15px; border-radius: 8px; cursor: pointer; transition: all 0.3s; display: flex; align-items: center; gap: 6px;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.714.211-1.412.608-2.006L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.514"></path></svg>
                            <span>Não</span>
                        </button>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="card-glass animate-enter delay-100" style="border-left: 6px solid <?php echo htmlspecialchars($cor_fase); ?>;">
            <h3 style="color: var(--cor-branco); margin-bottom: 20px; font-size: 24px;">Rota Segura Estabelecida</h3>
            <p style="color: var(--cor-texto-mutado); font-size: 16px; line-height: 1.8;">Aparentemente não há um bloqueio sistêmico gravado para sua seleção no momento, mas indicamos que continue blindando o seu negócio. Veja nossa biblioteca de estratégias vitais.</p>
        </div>
    <?php endif; ?>

    <div class="form-submit animate-enter delay-200" style="text-align: center; margin-top: 40px;">
        <a href="dicas" class="btn btn-secundario" style="width: 100%; max-width: 400px; padding: 16px; display: inline-block;">
            Acessar Biblioteca de Dicas
        </a>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const botoes = document.querySelectorAll('.btn-avaliar');
    
    botoes.forEach(btn => {
        const idDica = btn.getAttribute('data-id');
        
        if (localStorage.getItem('avaliou_dica_' + idDica)) {
            desabilitarBotoes(idDica);
        }

        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const tipo = this.getAttribute('data-tipo');

            if (localStorage.getItem('avaliou_dica_' + id)) {
                return;
            }

            desabilitarBotoes(id);
            if (tipo === 'like') {
                this.style.background = '#10b981';
                this.style.color = '#fff';
            } else {
                this.style.background = '#ef4444';
                this.style.color = '#fff';
            }

            localStorage.setItem('avaliou_dica_' + id, 'true');

            const formData = new FormData();
            formData.append('id', id);
            formData.append('tipo', tipo);

            fetch('avaliar-dica', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
              .then(data => {
                  if (!data.sucesso) {
                      console.error('Erro ao registrar avaliação.');
                  }
              }).catch(err => {
                  console.error('Erro de requisição', err);
              });
        });
    });

    function desabilitarBotoes(idDica) {
        const botoesDaDica = document.querySelectorAll(`.btn-avaliar[data-id="${idDica}"]`);
        botoesDaDica.forEach(b => {
            b.style.opacity = '0.5';
            b.style.cursor = 'not-allowed';
        });
    }
});
</script>