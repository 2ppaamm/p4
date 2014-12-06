<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    // required for Oauth
    protected $fillable = ['username', 'email','image'];

    // Relationships
    public function course_roles(){
        return $this->hasManyThrough('App\Course_role', 'App\Enrollment');
    }

    public function instructable_courses(){
        return $this->hasManyThrough('App\Course_code', 'App\instructor_course');
    }
}
