<?php
/**
 * Created by PhpStorm.
 * User: malinbranduse
 * Date: 2018-10-31
 * Time: 18:42.
 */

namespace App\Http;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Vinkla\Hashids\Facades\Hashids;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait HasHashedId
{
    public function getRouteKey()
    {
        return Hashids::connection(get_called_class())->encode($this->getKey());
    }

    public function getHashAttribute()
    {
        return $this->getRouteKey();
    }

    public function getIdFromHash($hash)
    {
        try {
            return Hashids::connection(get_called_class())->decode($hash)[0]
                ?? Hashids::connection(get_called_class().'-old')->decode($hash)[0]
                ?? null;
        } catch (\InvalidArgumentException $exception) {
            Log::debug("Invalid hash:$hash for ".$exception->getMessage(), [
                'userId' => Auth::id(),
                'url' => request()->fullUrl()
            ]);
            return null;
        }
    }

    public function withoutHashEnforce()
    {
        $this->hashOnly = false;

        return $this;
    }

    /**
     * @param $value string|int Hash or Id of model
     * @return int
     */
    public function resolveId($value)
    {
        return $this->is_numeric($value) && ! $this->getHashOnly()
            ? $value
            : $this->getIdFromHash($value);
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $route = Route::current();
        $isDelete = collect(optional($route)->methods())->contains('DELETE');
        $query = $isDelete ? $this->withTrashed() : $this;
        $idOrHash = $this->resolveId($value);

        return $query->find($idOrHash);
    }

    protected function is_numeric($string)
    {
        return preg_match('/^[0-9]*$/', $string);
    }

    protected function getHashOnly()
    {
        if (! property_exists($this, 'hashOnly')) {
            return false;
        }

        return $this->hashOnly;
    }
}
