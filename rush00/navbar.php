<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<ul id="menu-deroulant">
  <li><a class="active" href="index.php">Home</a></li>
  <?php
  if (!$_SESSION['loggued_on_user'])
    echo '<li><a href="login_auth.php">Sign in</a></li>';
  ?>
  <li><a href="#categories">Categories</a>
    <ul>
      <li id="categories">
        <form action="categories.php" method="get" id="cat_bar" autocomplete="off">
          <input type="text" name="cat" id="cat">
          <input type="submit" name="submit" value="find">
        </form>
      </li>
      <li>
        <div id="trouve"></div>

     </li>
   </ul>
  </li>
  <li><a href="#">Basket</a>
    <ul>
      <li><a href="basket.php">My basket</a></li>
      <li><a href="#"><?php
        $file = file("stock.csv");
        $nb_article = 0;
        $price = 0;
        if (isset($_SESSION['basket']))
          foreach ($_SESSION['basket'] as $key => $value) {
            $nb_article += $value['quantity'];
            if (isset($file[$value['id']]))
              $tab2 = explode(";", $file[$value['id']]);
            if (isset($tab2[6]))
              $price += $tab2[6] * $value['quantity'];
          }
        echo $nb_article.' articles';
      ?></a></li>
      <li><a href="#"><?php echo $price."$" ?></a></li>
    </ul>
  </li>
 <?php
 if (isset($_SESSION) && $_SESSION['loggued_on_user'])
  echo '<li><a href="#account">Account</a>
<ul>
<li><a href="logout.php">Logout</a></li>
<li><a href="user_panel.php">My Account</a></li>';
if ($_SESSION['grade'] == 'admin')
 echo '<li><a href="admin.php">Admin space</a></li>';
echo '</ul>
</li>';
if (isset($_SESSION) && $_SESSION['loggued_on_user'])
  echo '<li id="right"><a href="#">'.$_SESSION['loggued_on_user']."</a></li>";
?>
</ul>
<?php
	echo '<div id="li_search"><form action="search.php" method="get" id="search_bar">
<input type="text" name="search" id="search">
<input type="submit" name="submit" value="&#128270" id="search_button">
</form></div>';
?>
<script type="text/javascript">
          document.getElementById('cat').onkeyup = function() {
           $.post("auto_search.php", {txt:this.value}, function(data, status){
            var div = document.getElementById('trouve');
            div.innerHTML = data;
          });
         }
</script>
