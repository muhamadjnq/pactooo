<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('support')) {
            $tickets = Ticket::with('user')->get();
        } else {
            $tickets = Ticket::where('user_id', Auth::id())->get();
        }

        return view('user.tickets.index', compact('tickets','categories'));
    }

    public function create()
    {
        $categories = Category::with('products')->get();
        return view('user.tickets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = Category::with('products')->get();
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
        ]);

        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->route('user.tickets.index')->with('success', 'تیکت با موفقیت ایجاد شد.');
    }

    public function show($id)
    {
        $categories = Category::with('products')->get();
        $ticket = Ticket::with('messages.user')->findOrFail($id);

        if (
            !Auth::user()->hasRole('admin') &&
            !Auth::user()->hasRole('support') &&
            $ticket->user_id !== Auth::id()
        ) {
            abort(403, 'شما اجازه دسترسی به این تیکت را ندارید.');
        }

        return view('user.tickets.show', compact('ticket','categories'));
    }

    public function reply(Request $request, $id)
    {
        $categories = Category::with('products')->get();
        $request->validate(['message' => 'required|string']);

        $ticket = Ticket::findOrFail($id);

        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back()->with('success', 'پاسخ شما ارسال شد.');
    }

    public function updateStatus(Request $request, $id)
    {
        $categories = Category::with('products')->get();
        $request->validate(['status' => 'required|in:open,closed,in_progress']);

        $ticket = Ticket::findOrFail($id);
        $ticket->update(['status' => $request->status]);


        return back()->with('success', 'وضعیت تیکت به‌روزرسانی شد.');
    }
}
