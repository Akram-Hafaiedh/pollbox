<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Smalot\PdfParser\Parser;

class PdfImportController extends Controller
{

public function importUsersFromPdf(Request $request) : RedirectResponse
{
    // dd($request->all());
    $request->validate([
        'pdf-file' => 'required|mimes:pdf',
    ]);

    // dd('test');

    $file = $request->file('pdf-file')->getPathname();

    // Parse pdf file and build necessary objects.
    $parser = new Parser();
    $pdf = $parser->parseFile($file);

    // Retrieve all pages from the pdf file.
    $pages = $pdf->getPages();

    // Loop over each page to extract text.
    $users = [];
    foreach ($pages as $page) {
        $text = $page->getText();
        // Now, you can do anything with the extracted text
        // Depending on the structure of the PDF, you may need to parse this text according to your own rules
        // Assuming each line is a new user and data is separated by a comma
        $lines = explode("\n", $text);
        dump($lines);
        foreach ($lines as $line) {
            $userData = explode(",", $line);
            $users[] = [
                'name' => $userData[0],
                'email' => $userData[1],
                'password' => Hash::make($userData[2]),
                'mobile_number' => $userData[3],
                'role' => 'user',
                'admin_id' => auth()->id(),
            ];

        }
    }

    dd($users);

    foreach ($users as $user) {
        User::create($user);
    }

    return redirect()->back()->with('success', 'PDF file imported and data stored in the database.');
}
}
