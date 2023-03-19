<?php

namespace App\Mail;

use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResponseWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    private Complaint $complaint ;
    private $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Complaint $complaint,$admin)
    {
        //
        $this->complaint=$complaint;
        $this->admin=$admin;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: "The supervisors response to the problem or suggestion",
            from:$this->admin->email,

        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.response_welcome_emails',
            with:[
            "response"=>$this->complaint->response,
            "name"=>$this->complaint->student_name,
            "admin_name"=>$this->admin->name]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
