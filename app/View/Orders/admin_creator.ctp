<style>
    .product-name {
        font-weight: bold;
        font-size: 115%;
        color: #7f3517;
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
        width: 100%;
    }
    
    .block-title, .block-title-bor { clear:both; font-size:30px; }
	.block-title-bor { float:left; width:100%; padding-bottom:6px; }
	.block-title, .block-title.aligncenter, .block-title-bor { margin-bottom:43px; }
	.block-title.aligncenter { text-align:center; }
	h3.block-title { font-size:24px; }
        
    /*----*****---- << Tables >> ----*****----*/
    table{ border-collapse:separate; border-spacing:0; margin-bottom:20px; width:100%; clear:both; border:2px solid #b6b4b4; border-bottom:2px; border-right:2px;}
    th{ color:#000000; border-right:2px solid #b6b4b4; border-bottom:2px solid #b6b4b4; padding:5px; font-size:14px; line-height:normal; font-weight:600; text-transform:capitalize; text-align:left; }
    td{ border-right:2px solid #b6b4b4; border-bottom:2px solid #b6b4b4; font-size:14px; line-height:normal; text-align: left; padding:5px; }
        .scrollbar {
		width:12.6666666667%;
		float: left;
		margin-left: 3.999999999966667%;
	
    }
    .test {
    margin-left: -50px;
    }
     @media (min-width: 1025px and max-width: 1599px) {
     .col-lg-3:nth-child(3n + 1) {
        clear: both;
     }
    }
     @media (min-width: 769x and max-width: 1024px) {
     .col-md-4 {
        clear: both;
     }
    }
    
     @media (max-width: 414px) {
     .col-xs-12:nth-child(n + 1) {
        clear: both;
    }
     }
    
    
    
    @media (min-width: 1600px) {
                              
    .col-xl-2 {
		width:16.66666667%;
		float: left;
		    padding-right: 15px;
    padding-left: 15px;
    }
    .col-xl-2:nth-child(6n + 1) {
        clear: both;
    }
    }
    
   
    /*@media only screen and (min-width: 200px)  and (max-width: 767px)  {
    }*/
</style>
<form id='orderForm' method='post' action='/admin/orders/creator'>
<!-- breadcrumb div Starts here -->
            <!-- breadcrumb div Ends here -->
            <div class="main-container">
                <div class="container">
                   <!--<section id="primary" class="content-full-width">-->
                    <div id=primary" class="col-md-12 col-xs-12">
                    <?php foreach(array_reverse($products) as $category): ?>
                    <?php // foreach($products as $category): ?>
                        <h3 class="block-title"><?= $category['Category']['name']; ?></h3>
                        <?php if(empty($category['Product'])): ?>
                        <p><em>--- None Listed ---</em></p>
                        <?php endif; ?>
                        <div class="row">
                        <?php $counter = 0; $counter2 = 0; foreach($category['Product'] as $p){ //if(($counter % 6 === 0)) { echo '</div><div class="col-md-12 col-xs-12">'; $counter = 0;  }; $counter++; $counter2++;  ?>
                        <!--<div class="column dt-sc-one-fourth first">-->
                        <!--<div class="scrollbar">  --> <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<!--                                
							<div class='product-name'>
                                    <?= $p['name']; ?> <div class="product-description"><em><?= $p['description']; ?></em></div>
                                </div>
                            <br>
							-->
                                                <ul class="dt-sc-fancy-list  blue  decimal test">
                                                    <table class="order-table">
                                                        <tr>
														<!-- <th colspan="2"> -->
                                                            <th colspan="2"><div class="product-name"><?= $p['name']; ?><div class="product-description"><em><?=$p['description']; ?></em></div></div></th>
															
                                                        </tr>
                                                        <tr>
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
                                                                 <?= $flavor['name']; ?>     <em><?=$flavor['description']; ?></em>
                                                            </td>
                                                            <td>
                                                                <select style="width:50px;" name="data[Order][<?= $p['id']; ?>][<?= $flavor['id']; ?>][quantity]">
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
                        </div>
                    <?php endforeach; ?>
                   </div>
                </div>
            </div>
                <div class="container" style="
                     width: 45%;
                     padding: 10px 5%;
                     display: table;
                     margin: 0 auto;
                     margin-left: 20%;
                     background: #f4f4f4;
                     position: fixed;
                     bottom: 5px;
                     text-align: right;
                     border: solid 2px;
                     ">                         
                            <h3 class='page-title' style='margin-right:10%;'>Please input the date you would like your order to arrive. </h3>
                            <input name='data[Order][dateneeded]' type="date">
                            <input class="dt-sc-button small blue" type='submit' value='Place Order'/>
                </div>
</form>           
<?php $this->start('scripts'); ?>
<script>
    jQuery("#orderForm").submit(function(e) {
        $answer = confirm("Are you sure you want to submit this order?");
        if(!$answer)
         e.preventDefault();
    });
    
</script>
<?php $this->end(); ?>