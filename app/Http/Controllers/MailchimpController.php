<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DrewM\MailChimp\MailChimp;
use Mail;
use \App\Mail\Contact;
use Log;

class MailchimpController extends Controller
{
    /**
     * Subscribe the email into a Mailchimp list
     *
     * @param  \Illuminate\Http\Request  $request
     * @return redirect to the same page
     */
    public function newsletter(Request $request)
    {
        // Validation for spam
        $rules = array(
            'email'     => "required|email",
            'nameh'   => 'honeypot',
            'timeh'   => 'required|honeytime:3',
        );
        $this->validate(request(), $rules);

        // If validation passes, start managing form
        $input = $request->all();

        $MailChimp = new MailChimp(env('MAILCHIMP_API_KEY'));
        
        /******************/
        // CONTACT FORM
        /******************/
        if ($input['form'] == 'contact') {
            $list_id_contact = '18efec1d59';

            $result = $MailChimp->post("lists/$list_id_contact/members", [
                        'email_address' => $input['email'],
                        'status'        => 'subscribed',
                        'merge_fields' => [
                            'NAME'=> (isset($input['name']) ? $input['name'] : '') ,
                            'FORM'=>(isset($input['form']) ? $input['form'] : '') ,
                            'MESSAGE' => (isset($input['message']) ? $input['message'] : '')
                        ]
                    ]);
            if ($result['status'] == 400) {
                if ($result['title'] == 'Invalid Resource') {
                    $success = 'error';
                } else {
                    $success = 'false';
                }
            } else {
                $success = 'true';
            }

            if ($success != 'error') {
                $subscriber_hash = $MailChimp->subscriberHash($input['email']);
    
                $result = $MailChimp->patch("lists/$list_id_contact/members/$subscriber_hash", [
                    'merge_fields' => ['NAME'=>$input['name'], 'FORM'=>$input['form'], 'MESSAGE' => $input['message']],
                ]);
            }

            // Session messages
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Thanks for your message! We will answer you in the next sprint :p');
            return redirect('/contact');
            
        /******************
        * NEWSLETTER FORMS
        ******************/
        } else {
            $list_id_newsletter = 'd5a22a8184';
            $result = $MailChimp->post("lists/$list_id_newsletter/members", [
                'email_address' => $input['email'],
                'status'        => 'subscribed',
                'merge_fields' => [
                    'NAME'=> (isset($input['name']) ? $input['name'] : '') ,
                    'FORM'=>(isset($input['form']) ? $input['form'] : '') ,
                    'MESSAGE' => (isset($input['message']) ? $input['message'] : '')
                ]
            ]);

            if ($result['status'] == 400) {
                if ($result['title'] == 'Invalid Resource') {
                    $success = 'error';
                } else {
                    $success = 'false';
                }
            } else {
                $success = 'true';
            }
        }
        return $success;
    }
}
