<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    protected string $base_title = 'お問い合わせ';

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $title = $this->base_title . '一覧';
        $base_title = $this->base_title;

        $items = ContactForm::query()
            ->where(function ($query) use ($request) {
                if ($form_type_id = $request->get('type')) {
                    $query->where('form_type_id', $form_type_id);
                }
            })
            ->with('details')
            ->paginate(10);

        return view('admin::pages.contact.index', compact(
            'title',
            'base_title',
            'items'
        ));
    }
}
