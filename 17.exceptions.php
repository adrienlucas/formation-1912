<?php


class HackingAttemptException extends Exception {

}

class User {
    private string $email;

    public function setEmail(string $email): void
    {
        // We should have valid emails in order to send notifications
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Please provide a valid.'); // sans catch, ceci est un die()
        }

        if(strpos($email, '@pirate.com')) {
            throw new HackingAttemptException('The domain pirate.com is forbidden.');
        }

        $this->email = $email;
    }
}

$display = '';

$someUser = new User();
$tryEmail = 'toto@tata.titi'; // <input type="text" name="email" />
try {
    $someUser->setEmail($tryEmail); // throw new \Exception()
    $display .= "The user seams valid.";
} catch (InvalidArgumentException $exception) {
    $display .= 'Désolé, mais l\'adresse saisie n\'est pas valide,' .
        ' veuillez resaisir (erreur technique : ' . $exception->getMessage() . ')';
    // affiche le formulaire
} catch (HackingAttemptException $exception) {
    $display .= 'Désolé, le site nest pas disponible';
    //$mailer->sendAlert('Tentative de piratage', 'Ladresse ip .... a essayé de pirater le site');
} finally {
    $display .= 'User creation has ended.';
}

echo $display;