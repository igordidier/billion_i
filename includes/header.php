<div class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Billi</a>

    <a class="navbar-brand" href="index.php">Idea</a>


  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">


    <form id="srchbox"action="search.php" method="get">
  <table>
    	<td><input type="text" name="search" size="100" required style="border-radius: 10px;" placeholder="Search Username"></td>
    	<td><input id="srchbtn" type="submit" value="Search" name="submit"></td>
  </table>
    </form>


    <li class="nav-item active">
      <?php    echo '<a class="nav-link" href="logout.php">log out</a>';
      echo '<a class="nav-link" href="profil.php">'.  ucfirst($_SESSION["username"]) . '</a>';
      ?>
    </li>
  </div>
</nav>
</div>
