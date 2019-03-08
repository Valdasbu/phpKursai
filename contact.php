<?php require_once 'function.php'; ?>
<section class="contact">
    <div class="title">
        <h2 id=cia>Contact Us</h2>
    </div>
    <div class="container flex">
        <div class="form">
            <form action=#cia method="post" novalidate autocomplete="on">
                <input type="text" name="fullname" placeholder="Full name" autocomplete>
                    <p><?=$fullNamePranesimas;?></p>
                <input type="text" name="email" placeholder="E-mail" autocomplete>
                <p><?=$emailPranesimas;?></p>
                <textarea name="sendmessage" placeholder="Message" autocomplete></textarea>
                <p><?=$sendMessagePranesimas;?></p>
                <button type="submit">Send</button>
                <p><?=$sekmeMessage;?></p>
            </form>
        </div>
        
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.2196022838775!2d25.335691251101817!3d54.72335198019391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0x86772a85fe5a2719!2sBaltic+Talents+Vilnius!5e0!3m2!1sen!2slt!4v1525271005315" width="400" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
            <p>811 7th Avenue 53rd Street New York, 10019, United States</p>
        </div>
    </div>
</section>

</main>
