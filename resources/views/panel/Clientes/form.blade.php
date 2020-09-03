{!! Form::myInput('number', 'cedula', null, [0,'required','unique:cedula' , 'placeholder' => __('Cedula') ]) !!}

{!! Form::myInput('text', 'nombre', null, [0 , 'placeholder' => __('Nombre') ]) !!}