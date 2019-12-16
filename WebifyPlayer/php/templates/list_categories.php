<section id="categories">
  <h2>Categories</h2>
  <ul>
    <?php foreach ($categories as $category) { ?>
      <li>
        <a href="list_products.php?id=<?=$category['id']?>">
          <?=$category['name']?>
        </a>
      </li>
    <?php } ?>
  </ul>
</section>