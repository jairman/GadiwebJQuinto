{!! Form::myInput('text', 'codigo', null, [0,'required','unique:codigo' , 'placeholder' => __('Código') ]) !!}

{!! Form::myInput('text', 'codigo_de_barras', null, [0,'unique:codigo_de_barras' , 'placeholder' => __('codigo_de_barras') ]) !!}


{!! Form::mySelect('categoria', '', [0 => ' '] + App\Categoria::pluck('categoria', 'id')->toArray(), null, ['required','placeholder' => __('Categoría') ]) !!}


{!! Form::myInput('number', 'stock', null, [0,'required','unique:stock' , 'placeholder' => __('Stock') ]) !!}

{!! Form::myInput('text', 'descripcion', null, [0,'required','unique:descripcion' , 'placeholder' => __('Descripción') ]) !!}


{!! Form::myInput('number', 'precio', '',  ['numeric' , 'placeholder' => __('Precio Venta') ]) !!}

{!! Form::myInput('number', 'preciocompra', '',  ['numeric' , 'placeholder' => __('Precio Compra') ]) !!}

{!! Form::myInput('number', 'stock_minimo_notificar', '',  ['numeric' , 'placeholder' => __('Stock Mínimo') ]) !!}

{!! Form::mySelect('porcentaje', '', config('variables.porcentaje')) !!}