# Livewire Sweetalert <!-- omit in toc -->

Integrate livewire with [Sweetalert](https://sweetalert2.github.io/).

- [Installation](#installation)
- [How to use](#how-to-use)
- [Toast](#toast)
- [Fire](#fire)
- [Confirm](#confirm)
  - [Multiple confirmation component](#multiple-confirmation-component)
  - [Using PHP 8 Attribute](#using-php-8-attribute)
  - [Passing event data](#passing-event-data)
- [Available configuration](#available-configuration)

## [Installation](https://packagist.org/packages/akhaled/livewire-sweetalert)

`composer require akhaled/livewire-sweetalert`

## How to use

### 1. Include javascript<!-- omit in toc -->

```blade
    ...
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts
    @livewireSweetalertScripts
</body>
```

### 2. Extra config file<!-- omit in toc -->

Publish the configs: `php artisan vendor:publish --tag=livewire-sweetalert-config`.
> See [available configuration](#available-configuration)

---

## Toast

In your component add `Toast` trait. Then call `toast` method whenever you want.

```php
use Akhaled\LivewireSweetalert\Toast;
use Livewire\Component;

class MyComponent extends Component
{
    use Toast;

    public function save() {
        $this->toast('Toast message', 'success', 5000);
    }
    ...
}
```

**toast parameters:**

- title
- [icon](https://sweetalert2.github.io/#icons): success, error, warning, info, question - default is **info**
- timeout: in milliseconds, default is 5000

---

## Fire

This is the normal sweetalert [modal](https://sweetalert2.github.io/#examples). In your component add `Fire` trait. Then call `fire` method whenever you want.

```php
use Akhaled\LivewireSweetalert\Fire;
use Livewire\Component;

class MyComponent extends Component
{
    use Fire;

    public function save() {
        $options = [];
        $this->Fire('Error happened', 'error', 'please try again later', $options);
    }
    ...
}
```

**fire parameters:**

- titleText: The title of the popup, as text to avoid HTML injection.
- [icon](https://sweetalert2.github.io/#icons): success, error, warning, info, question - default is **info**.
- html: the html which is displayed under the title.
- options: [all options](https://sweetalert2.github.io/#configuration) that sweetalert provides.

---

## Confirm

Add `Confirm` trait to your component. Then call `confirm` method whenever you want. On confirmation, `confirmed` event is being emitted. Add it to `$listeners` property in you component. See example:

```php
use Akhaled\LivewireSweetalert\Confirm;
use Livewire\Component;

class MyComponent extends Component
{
    use Confirm;

    protected $listeners = [
        'confirmed' => 'onConfirmation'
    ];

    public function delete()
    {
        $options = []; // default ['event' => 'confirmed']
        $this->confirm('Are you sure you want to delete', 'you can\'t revert that', $options);
    }

    public function onConfirmation()
    {
        dd('confirmed!');
    }
}
```

**confirm parameters:**

- title: The title of the popup, as text to avoid HTML injection.
- html: the html which is displayed under the title.
- options: [all options](https://sweetalert2.github.io/#configuration) that sweetalert provides. _In addition to event key for using multiple confirmation on same component. see following example_

### Multiple confirmation component

```php
use Akhaled\LivewireSweetalert\Confirm;
use Livewire\Component;

class MyComponent extends Component
{
    use Confirm;

    protected $listeners = [
        'confirmed' => 'onConfirmation',
        'anotherConfirmed' => 'onAnotherConfirmation'
    ];

    public function delete()
    {
        $options = []; // default ['event' => 'confirmed']
        $this->confirm('Are you sure you want to delete', 'you can\'t revert that', $options);
    }

    public function onConfirmation()
    {
        dd('confirmed!');
    }

    public function anotherAction()
    {
        $options = [
            'event' => 'anotherConfirmed'; // <-- that's how it works!
        ];
        $this->confirm('Are you sure you want to delete', 'you can\'t revert that', $options);
    }

    public function onAnotherConfirmation()
    {
        dd('confirmed #2!');
    }
}
```

### Using PHP 8 Attribute

```php
use Akhaled\LivewireSweetalert\Confirm;
use Livewire\Component;
use Livewire\Attributes\On;

class MyComponent extends Component
{
    use Confirm;

    public function confirmedWithAttribute()
    {
        $options = [
            'event' => 'phpOnAttribute';
        ];
        $this->confirm('Are you sure you want to delete', 'you can\'t revert that', $options)
    }

    #[On('phpOnAttribute')]
    public function onConfirmationWithAttribute()
    {
        dd('confirmed #3!');
    }
}
```

### Passing event data

```php
use Akhaled\LivewireSweetalert\Confirm;
use Livewire\Component;
use Livewire\Attributes\On;

class MyComponent extends Component
{
    use Confirm;

    public function save()
    {
        $this->confirm(
            event: 'savedConfirmed',
            data: [
                'key' => 'value',
            ]
        )
    }

    #[On('savedConfirmed')]
    public function onSavedConfirmations(array $data)
    {
        dd($data['key']); // value
    }
}
```

---

## Available configuration
