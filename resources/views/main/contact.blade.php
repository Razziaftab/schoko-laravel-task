@extends('layouts.app')

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <!-- Contact Form -->

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact_form_container">
                        <div class="contact_form_title">Kontakt</div>

                        <p><strong>Ja, ich möchte SCHOKOLADENSEITE.net kennenlernen.</strong></p>

                        <form action="{{ route('contact.create') }}" id="contact_form" method="post" enctype="multipart/form-data" class="form-floating">
                            @csrf
                            <div class="field mb-3"><small>Alle mit einem * markierten Felder sind Pflichtfelder.</small> </div>

                            <div class="contact_form_inputs">
                                <label for="schokolade" class="form-label">Lieblingsschokolade</label>
                                <select class="form-select" id="schokolade" name="schokolade" aria-label="Default select example">
                                    <option value="">Lieblingsschokolade auswählen! </option>
                                    <option value="Egal, ich mag alles!" @if (old('schokolade') == 'Egal, ich mag alles!') selected @endif>Egal, ich mag alles! </option>
                                    <option value="Zartbitterschokolade" @if (old('schokolade') == 'Zartbitterschokolade') selected @endif>Zartbitterschokolade </option>
                                    <option value="Vollmilchschokolade" @if (old('schokolade') == 'Vollmilchschokolade') selected @endif>Vollmilchschokolade </option>
                                    <option value="Erdbeer" @if (old('schokolade') == 'Erdbeer') selected @endif>Erdbeer </option>
                                    <option value="Himbeer" @if (old('schokolade') == 'Himbeer') selected @endif>Himbeer </option>
                                    <option value="Kaffee" @if (old('schokolade') == 'Kaffee') selected @endif>Kaffee </option>
                                    <option value="Karamell" @if (old('schokolade') == 'Karamell') selected @endif>Karamell </option>
                                    <option value="Nuss" @if (old('schokolade') == 'Nuss') selected @endif>Nuss </option>
                                    <option value="Orange" @if (old('schokolade') == 'Orange') selected @endif>Orange </option>
                                    <option value="Pur (ohne alles)" @if (old('schokolade') == 'Pur (ohne alles)') selected @endif>Pur (ohne alles) </option>
                                    <option value="Pfefferminze" @if (old('schokolade') == 'Pfefferminze') selected @endif>Pfefferminze </option>
                                    <option value="Weiße Schokolade" @if (old('schokolade') == 'Weiße Schokolade') selected @endif>Weiße Schokolade</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <span>Interesse:</span>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest[]" id="Web" value="Web" @if (is_array(old('interest')) && in_array('Web', old('interest'))) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">Web</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest[]" id="go-digital" value="Go-Digital-Förderung" @if (is_array(old('interest')) && in_array('Go-Digital-Förderung', old('interest'))) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox2">Go-Digital-Förderung</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest[]" id="technik" value="Technische Betreuung" @if (is_array(old('interest')) && in_array('Technische Betreuung', old('interest'))) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox3">Technische Betreuung</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest[]" id="Sonstiges" value="Sonstiges" @if (is_array(old('interest')) && in_array('Sonstiges', old('interest'))) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox3">Sonstiges</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="company" class="form-label">Firma*</label>
                                <input type="text" class="form-control" id="company" name="company" placeholder="Firma" value="{{old('company')}}">
                                @if ($errors->has('company')) <p class="text-danger">{{ $errors->first('company') }}</p> @endif
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="first-name" class="form-label">Vorname</label>
                                    <input type="text" class="form-control" id="first-name" name="first_name" placeholder="Vorname" value="{{old('first_name')}}">
                                </div>
                                <div class="col">
                                    <label for="name" class="form-label">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                                    @if ($errors->has('name')) <p class="text-danger">{{ $errors->first('name') }}</p> @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                                    @if ($errors->has('email')) <p class="text-danger">{{ $errors->first('email') }}</p> @endif
                                </div>
                                <div class="col">
                                    <label for="phone" class="form-label">Telefon*</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Telefon" value="{{old('phone')}}">
                                    @if ($errors->has('phone')) <p class="text-danger">{{ $errors->first('phone') }}</p> @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="files" class="form-label">Datei-Upload*</label>
                                <input class="form-control" type="file" name="files[]" id="files" multiple>
                                <div id="fileHelp" class="form-text">Formate: PDF, DOC, DOCX - max. 5 MB</div>
                                @if ($errors->has('files')) <p class="text-danger">{{ $errors->first('files') }}</p> @endif
                                @if ($errors->has('files.*')) <p class="text-danger">{{ $errors->first('files.*') }}</p> @endif
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Mitteilung*</label>
                                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Message">{{old('message')}}</textarea>
                                @if ($errors->has('message')) <p class="text-danger">{{ $errors->first('message') }}</p> @endif
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-primary">Absenden</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
