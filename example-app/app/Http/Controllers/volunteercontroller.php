<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB; // For database interaction

class volunteercontroller extends Controller
{
    public function showForm()
    {
        return view('volunteer');
    }

    public function submitForm(Request $request)
    {
        // Validate the incoming form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Get the form data
        $name = $validatedData['name'];
        $email = $validatedData['email'];

        // Retry logic for inserting data into the database
        $attempts = 0;
        $maxAttempts = 3;
        $success = false;

        while ($attempts < $maxAttempts && !$success) {
            try {
                // Insert the volunteer data into the SQLite database
                DB::table('volunteers')->insert([
                    'name' => $name,
                    'email' => $email,
                ]);
                $success = true; // Success
            } catch (\Exception $e) {
                $attempts++;
                // Retry after a short delay (1 second)
                if ($attempts < $maxAttempts) {
                    sleep(1); // Wait for 1 second before retry
                } else {
                    return back()->with('error', 'Sorry, there was an error saving your data after several attempts. Please try again.');
                }
            }
        }

        if ($success) {
            // Send a confirmation email using PHPMailer
            try {
                $mail = new PHPMailer(true);

                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'lolloler73@gmail.com';   // SMTP username (your email)
                $mail->Password = 'xixe qgst nsjq itgj';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('your_email@gmail.com', 'Animal Shelter');
                $mail->addAddress($email, $name);

                // Content
                $mail->isHTML(false); // Plain text email
                $mail->Subject = 'Volunteer Signup Confirmation';
                $mail->Body = "Hello $name,\n\nThank you for signing up to volunteer at our animal shelter. We'll be in touch with more information soon.\n\nBest regards,\nAnimal Shelter Team";

                // Send the email
                $mail->send();

                // Return success message
                return back()->with('success', 'Thank you for signing up, ' . $name . '! A confirmation email has been sent.');
            } catch (Exception $e) {
                return back()->with('error', 'Sorry, there was an error sending your email. Please try again. Error: ' . $mail->ErrorInfo);
            }
        }

        // If there's a failure with database insertion
        return back()->with('error', 'There was an error processing your signup. Please try again later.');
    }
}
