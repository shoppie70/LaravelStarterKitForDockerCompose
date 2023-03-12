<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_type_id'
    ];

    public function details(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ContactFormDetail::class, 'form_id');
    }

    public function get_detail_value(string $slug_name): string
    {
        return $this->details->where('slug', $slug_name)->where('form_id', $this->id)->first()->value ?? ' - ';
    }
}
