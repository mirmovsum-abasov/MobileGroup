<h1>İstifadə üçün təlimat</h1>
<hr>
<ul>
    <li>.env.example faylin adin deyishin .env edin</li>
    <li>.env faylina DATABASE məlumatların yazın</li>
    <li>
        E-Mail Notification işləməsi üçün, .env faylında lazımlı bolmələri əvəz edin

```dotenv
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=abasovmiri50@gmail.com
MAIL_PASSWORD=miri1122
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=abasovmiri50@gmail.com
MAIL_FROM_NAME="MOBILE GROUP"
```

</li>
</ul>
ENV faylından bazanı quraşdırdıqdan sonra atılacaq addımlar:
<ul>
    <li>composer install</li>
    <li>php artisan key:generate</li>
    <li>php artisan storage:link</li>
    <li>php artisan migrate:refresh --seed</li>
    <li>php artisan serve</li>
</ul>
<hr>
<p>
<b>Test üçün yaradılmış istifadəçidən istifadə edə bilərsiniz.</b>

login : admin@admin.com

password : password
</p>
<hr>
<p>
    <b>PHPUnit</b> istifade etmek ucun terminalda bu komandani yazin: <br>

```text
php vendor/phpunit/phpunit/phpunit
```

<small> <b>Qeyd:</b> PHPUnit komandasindan sonra DATABASE-dəki məlumatlar silinir. Məlumatları yenidən yazdırmaq üçün</small>

```
php artisan migrate:refresh --seed
```

<small>
komandasından istifadə edin.
</small>




</p>