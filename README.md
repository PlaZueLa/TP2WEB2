
El endpoint para traer todo sin parametros, realizar un POST o DELETE es:
 http://localhost/tp2webapirestfull/api/cars

GET BY ID: 
http://localhost/tp2webapirestfull/api/cars/id


Para todos los ordenamientos se puede usar tanto minusculas como mayusculas, ej: (sort=id o sort=ID y order=ASC o asc, lo mismo con desc y DESC), aca dejo una sola manera para no hacer extenso el README.

ORDER:

Por id:
http://localhost/tp2webapirestfull/api/cars?sort=id&order=ASC

http://localhost/tp2webapirestfull/api/cars?sort=id&order=DESC

Por marca:
http://localhost/tp2webapirestfull/api/cars?sort=marca&order=ASC

http://localhost/tp2webapirestfull/api/cars?sort=marca&order=DESC

Por modelo:
http://localhost/tp2webapirestfull/api/cars?sort=modelo&order=ASC

http://localhost/tp2webapirestfull/api/cars?sort=modelo&order=DESC

Por año:
http://localhost/tp2webapirestfull/api/cars?sort=id&order=ASC

http://localhost/tp2webapirestfull/api/cars?sort=id&order=DESC
 
Por precio:
http://localhost/tp2webapirestfull/api/cars?sort=precio&order=ASC

http://localhost/tp2webapirestfull/api/cars?sort=precio&order=DESC

Por descripcion:
http://localhost/tp2webapirestfull/api/cars?sort=descripcion&order=ASC

http://localhost/tp2webapirestfull/api/cars?sort=descripcion&order=DESC

Por categoria:
http://localhost/tp2webapirestfull/api/cars?sort=id_categoria&order=ASC

http://localhost/tp2webapirestfull/api/cars?sort=id_categoria&order=DESC





