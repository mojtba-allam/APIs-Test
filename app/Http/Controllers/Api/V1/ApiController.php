<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponses;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends Controller
{
    use ApiResponses;

    protected $policyClass;

    use AuthorizesRequests;
    public function include(string $relationship): bool
    {
        $param = request()->get('include');
        if (!isset($param)) {
            return false;
        }
        $includeValues = explode(',',strtolower($param));
        return in_array(strtolower($relationship), $includeValues);
    }

    public function isAble($ability ,$targetModel): bool{
        return $this->authorize($ability,[' $targetModel',$this->policyclass]);
    }
}
