<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use App\Models\User;
use Dompdf\Dompdf;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Request $request)
    {
        if(!session()->has('user')){
            return redirect('/login');
        }
        if($request->duration === "1 Day"){
            $duration = Carbon::parse($request->date)->addDays();
        }else if($request->duration === "3 Days"){
            $duration = Carbon::parse($request->date)->addDays(3);
        }else if($request->duration === "5 Days"){
            $duration = Carbon::parse($request->date)->addDays(5);
        }else if($request->duration === "7 Days"){
            $duration = Carbon::parse($request->date)->addDays(7);
        }

        $date = $duration->format('Y-m-d');
        $user_id =$request->session()->get('user')->user_id;
        $reservationid = Str::uuid()->toString();   
        $reserdetailid = Str::uuid()->toString();  
        $bookTitle = $request->title;
        $books = Books::where('book_title', $bookTitle)->first();
        
        $reservationDetail = new ReservationDetail();
        $reservationDetail->reser_detail_id = $reserdetailid;
        $reservationDetail->book_id = $books->book_id;
        $reservationDetail->library_name = $request->location;
        $reservationDetail->save();
        
        $reservation = new Reservation();
        $reservation->reservation_id = $reservationid;
        $reservation->user_id = $user_id;
        $reservation->reservation_date = $request->date;
        $reservation->return_date = $date;
        $reservation->name = $request->name;
        $reservation->status_id = 0; 
        $reservation->reser_detail_id = $reserdetailid;
        $reservation->save();




        $user = User::where('user_id', $user_id)->first();

        $pdf = new Dompdf();
        

        $html = view('user.reservation', compact('books', 'user', 'reservation', 'bookTitle','reservationDetail'))->render();
        $pdf->loadHTML($html);
        $pdf->render();

        $pdfPath = 'pdf/reservation_' . $reservation->id . '.pdf';
        $pdf->stream();
        $output = $pdf->output();
        file_put_contents(public_path($pdfPath), $output);

        return response()->json([
            'success' => 'Reservasi berhasil. Silakan unduh PDF reservasi.',
            'pdf_path' => $pdfPath,
        ]);
    }

    public function checkStatus($id){
        $reservation = Reservation::find($id);

        $dueDate = $reservation->return_date;
        $returnDate = Carbon::now();

        if ($returnDate <= $dueDate) {
            $reservation->status_id = 1;
        } else {
            $reservation->status_id = 2;
        }
        $reservation->save();
        return redirect()->back()->with('success', 'Book Successfully Returned.');
    }
}