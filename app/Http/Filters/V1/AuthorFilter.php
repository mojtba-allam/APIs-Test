<?php

namespace App\Http\Filters\V1;

use App\Http\Filters\V1\QueryFilter;

class AuthorFilter extends QueryFilter {
    public function include($value){
        return $this->builder->with($value);
    }

    public function id($value){
        return $this->builder->whereIn('id', explode(',', $value));
    }

    public function email($value){
        $likeString = str_replace('*', '%', $value);
        return $this->builder->where('email', 'like',$likeString);
    }

    public function name($value){
        $likeString = str_replace('*', '%', $value);
        return $this->builder->where('name', 'like',$likeString);
    }

    public function createdAt($value){
        $dates = explode(',', $value);
        if(count($dates) > 1){
            return $this->builder->whereBetween('created_at', $dates);
        }
        return $this->builder->whereDate('created_at', $value);
    }

    public function updatedAt($value){
        $dates = explode(',', $value);
        if(count($dates) > 1){
            return $this->builder->whereBetween('updated_at', $dates);
        }
        return $this->builder->whereDate('updated_at', $value);
    }

}
