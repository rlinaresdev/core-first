#CORE
Core V-1.0 | Sistema Central para Malla

### HELPER

Instaciar malla desde un proveedor de servicio.

```php
function register() {
	$malla = $this->app["malla"];
}

```
Desde el helper malla

```php

malla();

```

Llamando una libraría en especifico.

```php
$map = malla("finder")->map("../", 1);

```

### Cargar una libraría

```php

malla("alianame", new \Vendor\Library\ClassName());

malla("alianame", \Vendor\Library\ClassName::class);

```


### Montar el Kernel de una Libraría

```php

malla("loader")->run(\Vendor\Library\Kernel::class);

```