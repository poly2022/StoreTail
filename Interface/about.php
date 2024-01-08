<?php
    // Inicia o buffer de saída
    ob_start();
?>
<div class="content">
    <div class="text-center mb-5">
        <!-- Logo da Empresa -->
        <img src="../Interface/img/storytail-logo-02.png" alt="Logo da Empresa" style="width: 200px; border-radius: 4px">
    </div>
    <!-- Títulos e parágrafos -->
    <h2>Storytail Presentation</h2>
    <h5>Embark on a Magical Reading Adventure</h5>
    <p>At Storytail, we believe that every book is a ticket to a thrilling adventure. 
    Join us on a journey through the pages of enchanting picture books that will transport your child's imagination to far-off lands, 
    introduce them to fascinating characters, and ignite their love for reading. </p>
    <br></br>

    <!-- Informações de contato -->
    <h2>Contact</h2>
    <p>If you have any questions about these terms, please contact us.</p>
    <p class="mb-0">info@storytail.pt</p>
    <p class="mb-0">+351 912345678</p>
    <p class="mb-0">Rua Nova da Raposa n.º 164, Vila Nova de Gaia</p>
</div>
<?php
    // Captura o conteúdo do buffer de saída e limpa o buffer
    $content = ob_get_clean();

    // Inclui o conteúdo gerado em 'pageDefault.php'
    include('pageDefault.php');
?>
