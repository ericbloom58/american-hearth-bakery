
<style>
    .product-name {
        font-weight: bold;
        font-size: 115%;
        color: #7f3517;
    }
    .dt-sc-hr-invisible {
        border-bottom: 1px solid #af684a;
        opacity: 0.25;
    }
</style>
<form id='orderForm' method='post' action='/orders/creator'>
<!-- breadcrumb div Starts here -->
<!--            <section class="breadcrumb-wrapper">
                <div class="container">
                    <h1 class="page-title">Shop three column with left sidebar</h1>
                    <div class="float-right breadcrumb">
                        <a href="index.html">Home</a>
                      <span>/</span>
                      <h2>Shop</h2>
                    </div>
                </div>
            </section>-->
            <!-- breadcrumb div Ends here -->
            <!-- header div Ends here -->
            <div class="main-container">
                <div class="container">
                    
                    <section id="primary" class="with-left-sidebar"  style="width:150%; margin-right:-40%;">
                            <div class="dt-sc-toggle-frame-set">
                                <?php foreach($products as $category): ?>
                                <div class="dt-sc-toggle-frame">	
                                    <h5 class="dt-sc-toggle"><a href="#"><?= $category['Category']['name']; ?></a></h5>
                                        <?php if(empty($category['Product'])): ?>
                                        <div class="dt-sc-toggle-content">	
                                            <div class="dt-sc-block">
                                                <p><em>--- None Listed ---</em></p>
                                            </div> 
                                        </div>
                                        <?php endif; ?>
                                    <div class="dt-sc-toggle-content">	
                                        <div class="dt-sc-block">

                                            <?php $counter = 0; foreach($category['Product'] as $p) { $first=""; if($counter % 3 == 0) {
                                            /*echo '<div class="dt-sc-hr-invisible"></div>';*/ $first="first"; } $counter++; ?>
                                            <!--<h3>Cookies</h3>-->
                                            <div class="column dt-sc-one-third <?= $first; ?>">
                                                <div class='product-name'><?= $p['name']; ?></div><small><em><?= $p['description']; ?></em></small>
                                                <br>
                                                <ul class="dt-sc-fancy-list  blue  decimal">
                                                    <table class="order-table">
                                                        <tr> 
                                                            <th> Flavor </th>
                                                            <th> Quantity </th>
                                                            <th> Options </th>
                                                        </tr>
                                                    <?php foreach($p['Flavor'] as $flavor): ?>
                                                        <tr>
                                                            <td> 
                                                                 <?= $flavor['name']; ?>
                                                            </td>
                                                            <td>
                                                                <input style="width:100px;" name='data[Order][<?= $p['id']; ?>][<?= $flavor['id']; ?>][quantity]' type="text" class="input-text" title="Only Numerical Characters are allowed.">
                                                            </td>
                                                            <td>    
                                                                <?php if(!empty($p['Option'])): ?>
                                                                    <?php if(!(sizeof($p['Option']) === 1 && strtolower($p['Option'][0]['name']) === 'none')): ?>
                                                                <select multiple name='data[Order][<?= $p['id']; ?>][<?= $flavor['id']; ?>][options][]'>
                                                                <?php foreach($p['Option'] as $option): ?>
                                                                    <option value='<?= $option['id']; ?>'> <?= $option['name']; ?> </option>
                                                                <?php endforeach; ?> 
                                                                </select>
                                                                <?php endif;  endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </table>
                                                  
                                                </ul>
                                            </div>
                                            <!-- End for each here?  -->
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                    </section>
                    <section id="secondary" class="left-sidebar" style="margin-left:-40%;">
                        <aside class="widget widget_categories">                            
                            <h4>Please input the date you would like your order to arrive.</h4>
                            <input name='data[Order][dateneeded]' type="date">
                            <input class="dt-sc-button small blue" type='submit' value='Place Order'/>
                        </aside>
                    </section>
                </div>
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