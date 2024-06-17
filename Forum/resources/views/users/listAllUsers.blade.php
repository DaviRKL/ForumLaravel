@extends('layouts.header_footer')

@section('content')

<div id="usuarios">

    <script> const users = @json($users);</script>

</div>
@endsection

