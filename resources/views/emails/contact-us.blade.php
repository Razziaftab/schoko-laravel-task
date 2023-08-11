@include('emails.header')

@if($data['schokolade']) <p><b>Lieblingsschokolade:</b> {{ $data['name'] }}</p> @endif
@if(!empty($data['interest'])) <p><b>Interesse:</b> {{ implode(', ', $data['interest']) }}</p> @endif
@if($data['company']) <p><b>Firma:</b> {{ $data['company'] }}</p> @endif
@if($data['first_name']) <p><b>Vorname:</b> {{ $data['first_name'] }}</p> @endif
@if($data['name']) <p><b>Name:</b> {{ $data['name'] }}</p> @endif
@if($data['email']) <p><b>Email:</b> {{ $data['email'] }}</p> @endif
@if($data['phone']) <p><b>Telefon:</b> {{ $data['phone'] }}</p> @endif
@if($data['files']) <p><b>Files:</b> {{ implode(', ', $data['files']) }}</p> @endif
@if($data['message']) <p><b>Mitteilung:</b> {{ $data['message'] }}</p> @endif

@include('emails.footer')
