Este ejemplo consiste en combinar Google charts utilizando los datos provenientes de una hoja de cálculo de Google Docs
Además esta hoja de cálculo se va rellenando de información ya que está conectada con un formulario de google docs

Comprobamos que funciona el ejemplo inicial (paso-1.html)

Luego crearemos una hoja de cálculo en google drive
Atención: Para que sea visible tenemos que hacer 2 cosas,
 -por un lado compartirla públicamente en la opción (share) compartir.
 - en la opción File/Publish to the web también activar la publicación.

Una vez tenemos la hoja de cáculo debemos fijarnos en su código (formado por letras del tipo 0Al6FA6GpSbWxdGhvZWh3RW11aWxvMUV1Z3dNVldLMmc)
y pegarla en url del código javascript, en realidad Google Charts utiliza esta url para obtener los datos,
por ejemplo

https://spreadsheets.google.com/tq?key=0Al6FA6GpSbWxdGhvZWh3RW11aWxvMUV1Z3dNVldLMmc&range=B4:C6&pub=1

También es importante observar el parámetro range, que es el rango de celdas que se usa para la visualización

En el paso_2.html tenemos un caso práctico conectado con esta hoja de cálculo
https://docs.google.com/spreadsheet/ccc?key=0Al6FA6GpSbWxdGhvZWh3RW11aWxvMUV1Z3dNVldLMmc#gid=0

Podemos ir actualizando la hoja de cálculo y el gráfico también se refresca. (aunque puede tardar un cierto tiempo)

"Rizando el rizo" podriamos utilizar los formularios para que la gente participe y vaya creando los datos que se exportan automáticamente
en una hoja de cálculo. Por ejemplo del siguiente formulario
https://docs.google.com/spreadsheet/viewform?fromEmail=true&formkey=dDh0WHJDZUFqQnhmMEhkdFk4bVlRUXc6MQ
