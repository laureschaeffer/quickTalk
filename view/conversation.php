<?php

$messages = $data;
?>

<div id="chat">
    <!-- content -->
    <div id="chat__content">
        <?php
        foreach($messages as $message){ 
            $messageDate = new DateTime($message["date"]);
            // message from friend
            if($message['user_sender'] !== $_SESSION["user"]["id_user"]){ ?>
                <div class="chat friend">
            <?php 
            //message you sent
            } else { ?>
                <div class="chat you">
                <?php
            } ?>
                    <span class="text__content"><?= $message['content']?></span>
                    <span><?= $messageDate->format("d-m H:i") ?></span>
                </div>
            <?php
        } ?>
    </div>
    <div id="chat__send__msg">
        <form action="#" method="post">
            <input type="text" class="form-control" id="message" name="message" placeholder="Type something...">
            <button type="submit" class="btn btn-primary" name="submit">Send</button>
        </form>
    </div>
</div>