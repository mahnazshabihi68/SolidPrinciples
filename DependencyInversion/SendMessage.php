<?php

interface Sender
{
    public function send($message);
}

class Mailer implements Sender
{
    public function send($message)
    {
        return "send $message with email";
    }
}

class SMSer implements Sender 
{
    public function send($message)
    {
        return "send $message with sms";
    }
}

class SendWellcomeMessage
{
    protected $sender;

    public function __construct(Sender $sender)
    {
        $this->sender = $sender;
    }

    public function sendMessage($message)
    {
        return $this->sender->send($message);
    }
}

$sample = new SendWellcomeMessage(new Mailer());
echo $sample->sendMessage('hi');