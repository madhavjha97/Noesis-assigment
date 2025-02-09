<?php

namespace App\Http\Controllers;

use App\Models\TelephoneDirectoriesView;
use App\Models\Telephonedirectory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'totalContacts' => Telephonedirectory::count(),
            'totalUsers' => User::count(),
            'totalViews' => TelephoneDirectoriesView::count(),
            'labels' => $this->getLast7DaysLabels(),
            'last7DaysViews' => $this->getLast7DaysViews(),
        ]);
    }

    private function getLast7DaysLabels()
    {
        return collect(range(6, 0))->map(fn($i) => Carbon::now()->subDays($i)->format('d M'));
    }

    private function getLast7DaysViews()
    {
        return collect(range(6, 0))->map(fn($i) => TelephoneDirectoriesView::whereDate('viewed_at', Carbon::now()->subDays($i))->count());
    }
}
