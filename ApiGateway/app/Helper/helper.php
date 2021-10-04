<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;

if (! function_exists('getDateTimeByTimeZone')) {

    function getDateTimeByTimeZone($datetime, $timezone)
    {
        $time = Carbon::parse($datetime);
        return $time->setTimezone($timezone)->format('d M Y, H:i A');
    }
}
if (! function_exists('getPaginationData')) {

    /**
     *
     * @param object $data
     * @return array
     */
    function getPaginationData($data)
    {
        $data = $data->toArray();
        unset($data['data']);
        return $data;
    }
}
if (! function_exists('getCustomQuery')) {

    function getCustomQuery($builder)
    {
        $addSlashes = str_replace('?', "'?'", $builder->toSql());
        $r = vsprintf(str_replace('?', '%s', $addSlashes), $builder->getBindings());
        echo "<pre>";
        print_r($r);
        die('');
    }
}

if (! function_exists('public_path')) {
    /**
     * Get the path to the public folder.
     *
     * @param  string  $path
     * @return string
     */
    function public_path($path = '')
    {
        return rtrim(app()->basePath('public/' . $path), '/');
    }
}
if (! function_exists('urlGenerator')) {
    
    /**
     *
     * @return \Laravel\Lumen\Routing\UrlGenerator
     */
    function urlGenerator()
    {
        return new \Laravel\Lumen\Routing\UrlGenerator(app());
    }
}
if (! function_exists('asset')) {
    
    /**
     *
     * @param
     *            $path
     * @param bool $secured
     *
     * @return string
     */
    function asset($path, $secured = false)
    {
        return urlGenerator()->asset($path, $secured);
    }
}

if (! function_exists('getLoggedInUserId')) {

    /**
     *
     * @param
     *            $path
     * @param bool $secured
     *
     * @return string
     */
    function getLoggedInUserId()
    {
        return (auth()->check()) ? auth()->user()->id : null;
    }
}
if (! function_exists('isBranchAdmin')) {
    function isBranchAdmin()
    {
        return (auth()->check()) ? auth()->user()->role_id == User::ROLE_BRANCH_ADMIN : false;
    }
}
if (! function_exists('isDepartmentAdmin')) {
    function isDepartmentAdmin()
    {
        return (auth()->check()) ? auth()->user()->role_id == User::ROLE_DEPARTMENT_ADMIN : false;
    }
}
if (! function_exists('isEmployee')) {
    function isEmployee()
    {
        return (auth()->check()) ? auth()->user()->role_id == User::ROLE_EMPLOYEE : false;
    }
}
?>