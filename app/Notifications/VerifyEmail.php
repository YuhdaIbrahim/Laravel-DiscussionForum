<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\VerifyEmail as BaseVerifyEmail;

class VerifyEmail extends BaseVerifyEmail implements ShouldQueue
{
    use Queueable;

}
