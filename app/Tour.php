<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = ['title', 'description', 'available_from', 'available_to', 'image', 'rate', 'rules'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function users() {
		return $this->belongsTo('\App\Models\Access\User\User');
	}
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
	 */
	public function activities() {
		return $this->belongsToMany('\App\Activity', 'tour_activities');
	}
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function reviews() {
		return $this->hasMany('\App\Review');
	}

}
