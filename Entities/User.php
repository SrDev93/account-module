<?php

namespace Modules\Account\Entities;

use App\Models\Election;
use App\Models\Honor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Laravel\Sanctum\HasApiTokens;
use Modules\Advertisement\Entities\Advertisement;
use Modules\Base\Entities\Photo;
use Modules\Project\Entities\Project;
use Modules\Shop\Entities\Factor;
use Modules\Shop\Entities\Seller;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Account\Database\factories\UserFactory::new();
    }

    public function getNameAttribute()
    {
        return $this->first_name.' '. $this->last_name;
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'pictures');
    }

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }

    public function address()
    {
        return $this->hasMany(Factor::class);
    }

    public function factor()
    {
        return $this->hasMany(Factor::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::deleting(function ($user){
            if ($user->photo){
                File::delete($user->photo->path);
                $user->photo->delete();
            }
        });
    }
}
