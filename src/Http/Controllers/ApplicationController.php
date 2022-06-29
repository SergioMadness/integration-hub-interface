<?php namespace professionalweb\IntegrationHub\VInterface\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Validator;
use Illuminate\Http\RedirectResponse;
use professionalweb\lms\Common\Traits\HasPagination;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use professionalweb\IntegrationHub\IntegrationHub\Models\Application;
use professionalweb\IntegrationHub\IntegrationHub\Traits\UseApplicationRepository;
use professionalweb\IntegrationHub\IntegrationHub\Interfaces\Repositories\ApplicationRepository;

/**
 * Controller to work with applications
 */
class ApplicationController extends Controller
{
    use UseApplicationRepository, HasPagination;

    public function __construct(ApplicationRepository $repository)
    {
        $this->setApplicationRepository($repository);
    }

    /**
     * Application list
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        /** @var LengthAwarePaginator $items */
        $items = $this->getApplicationRepository()->pagination([], ['created_at' => 'desc'], $this->getLimit($request), $this->getOffset($request));

        return view('InterfaceHub::applications.index', [
            'items' => $items,
        ]);
    }

    /**
     * Create or edit application
     *
     * @param Request     $request
     * @param string|null $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request, ?string $id = null)
    {
        if (empty($id)) {
            $model = new Application();
        } else {
            $model = $this->getModel($id);
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            $validator = $this->getValidator($data);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }

            try {
                $model->fill($request->all());
                $model->save();
            } catch (\Exception $ex) {
                \Log::error($ex);

                return redirect()->back()->withErrors([
                    trans('InterfaceHub::applications.edit.save-error'),
                ]);
            }

            return redirect()->route('InterfaceHub::applications.edit', ['id' => $model->id])
                ->with('successMessage', trans('InterfaceHub::applications.edit.saved'));
        }

        return view('InterfaceHub::applications.edit', [
            'model' => $model,
        ]);
    }

    /**
     * Delete application by id
     *
     * @param string $id
     *
     * @return RedirectResponse
     */
    public function delete(string $id): RedirectResponse
    {
        try {
            $this->getModel($id)->delete();
        } catch (\Exception $ex) {
            \Log::error($ex);

            return redirect()->back()->withErrors([
                trans('InterfaceHub::applications.edit.delete-error'),
            ]);
        }

        return redirect()->route('InterfaceHub::applications')
            ->with('successMessage', trans('InterfaceHub::applications.edit.deleted'));
    }

    /**
     * Get model by id
     *
     * @param string $id
     *
     * @return Application
     */
    protected function getModel(string $id): Application
    {
        /** @var Application $model */
        $model = $this->getApplicationRepository()->model($id);
        if ($model === null) {
            throw new NotFoundHttpException();
        }

        return $model;
    }

    /**
     * Create validator
     *
     * @param array $data
     *
     * @return Validator
     */
    protected function getValidator(array $data): Validator
    {
        return \Validator::make($data, [
            'name' => 'required|max:255',
        ]);
    }
}
