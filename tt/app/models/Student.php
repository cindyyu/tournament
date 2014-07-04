<?php

class Student extends Eloquent 
{
	// does nothing more than 
	// specify the table in the database
	protected $table = 'students';


	public function school()
    {
        return $this->belongsTo('User');
    }

}

?>