@extends('admin.layout.template')
@section('title','Edit Job')
@section('content')
<form action="{{ route('job.update',$job->id) }}" method="post">
    @csrf
    @method('patch')
    @include('admin/job/form/form')
</form>
@endsection