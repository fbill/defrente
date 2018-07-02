<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function formatDateEvent()
    {
        //Carbon::setLocale('es');
        //setlocale(LC_TIME, 'Spanish_Peru');
        $lenguage = 'es_ES.UTF-8';
        putenv("LANG=$lenguage");
        setlocale(LC_ALL, $lenguage);
        $dt = Carbon::parse($this->date);
        Carbon::setUtf8(false);
        $fecha = ucwords($dt->formatLocalized('%A'));
        if ($fecha == 'Miércoles') {
            return 'Mié';
        } else {
            return substr($fecha, 0, 3);
        }

    }
    public function formatEventDay()
    {
        //Carbon::setLocale('es');
        //setlocale(LC_TIME, 'Spanish_Peru');
        $lenguage = 'es_ES.UTF-8';
        putenv("LANG=$lenguage");
        setlocale(LC_ALL, $lenguage);
        $dt = Carbon::parse($this->date);
        Carbon::setUtf8(false);
        $fecha = ucwords($dt->formatLocalized('%A'));
        return $fecha;

    }

    public function formatEventMonth()
    {
        //Carbon::setLocale('es');
        //setlocale(LC_TIME, 'Spanish_Peru');
        $lenguage = 'es_ES.UTF-8';
        putenv("LANG=$lenguage");
        setlocale(LC_ALL, $lenguage);
        $dt = Carbon::parse($this->date);
        Carbon::setUtf8(false);
        $fecha = ucwords($dt->formatLocalized('%B'));
        return $fecha;

    }

    public function medias()
    {
        return $this->hasMany('App\Media');
    }

    public function sectors()
    {
        return $this->hasMany('App\Sector');
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != "")
        {
            $query->where('fullname','LIKE',"%$name%");
        }
    }
}
