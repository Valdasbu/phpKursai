<?php require_once 'backend/function.php';
    $sekme = '';
    $sekmeMessage = '';
    $fullNamePranesimas = '';
    $emailPranesimas = '';
    $sendMessagePranesimas = '';

    $old =['fullname' => '',
          'email' => '',
          'sendmessage' => ''];

    if(count($_POST) > 0) {
      if(empty($_POST['fullname'])) {
        $fullNamePranesimas = "Enter your full name";
        $sekme=false;
        $old['fullname'] = $_POST['fullname'];
      }
      elseif (strlen($_POST['fullname'])<3) {
        $fullNamePranesimas = "Vardas turi būti ne mažiau kaip 3 simboliai";
        $sekme=false;
        $old['fullname'] = $_POST['fullname'];
      }
      elseif (!isValidName($_POST['fullname'])) {
        $fullNamePranesimas = "Full name neturi būti skaičių";
        $sekme=false;
        $old['fullname'] = $_POST['fullname'];
      }

      if(empty($_POST['email'])) {
        $emailPranesimas = "Enter your email";
        $sekme=false;
        $old['email'] = $_POST['email'];
      }
      elseif(!isValidEmail($_POST['email'])) {
        $emailPranesimas = "Įveskite teisingą el. pašto adresą.";
        $sekme=false;
        $old['email'] = $_POST['email'];
      }

      if(empty($_POST['sendmessage'])) {
        $sendMessagePranesimas = "Enter your message";
        $sekme=false;
        $old['sendmessage'] = $_POST['sendmessage'];
      }
      elseif (strlen($_POST['sendmessage'])<=5||strlen($_POST['sendmessage'])>500) {
        $sendMessagePranesimas = "Message turi būti ne mažiau kaip 5 ir ne daugiau kaip 500 simbolių";
        $sekme=false;
        $old['sendmessage'] = $_POST['sendmessage'];
      }

      if($sekme !== false){
        $sekmeMessage = "Formos duomenys įvesti teisingai!!! Žinutė išsiųsta. Susisieksime su Jumis per artimiausias tris darbo dienas.";

        $user = 'root';
        $pass = '';

        $db = new PDO('mysql:host=localhost;dbname=raudonas_projektas',
                      $user,
                      $pass,
                      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

        $query = $db->prepare("INSERT INTO contact (fullname, email, sendmessage) VALUES (:fullname, :email, :sendmessage)");

        $query->execute([
                        'fullname' => $_POST['fullname'],
                        'email' => $_POST['email'],
                        'sendmessage' => $_POST['sendmessage']
                      ]);
      }
    }
?>
<section class="contact">
    <div class="title">
        <h2 id=cia>Contact Us</h2>
    </div>
    <div class="container flex">
        <div class="form">
            <form action=#cia method="post" novalidate autocomplete="on">
                <input type="text" name="fullname" placeholder="Full name" autocomplete value="<?=$old['fullname'];?>">
                    <p><?=$fullNamePranesimas;?></p>
                <input type="text" name="email" placeholder="E-mail" autocomplete value="<?=$old['email'];?>">
                <p><?=$emailPranesimas;?></p>
                <textarea name="sendmessage" placeholder="Message" autocomplete> <?=$old['sendmessage'];?></textarea>
                <p><?=$sendMessagePranesimas;?></p>
                <button type="submit">Send</button>
                <p><?=$sekmeMessage;?></p>
                <div class="back">
                    <a href="uzklausos.php">To Messages list</a>
                </div>
            </form>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.2196022838775!2d25.335691251101817!3d54.72335198019391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0x86772a85fe5a2719!2sBaltic+Talents+Vilnius!5e0!3m2!1sen!2slt!4v1525271005315" width="400" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
            <p>811 7th Avenue 53rd Street New York, 10019, United States</p>
        </div>
    </div>
</section>

</main>
