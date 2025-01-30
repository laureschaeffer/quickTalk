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

