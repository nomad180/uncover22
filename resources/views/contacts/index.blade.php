@section('title'){{'Contact Us | Uncover Your Fit'}}@endsection
@section('description'){{'If you have questions or comments for Uncover Your Fit, please use this Contact Us page to submit them.'}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
    <x-auth-card>
        @if(session('message'))
          <div>
          {{ session('message') }}
          </div>
        @endif
        @if($errors->any())
              <div>
                  <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                  </ul>
              </div>
        @endif
        <x-contact />
    </x-auth-card>
</x-layout>