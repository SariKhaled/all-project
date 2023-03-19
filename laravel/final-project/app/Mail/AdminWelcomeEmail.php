<?php

namespace App\Mail;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class AdminWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    private Admin $admin;
    private $decrypt_password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Admin $admin,$decrypt_password)
    {
        //
        $this->admin=$admin;
        $this->decrypt_password=$decrypt_password;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'verification the admin email',
            from:"support@support.com",
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
            markdown: 'emails.admin_welcome_email',
            with:["name"=>$this->admin->name,"email"=>$this->admin->email,"password"=>$this->decrypt_password,"id"=>$this->admin->id]

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
