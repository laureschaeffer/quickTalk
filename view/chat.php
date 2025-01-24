<h1>Your conversations</h1>

<?php

$conversations = $data;


foreach ($conversations as $conversation) {
    $lastMessageDate = new DateTime($conversation["last_message_date"]);
    // if I'm not the person sending msg
    if($conversation["id_user"] !== $_SESSION["user"]["id_user"]){ ?>
        <div>
            <a href="index.php?action=conversation&id=<?= $conversation["id_user"] ?>">
                <img src="https://placehold.co/50" alt="placeholder" class="profil__picture">
                <span><?= $conversation['pseudo'] ?></span>
            </a>
            
            <span><?= $lastMessageDate->format("d-m H:i") ?></span>
        </div>
        <?php
    }
}

?>
<!-- messagerie -->
<div id="chat">
    <!-- content -->
    <div id="chat__content">
        <!-- message from friend -->
        <div class="chat friend">
            <img src="https://placehold.co/50" alt="placeholder" class="profil__picture">
            <span class="text__content">Lorem ipsum dolor, sit amet consectetur adipisicing el</span>
            <!-- <span>12:00</span> -->
        </div>
        <div class="chat you">
            <span class="text__content">Lorem ipsum dolor, sit amet consectetur adipisicing el</span>
            <img src="https://placehold.co/50" alt="placeholder" class="profil__picture">
            <!-- <span>12:05</span> -->
        </div>
    </div>
    <div id="chat__send__msg">
        <form action="#" method="post">
            <input type="text" class="form-control" id="message" name="message" placeholder="Type something...">
            <button type="submit" class="btn btn-primary" name="submit">Send</button>
        </form>
    </div>
</div>
