<?php
namespace App\Http\Traits;

trait Scopes
{

    public function scopeHandleSort($query, $request)
    {
        if ($request->has('sort-by')) {
            $sortBy = $request->get('sort-by');
            $sortByOrder = $request->get('sort-by-order', 0) == 0 ? 'ASC' : 'DESC';
            if (in_array($sortBy, $this->fillable)) {
                $query->orderBy($sortBy, $sortByOrder);
            }
        } else {
            $query->latest();
        }
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', now()->today());
    }

    public function scopeYesterday($query)
    {
        return $query->whereDate('created_at', now()->yesterday());
    }

    public function scopeActive($query)
    {
        return $query->where([
            'state_id' => 1
        ]);
    }
}