<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\Category;
use App\Http\Controllers\Controller;

class UserTicketController extends Controller
{
    // لیست تیکت‌های کاربر
    public function index(Request $request)
    {
        $categories = Category::with('products')->get();
        $user = $request->user();
        $tickets = Ticket::where('user_id', $user->id)->with('messages')->orderBy('created_at', 'desc')->get();

        return view('user.tickets.index', compact('tickets','categories'));
    }

    // نمایش فرم ایجاد تیکت جدید
    public function create()
    {
        $categories = Category::with('products')->get();
        return view('user.tickets.create', compact('categories'));
    }

    // ذخیره تیکت جدید
    public function store(Request $request)
    {
        $categories = Category::with('products')->get();
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $ticket = Ticket::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'status' => 'open',
        ]);

        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => $request->user()->id,
            'message' => $request->message,
        ]);

        return redirect()->route('user.tickets.index')->with('success', 'تیکت شما با موفقیت ثبت شد.');
    }

    // نمایش جزئیات یک تیکت
    public function show($id, Request $request)
    {
        $categories = Category::with('products')->get();
        $ticket = Ticket::where('id', $id)->where('user_id', $request->user()->id)->with('messages.user')->firstOrFail();
        return view('user.tickets.show', compact('ticket','categories'));
    }

    // ارسال پاسخ به تیکت
    public function respond(Request $request, $id)
    {
        $categories = Category::with('products')->get();
        $request->validate([
            'message' => 'required|string',
        ]);

        $ticket = Ticket::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => $request->user()->id,
            'message' => $request->message,
        ]);

        if ($ticket->status === 'closed') {
            $ticket->status = 'in_progress';
            $ticket->save();
        }

        return redirect()->route('user.tickets.show', $ticket->id)->with('success', 'پیام شما ارسال شد.');
    }
    public function updateStatus(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = $request->input('status'); // به‌روزرسانی وضعیت
        $ticket->save();
        return redirect()->route('user.tickets.index')->with('success', 'تیکت شما با موفقیت ویرایش شد!');
    }
}
