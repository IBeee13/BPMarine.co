<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'country',
        'subject',
        'message',
        'is_read',
        'status',
    ];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    protected static function booted()
    {
        static::updated(function ($message) {
            if ($message->wasChanged('status')) {

                if (in_array($message->status, ['accepted', 'rejected'])) {
                    $message->updateQuietly(['is_read' => true]);
                }

                if ($message->status === 'accepted') {
                    Client::firstOrCreate(
                        ['contact_message_id' => $message->id],
                        [
                            'name'    => $message->name,
                            'email'   => $message->email,
                            'phone'   => $message->phone,
                            'company' => $message->company,
                            'country' => $message->country,
                            'status'  => 'in_progress',
                        ]
                    );
                }
            }
        });
    }
}