@extends('dashboard.layout')

@section('title', 'Оплата')

@section('dashboardcontent')

<div class="dashboard-content">

  {!! $payment->text_html !!}

</div>

<script>
  const menuItem = 3;
</script>

@endsection