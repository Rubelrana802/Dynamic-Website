@extends('errors::minimal')

@section('title', __('Server Error'))
@section('message')
<link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">


<body>
<div id="notfound">
<div class="notfound">
<div class="notfound-404">
<h1>500</h1>
</div>
<h2>We are sorry, Page server error!</h2>
<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
<a href="{{ route('admin.dashboard') }}"><span style="  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;">Back To Dashboard</span></a>
</div>
</div>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="739e968b3b8b1bf140da450b-text/javascript"></script>
<script type="739e968b3b8b1bf140da450b-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="739e968b3b8b1bf140da450b-|49" defer=""></script></body>

@endsection