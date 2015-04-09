<?php namespace SevenShores\Kraken\Http\Controllers\Api;

use Illuminate\Http\Request;
use SevenShores\Kraken\Contact;
use SevenShores\Kraken\Contracts\Repositories\ContactRepository;
use SevenShores\Kraken\Contracts\TransformerManager;
use SevenShores\Kraken\Http\Requests\StoreContactRequest;
use SevenShores\Kraken\Http\Requests\UpdateContactRequest;
use SevenShores\Kraken\Transformers\ContactTransformer;

class ContactsController extends ApiController
{
    /**
     * @var ContactRepository
     */
    private $contacts;

    /**
     * @param TransformerManager $manager
     * @param ContactRepository $contacts
     */
    public function __construct(TransformerManager $manager, ContactRepository $contacts)
    {
        parent::__construct($manager);
        $this->contacts = $contacts;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $options = [
            'current' => $request->get('cursor'),
            'count'   => $request->get('count'),
            'prev'    => $request->get('prev'),
        ];

        $contacts = $this->contacts->cursor($request->get('cursor'), $options);

        return $this->respondWithCursor($contacts, new ContactTransformer(), $options);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContactRequest $request
     * @return Response
     */
    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create([
            'email' => $request->json('email'),
        ]);

        return $this->respondWithItem($contact, new ContactTransformer());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $contact = $this->contacts->getById($id);

        return $this->respondWithItem($contact, new ContactTransformer());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContactRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateContactRequest $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->update([
            'email' => $request->json('email'),
        ]);

        return $this->respondWithItem($contact, new ContactTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $contact = $this->contacts->getById($id);
        $contact->delete();

        return $this->respondWithItem($contact, new ContactTransformer());
    }
}
