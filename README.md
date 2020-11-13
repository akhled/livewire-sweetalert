# Livewire Sweetalert <!-- omit in toc -->

Integrate livewire with sweetalert.

- [Installation](#installation)
- [How to use](#how-to-use)
  - [2. Include javascript](#2-include-javascript)
- [Available configuration](#available-configuration)

## [Installation](https://packagist.org/packages/akhaled/livewire-sweetalert)

`composer require akhaled/livewire-sweetalert`

## How to use

### 1. Add `LivewireSweetalertServiceProvider` in `config/app.php` <!-- omit in toc -->

```php
    ...
    Akhaled\LivewireSweetalert\LivewireSweetalertServiceProvider::class
    ...
```

### 2. Include javascript

```blade
    ...
    @livewireScripts
    @livewireSweetalertScripts // or whenever you need
    ...
```

### 3. Extra config file <!-- omit in toc -->

Publish the configs: `php artisan vendor:publish --tag=livewire-sweetalert-config`.
> See [available configuration](#available-configuration)

---

## Available configuration
