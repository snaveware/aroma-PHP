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
        <form action="" class="contact-form">
            <h2 class="section-title">Talk to Us</h2>
            <div id="contact-errors"></div>
            <div class="input">
                <input type="text" id="name" placeholder="Name">
            </div>
            <div class="input">
                <input type="email" id="email" placeholder="Email">
            </div>
            <textarea name="" id="message" cols="30" rows="10"placeholder="Message"></textarea>
        </form>
        
        <img src="<?= $this->base_url?>/image/contact.jpg" class="img" alt="">
        
    </div>
<?php $this->view('footer');?>