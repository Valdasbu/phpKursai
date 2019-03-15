<?php
require_once "backend/function.php";

$db = connect();
$dbIrasai = getAllMessages($db);
 ?>

 <section class="team">
     <div class="containerTab">
        <div class="title">
           <h2>Messages list</h2>
        </div>

        <div class="back">
          <a href="index.php">Back</a>
        </div>

        <?php if(isset($_GET['delete'])): ?>
          <?php if($_GET['delete'] == 1): ?>
            <p>Message sėkmingai ištrinta!</p>
          <?php else: ?>
              <p>Message's nepavyko ištrinti!</p>
          <?php endif; ?>
        <?php endif; ?>

        <div class="flex">
            <table>
                <thead>
                     <tr>
                       <th>Full name</th>
                       <th>E'mail</th>
                       <th>Message</th>
                       <th>Date - Time</th>
                       <th>Actions</th>
                     </tr>
                </thead>

                <tbody>
                    <?php foreach($dbIrasai as $irasas): ?>
                 <tr>
                   <td><?=$irasas['fullname'];?></td>
                   <td><?=$irasas['email'];?></td>
                   <td><?=$irasas['sendmessage'];?></td>
                   <td><?=$irasas['date'];?></td>
                   <td><a href="#">Trinti</a></td>
                 </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
     </div>
 </section>
