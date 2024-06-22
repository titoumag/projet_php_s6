<?php
//
//namespace App\Service ;
//
//use Symfony\Component\Mime\Email;
//use Symfony\Component\Mailer\MailerInterface;
//
//readonly class MailerService{
//
//    public function __construct(
//        private MailerInterface $mailer,
//    ){}
//    
//
//    public function sendByEmail (string $message ,  string $receiverAddress  ): void
//    {
//        $email = (new Email())
//    ->from('bot.love.test@gmail.com')
//    // ->to($user->getEmail())
//    ->to($receiverAddress)
//    // ->priority(Email::PRIORITY_HIGH)
//    ->subject('Time for Symfony Mailer!')
//    ->text('Sending emails is fun again!')
//    ->html('<p>See Twig integration for better HTML integration!</p>');
//    $toto = $this->$mailer->send($email);
//    }
//
//}
//
//