# Instalación

Para instalar los retos hay que clonar el repositorio y construir todos los contenedores.

```bash
git clone https://github.com/aramosf/retosweb
cd retosweb
bash buildall.sh
```

# Pruebas

Para arrancar cada una de las pruebas se debe generar primero el contenedor con el comando docker 
build dentro de su correspondiente directorio.

`docker build -t  ejercicioX .`

Y posteriormente arrancarlo con docker run, donde N es cada ejercicio:

`docker run -d --rm --publish=8N:80 --name ejercicioN ejercicioN`

Para realizar las pruebas se accede al puerto que corresponda. 
	ejercicio 1, puerto 81 
	ejercicio 2, puerta 82
	...

Todos los tokens están en los propios contenedores. El proposito es superarlos accediendo vía web,
 explotando vulnerabilidades, no con un grep :-)

# Scripts

- buildall.sh: Crea todos los contenedores (docker build)
- runall.sh: Ejecuta todos los contenedores (docker run)
- stopall.sh: Para todos los contenedores (docker stop)








