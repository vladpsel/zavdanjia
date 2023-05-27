<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

trait BasicControllerTrait
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /** Check if post request was sent and
     * check if key 'submit' present in request
     *
     * @return bool
     */
    public function postSubmitted(): bool
    {
        if ($this->request->isMethod('post') && $this->request->has('submit')) {
            return true;
        }
        return false;
    }


    /**
     * Chech if entity is not false|empty|null and if it`s empty
     * you will be redirected to redirectRoute
     *
     * @param mixed $entity
     * @param string $redirectRoute
     * @return RedirectResponse|null
     */
    public function checkEntity(mixed $entity, string $redirectRoute): ?RedirectResponse
    {
        if (!$entity || empty($entity)) {
            return redirect()->route($redirectRoute)->send();
        }

        if (is_array($entity) && count($entity) < 1) {
            return redirect()->route($redirectRoute)->send();
        }

        return null;
    }

    private function checkAccess($source)
    {
        if (empty($source)) {
            abort(404);
        }
    }

}
