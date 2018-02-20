<?php

namespace App\Mail;

use App\Job;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcceptJobNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $job;
    protected $user;
    protected $school;


    public function __construct(Job $job, User $user, User $school)
    {
        $this->job = $job;
        $this->user = $user;
        $this->school = $school;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.job.acceptjobnotification')
            ->with([
                'applicantName' => $this->user->name,
                'jobTitle' => $this->job->title,
                'schoolName' => $this->school->name,
                'applicantUrl' => 'http://guru.apc/' //in the future, make this url for profile
            ]);
    }
}
