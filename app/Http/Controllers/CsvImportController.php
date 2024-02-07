<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;
use League\Csv\Writer;
use SplTempFileObject;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvImportController extends Controller
{
    //

    public function importUsersFromCsv(Request $request) : RedirectResponse
    {
        $request->validate([
            'csv-file' => 'required|mimes:csv,txt',
        ]);
        $file = $request->file('csv-file')->getPathname();
        // $path = $file->getRealPath();
        $csv = Reader::createFromPath($file);
        $csv->setHeaderOffset(0);

        // dd($csv->getRecords());

        $records = $csv->getRecords();


        foreach ($records as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'mobile_number' => $user['mobile_number'],
                'role' => 'user',
                'admin_id' => auth()->id(),
            ]);
        }

        return redirect()->back()->with('success', 'CSV file imported and data stored in the database.');

    }

    public function exportCsvTemplate(): StreamedResponse
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="csv-file.csv"',
        ];

        $columns=[
            'name',
            'email',
            'password',
            'mobile_number',
        ];

        $callback = function () use ($columns){
            $csv = Writer::createFromFileObject(new SplTempFileObject());
            $csv->insertOne($columns);
            $csv->output('csv-file.csv');
        };
        return response()->stream($callback, 200, $headers);
    }
}
