<?php
session_start();
if(!(isset($_SESSION['id']))){
    header('Location: login.php');
}else{

if($_SESSION['rank'] == "0"){
    header('Location: index.php');
}{


require('db.php');
if(isset($_POST['logb'])){
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $req = $bdd->prepare('INSERT INTO users(user, pass, rank) VALUES(:user, :pass, :rank)');
    $req->execute(array(
        'user' => $_POST['login'],
        'pass' => $pass_hache,
        'rank' => $_POST['rank']
    ));
    header('Location: admin_membre.php');
}

$accounts = $bdd->query('SELECT * FROM users');
?>

<html>
    <head>
        <title>Vanilla - Compte Membre</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body style="background-color: #464646;">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark content-blur">
        <div class="container">
          <a class="navbar-brand text-white" href="index.php">Unicorn - Interface Web</a>
          <a class="navbar-link text-white">Chiffre d'affaire/heb : <strong>80.000$</strong></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
                <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="incomes.php">Chiffre d'affaire</a>
                  <a class="dropdown-item" href="archives.php">Archives</a>
                  <a class="dropdown-item" href="devis.php">Devis</a>
                  <a class="dropdown-item" href="logout.php">Deconnexion</a>
                  <?php if($_SESSION['rank'] == "1"){ ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="admin_membre.php">Patron - membres</a>
                  <?php } ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
        <div class="container">
            <br />
            <form method="post" class="form-signin">
            <h1 class="text-white">Enregister un nouveau membre</h1>
            <label class="text-white">Username :</label><input type="text" class="form-control" name="login" placeholder="Votre Pseudo" required autofocus/>
            <label class="text-white">Password :</label><input type="password"  class="form-control" name="pass" required/>
            <label class="text-white">Rang :</label><input type="text"  class="form-control" name="rank" required/>
            <h5 class="text-white">0 = membre / 1 = membre + gestion</h5>

            <input type="submit" class="btn btn-lg btn-primary btn-block" name="logb" value="Create" />
        </form>
        <hr class="text-white"/>
        <h1 class="text-white">Liste des membres</h1>
        <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="text-white">#</th>
                  <th scope="col" class="text-white">Nom</th>
                  <th scope="col" class="text-white">Rang</th>
                  <th scope="col" class="text-white">Action</th>
                </tr>
              </thead>
              <tbody>
        <?php
            while($data = $accounts->fetch()){
        ?>
                <tr>
                  <th scope="row" class="text-white"><?php echo $data['id']; ?></th>
                  <td class="text-white"><?php echo $data['user']; ?></td>
                  <td class="text-white"><?php echo $data['rank']; ?></td>
                  <td class="text-white"><a href="admin_delete.php?id=<?php echo $data['id']; ?>">Delete Account</a></td>
                </tr>

        <?php
            }
        ?>
                  </tbody>
            </table>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

<?php
    $accounts->closeCursor();
}
}
?>
