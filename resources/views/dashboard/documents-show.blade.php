@extends('dashboard.layout')

@section('title', 'Оплата')

@section('dashboardcontent')

<div class="dashboard-content">

  <a href="{{ Storage::url($document->file) }}" target="_blank">{{ $document->title }}</a>

</div>

<script>
  const menuItem = 6;
</script>

@endsection