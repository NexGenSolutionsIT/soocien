@extends('livewire.components.main')
@section('content')
    <div class="body-content">
        <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <div class="page-header">
                <div class="page-header-title page-header-item">
                    <h3 class="font-size-h3">Falta pouco! Escaneie o código QR pelo seu app de pagamentos ou Internet Banking
                    </h3>
                </div>
            </div>
            <div class="authentication-form margin-top-pix pb-15">
                <div class="pixqrcode">
                    <img class="qrcode" src="data:image/png;base64, {{ $data['qrcode'] }}" alt=""
                        style="height: 400px;">
                </div>
                <div class="boxpix">
                    <h4 class="valuepix text-center mt-4">Valor do PIX a pagar: <span
                            class="stylevaluepix">R${{ number_format($data['amount'], 2, ',', '.') }}</span></h4>
                    <div style="display: flex; flex-direction: column;">
                        <h6 class="colorp text-center mt-3">Chave Copia e Cola</h6>
                        <p class="text-success d-none text-center mt-2" id="link">Link Copiado!</p>
                        <input class="pixcopiaecola form-control" id="pixInput" type="text"
                            value="{{ $data['pixCopy'] }}" readonly>
                        <button onclick="copyToClipboard()" type="button" style="font-size: 14px"
                            class="btn main-btn mt-3 main-btn-lg buttonpix">Copiar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            var copyText = document.getElementById("pixInput").value;

            // Usa o Clipboard API para copiar o texto
            navigator.clipboard.writeText(copyText).then(function() {
                // Mostra o aviso de sucesso
                var toast = document.getElementById("link");
                toast.classList.remove('d-none');

                // Oculta o aviso após 3 segundos
                setTimeout(function() {
                    toast.classList.add('d-none');
                }, 2000);
            }).catch(function(error) {
                console.error('Erro ao copiar para a área de transferência:', error);
            });
        }
    </script>
@endsection
