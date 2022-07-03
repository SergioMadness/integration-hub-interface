<?php namespace professionalweb\IntegrationHub\VInterface\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use professionalweb\IntegrationHub\IntegrationHubCommon\Models\Flow;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Actions\Flow\GetFlow;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Actions\Flow\StoreFlow;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Actions\Flow\DeleteFlow;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Actions\Flow\GetFlowList;

/**
 * Controller to work with flows
 */
class FlowController extends Controller
{
    /**
     * Get flow list
     *
     * @param GetFlowList $action
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index(GetFlowList $action)
    {
        $items = $action->run();

        return view('InterfaceHub::flow.index', [
            'items' => $items,
        ]);
    }

    /**
     * Method to create or update flow
     *
     * @param Request     $request
     * @param GetFlow     $getFlow
     * @param StoreFlow   $storeAction
     * @param string|null $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, GetFlow $getFlow, StoreFlow $storeAction, ?string $id = null)
    {
        if ($request->isMethod('post')) {
            /** @var Flow $model */
            $model = $id === null ? $storeAction->run() : $storeAction->setId($id)->run();

            return redirect()->route('InterfaceHub::flow.edit', ['id' => $model->id]);
        }

        return view('InterfaceHub::flow.edit', ['model' => $id !== null ? $getFlow->setId($id)->run() : new Flow()]);
    }

    /**
     * Delete flow by id
     *
     * @param DeleteFlow $deleteFlow
     * @param string     $id
     *
     * @return RedirectResponse
     */
    public function delete(DeleteFlow $deleteFlow, string $id): RedirectResponse
    {
        $deleteFlow->setId($id)->run();

        return redirect()->route('InterfaceHub::flow.index');
    }
}