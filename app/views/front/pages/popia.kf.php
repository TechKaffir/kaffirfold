<?php $this->view('front/inc/front-header', $data) ?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= ROOT ?>">Home</a></li>
                <li><?= $page_title ?></li>
            </ol>
            <hr>
            <h2><?= $page_title ?><a class="btn btn-outline-<?= THEME_COLOR ?> float-end" href="<?= ROOT ?>"><i class="bi bi-arrow-left"></i> BACK HOME</a></h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Popia Act Compliance Section ======= -->
    <section id="popia" class="popia">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <h1>Compliance Policy: Protection of Personal Information Act (POPIA) - <?= APP_NAME ?></h1>

                <h2>1. Introduction</h2>
                <p><?= APP_NAME ?>, established in <?= EST_YEAR ?>, is committed to providing exceptional occupational and primary health services in Port Elizabeth, South Africa. In line with our dedication to excellence, we recognize the importance of safeguarding the privacy and security of personal information entrusted to us by our clients, employees, and other stakeholders. This Compliance Policy outlines <?= APP_NAME ?>'s commitment to compliance with the Protection of Personal Information Act (POPIA) and establishes guidelines for the collection, use, and protection of personal information.</p>

                <h2>2. Scope</h2>
                <p>This policy applies to all personal information processed by <?= APP_NAME ?>, including but not limited to information pertaining to clients, employees, contractors, and suppliers.</p>

                <h2>3. Compliance Framework</h2>
                <p><?= APP_NAME ?> is committed to complying with the principles set forth in POPIA. These principles include:</p>
                <ul>
                    <li>Accountability</li>
                    <li>Processing Limitation</li>
                    <li>Purpose Specification</li>
                    <li>Data Minimization</li>
                    <li>Information Security</li>
                    <li>Openness</li>
                </ul>

                <h2>4. Collection and Use of Personal Information</h2>
                <p><?= APP_NAME ?> will only collect personal information for lawful purposes related to the provision of occupational and primary health services. Personal information will be collected directly from individuals whenever possible, and individuals will be informed of the purposes for which their information is being collected.</p>
                <p>Personal information will only be used for the purposes for which it was collected, unless otherwise authorized by law or by the individual concerned.</p>

                <h2>5. Disclosure of Personal Information</h2>
                <p><?= APP_NAME ?> will not disclose personal information to third parties without the consent of the individual concerned, unless required or permitted by law.</p>
                <p>When disclosing personal information to third parties, <?= APP_NAME ?> will take reasonable steps to ensure that such parties comply with the principles of POPIA and provide an adequate level of protection for the information.</p>

                <h2>6. Data Subject Rights</h2>
                <p><?= APP_NAME ?> recognizes the rights of data subjects under POPIA, including the right to access, correct, or delete personal information, as well as the right to object to the processing of personal information in certain circumstances.</p>
                <p>Data subjects wishing to exercise their rights under POPIA should contact <?= APP_NAME ?> using the contact details provided below.</p>

                <h2>7. Contact Information</h2>
                <p>For inquiries or concerns regarding this Compliance Policy or <?= APP_NAME ?>'s processing of personal information, please contact us using the following information:</p>
                <ul>
                    <li>International & Local Phone: <?= CONTACT_NUMBER ?></li>
                    <li>Email: <a href="mailto:<?= EMAIL_ADDRESS ?>"><?= EMAIL_ADDRESS ?></a></li>
                </ul>

                <h2>8. Policy Review</h2>
                <p>This Compliance Policy will be reviewed periodically to ensure its continued effectiveness and compliance with applicable laws and regulations.</p>

                <h2>9. Conclusion</h2>
                <p><?= APP_NAME ?> is committed to upholding the principles of POPIA and protecting the privacy and security of personal information. By adhering to this Compliance Policy and implementing appropriate measures, <?= APP_NAME ?> aims to maintain the trust and confidence of its clients, employees, and other stakeholders.</p>
                <p>Date of Policy Adoption: <?= POLICY_ADOPT_DATE ?></p>
            </div>
        </div>
    </section><!-- End Popia Act Compliance Section -->
</main><!-- End #main -->

<?php $this->view('front/inc/front-footer', $data) ?>