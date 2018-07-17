{{ Form::open(['url' => action('MailchimpController@newsletter'), 'enctype' => 'multipart/form-data', 'class' => 'validate newsletter']) }}
    <input type="email" name="email" placeholder="Enter your email" required />
    <input class="submit-absolute" type="submit" value="Send">
    <input type="hidden" name="form" value="{{ $form }}" />
    @include ("layouts.spam")
{{ Form::close() }}
<div class="message"></div>