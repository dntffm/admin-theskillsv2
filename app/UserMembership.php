<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class UserMembership extends Model{
    protected $table = 'user_membership';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function membership()
    {
        return $this->belongsTo('App\Membership');
    }
}