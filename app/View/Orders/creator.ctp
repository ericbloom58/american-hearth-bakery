<style>
    .product-name {
        font-weight: bold;
        font-size: 115%;
        color: #7f3517;
        text-shadow: 3px 3px 3px #aaa;
    }
    .product-description{
        font-weight:normal;
        font-size: 75%;
        color: #000000;
        text-shadow: none;
    }
    .dt-sc-hr-invisible {
        border-bottom: 1px solid #af684a;
        opacity: 0.25;
    }
    .block-title{ margin-bottom: 0;}
    
    .container{
        width: 80%;
    }
</style>
<form id='orderForm' method='post' action='/orders/creator'>


<!-- breadcrumb div Starts here -->
            <section class="breadcrumb-wrapper">
                <div class="container">                         
                            <h3 class='page-title'>Please input the date you would like your order to arrive. </h3>
                            <input name='data[Order][dateneeded]' type="date">
                            <input class="dt-sc-button small blue" type='submit' value='Place Order'/>
                </div>
            </section>
            <!-- breadcrumb div Ends here -->
            <div class="main-container">
                <div class="container">
                   <section id="primary" class="content-full-width">
                    <?php foreach(array_reverse($products) as $category): ?>
                    <?php // foreach($products as $category): ?>
                        <h3 class="block-title"><?= $category['Category']['name']; ?></h3>
                        <?php if(empty($category['Product'])): ?>
                        <p><em>--- None Listed ---</em></p>
                        <?php endif; ?>

                        <?php $counter = 0; foreach($category['Product'] as $p) { if($counter > 3) { $counter = 0; } $counter++; $first=""; if(($counter % 3 === 0) || ($counter === 0))  {
                            /*echo '<div class="dt-sc-hr-invisible"></div>';*/ $first="first"; }; ?>
                        <div class="column dt-sc-one-fourth first">
<!--                                <div class='product-name'>
                                    <?= $p['name']; ?> <div class="product-description"><em><?= $p['description']; ?></em></div>
                                </div>
                            <br>-->
                                                <ul class="dt-sc-fancy-list  blue  decimal">
                                                    <table class="order-table">
                                                        <tr>
                                                            <th><div class="product-name"><?= $p['name']; ?><div class="product-description"><em><?=$p['description']; ?></em></div></div> </th>
                                                            <?php if(!empty($p['Option'])): ?><th> Options </th>
                                                            <th>
                                                                    <?php if(!(sizeof($p['Option']) === 1 && strtolower($p['Option'][0]['name']) === 'none')): ?>
                                                                <select multiple name='data[Order][<?= $p['id']; ?>][<?= $flavor['id']; ?>][options][]'>
                                                                <?php foreach($p['Option'] as $option): ?>
                                                                    <option value='<?= $option['id']; ?>'> <?= $option['name']; ?> </option>
                                                                <?php endforeach; ?> 
                                                                </select>
                                                                <?php endif;?>
                                                            </th>
                                                            <?php endif;?>
                                                        </tr>
                                                        <tr> 
                                                            <th> Flavors </th>
                                                            <th> Quantity </th>
                                                        </tr>
                                                    <?php foreach($p['Flavor'] as $flavor): ?>
                                                        <tr>
                                                            <td> 
                                                                 <?= $flavor['name']; ?>
                                                            </td>
                                                            <td>
                                                                <select name="data[Order][<?= $p['id']; ?>][<?= $flavor['id']; ?>][quantity]">
                                                                    <?php if($p['Quantity'][0]['id'] === "1") 
                                                                        {echo $this->element('quantitiesindividuals');}
                                                                    else if($p['Quantity'][0]['id'] === "2") 
                                                                        {echo $this->element('quantitiesdozen');}
                                                                    else if ($p['Quantity'][0]['id'] === "3") 
                                                                        {echo $this->element('quantitieshalf_dozen');} 
                                                                    else 
                                                                        {echo $this->element('quantitiesindividuals');} 
                                                                        ?> 
                                                                </select>
                                                                <!--<input style="width:100px;" name='data[Order][<?= $p['id']; ?>][<?= $flavor['id']; ?>][quantity]' type="text" class="input-text" title="Only Numerical Characters are allowed.">-->
                                                            </td>    
                                                            
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </table>
                                                  
                                                </ul>
                        </div>
                        <!-- End for each here?  -->
                        
                        <?php } ?>
                        <!--<div class="dt-sc-hr-invisible"></div>-->
                    <?php endforeach; ?>
                   </section>
                </div>
            </div>
            <section class="breadcrumb-wrapper">
                <div class="container" style='margin-bottom: 100px;'>                         
                            <h3 class='page-title'>Please input the date you would like your order to arrive.</h3>
                            <input name='data[Order][dateneeded]' type="date">
                            <input class="dt-sc-button small blue" type='submit' value='Place Order'/>
                </div>
            </section>

</form>            
            <!--Stuff for old table options header-->
                <?php /*if(!empty($p['Option'])): ?><th> Options </th><?php endif;*/?>
            
            <!--Stuff for old table options row-->
                <?php /*if(!empty($p['Option'])): ?>
                                                            <td>
                                                                    <?php if(!(sizeof($p['Option']) === 1 && strtolower($p['Option'][0]['name']) === 'none')): ?>
                                                                <select multiple name='data[Order][<?= $p['id']; ?>][<?= $flavor['id']; ?>][options][]'>
                                                                <?php foreach($p['Option'] as $option): ?>
                                                                    <option value='<?= $option['id']; ?>'> <?= $option['name']; ?> </option>
                                                                <?php endforeach; ?> 
                                                                </select>
                                                                <?php endif;?>
                                                            </td>
                                                            <?php endif; */?>
            
            
            <!-- crap for hoverer -->
<!--                <div class="col-md-6 col-xs-12">
                        <div class="hoverer">
                            <div class='picture-space'>
                            <img src="/img/grandfather.PNG" class="img-responsive" style=" border: 5px solid #661919; " alt="">
                            <span>
                                <div class="video-container">
                                    <div class='video-space'>
                                    <iframe src="https://www.youtube.com/embed/By5dSOUJd_U" style=" border: 5px solid #661919; " height="100%" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </span>
                            </div>
                        </div>
                    </div>-->


<?php $this->start('scripts'); ?>
<script>
    jQuery("#orderForm").submit(function(e) {
        $answer = confirm("Are you sure you want to submit this order?");
        if(!$answer)
         e.preventDefault();
    });
    
</script>
<?php $this->end(); ?>