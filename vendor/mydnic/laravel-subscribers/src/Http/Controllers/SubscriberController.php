<?php

namespace Mydnic\Subscribers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Mydnic\Subscribers\Subscriber;
use Illuminate\Support\Facades\Storage;
use Mydnic\Subscribers\Events\NewSubscriber;
use Mydnic\Subscribers\Http\Requests\StoreSubscriberRequest;
use Mydnic\Subscribers\Http\Requests\DeleteSubscriberRequest;
use Newsletter;

class SubscriberController extends Controller
{
    public function store(StoreSubscriberRequest $request)
    {
        Subscriber::create($request->all());

       if ( ! Newsletter::isSubscribed($request->email) ) {
        Newsletter::subscribe($request->email);
      }

        return back()->with('subscribed', 'Դուք հաջողությամբ բաժանորդագրվել եք');
    }

    public function delete(DeleteSubscriberRequest $request)
    {
        $request->subscriber()->delete();

        return view('subscribe.deleted');
    }
}
