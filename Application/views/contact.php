<?php $this->view('head'); ?>
    <div class="header" id="services-header">
        <img class="background" src="<?= $this->base_url?>/image/contact.jpg" alt="">
        <div class="content">
            <section class="action">
                <div class="text">
                    <strong class="accent">Contact</strong> Us</span> 
                </div> 
            </section>
            
            
        </div>
        <div class="overly"></div>
    </div>

    <div class="contact">
        <form id="contact-form"class="contact-form" method="post" action="<?= $this->base_url?>/contact/message">
            <h2 class="section-title">Talk to Us</h2>
            <?php
                $success_display = isset($data['success']) ? 'block': 'none';
            ?>
            <p class="success" id="contact-success" style="display:<?= $success_display ?>">
                <?php
                    if(isset($data['success']))
                   { ?>
                        <?= 'Thank You for your message we shall reach out shortly.'?>
                    <?php
                   }
                ?>
            </p>
            <div class="errors" id="contact-errors">
                <?php
                    if(isset($data['errors']))
                   
                    { 
                        $i=0;
                        for($i; $i<count($data['errors']); $i++)
                        {?>

                        <p class="error"><?= $data['errors'][$i] ?></p>

                        <?php
                        } 
                    }
                ?>
            </div>
            <div class="input">
                <input type="text" id="name"  name="name" placeholder="Name" required>
            </div>
            <div class="input">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <textarea name="message" id="message" cols="30" rows="10"placeholder="Message" required></textarea>
            
            <input type="submit" id="submit-btn" >
           
        </form>
        
        <img src="<?= $this->base_url?>/image/contact.jpg" class="img" alt="">
        
    </div>

    <script src="<?= $this->base_url ?>/assets/scripts/contact.js"></script>
<?php $this->view('footer');?>