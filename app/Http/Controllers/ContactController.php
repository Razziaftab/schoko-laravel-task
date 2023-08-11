<?php

namespace App\Http\Controllers;

use App\Exports\ExportContact;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactUsMail;
use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ContactController extends Controller
{
//    const EMAIL_TO = 'admin@schokoladenseite.net';
    const EMAIL_TO = 'razziaftab@gmail.com';

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('main.contact');
    }

    /**
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function create(ContactRequest $request): RedirectResponse
    {
        $input = $request->all();

        $data = [
            'first_name'    => $input['first_name'],
            'name'          => $input['name'],
            'company'       => $input['company'],
            'email'         => $input['email'],
            'phone'         => $input['phone'],
            'schokolade'    => $input['schokolade'],
            'interest'      => serialize($input['interest']),
            'message'       => $input['message'],
        ];

        $contact = Contact::create($data);

        $files = $input['files'] = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
                $files[] = [
                    'name' => $fileName,
                ];
                $input['files'][] = $fileName;
            }
        }

        $contact->files()->createMany($files);

        Mail::to(self::EMAIL_TO)->send(new ContactUsMail($input));
        return back()->with('message', 'Email Send Successfully!');
    }

    /**
     * @return BinaryFileResponse
     */
    public function exportCSVFile(): BinaryFileResponse
    {
        return Excel::download(new ExportContact, 'contacts.csv', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
