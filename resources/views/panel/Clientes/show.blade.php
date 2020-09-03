@extends('layouts.panel')

@section('title', 'Demo Cliente Nuevo')
@section('css')

@endsection

@section('content')

<div class="card">
	<!-- /.card-header  Para poner titulos-->
    <div class="card-header">
    		 <h3 style="text-align: center;">Cliente Demo de Nueva Funcionalidad</h3>
        
    </div>	
    <!-- Fin card-header  Para poner titulos-->
    <div class="card-body" id="gradiweb">
    	
    	<div class="row justify-content-center">
        <div class="col-md-8">

           

            <p class="my-1">Se debe construir una función JS que recibe un arreglo con un conjunto de arreglos, y debe agrupar en el primer nivel por la fecha y en el segundo nivel con la franja horaria</p>

			            

				<pre>
					[
					    [​&quot;​2018-12-01​&quot;​,​&quot;​AM​&quot;​,​&quot;​ID123​&quot;,​ ​5000​],
					    [​&quot;​2018-12-01​&quot;​,​&quot;​AM​&quot;​,​&quot;​ID545​&quot;,​ ​7000​],
					    [​&quot;​2018-12-01​&quot;​,​&quot;​PM​&quot;​,​&quot;​ID545​&quot;,​ ​3000​],
					    [​&quot;​2018-12-02​&quot;​,​&quot;​AM​&quot;​,​&quot;​ID545​&quot;,​ ​7000​]
					]
		        </pre>
            <div style="text-align: center;">

	            <button class="btn btn-primary" @click="transform">
	                 Presione Aqui Para transformar El Arreglo
	 	        </button>
            </div>

	            <table class="table">
	                <thead>
	                   	 <th>Resultado :</th>
	                   
	                </thead>
	                <tbody>
	                    <tr>
	                       
	                    	<td>@{{resultObject}}</td>
	                    </tr>
	                     
	                </tbody>
	            </table>

        </div>
    </div>




	</div>
    <!-- /.card-body -->
</div>
@stop

@section('js')
    <script>
        new Vue({
            el: '#gradiweb',
            data() {
                return {
                    resultObject: ['Resultado De Objeto']
                }
            },
            methods: {
                transform() {
                    const array = [
                        ['2018-12-01', 'AM', 'ID123', 5000],
                        ['2018-12-01', 'AM', 'ID545', 7000],
                        ['2018-12-01', 'PM', 'ID545', 3000],
                        ['2018-12-02', 'AM', 'ID545', 7000],
                    ];

                    let date, ampm, value;
                    let newObject = {};
                    array.forEach(item => {
                        date = item[0];
                        ampm = item[1];
                        value = parseInt(item[3]);

                        if(!newObject.hasOwnProperty(date)) newObject[date] = {};

                        if(!newObject[date].hasOwnProperty(ampm)) newObject[date][ampm] = 0;

                        newObject[date][ampm] += value;
                    });

                    console.log(newObject)
                    this.resultObject = newObject
                }
            }
        })
    </script>
@stop