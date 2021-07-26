
    <?php $this->view('head'); ?>

    <div id="home-header" class="header">
        <img class="background" src="<?= $this->base_url?>/image/palm.jpg" alt="">
        
        <div class="content">
            <section class="action">
                <div class="text">
                    <strong class="accent">Best</strong> <br>  of <span class="accent">Experiences</span>  and <span class="accent">Dishes</span> 
                </div>
               
                <div class="btns">
                    <a href="<?= $this->base_url?>/services.html" class="btn">Services</a>
                    <a href="<?= $this->base_url?>/products.html" class="btn">Products</a>
                </div>
                
            </section>
                <img id="header-woman" src="<?= $this->base_url?>/image/woman.jpg" alt="">  
            
        </div>
        <div class="overly"></div>
    </div>
    <div class="home-services">
        <h1 class="section-title">Our Services</h1>
        <div class="home-services-content">
            <div class="home-service">
                <i class="fa fa-glass"></i>
                <section>
                    <h2 class="title title-dark">
                        Bar
                    </h2>
                    <p class="home-service-content">
                        Lorem ipsum dolor sit, amet coatae explicabo laboriosam siatae explicabo labornt nesciunt.
                    </p>
                </section>
               
            </div>
            <div class="home-service">
                <i class="fa fa-cutlery"></i>
                <section>
                    <h2 class="title title-dark">
                        Restauraunt
                    </h2>
                    <p class="home-service-content">
                        Lorem ipsum dolor sit, amet coatae explicabo laboriosam siatae explicabo labornt nesciunt.
                    </p>
                </section>
               
            </div>
            <div class="home-service">
                <i class="fa fa-briefcase"></i>
                <section>
                    <h2 class="title title-dark">
                        conference
                    </h2>
                    <p class="home-service-content">
                        Lorem ipsum dolor sit, amet coatae explicabo laboriosam siatae explicabo labornt nesciunt.
                    </p>
                </section>
               
            </div>
            <div class="home-service">
                <i class="fa fa-birthday-cake"></i>
                <section>
                    <h2 class="title title-dark">
                        Recreation
                    </h2>
                    <p class="home-service-content">
                        Lorem ipsum dolor sit, amet coatae explicabo laboriosam siatae explicabo labornt nesciunt.
                    </p>
                </section>
               
            </div>
        </div>
        
    </div>
    <!-- <div class="home-products">
        <img src="/images/products.jpg" alt="" class="background">
        <div class="home-products-content">

        </div>
    </div> -->
    <h2 class="section-title">Testimonials</h2>
    <div class="testimonials">
        <img src="<?= $this->base_url?>/image/products.jpg" alt="" class="testimonials-background">
        <div class="testimonials-content">
            <div class="testimonials-item">
                <img src="<?= $this->base_url?>/image/woman.jpg" alt="" class="avatar">
                <h2 class="center-title">Jane Doe</h2>
                <p class="center-content">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit corrupti perferendis
                </p>
            </div>
            <div class="testimonials-item">
                <img src="<?= $this->base_url?>/image/woman.jpg" alt="" class="avatar">
                <h2 class="center-title">Jane Doe</h2>
                <p class="center-content">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit corrupti perferendis
                </p>
            </div>
            <div class="testimonials-item">
                <img src="<?= $this->base_url?>/image/woman.jpg" alt="" class="avatar">
                <h2 class="center-title">Jane Doe</h2>
                <p class="center-content">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit corrupti perferendis
                </p>
            </div>
            <div class="testimonials-item">
                <img src="<?= $this->base_url?>/image/woman.jpg" alt="" class="avatar">
                <h2 class="center-title">Jane Doe</h2>
                <p class="center-content">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit corrupti perferendis
                </p>
            </div>
        </div>
    </div>

<?php $this->view('footer');?>
