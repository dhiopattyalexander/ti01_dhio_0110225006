<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $name = htmlspecialchars($_POST['name']);
  $address = htmlspecialchars($_POST['address']);
  $phone = htmlspecialchars($_POST['phone']);
  $email = htmlspecialchars($_POST['email']);
  $instructions = htmlspecialchars($_POST['delivery-instructions']);
  $crust = htmlspecialchars($_POST['pizza-crust']);
  $toppings = isset($_POST['toppings']) ? $_POST['toppings'] : [];
  $quantity = htmlspecialchars($_POST['quantity']);
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Pemesanan Pizza Telah Berhasil </title>
    <link rel="stylesheet" href="css/output.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/3176/3176382.png" type="image/x-icon">
  </head>

  <body>
    <fieldset class="fieldset-style">
      <h1 class="text-center">TERIMA KASIH</h1>
      <hr class="border-style border-lightblue" />
      <p>Terimakasih telah memesan dari LEXXAPizzass. Kami telah menerima
        <br> informasi berikut tentang pesanan Anda:
      </p>
      <p class="text-orange">
        <b>Informasi Pemesanan</b>
      </p>
      <ul type="none">
        <li>
          <p>
            <b>Nama:</b> <?= $name ?>
            <br>
            <b>Alamat:</b> <?= $address ?>
            <br>
            <b>Nomor Telepon:</b> <?= $phone ?>
            <br>
            <b>Email:</b> <?= $email ?>
          </p>
        </li>
      </ul>
      <p>
        <b>Instruksi tambahan:</b> <?= $instructions ?>
      </p>
      <p class="text-orange">
        <b>Pizza anda</b>
      </p>
      <ul type="none">
        <li>
          <p>
            <b>Crust:</b> <?= $crust ?>
            <br>
            <b>Toppings:</b>
            <?= implode(", ", $toppings) ?>
            <br>
            <b>Number:</b> <?= $quantity ?>
          </p>
        </li>
      </ul>
      <hr class="border-style border-lightsalmon" />
      <p> ini untuk tes </p>
    </fieldset>
  </body>

  </html>
<?php
} else {
  echo "<script>alert('Please fill out the form first.');</script>";
  exit();
}
?>