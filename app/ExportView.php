<?php
namespace App;

use App\Model\PersonalDetail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportView implements FromView
{
    public function view(): View
    {
        return view('exports.invoices', [
            'users' => PersonalDetail::all()
        ]);
    }
}