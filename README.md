## Laravel - PWA

![Prompt de Instalação](https://github.com/agenciafmd/laravel-pwa/raw/master/docs/screenshot.png "Prompt de Instalação")

[![Downloads](https://img.shields.io/packagist/dt/agenciafmd/laravel-pwa.svg?style=flat-square)](https://packagist.org/packages/agenciafmd/laravel-pwa)
[![Licença](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

- PWA para todos

## TODO

- [ ] Customizar o toast de offline no formato do instalador
- [ ] Customizar o toast de atualização no formato do instalador
- [ ] Implementar o lifetime de cache para que o instalador não apareça toda hora para fecharmos

## Instalação

```bash
composer require agenciafmd/laravel-pwa:dev-master
```

## Configuração

Publique o arquivo de configuração para estilizar os componentes.

```bash
php artisan vendor:publish --tag=laravel-pwa:config
php artisan vendor:publish --tag=laravel-pwa:assets
```

Agora adicione os components da pwa na `master.blade.php`

```html
<head>
    ...
    <x-pwa::head/>
</head>
```

Para versões inferiores a 8

```html
<head>
    ...
    @pwaHead
</head>
```