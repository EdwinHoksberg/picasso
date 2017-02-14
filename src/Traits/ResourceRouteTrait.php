<?php

namespace App\Traits;

trait ResourceRouteTrait
{
    public function resource($pattern, $to)
    {
        // Remove trailing slash if it exists
        $pattern = rtrim($pattern, '/');

        // Add route for each resource function
        $this['controllers']->get($pattern.'/', $to.'::index');
        $this['controllers']->get($pattern.'/create', $to.'::create');
        $this['controllers']->post($pattern.'/store', $to.'::store');
        $this['controllers']->get($pattern.'/edit/{id}', $to.'::edit');
        $this['controllers']->match($pattern.'/update/{id}', $to.'::update')->method('PUT|PATCH');
        $this['controllers']->delete($pattern.'/delete/{id}', $to.'::delete');
    }
}
