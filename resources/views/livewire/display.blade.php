@push('meta_tags')
@isset($pagina->title)
<title>{{$pagina->title}}</title>
@endisset
@isset($pagina->meta_title)
<meta property="og:title" content="{{$pagina->meta_title}}" />
@endisset

@isset($pagina->meta_description)
<meta property="og:description" content="{{$pagina->meta_description}}" />
@endisset

@isset($pagina->meta_type)
<meta property="og:type" content="{{$pagina->meta_type}}" />
@endisset

@isset($pagina->meta_url)
<meta property="og:url" content="{{$pagina->meta_url}}" />
@endisset

@isset($pagina->meta_keywords)
<meta property="keywords" content="{{$pagina->meta_keywords}}" />
@endisset

@isset($pagina->meta_image)
<meta property="og:image" content="{{asset('storage/uploads/images/'.$pagina->meta_image)}}" />
@endisset
@endpush

@push('headstyles')
<style>
    {!! $pagina->css !!}
</style>
@endpush

@push('footscripts')
<script>
    {!! $pagina->scripts !!}
</script>
@endpush

{!! $pagina->body !!}
