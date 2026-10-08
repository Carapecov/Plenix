<div class="form-container animate-enter" id="dynamicFormContainer" style="--cor-tema: #10b981; --cor-tema-rgb: 16, 185, 129; max-width: 900px; margin: 0 auto; padding-top: 40px;">
    <div class="form-header" style="text-align: center; margin-bottom: 40px;">
        <h2 class="title-glow" id="dynamicFormTitle" style="font-size: 2.5rem; text-shadow: 0 0 20px rgba(var(--cor-tema-rgb), 0.5); color: var(--cor-branco);">Diagnóstico de Negócio</h2>
        <p class="subtitle" style="font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Complete este mapa rápido para desbloquearmos o foco ideal para aumentar seus ganhos hoje.</p>
    </div>

    <form action="resultado" method="POST" class="card-glass animate-enter delay-100" id="dynamicFormCard" style="padding: 50px; border-radius: 20px; border: 1px solid rgba(var(--cor-tema-rgb), 0.2); background: rgba(0, 0, 0, 0.4); box-shadow: 0 10px 40px rgba(var(--cor-tema-rgb), 0.1);">
        
        <div class="form-group" style="margin-bottom: 40px;">
            <label class="form-label" for="fase_negocio" style="font-size: 1.2rem; font-weight: 600; margin-bottom: 15px; display: block; color: var(--cor-branco);">
                1. Em qual momento da jornada você está?
            </label>
            <select name="fase_negocio" id="fase_negocio" class="form-select" required style="width: 100%; padding: 18px 20px; font-size: 1.1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.2); background: #111827; color: #f8fafc; cursor: pointer; transition: all 0.3s; box-shadow: inset 0 2px 4px rgba(0,0,0,0.5); appearance: none;">
                <option value="" disabled selected>Selecione a fase atual...</option>
                <option value="Quero começar">Quero começar mas não sei como</option>
                <option value="Começando">Tô começando agora (menos de 6 meses no mercado)</option>
                <option value="Consolidado">Estabilizei faz anos, mas não consigo escalar</option>
                <option value="Risco">Fechei no vermelho recentemente, preciso de fôlego</option>
            </select>
        </div>

        <div id="container_dor" class="form-group" style="margin-bottom: 50px; display: none;">
            <label class="form-label" style="font-size: 1.2rem; font-weight: 600; margin-bottom: 20px; display: block; color: var(--cor-branco);">
                2. Qual o seu principal bloqueio hoje na rua?
            </label>
            
            <div id="radio_grid" class="radio-group" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
                
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const escolhasBD = <?php echo json_encode($escolhas ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
                const selectFase = document.getElementById("fase_negocio");
                const containerDor = document.getElementById("container_dor");
                const radioGrid = document.getElementById("radio_grid");

                selectFase.addEventListener("change", function() {
                    const faseSelecionada = this.value;
                    radioGrid.innerHTML = "";
                    
                    const formContainer = document.getElementById("dynamicFormContainer");
                    if (faseSelecionada === 'Quero começar') {
                        formContainer.style.setProperty('--cor-tema', '#10b981');
                        formContainer.style.setProperty('--cor-tema-rgb', '16, 185, 129');
                    } else if (faseSelecionada === 'Começando') {
                        formContainer.style.setProperty('--cor-tema', '#06b6d4');
                        formContainer.style.setProperty('--cor-tema-rgb', '6, 182, 212');
                    } else if (faseSelecionada === 'Consolidado') {
                        formContainer.style.setProperty('--cor-tema', '#3b82f6');
                        formContainer.style.setProperty('--cor-tema-rgb', '59, 130, 246');
                    } else if (faseSelecionada === 'Risco') {
                        formContainer.style.setProperty('--cor-tema', '#ef4444');
                        formContainer.style.setProperty('--cor-tema-rgb', '239, 68, 68');
                    }
                    
                    const doresDestaFase = escolhasBD.filter(esc => esc.fase_negocio === faseSelecionada);

                    if (faseSelecionada && (doresDestaFase.length > 0 || true)) {
                        containerDor.style.display = "block";

                        doresDestaFase.forEach(esc => {
                            const dorCartao = `
                            <label class="radio-card" style="position: relative; display: block; cursor: pointer; border-radius: 12px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.03); transition: all 0.3s ease;">
                                <input type="radio" name="perfil_dor_id" value="${esc.id}" required style="position: absolute; opacity: 0;">
                                <div class="radio-card-content" style="padding: 25px 20px; height: 100%; display: flex; align-items: flex-start; gap: 15px;">
                                    <div class="radio-card-circle" style="width: 24px; height: 24px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.3); flex-shrink: 0; position: relative;"></div>
                                    <span style="font-size: 1.1rem; line-height: 1.5; color: #e2e8f0;">${esc.texto_dor}</span>
                                </div>
                            </label>
                            `;
                            radioGrid.insertAdjacentHTML('beforeend', dorCartao);
                        });

                        const dorOutro = `
                            <label class="radio-card" style="position: relative; display: block; cursor: pointer; border-radius: 12px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.03); transition: all 0.3s ease;">
                                <input type="radio" name="perfil_dor_id" value="Outro" required style="position: absolute; opacity: 0;">
                                <div class="radio-card-content" style="padding: 25px 20px; height: 100%; display: flex; align-items: flex-start; gap: 15px;">
                                    <div class="radio-card-circle" style="width: 24px; height: 24px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.3); flex-shrink: 0; position: relative;"></div>
                                    <span style="font-size: 1.1rem; line-height: 1.5; color: #e2e8f0;">Nenhuma das alternativas e quero ver todas as dicas</span>
                                </div>
                            </label>
                        `;
                        radioGrid.insertAdjacentHTML('beforeend', dorOutro);
                    } else {
                        containerDor.style.display = "none";
                    }
                });
            });
        </script>

        <style>
            .radio-card:hover { border-color: rgba(var(--cor-tema-rgb), 0.5) !important; background: rgba(var(--cor-tema-rgb), 0.05) !important; }
            input[type="radio"]:checked + .radio-card-content { background: rgba(var(--cor-tema-rgb), 0.15); border-color: var(--cor-tema); }
            input[type="radio"]:checked + .radio-card-content .radio-card-circle { border-color: var(--cor-tema); background: var(--cor-tema); box-shadow: inset 0 0 0 4px #222; }
            .btn-dinamico { background: var(--cor-tema) !important; border-color: var(--cor-tema) !important; box-shadow: 0 4px 15px rgba(var(--cor-tema-rgb), 0.4) !important; }
            .btn-dinamico:hover { background: var(--cor-tema) !important; filter: brightness(1.1); box-shadow: 0 8px 25px rgba(var(--cor-tema-rgb), 0.6) !important; transform: translateY(-2px); }
        </style>

        <div class="form-submit" style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn btn-dinamico" style="padding: 16px 40px; font-size: 1.1rem; border-radius: 12px; width: 100%; max-width: 400px; text-transform: uppercase; letter-spacing: 1px;">
                Gerar minha dica para crescimento
            </button>
        </div>
        
    </form>
</div>