@extends('layouts.app')

@section('navtext')
@include('components.navbar', ['page' => 'Isi Survey'])
@endsection

@section('content')
<div class="container">

  @if(Session::has('success'))
  <div class="alert alert-success">
    {{Session::get('success')}}
  </div>
  @elseif(Session::has('error'))
  <div class="alert alert-danger text-white">
    {{Session::get('error')}}
  </div>
  @endif

  <div class="card mt-4 z-index-0">
    <div class="card-header text-center pt-4">
      <h5>Form Isian Survei</h5>
    </div>
    <div class="card-body">

      <form role="form" method="POST" action="{{ route('isi-survey-post') }}">
        <ul class="list-group">
          <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg" style="flex-direction: column;">
            @csrf
            <label class="col-12">Nama</label>
            <div class="mb-3 col-12">
              <input type="text" class="form-control" placeholder="Nama" aria-label="nama" aria-describedby="nama-addon" name="name">
            </div>
            <label class="col-12">Email</label>
            <div class="mb-3 col-12">
              <input type="text" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email-addon" name="email">
            </div>
            <label class="col-12">Occupation</label>
            <div class="mb-3 col-12">
              <input type="text" class="form-control" placeholder="Occupation" aria-label="occupation" aria-describedby="occupation-addon" name="occupation">
            </div>
          </li>
          <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg" style="flex-direction: column;">
            @foreach($surveys as $survey)
            <label>{{$loop->iteration .". ".$survey->question}}</label>
            <div class="mb-3 col-12">
              <input type="hidden" class="form-control" placeholder="Jawaban" aria-label="Email" aria-describedby="email-addon" name="survey_id[]" value="{{$survey->id}}">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="response[{{$loop->index}}]" id="{{"opt1-".$loop->iteration}}" value="1">
                <label class="form-check-label" for="{{"opt1-".$loop->iteration}}">Tidak Puas</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="response[{{$loop->index}}]" id="{{"opt2-".$loop->iteration}}" value="2">
                <label class="form-check-label" for="{{"opt2-".$loop->iteration}}">Kurang Puas</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="response[{{$loop->index}}]" id="{{"opt3-".$loop->iteration}}" value="3">
                <label class="form-check-label" for="{{"opt3-".$loop->iteration}}">Cukup Puas</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="response[{{$loop->index}}]" id="{{"opt4-".$loop->iteration}}" value="4">
                <label class="form-check-label" for="{{"opt4-".$loop->iteration}}">Puas</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="response[{{$loop->index}}]" id="{{"opt5-".$loop->iteration}}" value="5">
                <label class="form-check-label" for="{{"opt5-".$loop->iteration}}">Sangat Puas</label>
              </div>
            </div>
            @endforeach
          </li>
        </ul>
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">SUBMIT</button>
        </div>
      </form>

    </div>
  </div>

</div>

@endsection