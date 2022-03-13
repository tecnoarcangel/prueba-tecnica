@section('headstyles')
<link href="{{asset('css/grapes.min.css')}}" rel="stylesheet"/>
<link href="{{asset('css/grapesjs-preset-webpage.min.css')}}" rel="stylesheet"/>
<script src="{{asset('js/grapes.min.js')}}"></script>
<script src="{{asset('js/grapesjs-preset-webpage.min.js')}}"></script>
@endsection
@php
    $edit = isset($pagina);
@endphp
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <div class="container">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Información General
        </h4>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre</span>
            <input name="name" value="{{$pagina->name??''}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nombre" />
            @error('name')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{$message}}
            </span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Título</span>
            <input name="title" value="{{$pagina->title??''}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Título" />
            @error('title')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{$message}}
            </span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Ruta</span>
            <input name="route" value="{{$pagina->route??''}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ruta" />
            @error('route')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{$message}}
            </span>
            @enderror
        </label>
    </div>
    <div class="container">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Meta Tags
        </h4>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Titulo</span>
            <input
            name="meta_title"
            value="{{$pagina->meta_title??''}}"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Titulo" />
            @error('meta_title')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{$message}}
            </span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Típo</span>
            <input
            name="meta_type"
            value="{{$pagina->meta_type??''}}"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Típo" />
            @error('meta_type')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{$message}}
            </span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Imagen</span>
            <input
            type="file"
            name="meta_image"
            value="{{$pagina->meta_image??''}}"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Imagen" />
            @error('meta_image')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{$message}}
            </span>
            @enderror
        </label>
        @isset($pagina->meta_image)
            <img
            class="object-cover h-48"
            src="{{asset('storage/uploads/images/'.$pagina->meta_image)}}"
            alt="Meta Image"
            aria-hidden="true">
        @endisset

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">URL</span>
            <input
            name="meta_url"
            value="{{$pagina->meta_url??''}}"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="URL" />
            @error('meta_url')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{$message}}
            </span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Descripción</span>
            <input
            name="meta_description"
            value="{{$pagina->meta_description??''}}"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Descripción" />
            @error('meta_description')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{$message}}
            </span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Palabras Claves</span>
            <input
            name="meta_keywords"
            value="{{$pagina->meta_keywords??''}}"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Palabras Clave" />
            @error('meta_keywords')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{$message}}
            </span>
            @enderror
        </label>
    </div>

    <div class="mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Estado
        </span>
        <div class="mt-2">
            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                <input name="status" {{$edit && $pagina->status === 'published' ? 'checked' : ''}} type="radio" value="published" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                <span class="ml-2">Publicada</span>
            </label>
            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                <input name="status" {{$edit && $pagina->status === 'unpublished' ? 'checked' : ''}} type="radio" value="unpublished"  class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                <span class="ml-2">Sin Publicar</span>
            </label>
            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                <input name="status" {{$edit && $pagina->status === 'draft' ? 'checked' : ''}} type="radio" value="draft"  class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                <span class="ml-2">Borrador</span>
            </label>
        </div>
        @error('activo')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </div>
    <div>
        <input type="hidden" name="body">
        <input type="hidden" name="css">
        <input type="hidden" name="id" value="{{$pagina->id??''}}">
    </div>
    <div id="gjs"></div>

</div>

@section('footscripts')

<script type="text/javascript">
    var editor = grapesjs.init({
        container : '#gjs',
        plugins: ['gjs-preset-webpage'],
        pluginsOpts: {
          'gjs-preset-webpage': {
          }
        }
    });

    @if ($edit)

    $(function () {
        editor.setStyle('{!!$pagina->css ?? '' !!}');
        editor.setComponents('{!!$pagina->body ?? '' !!}');
    });

    @endif

    function save(){
        $('input[name=body]').val(editor.getHtml());
        $('input[name=css]').val(editor.getCss());
        $('#saveForm').submit();
    }

</script>
@endsection
