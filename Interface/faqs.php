<?php
// Inicia o buffer de saída
ob_start();
?>
<div class="content">
    <div class="text-center mb-5">
        <img src="../Interface/img/storytail-logo-02.png" alt="Logo da Empresa" style="width: 200px; border-radius: 4px">
    </div>

    <!-- Títulos e textos das perguntas frequentes -->
    <h2>FAQs</h2>

    <h5>What is Lorem Ipsum?</h5>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

    <h5>Why do we use it?</h5>
    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>

    <h5>Where does it come from?</h5>
    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>

    <h5>Is it secure to use?</h5>
    <p>Lorem Ipsum is secure and widely used as placeholder text in design and publishing.</p>

    <h5>How to contact support?</h5>
    <p>If you need assistance, please visit our contact page or email us at support@example.com.</p>

    <h5>Can I modify my account details?</h5>
    <p>Yes, you can modify your account details by accessing the account settings page.</p>
</div>
<?php
// Captura o conteúdo do buffer de saída e limpa o buffer
$content = ob_get_clean();

// Inclui o conteúdo gerado em 'pageDefault.php'
include('pageDefault.php');
?>
