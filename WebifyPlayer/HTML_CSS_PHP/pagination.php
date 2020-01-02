<div id="page">
  <?php
  /* Set current, prev and next page */
  $page = (!isset($_GET['page']))? 1 : $_GET['page'];
  $value= $_GET['value'];
  if ($value == 0) {
      $search = $_POST['searchquery'];
  }
  else{
      $search = $_GET['searchquery'];
  }
  $prev = ($page - 1);
  $next = ($page + 1);

  /* Calculate the offset */
  $from = (($page * $max_results) - $max_results);

  /* Query the db for total results.
     You need to edit the sql to fit your needs */
  $total_pages = ceil($counter / $max_results);

  $pagination = '';

  /* Create a PREV link if there is one */
  if($page > 1)
  {
      $pagination .= '<a href="search_query.php?page='.$prev.'&searchquery='.$search.'&count1='.$count1.'&count2='.$count2.'&count3='.$count3.'&count4='.$count4.'&value=1">Previous</a> ';
  }

  /* Loop through the total pages */
  for($i = 1; $i <= $total_pages; $i++)
  {
      if(($page) == $i)
      {
          $pagination .= $i;
      }
      else
      {
          $pagination .= '<a href="search_query.php?page='.$i.'&searchquery='.$search.'&count1='.$count1.'&count2='.$count2.'&count3='.$count3.'&count4='.$count4.'&value=1">'.$i.'</a>';
      }
  }

  /* Print NEXT link if there is one */
  if($page < $total_pages)
  {
      $pagination .= '<a href="search_query.php?page='.$next.'&searchquery='.$search.'&count1='.$count1.'&count2='.$count2.'&count3='.$count3.'&count4='.$count4.'&value=1"> Next</a>';
  }

  /* Now we have our pagination links in a variable($pagination) ready to
     print to the page. I pu it in a variable because you may want to
     show them at the top and bottom of the page */

  /* Below is how you query the db for ONLY the results for the current page */
  echo $pagination;
  ?>

</div>
