
<!-- display each Category, their Products  and Product Flavors, and Product Packaging -->
<!--Display Category 1 
Display Product
Display Flavors & Packaging

Display Category 2 
Display Product
Display Flavors & Packaging-->

<style>
    .product-name {
        font-weight: bold;
        font-size: 115%;
        color: #7f3517;
        text-shadow: 3px 3px 3px #aaa;
    }
    .dt-sc-hr-invisible {
        border-bottom: 1px solid #af684a;
        opacity: 0.25;
    }
</style>


<!-- breadcrumb div Starts here -->
            <section class="breadcrumb-wrapper">
                <div class="container">
                    <h1 class="page-title">Our Products</h1>
                </div>
            </section>
            <!-- breadcrumb div Ends here -->
            <div class="main-container">
                <div class="container">
                   <section id="primary" class="content-full-width">
<!--                        <h2 class="block-title">Our Products</h2>-->
                    <?php foreach($products as $category): ?>
                        <h3 class="block-title"><?= $category['Category']['name']; ?></h3>
                        <?php if(empty($category['Product'])): ?>
                        <p><em>--- None Listed ---</em></p>
                        <?php endif; ?>

                        <?php $counter = 0; foreach($category['Product'] as $p) { $first=""; if($counter % 3 == 0) {
                            /*echo '<div class="dt-sc-hr-invisible"></div>';*/ $first="first"; } $counter++; ?>
                        <!--<h3>Cookies</h3>-->
                        <div class="column dt-sc-one-third <?= $first; ?>">
                                <div class='product-name'><?= $p['name']; ?></div><small><em><?= $p['description']; ?></em></small>
                            <br>
                            <ol class="dt-sc-fancy-list  blue  decimal">
                                <?php foreach($p['Flavor'] as $flavor): ?>
                                <li><span> 
                                        <?php if(!empty($flavor['image_url'])): ?>
                                        <a class="fa fa-camera" href="<?php $flavor['image_url']; ?>"> </a>
                                        <?php endif; ?>
                                        <strong><?= $flavor['name']; ?></strong>  
                                        <?php if(!empty($flavor['description'])): ?>
                                            <?= $flavor['description']; ?>
                                        <?php endif; ?>
                                    </span>
                                </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                        <!-- End for each here?  -->
                        
                        <?php } ?>
                        <!--<div class="dt-sc-hr-invisible"></div>-->
                    <?php endforeach; ?>
                   </section>
                </div>
            </div>
