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
    
    .block-title, .block-title-bor { clear:both; font-size:30px; }
	.block-title-bor { float:left; width:100%; padding-bottom:6px; }
	.block-title, .block-title.aligncenter, .block-title-bor { margin-bottom:43px; }
	.block-title.aligncenter { text-align:center; }
	h3.block-title { font-size:24px; }
        
    /*----*****---- << Tables >> ----*****----*/
    table{ border-collapse:separate; border-spacing:0; margin-bottom:20px; width:100%; clear:both; border:2px solid #b6b4b4; border-bottom:2px; border-right:2px;  }
    th{ color:#000000; border-right:2px solid #b6b4b4; border-bottom:2px solid #b6b4b4; padding:17px 15px; font-size:16px; line-height:normal; font-weight:600; text-transform:capitalize; text-align:center; }
    td{ border-right:2px solid #b6b4b4; border-bottom:2px solid #b6b4b4; font-size:14px; line-height:normal; text-align:center; padding:13px 15px; }
	
</style>
<form id='orderForm' method='post' action='/admin/orders/creator'>


<!-- breadcrumb div Starts here -->
            <!-- breadcrumb div Ends here -->
            <div class="main-container">
                <div class="container">
                   <!--<section id="primary" class="content-full-width">-->
                    <section id=primary" class="col-md-12 col-xs-12">
                    <?php foreach(array_reverse($products) as $category): ?>
                    <?php // foreach($products as $category): ?>
                        <h3 class="block-title"><?= $category['Category']['name']; ?></h3>
                        <?php if(empty($category['Product'])): ?>
                        <p><em>--- None Listed ---</em></p>
                        <?php endif; ?>

                        <?php $counter = 0; foreach($category['Product'] as $p) { if($counter > 3) { $counter = 0; } $counter++; $first=""; if(($counter % 3 === 0) || ($counter === 0))  {
                            /*echo '<div class="dt-sc-hr-invisible"></div>';*/ $first="first"; }; ?>
                        <!--<div class="column dt-sc-one-fourth first">-->
                        <div class="col-md-5 col-xs-5">
<!--                                <div class='product-name'>
                                    <?= $p['name']; ?> <div class="product-description"><em><?= $p['description']; ?></em></div>
                                </div>
                            <br>-->
                                                <ul class="dt-sc-fancy-list  blue  decimal">
                                                    <table class="order-table">
                                                        <tr>
                                                            <th colspan="2"><div class="product-name"><?= $p['name']; ?><div class="product-description"><em><?=$p['description']; ?></em></div></div></th>
                                                            <?php if(!empty($p['Option'])): ?><th> Options </th>
                                                            <th>
                                                                    <?php if(!(sizeof($p['Option']) === 1 && strtolower($p['Option'][0]['name']) === 'none')): ?>
                                                                <select multiple name='data[Order][<?= $p['id']; ?>][options][]'>
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
                                                                    else if ($p['Quantity'][0]['id'] === "4") 
                                                                        {echo $this->element('quantitieshalf_case');} 
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
                <div class="container" style="
                     width: 70%;
                     padding: 10px 5%;
                     display: table;
                     margin: 0 auto;
                     background: rgba(255,255,255,0.7);
                     position: fixed;
                     bottom: 5px;
                     text-align: right;
                     ">                         
                            <h3 class='page-title'>Please input the date you would like your order to arrive. </h3>
                            <input name='data[Order][dateneeded]' type="date">
                            <input class="dt-sc-button small blue" type='submit' value='Place Order'/>
                </div>
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





<!--                                                        <tr>
                                                            <th><div class="product-name"><?= $p['name']; ?><div class="product-description"><em><?=$p['description']; ?></em></div></div></th>
                                                            <?php /*if(empty($p['Option']))
                                                                    {echo "<th></th>";}
                                                                else {echo "<th> Options </th>
                                                            <th>
                                                                    <?php if(!(sizeof($p['Option']) === 1 && strtolower($p['Option'][0]['name']) === 'none')): ?>
                                                                <select multiple name='data[Order][<?= $p['id']; ?>][<?= $flavor['id']; ?>][options][]'>
                                                                <?php foreach($p['Option'] as $option): ?>
                                                                    <option value='<?= $option['id']; ?>'> <?= $option['name']; ?> </option>
                                                                <?php endforeach; ?> 
                                                                </select>
                                                                <?php endif;?>
                                                            </th>";}
                                                            */?>
                                                        </tr>-->