@extends('dashboard.layout')

@section('title', 'Рекомендация')

@section('dashboardcontent')

<div class="dashboard-content">

  {!! $recommendation->text_html !!}

</div>

<script>
  const menuItem = 2;
</script>

@endsection