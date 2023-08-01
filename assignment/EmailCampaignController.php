<?php

// app/Http/Controllers/EmailCampaignController.php

namespace App\Http\Controllers;

use App\Models\EmailCampaign;
use Illuminate\Http\Request;

class EmailCampaignController extends Controller
{
    public function index()
    {
        $emailCampaigns = EmailCampaign::all();
        return view('email_campaigns.index', compact('emailCampaigns'));
    }

    public function create()
    {
        return view('email_campaigns.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        EmailCampaign::create($validatedData);

        return redirect()->route('email_campaigns.index')->with('success', 'Email campaign created successfully!');
    }

    public function destroy(EmailCampaign $emailCampaign)
    {
        $emailCampaign->delete();

        return redirect()->route('email_campaigns.index')->with('success', 'Email campaign deleted successfully!');
    }
}
