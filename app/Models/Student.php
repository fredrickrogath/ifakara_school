<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_level_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'from',
        'parent',
        'parent_contact',
        'school_id',
        'permission_received',
        'permission_seen',
        'head_permission',
        'financial_secreatary_permission',
    ];

    public function getStudent($id)
    {
        return \App\Models\Student::where('id', $id)->get()->first();
    }

    public function notification(){
        return $this->hasOne('App\Models\Notification','object_id','id');
    }

    public function entries()
    {
        return $this->hasOneThrough(
            'App\Models\Entry',
            'App\Models\EntryStudent',
            'student_id',
            'id',
            'id',
            'entry_id'
        )->with('chartOfAccount');
    }

    // public function chartOfAccounts()
    // {
    //     return $this->belongsToMany('App\Models\ChartsOfAccount', 'entry_students', 'student_id', 'charts_of_accounts_id');
    // }
    
    // public function user()
    // {
    //     // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
    //     return $this->belongsTo('App\Models\User','user_id','id');
    // }
}
