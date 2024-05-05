<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{

    public function change_pass(){
        return view('backend.change-password');
    }

    public function dashboard()
    {

        return view('dashboard');
    }




    public function index()
    {
        $data = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();
        $array[] = ['Name', 'Number'];
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->day_name, $value->count];
        }
        $total_active_orders = Order::countActiveOrder();
        $total_active_products = Product::countActiveProduct();
        $total_active_categories = Category::countActiveCategory();
        $total_active_posts = Post::countActivePost();
        $new_received_orders = Order::countNewReceivedOrder();
        $total_processing_orders = Order::countProcessingOrder();
        $total_delivered_orders = Order::countDeliveredOrder();
        $total_cancelled_orders = Order::countCancelledOrder();
        //  return $data;
        $data = [
            'total_active_orders' => $total_active_orders,
            'total_active_products' => $total_active_products,
            'total_active_categories' => $total_active_categories,
            'total_active_posts' => $total_active_posts,
            'new_received_orders' => $new_received_orders,
            'total_processing_orders' => $total_processing_orders,
            'total_delivered_orders' => $total_delivered_orders,
            'total_cancelled_orders' => $total_cancelled_orders,
            'users' => json_encode($array)
        ];
        dd($data);
        return view('backend.index', $data);
    }

    public function profile()
    {
        $profile = Auth()->user();
        // return $profile;
        dd($profile);
        return view('backend.users.profile')->with('profile', $profile);
    }

    public function profileUpdate(Request $request, User $user)
    {
        dd($request->all(), $user);

        // return $request->all();
        $data = $request->all();
        $status = $user->fill($data)->save();
        $response = [];
        if ($status) {
            $response = ['success' => 'Successfully updated your profile'];
        } else {
            $response = ['error' => 'Please try again!'];
        }
        return redirect()->back()->with($response);
    }

    public function settings()
    {
        $data = Settings::first();
        dd($data);
        return view('backend.setting')->with('data', $data);
    }

    public function settingsUpdate(Request $request)
    {
        dd($request->all());

        // return $request->all();
        $request->valid([
            'short_des' => 'required|string',
            'description' => 'required|string',
            'photo' => 'required',
            'logo' => 'required',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);
        $data = $request->all();
        // return $data;
        $settings = Settings::first();
        // return $settings;
        $status = $settings->fill($data)->save();
        $response = [];

        if ($status) {
            $response = ['success' => 'Setting successfully updated'];
        } else {
            $response = ['error' => 'Please try again'];
        }
        return redirect()->route('admin', $response);
    }

    public function changePassword()
    {
        return view('backend.layouts.changePassword');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('admin')->with('success', 'Password successfully changed');
    }

    // Pie chart
    public function userPieChart(Request $request)
    {
        // dd($request->all());
        $data = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();
        $array[] = ['Name', 'Number'];
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->day_name, $value->count];
        }
        //  return $data;
        return view('backend.index')->with('course', json_encode($array));
    }

    public function activity()
    {
        // return Activity::all();
        $activity = Activity::all();
        dd($activity);
        return view('backend.layouts.activity')->with('activities', $activity);
    }
}
