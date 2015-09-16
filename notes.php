
use Esensi\Model\Model;

class CalendarEvent extends Model
{
	
protected $table = 'calendar_events';

protected $rules = array(
	/*  */
);
protected $fillable = array (

);

public function getDates()
{
	return array_merge(parent::getDates(), 'start_time', 'end_time');
}

public function creator()
{
	return $this->belongsTo('User', 'user_id');
}

}


php artisan generate:migration create_users_table