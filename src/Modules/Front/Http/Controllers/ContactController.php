<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Modules\Front\Emails\Contact\ContactToUser;
use Modules\Front\Emails\Contact\ContactToAdmin;
use Modules\Front\Http\Requests\ContactRequest;
use Modules\Front\UseCases\ContactForm\SaveContactFormAction;

class ContactController extends Controller
{
    protected array $form_content_names = [
        'name',
        'postal_code',
        'address',
        'email',
        'tel',
        'note'
    ];

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $title = 'お問い合わせ';
        $sub_title = 'CONTACT';
        $hero_image_path = '';

        $endpoint = route('contact.post');
        $method = 'POST';

        return view('front::pages.contact.index', compact(
            'title',
            'sub_title',
            'hero_image_path',
            'endpoint',
            'method',
        ));
    }

    public function post(ContactRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();

        try {
            (new SaveContactFormAction())($request, $this->form_content_names);

            DB::commit();
        }

        catch (\Exception $e) {
            report($e);

            DB::rollBack();

            return redirect(route('contact.form'))->withErrors($e->getMessage());
        }

        try {
            Mail::to($request->get('email'))->send(new ContactToUser($request));
            Mail::to(config('about_us.admin_email'))->send(new ContactToAdmin($request));
        }
        catch (\Exception $e) {
            report($e);

            return redirect(route('contact.index'))->withErrors($e->getMessage());
        }

        return redirect(route('contact.complete'));
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function complete(): Renderable
    {
        $title = 'お問い合わせありがとうございました。';
        $subtitle = 'CONTACT';

        return view('front::pages.contact.complete', compact(
            'title',
            'subtitle',
        ));
    }
}
