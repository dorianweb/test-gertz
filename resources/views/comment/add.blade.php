@extends('common.layout.guest')
@section('content')

@if (isset($message))
    <div>
        success
    </div>    
@endif
<form class="w-full md:w-1/2  mx-auto block p-6 shadow-lg bg-white flex flex-col items-center"   method="POST" action="{{route('add_comment')}}">
    @csrf
    <div class="w-full md:w-4/5 flex flex-col items-start my-2">
        <label for="username">nom : </label>
        <input class="w-full md:w-2/3 self-center px-3 border-2 {{empty($errors->get("last_name"))?'border-slate-300':'border-red-400'}} " type="text" name="last_name" value="{{old('last_name')}}" >
        <ul class="w-full md:w-2/3 self-center px-3 bg-red-200">
            @foreach ($errors->get("last_name") as $message)
                <li class="font-medium">{{$message}}</li>      
            @endforeach    
        </ul>
    </div>
    <div class="w-full md:w-4/5 flex flex-col items-start my-2">
        <label for="username">prenom : </label>
        <input class="w-full md:w-2/3 self-center px-3 border-2 {{empty($errors->get("first_name"))?'border-slate-300':'border-red-400'}}" type="text" name="first_name" value="{{old('first_name')}}">
      
        <ul class="w-full md:w-2/3 self-center px-3 bg-red-200">
            @foreach ($errors->get("first_name") as $message)
                <li class="font-medium">{{$message}}</li>      
            @endforeach    
        </ul>
    </div>
    <div class="w-full md:w-4/5 flex flex-col items-start my-2">
        <label for="mail">email : </label>
        <input class="w-full md:w-2/3 self-center px-3 border-2 {{empty($errors->get("email"))?'border-slate-300':'border-red-400'}}" type="email" name="email" id="email" value="{{old('email')}}">
       
        <ul class="w-full md:w-2/3 self-center px-3 bg-red-200">
            @foreach ($errors->get("email") as $message)
                <li class="font-medium">{{$message}}</li>      
            @endforeach    
        </ul>
    </div>
    <div class="w-full md:w-4/5 flex flex-col items-start my-2">
        <label for="">Message:</label>
        <textarea class="w-full md:w-2/3 self-center rounded-lg px-3 border-2 {{empty($errors->get("content"))?'border-slate-300':'border-red-400'}}" name="content" id="" cols="30" rows="10">{{old('content')}}</textarea>
       
        <ul class="w-full md:w-2/3 self-center px-3 bg-red-200">
            @foreach ($errors->get("content") as $message)
                <li class="font-medium">{{$message}}</li>      
            @endforeach    
        </ul>
    </div>
<input class="text-center bg-blue-400 rounded-full  p-3" type="submit" value="envoyer">
</form>
@endsection