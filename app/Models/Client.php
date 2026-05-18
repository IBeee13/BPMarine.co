<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'company', 'country',
        'contact_message_id', 'project_id', 'status', 'notes'
    ];

    public function contactMessage()
    {
        return $this->belongsTo(ContactMessage::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}