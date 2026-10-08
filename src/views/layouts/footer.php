</main>
    <footer>
        <p>Projeto Plenix &copy; <?php echo date('Y'); ?> - Vamos crescer juntos!</p>
        <p style="margin-top: 10px;">
            <a href="https://www.instagram.com/plenix_br/">Siga nosso Instagram</a>
        </p>
    </footer>

    <audio id="audio-background" src="assets/sounds/background.mp3" loop preload="auto"></audio>
    <audio id="audio-button" src="assets/sounds/button.mp3" preload="auto"></audio>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bgAudio = document.getElementById('audio-background');
            const btnAudio = document.getElementById('audio-button');
            
            const savedTime = sessionStorage.getItem('bgAudioTime');
            const isPlaying = sessionStorage.getItem('bgAudioPlaying');

            if (savedTime) {
                bgAudio.currentTime = parseFloat(savedTime);
            }

            function startBackgroundMusic() {
                // Só toca se a página não estiver oculta/minimizada
                if (bgAudio.paused && !document.hidden) {
                    bgAudio.volume = 0.2;
                    bgAudio.play().then(() => {
                        sessionStorage.setItem('bgAudioPlaying', 'true');
                    }).catch(e => console.log('Autoplay bloqueado.'));
                }
            }
            
            if (isPlaying === 'true') {
                startBackgroundMusic();
            }
            
            document.body.addEventListener('click', startBackgroundMusic, { once: true });

            window.addEventListener('beforeunload', () => {
                sessionStorage.setItem('bgAudioTime', bgAudio.currentTime);
                sessionStorage.setItem('bgAudioPlaying', !bgAudio.paused ? 'true' : 'false');
            });

            // --- CORREÇÃO: PAUSAR QUANDO SAIR DO SITE ---
            
            // Detecta quando o usuário muda de aba ou minimiza o app no celular
            document.addEventListener('visibilitychange', function() {
                if (document.hidden) {
                    bgAudio.pause(); // Pausa a música
                } else {
                    // Se o usuário voltar e a música deveria estar tocando, ela volta
                    if (sessionStorage.getItem('bgAudioPlaying') === 'true') {
                        startBackgroundMusic();
                    }
                }
            });

            // Detecta quando a janela perde o foco (útil para PC/Desktop)
            window.addEventListener('blur', function() {
                bgAudio.pause();
            });

            // Detecta quando a janela recupera o foco
            window.addEventListener('focus', function() {
                if (sessionStorage.getItem('bgAudioPlaying') === 'true' && !document.hidden) {
                    startBackgroundMusic();
                }
            });
            // ---------------------------------------------

            document.body.addEventListener('click', function(e) {
                const target = e.target.closest('form label.radio-card, form button[type="submit"]');
                
                if (target) {
                    const somClique = btnAudio.cloneNode();
                    somClique.volume = 0.5;
                    somClique.play().catch(err => console.log('Erro ao tocar botão.', err));
                }
            });
        });
    </script>
</body>
</html>