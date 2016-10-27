Bolt Store Hours
======================

This [bolt.cm](https://bolt.cm/) extension adds business hours as a field type within Bolt based on [PHP Store Hours](https://github.com/coryetzkorn/php-store-hours).

PHP Store Hours is a simple PHP class that outputs content based on time of the day and day of the week.

Simply adjust opening and closing hours for each day of the week and you can output content based on the time ranges you specify.

### Installation
1. Login to your Bolt installation
2. Go to "Extend" or "Extras > Extend"
3. Type `bolt-store-hours` into the input field
4. Click on the extension name
5. Click on "Browse Versions"
6. Click on "Install This Version" on the latest stable version

### Configuration

To use this extension, you should add a field to your contenttypes, and use the
tags in your twig templates accordingly.

In your contenttypes, you should add a single `storehours` field. The extension
will use this to store the data for each weekday that show in the
backend when editing a record. Simply add it to your fields like this:

```yaml
business:
    name: Businesses
    singular_name: Business
    fields:
        [..]
        hours:
            type: storehours
```

After you've done this, it will look like this in the Bolt backend:

![screenshot](https://cloud.githubusercontent.com/assets/3504472/16212217/73c1d028-3703-11e6-9c3a-ead074774f75.png)

### Use

You can use `store_hours_is_open()` to return true or false if the store is open.
```twig
    {{ store_hours_is_open(record.hours) }} {# Returns true or false #}
```
Or you can display today's hours by doing:
```twig
{% for hour in store_hours_hours_today(record.hours) %}
    {% set this_day_hours = hour|split('-') %}
    Open: {{ this_day_hours[0]|date('g:i a') }}
    Close: {{ this_day_hours[1]|date('g:i a') }}
{% endfor %}
```

**Note:** This is a new extension, so the functionality is still pretty bare
bones. What's there works well, but there is probably a lot of functionality to
add and improve. If you'd like to contribute, or have a good idea, feel free to
open an issue on the tracker at the [Bolt Store Hours repository](https://github.com/zomars/bolt-store-hours/issues)
on Github.

---

### License

This Bolt extension is open-sourced software licensed under the [Your preferred License]
