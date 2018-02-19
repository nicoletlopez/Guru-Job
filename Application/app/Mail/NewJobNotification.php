<?php

namespace App\Mail;

use App\Job;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class NewJobNotification extends Mailable
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
        return $this->markdown('email.job.newjobnotification')
            ->with([
                'school' => $this->school->name,
                'jobTitle' => $this->job->title,
                'user' => $this->user->name,
                'url' => 'http://guru.apc/jobs/'.$this->job->id,
            ]);
    }
}
