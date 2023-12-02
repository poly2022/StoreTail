<?php
ob_start();
?>
<div class="content">
    <div class="text-center mb-5">
        <img src="../Interface/img/storytail-logo-02.png" alt="Logo da Empresa" style="width: 200px; border-radius: 4px">
    </div>
    <h2>Terms of Service</h2>
    <p>Welcome to our terms of service.</p>
    <p>These terms govern your use of this website. By accessing or using this website, you agree to these terms.</p>

    <h4>Use of the Site</h4>
    <p>Your use of this site is subject to certain restrictions. You agree not to:</p>
    <ul>
        <li>Violate any local, state, national, or international laws.</li>
        <li>Send spam or unsolicited messages.</li>
        <li>Engage in illegal or unethical activities.</li>
        <!-- Other restrictions -->
    </ul>

    <h4>Content and Intellectual Property</h4>
    <p>All content on the site is owned by us or licensed to us. This includes text, images, graphics, logos, etc.</p>
    <p>You agree not to copy, distribute, or use our content without permission.</p>

    <h4>Disclaimer of Liability</h4>
    <p>We do not guarantee the accuracy, completeness, or timeliness of the information presented on this site.</p>
    <p>We are not liable for any damages resulting from the use or inability to use this site.</p>

    <!-- Other sections as per your needs -->

    <h4>Modifications to these Terms</h4>
    <p>We reserve the right to modify these terms at any time. It is your responsibility to periodically check for changes.</p>

    <h4>Contact</h4>
    <p>If you have any questions about these terms, please contact us.</p>
    <p class="mb-0">info@storytail.pt</p>
    <p class="mb-0">+351 912345678</p>
    <p class="mb-0">Rua Nova da Raposa n.º 164, Vila Nova de Gaia</p>

</div>
<?php
$content = ob_get_clean();

include('pageDefault.php');
?>