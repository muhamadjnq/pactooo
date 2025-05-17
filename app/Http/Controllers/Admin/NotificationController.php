<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
  public function index()
  {
      $notifications = Notification::orderBy('created_at', 'desc')->get();
      return view('admin.notifications.index', compact('notifications'));
  }

  public function markAsRead($id)
  {
      $notification = Notification::findOrFail($id);
      $notification->update(['is_read' => true]);

      return redirect()->back()->with('success', 'نوتیفیکیشن به عنوان خوانده‌شده علامت‌گذاری شد.');
  }
}
