<section id="products">
      <h2><a href="list_categories.php">Categories</a> &gt; <?=$category['name']?> Products</h2>
      <section class="list">

        <?php foreach($products as $product) { ?>
          <article>
            <h3><?=$product['name']?></h3>        
            <img src="images/<?=$product['id']?>.png">
            <span class="price">€<?=$product['price']?></span>
          </article>
        <?php } ?>

      </section>
</section>
