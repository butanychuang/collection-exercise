<?php

use Illuminate\Support\Collection;

class Transformer {
    public function transform($records, $meta) {
        $meta = collect($meta)->map(function ($item) {
            return collect($item)->keyBy('id');
        });

        $attributes = array('company', 'class', 'type');

        return collect($attributes)->mapWithKeys(function ($attribute) use ($records, $meta) {
            return [$attribute => collect($records)->pluck($attribute)->unique()->values()->map(function ($id) use ($attribute, $meta) {
                return $meta[$attribute][$id];
            })];
        })->toArray();
    }
}
