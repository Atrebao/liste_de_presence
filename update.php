<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $telephone = $_POST['gendertelephone'];

  $sql = "UPDATE `etudiant` SET `nom`='$nom',`prenom`='$prenom',`email`='$email',`telephone`='$telephone' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <title>Document</title>
</head>
<body>
<div class="blob"></div>
<div class="wrapper">
<?php
    $sql = "SELECT * FROM `etudiant` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
  <form action="" method="post">
    <h2>Modifier un participant</h2>
    <div class="input-box">
      <span class="icon"><ion-icon name="person"></ion-icon></span>
      <input type="text" name="nom" value="<?php echo $row['nom'] ?>" >
      <label for="nom">Nom</label>

    </div>

    <div class="input-box">
      <span class="icon"><ion-icon name="people"></ion-icon></span>
      <input type="text"name="prenom" value="<?php echo $row['prenom'] ?>">
      <label for="prenom">Prenoms</label>

    </div>

    <div class="input-box">
      <span class="icon"><ion-icon name="mail"></ion-icon></span>
      <input type="email" name="email" value="<?php echo $row['email'] ?>" >
      <label for="email">Email</label>
    </div>

    <div class="input-box">
      <span class="icon"><ion-icon name="call"></ion-icon></span>
      <input type="number" name="phone" value="<?php echo $row['telephone'] ?>" >
      <label for="phone">Telephone</label>
    </div>

    <div class="button">
      <button type="submit" name="submit">Envoyer</button>
      <button class="cancel"><a href="index.php">Annuler</a></button>
    </div>
  </form>
</div>

</body>
</html>